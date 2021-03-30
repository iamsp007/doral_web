<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\HHAExchange;
use App\Models\Demographic;
use App\Models\PatientEmergencyContact;
use App\Models\User;

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
        $patientArray = $searchPatientIds['soapBody']['SearchPatientsResponse']['SearchPatientsResult']['Patients']['PatientID'];
       
        dump(count($patientArray));

        // foreach ($patientArray as $patient_id) {
        foreach (array_slice($patientArray, 0 , 500) as $patient_id) {
            $apiResponse = $this->getDemographicDetails($patient_id);
            $demographics = $apiResponse['soapBody']['GetPatientDemographicsResponse']['GetPatientDemographicsResult']['PatientInfo'];
           
            $type = config('constant.PatientType');
            $user_id = self::storeUser($demographics, $type);

            if ($user_id) {

                self::storeDemographic($demographics, $user_id, $type);

                self::storeEmergencyContact($demographics, $user_id, $type);
            }
        }
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
        if ($type === '1') {
            $phone_number = setPhone($demographics['HomePhone']);
            $tele_phone = setPhone($demographics['Phone2']);
        } else {
            $phone_number = setPhone($demographics['Address']['HomePhone']);
            $tele_phone = setPhone($demographics['Address']['Phone2']);

            $email = null;
            if (isset($demographics['NotificationPreferences']) && isset($demographics['NotificationPreferences']['Email'])) {
                $email = $demographics['NotificationPreferences']['Email'];
            }
    
            // $userDuplicateEmail = User::whereNotNull('email')->where('email', $email)->first();
            // dd($userDuplicateEmail);
            // if ($userDuplicateEmail) {
            //     return;
            // }
        }
      
        if ($phone_number == '') {
            $status = '4';
        } else {
            $status = '0';

            $userDuplicatePhone = User::whereNotNull('phone')->where('phone', $phone_number)->first();
            if ($userDuplicatePhone) {
                return;
            }
        }

        $doral_id = createDoralId();
        $password = str_replace(" ", "",$demographics['FirstName']) . '@' . $doral_id;

        $user = new User();
        $user->first_name = ($demographics['FirstName']) ? $demographics['FirstName'] : '';
        $user->last_name = ($demographics['LastName']) ? $demographics['LastName'] : '';
        $user->password = setPassword($password);
        $user->phone = $phone_number;
        $user->phone_verified_at = now();
        $user->status = $status;
        $user->gender = setGender($demographics['Gender']);
        
        $user->dob = dateFormat($demographics['BirthDate']);
        $user->tele_phone = $tele_phone;
        $user->save();
       
        return $user->id;
    }

    public static function storeDemographic($demographics, $user_id, $type)
    {
        $doral_id = createDoralId();

        $demographic = new Demographic();
        
        $demographic->doral_id = $doral_id;
        $demographic->user_id = $user_id;
       
        if ($type === '1') {
            $demographic->service_id = config('constant.MDOrder');

            $demographic->patient_id = $demographics['PatientID'] ? $demographics['PatientID'] : '';
            $accepted_services = [
                'Discipline' => isset($demographics['AcceptedServices']['Discipline']) ? $demographics['AcceptedServices']['Discipline'] : ''
            ];
            $demographic->accepted_services = $accepted_services;

            $language = [
                'language1' => isset($demographics['PrimaryLanguage']) ? $demographics['PrimaryLanguage'] : '',
                'language2' => isset($demographics['SecondaryLanguage']) ? $demographics['SecondaryLanguage'] : '',
            ];

            $address = $demographics['Addresses']['Address'];

            $addressData = [
                'address1' => isset($address['Address1']) ? $address['Address1'] : '',
                'address2' => isset($address['Address2']) ? $address['Address2'] : '',
                'crossStreet' => isset($address['CrossStreet']) ? $address['CrossStreet'] : '',
                'city' => isset($address['City']) ? $address['City'] : '',
                'zip5' => isset($address['Zip5']) ? $address['Zip5'] : '',
                'zip4' => isset($address['Zip4']) ? $address['Zip4'] : '',
                'state' => isset($address['State']) ? $address['State'] : '',
                'county' => isset($address['County']) ? $address['County'] : '',
                'isPrimaryAddress' => isset($address['IsPrimaryAddress']) ? $address['IsPrimaryAddress'] : '',
                'addressTypes' => isset($address['AddressTypes']) ? $address['AddressTypes'] : '',
            ];
            
        } else {
            $demographic->service_id = config('constant.OccupationalHealth');
            $demographic->patient_id = $demographics['ID'] ? $demographics['ID'] : '';
            $demographic->ethnicity = ($demographics['Ethnicity'] && $demographics['Ethnicity']['Name']) ? $demographics['Ethnicity']['Name'] : '';

            $language = [
                'language1' => isset($demographics['Language1']) ? $demographics['Language1'] : '',
                'language2' => isset($demographics['Language2']) ? $demographics['Language2'] : '',
                'language3' => isset($demographics['Language3']) ? $demographics['Language3'] : '',
                'language4' => isset($demographics['Language4']) ? $demographics['Language4'] : '',
            ];

            $addressData = [];
            if ($demographics['Address']) {
                $address = $demographics['Address'];

                $addressData = [
                    'address1' => isset($address['Street1']) ? $address['Street1'] : '',
                    'address2' => isset($address['Street2']) ? $address['Street2'] : '',
                    'crossStreet' => isset($address['CrossStreet']) ? $address['CrossStreet'] : '',
                    'city' => isset($address['City']) ? $address['City'] : '',
                    'zip5' => isset($address['Zip5']) ? $address['Zip5'] : '',
                    'zip4' => isset($address['Zip4']) ? $address['Zip4'] : '',
                    'state' => isset($address['State']) ? $address['State'] : '',
                ];
            }

            $demographic->country_of_birth = isset($demographics['CountryOfBirth']) ? $demographics['CountryOfBirth'] : '';
            $demographic->employee_type =  isset($demographics['EmployeeType']) ? $demographics['EmployeeType'] : '';
            $demographic->marital_status = isset($demographics['MaritalStatus']) ? $demographics['MaritalStatus']['Name'] : '';
            
            // $demographic->notification_preferences = isset($demographics['NotificationPreferences']) ? $demographics['NotificationPreferences'] : '';

        }

        $demographic->ssn = setSsn(isset($demographics['SSN']) ? $demographics['SSN'] : '');
        $demographic->address = $addressData;
        $demographic->status = 'Active';
        $demographic->language = $language;
        $demographic->type = $type;

        $demographic->save();
    }

    public static function storeEmergencyContact($demographics, $user_id, $type)
    {
        if (isset($demographics['EmergencyContacts']['EmergencyContact'])) {
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
        dump(count($caregiverArray));

        foreach (array_slice($caregiverArray, 1 , 1) as $cargiver_id) {

            // foreach ($caregiverArray as $cargiver_id) {
            /** Store patirnt demographic detail */
            // $userCaregiver = Demographic::where('patient_id' , $cargiver_id)->first();

            // if (! $userCaregiver) {
                $getdemographicDetails = $this->getCaregiverDemographicDetails($cargiver_id);
                $demographics = $getdemographicDetails['soapBody']['GetCaregiverDemographicsResponse']['GetCaregiverDemographicsResult']['CaregiverInfo'];
                // dump($demographics);

                $type = config('constant.CaregiverType');
                $user_id = self::storeUser($demographics, $type);

                if ($user_id) {
                    dump($user_id);
                 
                    self::storeDemographic($demographics, $user_id, $type);
    
                    self::storeEmergencyContact($demographics, $user_id, $type);
                }
            // }
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