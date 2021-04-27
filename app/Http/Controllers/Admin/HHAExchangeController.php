<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\HHAExchange;
use App\Models\Demographic;
use App\Models\PatientEmergencyContact;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class HHAExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // HHAExchange::dispatch();
        $searchPatientIds = $this->searchPatientDetails();
        // $patientArray = $searchPatientIds['soapBody']['SearchPatientsResponse']['SearchPatientsResult']['Patients']['PatientID'];
        $patientArray = ["1009943", "1039551","1275166","3441817", "4167073","4504347","7253633", "7340504","9460723", "9631427", "10627089", "10644590", "10649625", "11480065", "11601922","407321", "4651290", "4692900","6525242", "9356067", "10621669", "11456679", "11457980", "12001282", "12007263", "12007781", "12042016", "12042913", "12200770", "12432604", "12464304", "12510537", "12522880", "12629434", "12629435", "12635317", "12657429", "12662061", "12662228", "12662506", "12662622", "12697403", "12697858", "12708620", "12710126", "12710192", "12710196", "12710700", "12711343", "12714234", "12714291", "12715172", "12718761", "12718784", "12719038", "12725777","12728790", "12728865", "12729155", "12732892", "12733576", "12733587", "12736351", "12736536", "12736648", "12736936", "12736954", "12739937", "12739939", "12740232", "12740260", "12740508", "12740524", "12740548", "12743144", "12743222", "12743447", "12743523", "12743692", "12744504", "12758376", "12758955", "12759118","12761186", "12761315", "12761441", "12761724", "12761923", "12762006","12764338", "12764556", "12772823", "12773051", "12778071", "12778619","12778690", "12778961", "12779277", "12779735", "12787295", "12787433", "12787905", "12790510", "12790681","12790999", "12791097", "12791134", "12791212", "12791258", "12794738", "12794843", "12794872", "12797533", "12797818", "12797947", "12801252", "12801277", "12802007", "12802093", "12807135", "12807262", "12807322", "12807412", "12807495", "12807544","12807562", "12808019"];
        // dd(count($patientArray));
        //2513 - 2389

        // $missing_patient_id = [];
        // $userCaregiver1 = Demographic::get();
        // foreach ($userCaregiver1 as $userCaregivers) { 
        //     $missing_patient_id[] = $userCaregivers->patient_id;
        // }
        // dd($missing_patient_id);
        // $data = [];
      
        // $data = [];
        foreach (array_slice($patientArray, 0 , 2513) as $patient_id) {
            // if (! in_array($patient_id, $missing_patient_id))
            // {
            //     $data[] = $patient_id;
                $apiResponse = $this->getDemographicDetails($patient_id);
                $demographics = $apiResponse['soapBody']['GetPatientDemographicsResponse']['GetPatientDemographicsResult']['PatientInfo'];
                // // dump($patient_id);
                $type = config('constant.PatientType');
            
                $userCaregiver = Demographic::where('patient_id' , $patient_id)->first();
                if (! $userCaregiver) {
                    $user_id = self::storeUser($demographics, $type);

                    if ($user_id) {

                        self::storeDemographic($demographics, $user_id, $type);

                        self::storeEmergencyContact($demographics, $user_id, $type);
                    }
                }
            }
        // }

    // dump(count($data));
    // dump($data);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchPatientDetails()
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SearchPatients xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><SearchFilters><FirstName></FirstName><LastName></LastName><Status>Active</Status><PhoneNumber></PhoneNumber><AdmissionID></AdmissionID><MRNumber></MRNumber><SSN></SSN></SearchFilters></SearchPatients></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        $method = 'POST';
        return $this->curlCall($data, $method);
    }

    public function curlCall($data, $method)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => config('patientDetailAuthentication.AppUrl'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
               'Content-Type: text/xml'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $response);
        $xml = new \SimpleXMLElement($response);
        return json_decode(json_encode((array)$xml), TRUE);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDemographicDetails($patientId)
    {
        
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetPatientDemographics xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><PatientInfo><ID>'.$patientId.'</ID></PatientInfo></GetPatientDemographics></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        $method = 'POST';

        return $this->curlCall($data, $method);
    }

    public static function storeUser($demographics, $type)
    {      
        $user = new User();

        if ($type === '1') {
            $phone_number = $demographics['HomePhone'] ? $demographics['HomePhone'] : '';
            $tele_phone = $demographics['Phone2'] ? $demographics['Phone2'] : '';
        } else {
            $phone_number = $demographics['Address']['HomePhone'] ? $demographics['Address']['HomePhone'] : '';
            $tele_phone = $demographics['Address']['Phone2'] ? $demographics['Address']['Phone2']: '';
           
            if ($demographics['NotificationPreferences'] && isset($demographics['NotificationPreferences']['Email'])) {
                $email = $demographics['NotificationPreferences']['Email'];
               
                if ($email) {
                   
                    $userDuplicateEmail = User::whereNotNull('email')->where('email', $email)->first();
           
                    if (! $userDuplicateEmail) {
                        $user->email = $email;
                    } else {
                        $user->email = $userDuplicateEmail->email;
                    }
                } else {
                    $user->email = null;
                }
            }
        }
        $phone_number = setPhone($phone_number);
        if ($phone_number == '') {
            $status = '4';
   
            $doral_id = createDoralId();
            $first_name = ($demographics['FirstName']) ? $demographics['FirstName'] : '';
            $password = str_replace(" ", "",$first_name) . '@' . $doral_id;
            
            $user->first_name = $first_name;
            $user->last_name = ($demographics['LastName']) ? $demographics['LastName'] : '';
            $user->password = setPassword($password);
            $user->phone = null;

            $user->status = $status;
            $user->gender = setGender($demographics['Gender']);
            
            $user->dob = dateFormat($demographics['BirthDate']);
            $user->tele_phone = setPhone($tele_phone);
            
            $user->save();
            $user->assignRole('patient')->syncPermissions(Permission::all());
            return $user->id;
        } else {
            $status = '0';

            $userDuplicatePhone = User::whereNotNull('phone')->where('phone', $phone_number)->first();
          
            if (empty($userDuplicatePhone)) {
                // dd($userDuplicatePhone);
                $doral_id = createDoralId();
                $first_name = ($demographics['FirstName']) ? $demographics['FirstName'] : '';
                $password = str_replace(" ", "",$first_name) . '@' . $doral_id;
                
                $user->first_name = $first_name;
                $user->last_name = ($demographics['LastName']) ? $demographics['LastName'] : '';
                $user->password = setPassword($password);
                $user->phone = $phone_number;
                $user->phone_verified_at = now();

                $user->status = $status;
                $user->gender = setGender($demographics['Gender']);
                
                $user->dob = dateFormat($demographics['BirthDate']);
                $user->tele_phone = setPhone($tele_phone);
                
                $user->save();
                $user->assignRole('patient')->syncPermissions(Permission::all());
                return $user->id;
            }
        }
        
    }

    public static function storeDemographic($demographics, $user_id, $type)
    {
        $doral_id = createDoralId();

        $demographic = new Demographic();
        
        $demographic->doral_id = $doral_id;
        $demographic->user_id = $user_id;
        $demographic->company_id = '9';
        if ($type === '1') {
            $demographic->service_id = config('constant.MDOrder');

            $demographic->patient_id = $demographics['PatientID'] ? $demographics['PatientID'] : '';
            $accepted_services = [
                'Discipline' => $demographics['AcceptedServices']['Discipline'] ? $demographics['AcceptedServices']['Discipline'] : ''
            ];
            $demographic->accepted_services = $accepted_services;

            $language = $demographics['PrimaryLanguage'] ? $demographics['PrimaryLanguage'] : '';

            $address = $demographics['Addresses']['Address'];
            $zip = '';
            if(isset($address['Zip4']) && $address['Zip4'] != ''){ 
                $zip = $address['Zip4'];
            } else if(isset($address['Zip5']) && $address['Zip5'] != ''){
                $zip = $address['Zip5'];
            }
            $addressData = [
                'address1' => isset($address['Address1']) ? $address['Address1'] : '',
                'address2' => isset($address['Address2']) ? $address['Address2'] : '',
                'crossStreet' => isset($address['CrossStreet']) ? $address['CrossStreet'] : '',
                'city' => isset($address['City']) ? $address['City'] : '',
                'state' => isset($address['State']) ? $address['State'] : '',
                'county' => isset($address['County']) ? $address['County'] : '',
                'zip_code' => $zip,
                'isPrimaryAddress' => isset($address['IsPrimaryAddress']) ? $address['IsPrimaryAddress'] : '',
                'addressTypes' => isset($address['AddressTypes']) ? $address['AddressTypes'] : '',
            ];
            
        } else {
            $demographic->service_id = config('constant.OccupationalHealth');
            $demographic->patient_id = $demographics['ID'] ? $demographics['ID'] : '';
            $demographic->ethnicity = $demographics['Ethnicity'] && $demographics['Ethnicity']['Name'] ? $demographics['Ethnicity']['Name'] : '';

            $language = $demographics['Language1'] ? $demographics['Language1'] : '';

            $addressData = [];
            if ($demographics['Address']) {
                $address = $demographics['Address'];
                $zip = '';
                if(isset($address['Zip4']) && $address['Zip4'] != ''){
                    $zip = $address['Zip4'];
                } else if(isset($address['Zip5']) && $address['Zip5'] != ''){
                    $zip = $address['Zip5'];
                }
                $addressData = [
                    'address1' => $address['Street1'] ? $address['Street1'] : '',
                    'address2' => $address['Street2'] ? $address['Street2'] : '',
                    'city' => $address['City'] ? $address['City'] : '',
                    'state' => $address['State'] ? $address['State'] : '',
                    'zip_code' => $zip,
                ];
            }

            $notificationPreferencesData = [];
            if ($demographics['NotificationPreferences']) {

                $notificationPreferences = $demographics['NotificationPreferences'];
                $notificationPreferencesData = [
                    'method' => ($notificationPreferences['Method'] && $notificationPreferences['Method']['Name']) ? $notificationPreferences['Method']['Name'] : '',
                    'email' => $notificationPreferences['Email'] ? $notificationPreferences['Email'] : '',
                    'mobile_or_SMS' => $notificationPreferences['MobileOrSMS'] ? $notificationPreferences['MobileOrSMS'] : '',
                    'voice_message' => $notificationPreferences['VoiceMessage'] ? $notificationPreferences['VoiceMessage'] : '',
                ];
            }
            $demographic->country_of_birth = $demographics['CountryOfBirth'] ? $demographics['CountryOfBirth'] : '';
            $demographic->employee_type =  $demographics['EmployeeType'] ? $demographics['EmployeeType'] : '';
            $demographic->marital_status = ($demographics['MaritalStatus'] && $demographics['MaritalStatus']['Name']) ? $demographics['MaritalStatus']['Name'] : '';
                       
            $demographic->notification_preferences = $notificationPreferencesData;

        }

        $demographic->ssn = setSsn($demographics['SSN'] ? $demographics['SSN'] : '');
        $demographic->address = $addressData;
        $demographic->status = 'Active';
        $demographic->language = $language;
        $demographic->type = $type;

        $demographic->save();
    }

    public static function storeEmergencyContact($demographics, $user_id, $type)
    {
        if ($demographics['EmergencyContacts']['EmergencyContact']) {
            foreach ($demographics['EmergencyContacts']['EmergencyContact'] as $emergencyContact) {
                if($emergencyContact['Name']) {
                    $relationship = '';
                    if ($emergencyContact['Relationship'] && $emergencyContact['Relationship']['Name']) {
                        $relationship = $emergencyContact['Relationship']['Name'];
                    }
                 
                    $patientEmergencyContact = new PatientEmergencyContact();
    
                    $patientEmergencyContact->user_id = $user_id;
                    $patientEmergencyContact->name = $emergencyContact['Name'];
                    $patientEmergencyContact->relation = $relationship;
                    if ($type === '1') {
                    $patientEmergencyContact->lives_with_patient = ($emergencyContact['LivesWithPatient']) ? $emergencyContact['LivesWithPatient'] : '';
                    $patientEmergencyContact->have_keys = ($emergencyContact['HaveKeys']) ? $emergencyContact['HaveKeys'] : '';
                    }
                    $patientEmergencyContact->phone1 = setPhone($emergencyContact['Phone1'] ? $emergencyContact['Phone1'] : '');
                    $patientEmergencyContact->phone2 = setPhone($emergencyContact['Phone2'] ? $emergencyContact['Phone2'] : '');
                    
                    $patientEmergencyContact->address = ($emergencyContact['Address']) ? $emergencyContact['Address'] : '';
                    $patientEmergencyContact->save();
                }
            }
        }
       
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
        //dump(count($caregiverArray));3017 - 2668
        $missing_patient_id = [];
        $userCaregiver1 = Demographic::get();
        foreach ($userCaregiver1 as $userCaregivers) { 
            $missing_patient_id[] = $userCaregivers->patient_id;
        }
        // dd($missing_patient_id);
        $data = [];

        foreach (array_slice($caregiverArray, 2500 , 517) as $cargiver_id) {
            // $cargiver_id = 110560;
            // foreach ($caregiverArray as $cargiver_id) {
            /** Store patirnt demographic detail */
             if (! in_array($cargiver_id, $missing_patient_id))
            {
                $data[] = $cargiver_id;
                $userCaregiver = Demographic::where('patient_id' , $cargiver_id)->first();

                if (! $userCaregiver) {
                    $getdemographicDetails = $this->getCaregiverDemographicDetails($cargiver_id);
                    $demographics = $getdemographicDetails['soapBody']['GetCaregiverDemographicsResponse']['GetCaregiverDemographicsResult']['CaregiverInfo'];
                    // dump($cargiver_id);

                    $type = config('constant.CaregiverType');
                    $user_id = self::storeUser($demographics, $type);

                    if ($user_id) {
                    
                        self::storeDemographic($demographics, $user_id, $type);
        
                        self::storeEmergencyContact($demographics, $user_id, $type);
                    }
                }
            }
        }
        // dump(count($data));
        // dump($data);
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
        return $this->curlCall($data, $method);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCaregiverDemographicDetails($cargiver_id)
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetCaregiverDemographics xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><CaregiverInfo><ID>' . $cargiver_id . '</ID></CaregiverInfo></GetCaregiverDemographics></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        $method = 'POST';
        return $this->curlCall($data, $method);
    }

}
