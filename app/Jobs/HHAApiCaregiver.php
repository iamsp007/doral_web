<?php

namespace App\Jobs;

use App\Http\Controllers\GetPatientDetailsController;
use App\Models\CaregiverInfo;
use App\Models\Demographic;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Permission;

class HHAApiCaregiver implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($caregiverArray)
    {
        $this->caregiverArray = $caregiverArray;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach (array_slice($this->caregiverArray, 500, 500) as $cargiver_id) {
            // foreach ($caregiverArray as $cargiver_id) {
                /** Store patirnt demographic detail */
                $getdemographicDetails = $this->getDemographicDetails($cargiver_id);
                $demographicDetails = $getdemographicDetails['soapBody']['GetCaregiverDemographicsResponse']['GetCaregiverDemographicsResult']['CaregiverInfo'];
                
                $userId = self::saveUser($demographicDetails);
                // dump($demographicDetails['ID']);
    
                // $getChangesV2 = $this->getChangesV2();
                // $changesV2 = $getChangesV2['soapBody']['GetCaregiverChangesV2Response']['GetCaregiverChangesV2Result']['GetCaregiverChangesV2Info'];
    
                // $createMedical = $this->createMedical($cargiver_id);
            }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchCaregiverDetails()
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SearchCaregivers xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><SearchFilters><Status>Active</Status><EmployeeType>Employee</EmployeeType></SearchFilters></SearchCaregivers></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        //<FirstName>string</FirstName><LastName>string</LastName><PhoneNumber>string</PhoneNumber><CaregiverCode>string</CaregiverCode><EmployeeType>string</EmployeeType><SSN>string</SSN>Employee/Applicant
        
        $method = 'POST';
        $getPatientDetailsController = new GetPatientDetailsController();
        return $getPatientDetailsController->curlCall($data, $method);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDemographicDetails($cargiver_id)
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetCaregiverDemographics xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><CaregiverInfo><ID>' . $cargiver_id . '</ID></CaregiverInfo></GetCaregiverDemographics></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        $method = 'POST';
        $getPatientDetailsController = new GetPatientDetailsController();
        return $getPatientDetailsController->curlCall($data, $method);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getChangesV2()
    {
        $date = Carbon::now();// will get you the current date, time 
        $today = $date->format("Y-m-d"); 
        
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetCaregiverChangesV2 xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><ModifiedAfter>2015-03-19T04:31:57.077</ModifiedAfter></GetCaregiverChangesV2></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        $method = 'POST';
        $getPatientDetailsController = new GetPatientDetailsController();
        return $getPatientDetailsController->curlCall($data, $method);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMedical($cargiver_id)
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><CreateCaregiverMedical xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><CaregiverMedicalInfo><CaregiverID>' . $cargiver_id . '</CaregiverID><MedicalID>int</MedicalID><DueDate>dateTime</DueDate><DateCompleted>dateTime</DateCompleted><Notes>string</Notes><ResultID>int</ResultID></CaregiverMedicalInfo>67467</CreateCaregiverMedical></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        $method = 'POST';
        $getPatientDetailsController = new GetPatientDetailsController();
        return $getPatientDetailsController->curlCall($data, $method);
    }
   
    public static function saveUser($demographicDetails)
    {
        $gender = '';
        if ($demographicDetails['Gender'] == 'MALE') {
            $gender = 1;
        } else if ($demographicDetails['Gender'] == 'FEMALE') {
            $gender = 2;
        } else {
            $gender = 3;
        }
        $userCaregiver = CaregiverInfo::where('caregiver_id' , $demographicDetails['ID'])->first();
       
        //doesnthave('caregiverInfo')->get();
        if (! $userCaregiver) {
            $user = DB::table('users')->insert([
                'gender' => $gender,
                'first_name' => $demographicDetails['FirstName'],
                'last_name' => $demographicDetails['LastName'],
                'dob' => $demographicDetails['BirthDate'],
                //'password' => Hash::make(Str::random(8)),
                'password' => Hash::make('Patient@doral'),
            ]);
    
            $user_id = DB::getPdo()->lastInsertId();
    
            $user = User::find($user_id);
            $user->assignRole('patient')->syncPermissions(Permission::all());
    
            self::saveCaregiverInfo($demographicDetails, $user_id);

            self::saveDemographic($demographicDetails, $user_id);
        }
    }

    public static function saveCaregiverInfo($demographicDetails, $userId)
    {
        $caregiverInfo = new CaregiverInfo();
        $caregiverInfo->user_id = $userId;
        $caregiverInfo->caregiver_id = ($demographicDetails['ID']) ? $demographicDetails['ID'] : '';
        $caregiverInfo->intials = ($demographicDetails['Intials']) ? $demographicDetails['Intials'] : '';
        $caregiverInfo->caregiver_gender_id = ($demographicDetails['CaregiverGenderID']) ? $demographicDetails['CaregiverGenderID'] : '';
        $caregiverInfo->caregiver_code = ($demographicDetails['CaregiverCode']) ? $demographicDetails['CaregiverCode'] : '';
        $caregiverInfo->alternate_caregiver_code = ($demographicDetails['AlternateCaregiverCode']) ? $demographicDetails['AlternateCaregiverCode'] : '';
        $caregiverInfo->time_attendance_pin = ($demographicDetails['TimeAndAttendancePIN']) ? $demographicDetails['TimeAndAttendancePIN'] : '';

        $mobile = [];
        if ($demographicDetails['MobileID'] || $demographicDetails['MobileIDTypeDescription']) {
            $mobile = [
                'MobileID' => ($demographicDetails['MobileID']) ? $demographicDetails['MobileID'] : '',
                'MobileIDTypeDescription' => ($demographicDetails['MobileIDTypeDescription']) ? $demographicDetails['MobileIDTypeDescription'] : '',
            ];
        }
        $caregiverInfo->mobile = json_encode($mobile);

        $ethnicity = [];
        if ($demographicDetails['Ethnicity']) {
            $ethnicity = [
                $demographicDetails['Ethnicity'],
            ];
        }
        $caregiverInfo->ethnicity = json_encode($ethnicity);

        $caregiverInfo->country_of_birth = ($demographicDetails['CountryOfBirth']) ? $demographicDetails['CountryOfBirth'] : '';
        $caregiverInfo->employee_type = ($demographicDetails['EmployeeType']) ? $demographicDetails['EmployeeType'] : '';

        $maritalStatus = [];
        if ($demographicDetails['MaritalStatus']) {
            $maritalStatus = [
                $demographicDetails['MaritalStatus'],
            ];
        }
        $caregiverInfo->marital_status = json_encode($maritalStatus);

        $caregiverInfo->dependents = ($demographicDetails['Dependents']) ? $demographicDetails['Dependents'] : '';

        $status = [];
        if ($demographicDetails['Status']) {
            $status = [
                $demographicDetails['Status'],
            ];
        }
        $caregiverInfo->status = json_encode($status);

        $caregiverInfo->employee_id = ($demographicDetails['EmployeeID']) ? $demographicDetails['EmployeeID'] : '';
        $caregiverInfo->application_date = ($demographicDetails['ApplicationDate']) ? $demographicDetails['ApplicationDate'] : '';
        $caregiverInfo->hire_date = ($demographicDetails['HireDate']) ? $demographicDetails['HireDate'] : '';
        $caregiverInfo->rehire_date = ($demographicDetails['RehireDate']) ? $demographicDetails['RehireDate'] : '';
        $caregiverInfo->first_work_date = ($demographicDetails['FirstWorkDate']) ? $demographicDetails['FirstWorkDate'] : '';
        $caregiverInfo->last_work_date = ($demographicDetails['LastWorkDate']) ? $demographicDetails['LastWorkDate'] : '';
        $caregiverInfo->registry_number = ($demographicDetails['RegistryNumber']) ? $demographicDetails['RegistryNumber'] : '';
        $caregiverInfo->registry_checked_date = ($demographicDetails['RegistryCheckedDate']) ? $demographicDetails['RegistryCheckedDate'] : '';
        
        $referralSource = [];
        if ($demographicDetails['ReferralSource']) {
            $referralSource = [
                $demographicDetails['ReferralSource'],
            ];
        }
        $caregiverInfo->referral_source = json_encode($referralSource);

        $caregiverInfo->referral_person = ($demographicDetails['ReferralPerson']) ? $demographicDetails['ReferralPerson'] : '';

        $notificationPreferences = [];
        if ($demographicDetails['NotificationPreferences']) {
            $notificationPreferences = [
                $demographicDetails['NotificationPreferences'],
            ];
        }
        $caregiverInfo->notification_preferences = json_encode($notificationPreferences);;

        $caregiverOffices = [];
        if ($demographicDetails['CaregiverOffices']) {
            $caregiverOffices = [
                $demographicDetails['CaregiverOffices'],
            ];
        }
        $caregiverInfo->caregiver_offices = json_encode($caregiverOffices);

        $inactiveReasonDetail = json_encode([
            ($demographicDetails['InactiveReasonID']) ? $demographicDetails['InactiveReasonID'] : '',
            ($demographicDetails['InactiveReason']) ? $demographicDetails['InactiveReason'] : '',
            ($demographicDetails['InactiveNote']) ? $demographicDetails['InactiveNote'] : '',
        ]);
        $inactiveReasonDetail = [];
        if ($demographicDetails['InactiveReasonID'] || $demographicDetails['InactiveReason'] || $demographicDetails['InactiveNote']) {
            $inactiveReasonDetail = [
                'InactiveReasonID' => ($demographicDetails['InactiveReasonID']) ? $demographicDetails['InactiveReasonID'] : '',
                'InactiveReason' => ($demographicDetails['InactiveReason']) ? $demographicDetails['InactiveReason'] : '',
                'InactiveNote' => ($demographicDetails['InactiveNote']) ? $demographicDetails['InactiveNote'] : '',
            ];
        }
        $caregiverInfo->inactive_reason_detail = json_encode($inactiveReasonDetail);
        $caregiverInfo->professional_licensenumber = ($demographicDetails['ProfessionalLicensenumber']) ? $demographicDetails['ProfessionalLicensenumber'] : '';
        $caregiverInfo->npi_number = ($demographicDetails['NPINumber']) ? $demographicDetails['NPINumber'] : '';
        $caregiverInfo->signed_payroll_agreement_date = ($demographicDetails['SignedPayrollAgreementDate']) ? $demographicDetails['SignedPayrollAgreementDate'] : '';

        $caregiverInfo->save();
    }

    public static function saveDemographic($demographicDetails, $userId)
    {
        $demographic = new Demographic();

        $demographic->user_id = $userId;
        $demographic->doral_id = 'DOR-' . mt_rand(100000, 999999);
        $demographic->ssn = ($demographicDetails['SSN']) ? $demographicDetails['SSN'] : '';

        $team = [];
        if ($demographicDetails['Team'] && $demographicDetails['Team']['Name']) {
            $team = [
                $demographicDetails['Team'],
            ];
        }
        $demographic->team = json_encode($team);

        $location = [];
        if ($demographicDetails['Location'] && $demographicDetails['Location']['Name']) {
            $location = [
                $demographicDetails['Location'],
            ];
        }
        $demographic->location = json_encode($location);

        $branch = [];
        if ($demographicDetails['Branch'] && $demographicDetails['Branch']['Name']) {
            $branch = [
                $demographicDetails['Branch'],
            ];
        }
        $demographic->branch = json_encode($branch);

        $employmentTypes = [];
        if ($demographicDetails['EmploymentTypes']) {
            $employmentTypes = [
                $demographicDetails['EmploymentTypes'],
            ];
        }
        $demographic->accepted_services = json_encode($employmentTypes);

        $address = [];
        if ($demographicDetails['Address']) {
            $address = [
                $demographicDetails['Address'],
            ];
        }
        $demographic->address = json_encode($address);

        $language = [];
        if ($demographicDetails['LanguageID1'] || $demographicDetails['Language1'] || $demographicDetails['LanguageID2'] || $demographicDetails['Language2'] || $demographicDetails['LanguageID3'] || $demographicDetails['Language3'] || $demographicDetails['LanguageID4'] || $demographicDetails['Language4']) {
            $language = [
                'LanguageID1' => ($demographicDetails['LanguageID1']) ? $demographicDetails['LanguageID1'] : '',
                'Language1' => ($demographicDetails['Language1']) ? $demographicDetails['Language1'] : '',
                'LanguageID2' => ($demographicDetails['LanguageID2']) ? $demographicDetails['LanguageID2'] : '',
                'Language2' => ($demographicDetails['Language2']) ? $demographicDetails['Language2'] : '',
                'LanguageID3' =>($demographicDetails['LanguageID3']) ? $demographicDetails['LanguageID3'] : '',
                'Language3' => ($demographicDetails['Language3']) ? $demographicDetails['Language3'] : '',
                'LanguageID4' => ($demographicDetails['LanguageID4']) ? $demographicDetails['LanguageID4'] : '',
                'Language4' => ($demographicDetails['Language4']) ? $demographicDetails['Language4'] : '',
            ];
        }
        $demographic->language = json_encode($language);
        $demographic->type = '2';

        $demographic->save();
    }
}