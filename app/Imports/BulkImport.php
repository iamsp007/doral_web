<?php

namespace App\Imports;

use App\Jobs\SendEmailJob;
use App\Models\Patient;
use App\Models\PatientReferral;
use App\Models\PatientReferralNotSsn;
use App\Models\User;
use App\Models\FailRecodeImport;
use App\Models\LabReportType;
use App\Models\Demographic;
use App\Models\PatientEmergencyContact;
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
use Illuminate\Support\Facades\Log;
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

    public function __construct($rid, $sid, $ftype, $fid,$file_name,$company_id) {
        $this->referral_id = $rid;
        $this->service_id = $sid;
        $this->file_type = $ftype;
        $this->form_id = $fid;
        $this->file_name = $file_name;
        $this->company_id = $company_id;
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
           
            if ($this->file_type === '6') {
                Log::info('covid-19 start: '.$this->file_type);
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
                Log::info('covid-19 end');
            }
            
            if (isset($row['caregiver_code']) && isset($row['compliance_item'])) {
                Log::info('due report start');
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
                        $labReportType->status = '1';
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
                        if (date('Y', strtotime($row['compliance_due_date'])) >= 2000) {
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
                Log::info('due report end');
            }
           
            if ($this->service_id === '3' && isset($row['ssn']) && isset($row['language'])) {
                Log::info('md order start');
                Log::info($row);
                $patient = Demographic::where(['ssn'=>setSsn($row['ssn'])])->first();
                if ($patient) {
                    $user = User::find($patient->user_id);
                    $demographic = Demographic::where('patient_id', $patient->user_id);
                } else {
                    $user = new User();
                    $demographic = new Demographic();
                }
                $doral_id = createDoralId();
                $password = str_replace("-", "@",$doral_id);
               
                $user->first_name = $row['first_name'];
                $user->last_name = ($row['last_name']) ? $row['last_name'] : '';
                $user->email = $row['email'];
                $user->password = setPassword($password);
                $user->status = '0';
                $user->gender = setGender($row['gender']);
                $user->phone = setPhone($row['phone_number']);
                $user->phone_verified_at = now();
                $user->dob = dateFormat($row['date_of_birth']);
            
                $user->save();
                $user->assignRole('patient')->syncPermissions(Permission::all());
                $url = route('partnerEmailVerified', base64_encode($user->id));
                $details = [
                    'name' => $user->first_name,
                    'href' => $url
                ];
            
                if (isset($user->email)) {
                    SendEmailJob::dispatch($user->email,$details,'WelcomeEmail');
                }

                $demographic->doral_id = $doral_id;
                $demographic->user_id = $user->id;
            
                $demographic->company_id = $this->company_id;
                // if ($this->file_type === '2') {
                    $demographic->service_id = config('constant.MDOrder');
                // } else if ($this->file_type === '3') {
                //     $demographic->service_id = config('constant.OccupationalHealth');
                // }
           
                $addressData = [
                    'address1' => isset($row['address1']) ? $row['address1'] : '',
                    'address2' => isset($row['address2']) ? $row['address2'] : '',
                    'crossStreet' => isset($row['cross_street']) ? $row['cross_street'] : '',
                    'city' => isset($row['city']) ? $row['city'] : '',
                    'state' => isset($row['state']) ? $row['state'] : '',
                    'county' => isset($row['county']) ? $row['county'] : '',
                    'zip_code' => isset($row['zip_code']) ? $row['zip_code'] : '',
                    'isPrimaryAddress' => isset($row['is_primary_address']) ? $row['is_primary_address'] : '',
                    'addressTypes' => isset($row['address_types']) ? $row['address_types'] : '',
                ];
       
                $demographic->ssn = setSsn($row['ssn'] ? $row['ssn'] : '');
                $demographic->address = $addressData;
                $demographic->status = 'Active';
                $demographic->language = isset($row['language']) ? $row['language'] : '';
                $demographic->type = '1';

                $demographic->save();

                getAddressLatlngAttribute($addressData, $user->id);
                    
                $patientEmergencyContact = new PatientEmergencyContact();

                $patientEmergencyContact->user_id = $user->id;
                $patientEmergencyContact->name = $row['emergency_name'];
                $patientEmergencyContact->relation = $row['emergency_relation'];
                
                $patientEmergencyContact->lives_with_patient = ($row['lives_with_patient']) ? $row['lives_with_patient'] : '';
                $patientEmergencyContact->have_keys = ($row['have_keys']) ? $row['have_keys'] : '';
                
                $patientEmergencyContact->phone1 = setPhone($row['emergency_phone1'] ? $row['emergency_phone1'] : '');
                $patientEmergencyContact->phone2 = setPhone($row['emergency_phone2'] ? $row['emergency_phone2'] : '');
                
                if ($row['emergency_address']) {
                    $addressData = [
                        'address1' => ($row['emergency_address']) ? $row['emergency_address'] : ''
                    ];

                    $patientEmergencyContact->address = $addressData;
                }
                
                $patientEmergencyContact->save();
            }
            Log::info('md order end');
       
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
