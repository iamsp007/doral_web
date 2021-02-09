<?php

namespace App\Http\Controllers;

use App\Models\PatientReferral;
use App\Models\DemographicDetails;
use App\Models\PatientDetail;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;

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
        $searchPatientIds = $this->searchPatientDetails();
        $patientArray = $searchPatientIds['soapBody']['SearchPatientsResponse']['SearchPatientsResult']['Patients']['PatientID'];
      
        $counter = 0;
        foreach ($patientArray as $arr) {
            if ($counter < 10) {
                $getpatientDemographicDetails = $this->getDemographicDetails($arr);
               
                $patientDetails = $getpatientDemographicDetails['soapBody']['GetPatientDemographicsResponse']['GetPatientDemographicsResult']['PatientInfo'];
                // echo '<pre>';
                // print_r($patientDetails);

                $patientDetail = new PatientDetail();
                $patientDetail->doral_id = Str::random(6);
                $patientDetail->agency_id = $patientDetails['AgencyID'];
                $patientDetail->office_id = $patientDetails['OfficeID'];
                $patientDetail->patient_id = $patientDetails['PatientID'];
                $patientDetail->first_name = $patientDetails['FirstName'];
                // $patientDetail->middle_name = $patientDetails[''];
                $patientDetail->last_name = $patientDetails['LastName'];
                $patientDetail->birth_date = $patientDetails['BirthDate'];
                $patientDetail->gender = $patientDetails['Gender'];
                $patientDetail->priority_code = $patientDetails['PriorityCode'];
                $patientDetail->service_request_start_date = $patientDetails['ServiceRequestStartDate'];
                $patientDetail->admission_id = $patientDetails['AdmissionID'];
                $patientDetail->medica_id_number =  'AB12345C';
                $patientDetail->medicare_number =  'AB12345C';
                 $ssn = '';
                if (! empty($patientDetails['SSN'])) {
                        $ssn = $patientDetails['SSN'];
                }
                $patientDetail->SSN = $ssn;
                $patientDetail->payer_id =1;
                $patientDetail->save();

                dump($patientDetail);
                // $demographicDetails = new DemographicDetails();
                
                // $demographicDetails->DoralId = Str::random(6);
                // $demographicDetails->PatientID = $patientDetails['PatientID'];
                // $demographicDetails->AgencyID = $patientDetails['AgencyID'];
                // $demographicDetails->OfficeID =  $patientDetails['OfficeID'];
                // $demographicDetails->FirstName = $patientDetails['FirstName'];
                // $demographicDetails->LastName = $patientDetails['LastName'];
                // $demographicDetails->BirthDate = $patientDetails['BirthDate'];
                // $demographicDetails->Gender = $patientDetails['Gender'];
                // $demographicDetails->PriorityCode = $patientDetails['PriorityCode'];
                // $demographicDetails->ServiceRequestStartDate = $patientDetails['ServiceRequestStartDate'];

                // $demographicDetails->AdmissionID = $patientDetails['AdmissionID'];
                // $demographicDetails->MedicaidNumber = 'AB12345C';
                // $demographicDetails->MedicareNumber = 'AB12345C';
                // // $ssn = '';
                // // if (! empty($patientDetails['SSN'])) {
                // //         $ssn = $patientDetails['SSN'];
                // // }
                // // $demographicDetails->SSN = $ssn;
                // $demographicDetails->HomePhone = $patientDetails['HomePhone'];
                // $demographicDetails->PayerID = $patientDetails['PayerID'];
                // $demographicDetails->PayerName = $patientDetails['PayerName'];
                
                // $demographicDetails->PayerCoordinatorID = $patientDetails['PayerCoordinatorID'];
                // $demographicDetails->PayerCoordinatorName = $patientDetails['PayerCoordinatorName'];
                // $demographicDetails->PatientStatusID = $patientDetails['PatientStatusID'];
                // $demographicDetails->PatientStatusName = $patientDetails['PatientStatusName'];

                // $demographicDetails->WageParity = $patientDetails['WageParity'];
                // $demographicDetails->PrimaryLanguageID =  $patientDetails['PrimaryLanguageID'];
                // $demographicDetails->PrimaryLanguage = $patientDetails['PrimaryLanguage'];
                // $demographicDetails->SecondaryLanguageID = $patientDetails['SecondaryLanguageID'];
                
                // $demographicDetails->save();

                // dump($demographicDetails);
             
            }
            $counter++;
        }
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
