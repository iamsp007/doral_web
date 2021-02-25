<?php

namespace App\Http\Controllers;

use App\Models\CaregiverInfo;
use App\Models\Demographic;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use File;

class CaregiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchCaregiverDetails()
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SearchCaregivers xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><SearchFilters><Status>Active</Status></SearchFilters></SearchCaregivers></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        //<FirstName>string</FirstName><LastName>string</LastName><PhoneNumber>string</PhoneNumber><CaregiverCode>string</CaregiverCode><EmployeeType>string</EmployeeType><SSN>string</SSN>
        
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchCaregivers()
    {
        $searchCaregiverIds = $this->searchCaregiverDetails();
        $caregiverArray = $searchCaregiverIds['soapBody']['SearchCaregiversResponse']['SearchCaregiversResult']['Caregivers']['CaregiverID'];

        $counter = 0;
        // foreach ($caregiverArray as $cargiver_id) {
        //     if ($counter < 5) {

                /** Store patirnt demographic detail */
                $getdemographicDetails = $this->getDemographicDetails('78528');
                $demographicDetails = $getdemographicDetails['soapBody']['GetCaregiverDemographicsResponse']['GetCaregiverDemographicsResult']['CaregiverInfo'];

                $user = new User();

                $user->first_name = $demographicDetails['FirstName'];
                $user->last_name = $demographicDetails['LastName'];
                $user->gender = $demographicDetails['Gender'];
                $user->dob = $demographicDetails['BirthDate'];
              
                $randomPassword = Hash::make(Str::random(8));
                $user->password = $randomPassword;

                $user->save();

                $caregiverInfo = new CaregiverInfo();
                $caregiverInfo->user_id = $user->id;
                $caregiverInfo->caregiver_id = ($demographicDetails['ID']) ? $demographicDetails['ID'] : '';
                $caregiverInfo->intials = ($demographicDetails['Intials']) ? $demographicDetails['Intials'] : '';
                $caregiverInfo->caregiver_gender_id = ($demographicDetails['CaregiverGenderID']) ? $demographicDetails['CaregiverGenderID'] : '';
                $caregiverInfo->caregiver_code = ($demographicDetails['CaregiverCode']) ? $demographicDetails['CaregiverCode'] : '';
                $caregiverInfo->alternate_caregiver_code = ($demographicDetails['AlternateCaregiverCode']) ? $demographicDetails['AlternateCaregiverCode'] : '';
                $caregiverInfo->time_attendance_pin = ($demographicDetails['TimeAndAttendancePIN']) ? $demographicDetails['TimeAndAttendancePIN'] : '';

                $mobile = json_encode([
                    ($demographicDetails['MobileID']) ? $demographicDetails['MobileID'] : '',
                    ($demographicDetails['MobileIDTypeDescription']) ? $demographicDetails['MobileIDTypeDescription'] : '',
                ]);
                dump($mobile);
                $caregiverInfo->mobile = $mobile;

                $ethnicity = json_encode([
                    ($demographicDetails['Ethnicity']) ? $demographicDetails['Ethnicity'] : '',
                ]);
                $caregiverInfo->ethnicity = $ethnicity;

                $caregiverInfo->country_of_birth = ($demographicDetails['CountryOfBirth']) ? $demographicDetails['CountryOfBirth'] : '';
                $caregiverInfo->employee_type = ($demographicDetails['EmployeeType']) ? $demographicDetails['EmployeeType'] : '';

                $maritalStatus = json_encode([
                    ($demographicDetails['MaritalStatus']) ? $demographicDetails['MaritalStatus'] : '',
                ]);
                $caregiverInfo->marital_status = $maritalStatus;

                $caregiverInfo->dependents = ($demographicDetails['Dependents']) ? $demographicDetails['Dependents'] : '';

                $status = json_encode([
                    ($demographicDetails['Status']) ? $demographicDetails['Status'] : '',
                ]);
                $caregiverInfo->status = $status;

                $caregiverInfo->employee_id = ($demographicDetails['EmployeeID']) ? $demographicDetails['EmployeeID'] : '';
                $caregiverInfo->application_date = ($demographicDetails['ApplicationDate']) ? $demographicDetails['ApplicationDate'] : '';
                $caregiverInfo->hire_date = ($demographicDetails['HireDate']) ? $demographicDetails['HireDate'] : '';
                $caregiverInfo->rehire_date = ($demographicDetails['RehireDate']) ? $demographicDetails['RehireDate'] : '';
                $caregiverInfo->first_work_date = ($demographicDetails['FirstWorkDate']) ? $demographicDetails['FirstWorkDate'] : '';
                $caregiverInfo->last_work_date = ($demographicDetails['LastWorkDate']) ? $demographicDetails['LastWorkDate'] : '';
                $caregiverInfo->registry_number = ($demographicDetails['RegistryNumber']) ? $demographicDetails['RegistryNumber'] : '';
                $caregiverInfo->registry_checked_date = ($demographicDetails['RegistryCheckedDate']) ? $demographicDetails['RegistryCheckedDate'] : '';
                
                $referralSource = json_encode([
                    ($demographicDetails['ReferralSource']) ? $demographicDetails['ReferralSource'] : '',
                ]);
                $caregiverInfo->referral_source = $referralSource;
                $caregiverInfo->referral_person = ($demographicDetails['ReferralPerson']) ? $demographicDetails['ReferralPerson'] : '';

                $notificationPreferences = json_encode([
                    ($demographicDetails['NotificationPreferences']) ? $demographicDetails['NotificationPreferences'] : '',
                ]);
                $caregiverInfo->notification_preferences = $notificationPreferences;

                $caregiverOffices = json_encode([
                    ($demographicDetails['CaregiverOffices']) ? $demographicDetails['CaregiverOffices'] : '',
                ]);
                $caregiverInfo->caregiver_offices = $caregiverOffices;

                $inactiveReasonDetail = json_encode([
                    ($demographicDetails['InactiveReasonID']) ? $demographicDetails['InactiveReasonID'] : '',
                    ($demographicDetails['InactiveReason']) ? $demographicDetails['InactiveReason'] : '',
                    ($demographicDetails['InactiveNote']) ? $demographicDetails['InactiveNote'] : '',
                ]);
                $caregiverInfo->inactive_reason_detail = $inactiveReasonDetail;
                $caregiverInfo->professional_licensenumber = ($demographicDetails['ProfessionalLicensenumber']) ? $demographicDetails['ProfessionalLicensenumber'] : '';
                $caregiverInfo->npi_number = ($demographicDetails['NPINumber']) ? $demographicDetails['NPINumber'] : '';
                $caregiverInfo->signed_payroll_agreement_date = ($demographicDetails['SignedPayrollAgreementDate']) ? $demographicDetails['SignedPayrollAgreementDate'] : '';

                $caregiverInfo->save();

                $demographic = new Demographic();

                $demographic->user_id = $user->id;
                $demographic->doral_id = 'DOR-' . mt_rand(100000, 999999);
                $demographic->ssn = ($demographicDetails['SSN']) ? $demographicDetails['SSN'] : '';

                $team = json_encode([
                    ($demographicDetails['Team']) ? $demographicDetails['Team'] : '',
                ]);
                $demographic->team = $team;

                $location = json_encode([
                    ($demographicDetails['Location']) ? $demographicDetails['Location'] : '',
                ]);
                $demographic->location = $location;

                $branch = json_encode([
                    ($demographicDetails['Branch']) ? $demographicDetails['Branch'] : '',
                ]);
                $demographic->branch = $branch;

                $employmentTypes = json_encode([
                    ($demographicDetails['EmploymentTypes']) ? $demographicDetails['EmploymentTypes'] : '',
                ]);
                $demographic->accepted_services = $employmentTypes;

                $address = json_encode([
                    ($demographicDetails['Address']) ? $demographicDetails['Address'] : '',
                ]);
                $demographic->address = $address;

                $language = json_encode([
                    ($demographicDetails['LanguageID1']) ? $demographicDetails['LanguageID1'] : '',
                    ($demographicDetails['Language1']) ? $demographicDetails['Language1'] : '',
                    ($demographicDetails['LanguageID2']) ? $demographicDetails['LanguageID2'] : '',
                    ($demographicDetails['Language2']) ? $demographicDetails['Language2'] : '',
                    ($demographicDetails['LanguageID3']) ? $demographicDetails['LanguageID3'] : '',
                    ($demographicDetails['Language3']) ? $demographicDetails['Language3'] : '',
                    ($demographicDetails['LanguageID4']) ? $demographicDetails['LanguageID4'] : '',
                    ($demographicDetails['Language4']) ? $demographicDetails['Language4'] : '',
                ]);
                $demographic->language = $language;
                $demographic->type = '2';

                $demographic->save();
                // $getChangesV2 = $this->getChangesV2();
                // $changesV2 = $getChangesV2['soapBody']['GetCaregiverChangesV2Response']['GetCaregiverChangesV2Result']['GetCaregiverChangesV2Info'];

                // $createMedical = $this->createMedical($cargiver_id);
                
        //     }
        //     $counter++;
        // }
    }
}
