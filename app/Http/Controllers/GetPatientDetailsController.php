<?php

namespace App\Http\Controllers;

use App\Models\PatientReferral;
use App\Models\DemographicDetails;
use Illuminate\Http\Request;

class GetPatientDetailsController extends Controller
{
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchPatients(Request $request)
    {
//        $patientReferal = PatientReferral::where('service_id',2)->take(15)->get();
//        
//        $data = [];
//        foreach ($patientReferal as $key => $value) {
//            $data['FirstName'] = $value['first_name'];
//            $data['LastName'] = $value['last_name'];
//            $data['Status'] = $value['status'];
//            $data['PhoneNumber'] = '';
//            $data['AdmissionID'] = '';
//            $data['MRNumber'] = '';
//            $data['SSN'] = $value['ssn'];
//            return $this->searchPatientDetails($data);
//        }
        $searchPatientIds = $this->searchPatientDetails();
        $patientArray = $searchPatientIds['soapBody']['SearchPatientsResponse']['SearchPatientsResult']['Patients']['PatientID'];
        
        $getpatientDemographicDetails = $this->getDemographicDetails($patientArray[1]);
        $patientDetails = $getpatientDemographicDetails['soapBody']['GetPatientDemographicsResponse']['GetPatientDemographicsResult']['PatientInfo'];
        $patientDemographicDettailsByAPI['PatientID'] = $patientDetails['PatientID'];
        $patientDemographicDettailsByAPI['AgencyID'] = $patientDetails['AgencyID'];
        $patientDemographicDettailsByAPI['OfficeID'] = $patientDetails['OfficeID'];
        $patientDemographicDettailsByAPI['FirstName'] = $patientDetails['FirstName'];
        $patientDemographicDettailsByAPI['LastName'] = $patientDetails['LastName'];
        $patientDemographicDettailsByAPI['BirthDate'] = $patientDetails['BirthDate'];
        $patientDemographicDettailsByAPI['Gender'] = $patientDetails['Gender'];
        $patientDemographicDettailsByAPI['Coordinators'] = $patientDetails['Coordinators']['Coordinator'];
        $patientDemographicDettailsByAPI['Nurse'] = $patientDetails['Nurse'];
        $patientDemographicDettailsByAPI['AdmissionID'] = $patientDetails['AdmissionID'];
        $patientDemographicDettailsByAPI['MedicaidNumber'] = $patientDetails['MedicaidNumber'];
        $patientDemographicDettailsByAPI['MedicareNumber'] = $patientDetails['MedicareNumber'];
        $patientDemographicDettailsByAPI['SSN'] = $patientDetails['SSN'];
        $patientDemographicDettailsByAPI['Address'] = $patientDetails['Addresses']['Address'];
        $patientDemographicDettailsByAPI['HomePhone'] = $patientDetails['HomePhone'];
        $patientDemographicDettailsByAPI['Phone2'] = $patientDetails['Phone2'];
        $patientDemographicDettailsByAPI['EmergencyContacts'] = $patientDetails['EmergencyContacts']['EmergencyContact'];
        $patientDemographicDettailsByAPI['PayerName'] = $patientDetails['PayerName'];
        $patientDemographicDettailsByAPI['PayerCoordinatorID'] = $patientDetails['PayerCoordinatorID'];
        $patientDemographicDettailsByAPI['PayerCoordinatorName'] = $patientDetails['PayerCoordinatorName'];
        $patientDemographicDettailsByAPI['PatientStatusID'] = $patientDetails['PatientStatusID'];
        $patientDemographicDettailsByAPI['PatientStatusName'] = $patientDetails['PatientStatusName'];
        $patientDemographicDettailsByAPI['WageParity'] = $patientDetails['WageParity'];
        $patientDemographicDettailsByAPI['PrimaryLanguageID'] = $patientDetails['PrimaryLanguageID'];
        $patientDemographicDettailsByAPI['PrimaryLanguage'] = $patientDetails['PrimaryLanguage'];
        $patientDemographicDettailsByAPI['SecondaryLanguageID'] = $patientDetails['SecondaryLanguageID'];
        $patientDemographicDettailsByAPI['SecondaryLanguage'] = $patientDetails['SecondaryLanguage'];
        
        DemographicDetails::insert($patientDemographicDettailsByAPI);
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchPatientDetails()
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SearchPatients xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><SearchFilters><FirstName></FirstName><LastName></LastName><Status></Status><PhoneNumber></PhoneNumber><AdmissionID></AdmissionID><MRNumber></MRNumber><SSN></SSN></SearchFilters></SearchPatients></SOAP-ENV:Body></SOAP-ENV:Envelope>';
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

    public function setParameter($parameter)
    {
        return '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body>' . $parameter . '</SOAP-ENV:Body></SOAP-ENV:Envelope>';
    }
}
