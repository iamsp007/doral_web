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
           
            $user_id = self::storeUser($demographics);

            if ($user_id) {
                $type = config('constant.PatientType');
                self::storeDemographic($demographics, $user_id, $type);

                self::storeEmergencyContact($demographics, $user_id);
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

    public static function storeUser($demographics)
    {      
        $phone_number = setPhone($demographics['HomePhone']);
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
        $user->phone = setPhone($demographics['HomePhone']);
        $user->phone_verified_at = now();
        $user->status = $status;
        $user->gender = setGender($demographics['Gender']);
        
        $user->dob = dateFormat($demographics['BirthDate']);
        $user->tele_phone = setPhone($demographics['Phone2']);
        $user->save();

        return $user->id;
    }

    public static function storeDemographic($demographics, $user_id, $type)
    {
        $doral_id = createDoralId();

        $demographic = new Demographic();
        
        $demographic->doral_id = $doral_id;
        $demographic->user_id = $user_id;
        $demographic->service_id = config('constant.MDOrder');
        $demographic->patient_id = $demographics['PatientID'] ? $demographics['PatientID'] : '';
        $demographic->ssn = setSsn(isset($demographics['SSN']) ? $demographics['SSN'] : '');

        $accepted_services = [
            'Discipline' => isset($demographics['AcceptedServices']['Discipline']) ? $demographics['AcceptedServices']['Discipline'] : ''
        ];
        $demographic->accepted_services = $accepted_services;
        
        if (isset($demographics['Addresses']['Address'])) {
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

            $demographic->address = $addressData;
        }

        $language = [
            'language1' => isset($demographics['PrimaryLanguage']) ? $demographics['PrimaryLanguage'] : '',
            'language2' => isset($demographics['SecondaryLanguage']) ? $demographics['SecondaryLanguage'] : '',
        ];
        $demographic->status = 'Active';
        $demographic->language = $language;
        $demographic->type = $type;

        $demographic->save();
    }

    public static function storeEmergencyContact($demographics, $user_id)
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
                    $patientEmergencyContact->lives_with_patient = ($emergencyContact['LivesWithPatient']) ? $emergencyContact['LivesWithPatient'] : '';
                    $patientEmergencyContact->have_keys = ($emergencyContact['HaveKeys']) ? $emergencyContact['HaveKeys'] : '';
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

        foreach (array_slice($caregiverArray, 0 , 1) as $cargiver_id) {

            // foreach ($caregiverArray as $cargiver_id) {
            /** Store patirnt demographic detail */
            $userCaregiver = Demographic::where('caregiver_id' , $cargiver_id)->first();

            if (! $userCaregiver) {
                $getdemographicDetails = $this->getDemographicDetails($cargiver_id);
                $demographics = $getdemographicDetails['soapBody']['GetCaregiverDemographicsResponse']['GetCaregiverDemographicsResult']['CaregiverInfo'];
                dump($demographics);
                $user_id = self::storeUser($demographics);

                if ($user_id) {
                    $type = config('constant.CaregiverType');
                    self::storeDemographic($demographics, $user_id, $type);
    
                    self::storeEmergencyContact($demographics, $user_id);
                }
            }
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
