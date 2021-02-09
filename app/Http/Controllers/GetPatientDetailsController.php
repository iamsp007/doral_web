<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\PatientReferral;
use App\Models\DemographicDetails;
use App\Models\PatientAddress;
use App\Models\PatientDetail;
use App\Models\PatientEmergencyContact;
use App\Models\State;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class GetPatientDetailsController extends Controller
{

        public function index()
        {
                return view('pages.clincian.get-patient-detail');
        }

        public function getPatientDetail(Request $request){
            $patientList = PatientDetail::get();
    
            return DataTables::of($patientList)
                ->addColumn('action', function($row){
                        $id=$row->id!==null?$row->id:null;
                        $btn ='';
                        if ($id!==null){
                            $btn .= '<a href="'.route('patient.details',['patient_id'=>$row->id]).'" class="btn btn-primary btn-view shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="View Patient" data-original-title="View Patient Chart"><i class="las la-binoculars"></i></a>';

                        }
                        return $btn;
                  
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        public function show($id)
        {
            $patient = PatientDetail::with('patientAddress','PatientEmergency')->find($id);
            return view('pages.clincian.patient-details', compact('patient'));
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
    
    public function getCaregiverScheduleInfo($patientId)
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body>'
                . '<GetScheduleInfo xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><ScheduleInfo><ID>'.$patientId.'</ID></ScheduleInfo></GetScheduleInfo></SOAP-ENV:Body></SOAP-ENV:Envelope>';
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
        $id = 307775;
        $scheduleInfo = $this->getCaregiverScheduleInfo($id);
        echo"<pre>";
        print_r($scheduleInfo);
        exit();
        $searchPatientIds = $this->searchPatientDetails();
        $patientArray = $searchPatientIds['soapBody']['SearchPatientsResponse']['SearchPatientsResult']['Patients']['PatientID'];
      
        $counter = 0;
        foreach ($patientArray as $arr) {
            if ($counter < 100) {
                $getpatientDemographicDetails = $this->getDemographicDetails($arr);
                $patientDetails = $getpatientDemographicDetails['soapBody']['GetPatientDemographicsResponse']['GetPatientDemographicsResult']['PatientInfo'];
                
                $patientDetail = new PatientDetail();
                $patientDetail->doral_id = 'DORAL'.rand();
                $patientDetail->agency_id = $patientDetails['AgencyID'];
                $patientDetail->office_id = $patientDetails['OfficeID'];
                $patientDetail->patient_id = $patientDetails['PatientID'];
                $patientDetail->first_name = $patientDetails['FirstName'];
                // $patientDetail->middle_name = $patientDetails[''];
                $patientDetail->last_name = $patientDetails['LastName'];
                $patientDetail->birth_date = $patientDetails['BirthDate'];
                if ($patientDetails['Gender'] == 'Female') {
                    $gender = '2';
                } else if ($patientDetails['Gender'] == 'Male') {
                    $gender = '1';
                } else {
                    $gender = '3';
                }
                $patientDetail->gender = $gender;
                $patientDetail->priority_code = $patientDetails['PriorityCode'];
                $patientDetail->service_request_start_date = $patientDetails['ServiceRequestStartDate'];
                $patientDetail->admission_id = $patientDetails['AdmissionID'];
                $patientDetail->medica_id_number =  '';
                $patientDetail->medicare_number =  '';
                $ssn = '';
                if (! empty($patientDetails['SSN'])) {
                    $ssn = $patientDetails['SSN'];
                }
                $patientDetail->SSN = '';
                $patientDetail->payer_id =$patientDetails['PayerID'];
                $patientDetail->PayerName =$patientDetails['PayerName'];
                $patientDetail->PayerCoordinatorID =$patientDetails['PayerCoordinatorID'];
                $patientDetail->PayerCoordinatorName =$patientDetails['PayerCoordinatorName'];
                $patientDetail->PatientStatusID =$patientDetails['PatientStatusID'];
                $patientDetail->PatientStatusName =$patientDetails['PatientStatusName'];
                $patientDetail->WageParity =$patientDetails['WageParity'];
                $patientDetail->PrimaryLanguageID =$patientDetails['PrimaryLanguageID'];
                $patientDetail->PrimaryLanguage =$patientDetails['PrimaryLanguage'];
                $patientDetail->SecondaryLanguageID =$patientDetails['SecondaryLanguageID'];

                if($patientDetail->save()) {
                    
                    foreach ($patientDetails['EmergencyContacts']['EmergencyContact'] as $key => $value) {
                        $patientEmergencyContact = new PatientEmergencyContact();
                        if (! empty($value['Name'])) {
                            $patientEmergencyContact->patient_id = $patientDetail->id;
                            $patientEmergencyContact->name = $value['Name'];
                            $patientEmergencyContact->lives_with_patient = $value['LivesWithPatient'];
                            $patientEmergencyContact->have_keys = $value['HaveKeys'];
                            $patientEmergencyContact->phone1 = $value['Phone1'];
                            // $patientEmergencyContact->phone2 = $value['Phone2'];
                            // $patientEmergencyContact->address = $value['Address'];

                            if($patientEmergencyContact->save()) {
                                echo 'success';
                            }
                        }                       
                    }
                    if($patientDetails['Addresses']['Address']['AddressID'] !='') {
                        $value1 = $patientDetails['Addresses']['Address'];
                        
                        $patientAddress = new PatientAddress();
                        $patientAddress->patient_id = $patientDetail->id;
                        $patientAddress->address_id = strval($value1['AddressID']);
                        $patientAddress->address1 = $value1['Address1'];
                        $patientAddress->address2 = $value1['Address1'];
                        $patientAddress->cross_street = $value1['Address1'];
//                        $patientAddress->city_id = $value1['City'];
                        $patientAddress->zip5 = $value1['Zip5'];
                        $patientAddress->zip4 = $value1['Zip4'];
//                        $patientAddress->state_id = $value1['State'];
//                        $patientAddress->county_id = $value1['County'];
                        $patientAddress->is_primary_address = $value1['IsPrimaryAddress'];
                        $patientAddress->addresstypes = $value1['AddressTypes'];
                        $patientAddress->save();
                    }
                }
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
