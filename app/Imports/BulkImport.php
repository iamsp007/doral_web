<?php

namespace App\Imports;

use App\Models\Patient;
use App\Models\PatientReferral;
use App\Models\PatientReferralNotSsn;
use App\Models\User;
use App\Models\FailRecodeImport;
use App\Models\LabReportType;
use App\Models\CaregiverInfo;
use App\Models\Demographic;
use App\Models\PatientLabReport;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithValidation;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithProgressBar;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Validators\Failure;

HeadingRowFormatter::default('slug');


class BulkImport implements ToModel, WithHeadingRow, WithValidation,SkipsOnFailure 
{
    use Importable,SkipsFailures;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $referral_id = null;
    public $service_id = null;
    public $file_type = null;
    public $form_id = null;
    public $file_name = null;
    private $row = 0;

    public function __construct($rid, $sid, $ftype, $fid,$file_name) {
       $this->referral_id = $rid;
       $this->service_id = $sid;
       $this->file_type = $ftype;
       $this->form_id = $fid;
       $this->file_name = $file_name;
    //    $this->company_id = $company_id;
    }

    public function model(array $row)
    {
        try {
            $record = [];
            $dob = "";

            if (isset($row['date_of_birth'])) {
                $dob = date('Y-m-d', strtotime($row['date_of_birth']));
            } else if (isset($row['dob'])) {
                $dob = date('Y-m-d', strtotime($row['dob']));
            }
            
            // \Log::info('covid-19 start: '.$this->file_type);
            
            if ($this->file_type === '6') {
                $ssn = str_replace("-","",$row['ssn']);
                $demographic = Demographic::where('ssn', $ssn)->first();

                if ($demographic) {
                    $user = User::find($demographic->user_id);
                    $demographicModel = Demographic::find($demographic->id);
                    $doral_id = $demographic->doral_id;
                } else {
                    $user = new User();
                    $demographicModel = new Demographic();
                    $doral_id = createDoralId();
                }
                $password = str_replace(" ", "",$row['first_name']) . '@' . $doral_id;

                $user->first_name = $row['first_name'];
                $user->last_name = $row['last_name'];
                $user->gender = setGender($row['gender']);
                $user->phone = setPhone($row['phone_number']);
                $user->dob = dateFormat($row['date_of_birth']);
                $user->email = isset($row['email']) ? $row['email'] : '';
                $user->password = setPassword($password);


                $user->save();

                $user->assignRole('patient')->syncPermissions(Permission::all());
                $address = [
                    'apt_building' => $row['apt_building'],
                    'address1' => $row['address1'],
                    'address2' => $row['address2'],
                    'city' => $row['city'],
                    'state' => $row['state'],
                    'zip_code' => $row['zip_code'],
                ];
                
                $demographicModel->company_id =  9;
                $demographicModel->user_id = $user->id;
                $demographicModel->service_id = '6';
                $demographicModel->ssn = setSsn($row['ssn']);
                $demographicModel->marital_status = $row['marital_status'];
                $demographicModel->address = $address;
                $demographicModel->gender_at_birth = setGender($row['gender_at_birth']);
                
                $demographicModel->status = 'Active';
                $demographicModel->save();
            }
            // \Log::info('covid-19 end');
            
            \Log::info('due report start');
            if (isset($row['caregiver_code']) && isset($row['compliance_item'])) {
                $caregiver_code = str_replace("HSC-", "",$row['caregiver_code']);
                $userCaregiver = Demographic::where('caregiver_code', $caregiver_code)->first();
                
                // \Log::info($userCaregiver->id);
                if ($userCaregiver) {

                    $labReportType = LabReportType::where('name', $row['compliance_item'])->first();
                    if($labReportType){
                        $labReportTypeID = $labReportType->id;
                    } else {
                        $labReportType = new LabReportType();
                        $labReportType->name = $row['compliance_item'];
                        $labReportType->status = 1;
                        $labReportType->sequence = 1;

                        $labReportType->save();
                        $labReportTypeID = $labReportType->id;
                    }
                    
                    $patientLabReport = PatientLabReport::where([['user_id', '=', $userCaregiver->user_id],['lab_report_type_id', '=',$labReportTypeID]])->first();
                 
                    if ($patientLabReport) {
                        if ($patientLabReport->due_date < date('Y-m-d', strtotime($row['compliance_due_date']))) {
                            PatientLabReport::find($patientLabReport->id)->update([
                                'due_date' => date('Y-m-d', strtotime($row['compliance_due_date'])),
                                'perform_date' => date('Y-m-d', strtotime($row['compliance_completion_date'])),
                                'expiry_date' => date('Y-m-d', strtotime($row['compliance_due_date'])),
                                'result' => $row['compliance_result'],
                            ]);
                        } else if ($patientLabReport->due_date == date('Y-m-d', strtotime($row['compliance_due_date']))) {
                            PatientLabReport::find($patientLabReport->id)->update([
                                'result' => $row['compliance_result'],
                            ]);
                        } 
                    } else {
                        
                        $patientLabReport = new PatientLabReport();
                        $patientLabReport->lab_report_type_id = $labReportType->id;
                        $patientLabReport->user_id = $userCaregiver->user_id;
                        $patientLabReport->due_date = date('Y-m-d', strtotime($row['compliance_due_date']));
                        $patientLabReport->perform_date = date('Y-m-d', strtotime($row['compliance_completion_date']));
                        $patientLabReport->expiry_date = date('Y-m-d', strtotime($row['compliance_due_date']));
                        $patientLabReport->result = $row['compliance_result'];

                        $patientLabReport->save();
                    }
                }
            }
            \Log::info('due report end');
            // if ((isset($row['ssn']) && !empty($row['ssn'])) && (!empty($dob))) {
            //     $patient = PatientReferral::where(['ssn'=>$row['ssn']])->first();

            //     if ($patient) {
            //         $user = User::find($patient->user_id);
            //         $address = $patient->address1;
            //         if (isset($row['street1'])) {
            //             $address = $row['street1'];
            //         } elseif (isset($row['address1'])) {
            //             $address = $row['address1'];
            //         } elseif (isset($row['address'])) {
            //             $address = $row['address'];
            //         }

            //         $address2 = $patient->address2;
            //         if (isset($row['street2'])) {
            //             $address2 = $row['street2'];
            //         } elseif (isset($row['address2'])) {
            //             $address2 = $row['address2'];
            //         }

            //         $emergency1_name = $patient->eng_name;
            //         if (isset($row['emergency1_name'])) {
            //             $emergency1_name = $row['emergency1_name'];
            //         }

            //         $emergency1_relationship = $patient->emg_relationship;
            //         if (isset($row['emergency1_relationship'])) {
            //             $emergency1_relationship = $row['emergency1_relationship'];
            //         }

            //         $emergency1_address = $patient->eng_addres;
            //         if (isset($row['emergency1_address'])) {
            //             $emergency1_address = $row['emergency1_address'];
            //         }

            //         $emergency1_phone = $patient->emg_phone;
            //         if (isset($row['emergency1_phone'])) {
            //             $emergency1_phone = $row['emergency1_phone'];
            //         }

            //         $working_hour = $patient->working_hour;
            //         $benefit_plan = $patient->benefit_plan;
            //         if (isset($row['working_hour']) && !empty($row['working_hour'])) {
            //             $working_hour = $row['working_hour'];
            //             if ($working_hour >= 1 && $working_hour <= 20) {
            //                 $benefit_plan = 1;
            //             } else if ($working_hour >=21 && $working_hour <= 25) {
            //                 $benefit_plan = 2;
            //             } else if( $working_hour >=26 && $working_hour <= 30) {
            //                 $benefit_plan = 3;
            //             } else if ($working_hour >=31 && $working_hour <= 35) {
            //                 $benefit_plan = 4;
            //             } else if ($working_hour >=36 && $working_hour <= 40) {
            //                 $benefit_plan = 5;
            //             } else {
            //                 $benefit_plan = 1;
            //             }
            //         }
            //         $dataV = [];
            //         if(isset($row['cert_period'])) {
            //             $certPeriod = str_replace('(', '', $row['cert_period']);
            //             $certPeriod = str_replace(')', '', $certPeriod);
            //             $certPeriod = str_replace(' ', '', $certPeriod);
            //             $certDate = explode('-', $certPeriod);

            //             $certDateStart = strtotime($certDate[0]);
            //             $certDateStart = date('Y-m-d', $certDateStart);

            //             $certDateEnd = strtotime($certDate[1]);
            //             $certDateEnd = date('Y-m-d', $certDateEnd);
            //             // Next date
            //             $certDateNext = $certDate[1];
            //             $certDateNext = date('Y-m-d', strtotime($certDateNext. ' + 180 days'));

            //             $date_now = date("Y-m-d"); // this format is string comparable
            //             if ($certDateEnd > $date_now) {
            //                $dataV = [
            //                     'cert_start_date' => $certDateStart,
            //                     'cert_end_date' => $certDateEnd,
            //                     'cert_next_date' => $certDateEnd
            //                 ];
            //             } else {
            //                 $dataV = [
            //                     'cert_start_date' => $certDateStart,
            //                     'cert_end_date' => $certDateEnd,
            //                     'cert_next_date' => $certDateNext
            //                 ];
            //             }
            //         } else {
            //             $dataV = [
            //                 'cert_start_date' => $patient->cert_start_date,
            //                 'cert_end_date' => $patient->cert_end_date,
            //                 'cert_next_date' => $patient->cert_next_date
            //             ];
            //         }
            //         // Wage Parity Section Start
            //         $wageParity = [];
            //         if(isset($row['plan'])) {
            //             $wageParity = [
            //                 'person_code' => $row['person_code'],
            //                 'grp_number' => $row['grp_number'],
            //                 'id_number' => $row['id_number'],
            //                 'eff_date' => $row['eff_date'],
            //                 'term_date' => $row['term_date'],
            //                 'initial' => $row['initial'],
            //                 'division' => $row['division'],
            //                 'coverage' => $row['coverage'],
            //                 'plan' => $row['plan'],
            //                 'network' => $row['network'],
            //                 'coverage_level' => $row['coverage_level'],
            //                 'apt' => $row['apt']
            //             ];
            //         }
                    
            //         // Wage Parity Section End
            //         $record = [
            //             'user_id'=>$user->id,
            //             'referral_id'=>$this->referral_id,
            //             'service_id'=>$this->service_id,
            //             'file_type'=>$this->file_type,
            //             'form_id'=>isset($this->form_id)?$this->form_id:$patient->form_id,
            //             'first_name'=>isset($row['first_name']) ? $row['first_name'] : $patient->first_name,
            //             'last_name'=>isset($row['last_name']) ? $row['last_name'] : $patient->last_name,
            //             'middle_name'=>isset($row['middle_name'])?$row['middle_name']:$patient->middle_name,
            //             'gender'=>isset($row['gender'])?$row['gender']:$patient->gender,
            //             'email' => isset($row['email'])?$row['email']:$patient->email,
            //             'dob'=>$dob,
            //             // 'dob'=>Carbon::createFromDate($dob),
            //             'phone1'=>isset($row['phone2'])?$row['phone2']:$patient->phone1,
            //             'phone2'=>isset($row['phone2'])?$row['phone2']:$patient->phone2,
            //             'address_1'=>$address,
            //             'address_2'=>$address2,
            //             'eng_name'=>$emergency1_name,
            //             'emg_relationship'=>$emergency1_relationship,
            //             'eng_addres'=>$emergency1_address,
            //             'emg_phone'=>$emergency1_phone,
            //             'patient_id'=>isset($row['admission_id'])?$row['admission_id']:$patient->patient_id,
            //             'caregiver_code' => isset($row['caregiver_code'])?$row['caregiver_code']:$patient->caregiver_code,
            //             'city' => isset($row['city'])?$row['city']:$patient->city,
            //             'state' => isset($row['state'])?$row['state']:$patient->state,
            //             'Zip' => isset($row['zip_code'])?$row['zip_code']:$patient->Zip,
            //             'county' => isset($row['county'])?$row['county']:$patient->county,
            //             'working_hour' => $working_hour,
            //             'benefit_plan' => $benefit_plan
            //         ];
            //         if(count($dataV) > 0) {
            //             $record = array_merge($record, $dataV);
            //         }
            //         if(count($wageParity) > 0) {
            //             $record = array_merge($record, $wageParity);
            //         }
            //         PatientReferral::where('id', $patient->id)->update($record);
            //     } else {
            //         $user = new User();
            //         $patient = new PatientReferral();
            //         $user->first_name = $row['first_name'];
            //         $user->last_name = $row['last_name'];
            //         if (strtolower($row['gender'])==='male'){
            //             $user->gender = '1';
            //         }elseif (strtolower($row['gender'])==='female'){
            //             $user->gender = '2';
            //         }else{
            //             $user->gender = '3';
            //         }
            //         \Log::info($user);
            //         $user->dob = Carbon::createFromDate($row['date_of_birth']);

            //         if (isset($row['email']) && !empty($row['email'])){
            //             if (!User::where(['email'=>$row['email']])->first()){
            //                 $user->email = $row['email'];
            //             }
            //         }

            //         $user->password = Hash::make('doral@123');
            //         $phone=null;
            //         if (isset($row['phone_number'])){
            //             $phone=$row['phone_number'];
            //         }elseif (isset($row['phone'])){
            //             $phone=$row['phone'];
            //         }
            //         $user->phone = $phone;
            //         $user->assignRole('patient')->syncPermissions(Permission::all());

            //         if ($user->save()) {
            //             $address = '';
            //             if (isset($row['street1'])){
            //                 $address = $row['street1'];
            //             }elseif (isset($row['address1'])){
            //                 $address = $row['address1'];
            //             }elseif (isset($row['address'])){
            //                 $address = $row['address'];
            //             }

            //             $address2 = '';
            //             if (isset($row['street2'])){
            //                 $address2 = $row['street2'];
            //             }elseif (isset($row['address2'])){
            //                 $address2 = $row['address2'];
            //             }

            //             $emergency1_name = '';
            //             if (isset($row['emergency1_name'])){
            //                 $emergency1_name = $row['emergency1_name'];
            //             }

            //             $emergency1_relationship = null;
            //             if (isset($row['emergency1_relationship'])){
            //                 $emergency1_name = $row['emergency1_relationship'];
            //             }

            //             $emergency1_address = null;
            //             if (isset($row['emergency1_address'])){
            //                 $emergency1_address = $row['emergency1_address'];
            //             }

            //             $emergency1_phone = null;
            //             if (isset($row['emergency1_phone'])){
            //                 $emergency1_phone = $row['emergency1_phone'];
            //             }

            //             $working_hour = NULL;
            //             $benefit_plan = NULL;
            //             if(isset($row['working_hour']) && !empty($row['working_hour'])) {
            //                 $working_hour = $row['working_hour'];
            //                 if($working_hour >=1 && $working_hour <=20) {
            //                   $benefit_plan = 1;
            //                 } else if($working_hour >=21 && $working_hour <=25) {
            //                   $benefit_plan = 2;
            //                 } else if($working_hour >=26 && $working_hour <=30) {
            //                   $benefit_plan = 3;
            //                 } else if($working_hour >=31 && $working_hour <=35) {
            //                   $benefit_plan = 4;
            //                 } else if($working_hour >=36 && $working_hour <=40) {
            //                   $benefit_plan = 5;
            //                 } else {
            //                   $benefit_plan = 1;
            //                 }
            //             }
            //             // Wage Parity Section Start
            //             $wageParity = [];
            //             if(isset($row['plan'])) {
            //                 $wageParity = [
            //                     'person_code' => $row['person_code'],
            //                     'grp_number' => $row['grp_number'],
            //                     'id_number' => $row['id_number'],
            //                     'eff_date' => $row['eff_date'],
            //                     'term_date' => $row['term_date'],
            //                     'initial' => $row['initial'],
            //                     'division' => $row['division'],
            //                     'coverage' => $row['coverage'],
            //                     'plan' => $row['plan'],
            //                     'network' => $row['network'],
            //                     'coverage_level' => $row['coverage_level'],
            //                     'apt' => $row['apt']
            //                 ];
            //             }
            //             // Wage Parity Section End
            //             $record = [
            //                 'user_id'=>$user->id,
            //                 'referral_id'=>$this->referral_id,
            //                 'service_id'=>$this->service_id,
            //                 'file_type'=>$this->file_type,
            //                 'form_id'=>isset($this->form_id)?$this->form_id:NULL,
            //                 'first_name'=>$row['first_name'],
            //                 'last_name'=>$row['last_name'],
            //                 'middle_name'=>isset($row['middle_name'])?$row['middle_name']:null,
            //                 'gender'=>isset($row['gender'])?$row['gender']:null,
            //                 'email' => isset($row['email'])?$row['email']:null,
            //                 'ssn' => $row['ssn'],
            //                 'dob'=>$dob,
            //                 //'dob'=>Carbon::createFromDate($dob),
            //                 'phone1'=>isset($row['phone2'])?$row['phone2']:null,
            //                 'phone2'=>isset($row['phone2'])?$row['phone2']:null,
            //                 'address_1'=>$address,
            //                 'address_2'=>$address2,
            //                 'eng_name'=>$emergency1_name,
            //                 'emg_relationship'=>$emergency1_relationship,
            //                 'eng_addres'=>$emergency1_address,
            //                 'emg_phone'=>$emergency1_phone,
            //                 'patient_id'=>isset($row['admission_id'])?$row['admission_id']:null,
            //                 'caregiver_code' => isset($row['caregiver_code'])?$row['caregiver_code']:null,
            //                 'city' => isset($row['city'])?$row['city']:null,
            //                 'state' => isset($row['state'])?$row['state']:null,
            //                 'Zip' => isset($row['zip_code'])?$row['zip_code']:null,
            //                 'county' => isset($row['county'])?$row['county']:null,
            //                 'working_hour' => $working_hour,
            //                 'benefit_plan' => $benefit_plan
            //             ];
            //             if(count($wageParity) > 0) {
            //                 $record = array_merge($record, $wageParity);
            //             }
            //             PatientReferral::updateorcreate($record);
            //         }
            //         // \Log::info(123456);
            //     }
            // } else {
            //     $patientRefNotSsn = new PatientReferralNotSsn();
            //     $patientRefNotSsn->referral_id = $this->referral_id;
            //     $patientRefNotSsn->patient_id = isset($row['admission_id'])?$row['admission_id']:null;
            //     $patientRefNotSsn->caregiver_code = isset($row['caregiver_code'])?$row['caregiver_code']:null;
            //     $patientRefNotSsn->save();
            // }
        } catch(Exception $e) {
            $faild_recodes = new FailRecodeImport();
            $faild_recodes->errors = $e->getMessage();
            $faild_recodes->file_name = $this->file_name;
            $faild_recodes->row = ++$this->row;
            $faild_recodes->save();
        }
    }

    /**
     * @param Failure[] $failures
     */
    public function onFailure(Failure ...$failures)
    {
        foreach ($failures as $failure) {
            $faild_recodes = new FailRecodeImport();

            $faild_recodes->errors = $failure->errors()[0];
            $faild_recodes->attribute = $failure->attribute(); 
            $faild_recodes->values = json_encode($failure->values());
            $faild_recodes->file_name = $this->file_name;
            $faild_recodes->row = $failure->row();
            $faild_recodes->service_id = 3;
            $faild_recodes->save();
        }   
    }


    public function rules(): array
    {
        return [
            // '*.last_name' => 'required',
            // '*.first_name' => 'required',
            // '*.ssn' => 'required',
        ];
    
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
