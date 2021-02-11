<?php

namespace App\Http\Controllers;

use App\Models\AcceptedService;
use App\Models\Alert;
use App\Models\AlternateBilling;
use App\Models\Branch;
use App\Models\City;
use App\Models\Coordinator;
use App\Models\Country;
use App\Models\PatientReferral;
use App\Models\DemographicDetails;
use App\Models\EmergencyPreparedness;
use App\Models\Location;
use App\Models\Nurse;
use App\Models\PatientAcceptedService;
use App\Models\PatientAddress;
use App\Models\PatientAlert;
use App\Models\PatientBranch;
use App\Models\PatientCoordinator;
use App\Models\PatientDetail;
use App\Models\PatientEmergencyContact;
use App\Models\PatientLocation;
use App\Models\PatientNurse;
use App\Models\PatientSourceOfAdmission;
use App\Models\PatientTeam;
use App\Models\SourceOfAdmission;
use App\Models\State;
use App\Models\Team;
use CreateAcceptedServicesTable;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper;
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
                  
                })->editColumn('ssn', function ($ssn){
                if($ssn->ssn!='')
                return Helper::string_to_ssn($ssn->ssn);
                else
                return '--';
            })
                ->rawColumns(['action'])
                ->make(true);
        }


        public function show($id)
        {
            $patient = PatientDetail::with('payer')->find($id);
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
            if ($counter < 100) {
                $getpatientDemographicDetails = $this->getDemographicDetails($arr);
                
                $patientDetails = $getpatientDemographicDetails['soapBody']['GetPatientDemographicsResponse']['GetPatientDemographicsResult']['PatientInfo'];

                dump($patientDetails);
                // $data1 = PatientDetail::where('patient_id',$arr)->first();
                // if ($data1) {
                //     $patientDetail = PatientDetail::where('patient_id',$arr)->first();
                // } else {
                //     $patientDetail = new PatientDetail();
                // }
               
                // $patientDetail->doral_id = 'DOR-'.rand();
                // $patientDetail->agency_id = $patientDetails['AgencyID'];
                // $patientDetail->office_id = $patientDetails['OfficeID'];
                // $patientDetail->patient_id = $patientDetails['PatientID'];
                // $patientDetail->first_name = $patientDetails['FirstName'];
                // // $patientDetail->middle_name = $patientDetails[''];
                // $patientDetail->last_name = $patientDetails['LastName'];
                // $patientDetail->birth_date = $patientDetails['BirthDate'];
                // if ($patientDetails['Gender'] == 'Female') {
                //     $gender = '2';
                // } else if ($patientDetails['Gender'] == 'Male') {
                //     $gender = '1';
                // } else {
                //     $gender = '3';
                // }
                // $patientDetail->gender = $gender;
                // $patientDetail->priority_code = $patientDetails['PriorityCode'];
                // $patientDetail->service_request_start_date = $patientDetails['ServiceRequestStartDate'];
                // $patientDetail->admission_id = $patientDetails['AdmissionID'];
                // $patientDetail->medica_id_number =  '';
                // $patientDetail->medicare_number =  '';
                // $ssn = '';
                // if (! empty($patientDetails['SSN'])) {
                //         $ssn = $patientDetails['SSN'];
                // }
                // $patientDetail->SSN = '';
                // $patientDetail->payer_id = '1';
                // $patientDetail->payer_name = $patientDetails['PayerName'];
                // $patientDetail->payer_coordinator_id = $patientDetails['PayerCoordinatorID'];
                // $patientDetail->payer_coordinator_name = $patientDetails['PayerCoordinatorName'];
                // $patientDetail->patient_status_id = $patientDetails['PatientStatusID'];
                // $patientDetail->patient_status_name = $patientDetails['PatientStatusName'];
                // $patientDetail->wage_parity = $patientDetails['WageParity'];
                // $patientDetail->wage_parity_from_date1 = $patientDetails['WageParityFromDate1'];
                // $patientDetail->wage_parity_to_date1 = $patientDetails['WageParityToDate1'];
                // $patientDetail->wage_parity_from_date2 = $patientDetails['WageParityFromDate2'];
                // $patientDetail->wage_parity_to_date2 = $patientDetails['WageParityToDate2'];

                // if($patientDetail->save()) {
                //     foreach ($patientDetails['Nurse'] as $key => $nurse) {
                //         $nurseModel = new Nurse();
                //         $nurseModel->name = $nurse->name;

                //         if ($nurseModel->save()) {
                //             $patientNurseModel = new PatientNurse();

                //             $patientNurseModel->patient_id = $patientDetail->id;
                //             $patientNurseModel->nurse_id = $nurseModel->id;
                //         }
                //     }

                //     foreach ($patientDetails['Coordinators']['Coordinator'] as $key => $coordinator) {
                //         $coordinatorModel = new Coordinator();
                //         $coordinatorModel->name = $coordinator->name;

                //         if ($coordinatorModel->save()) {
                //             $patientCoordinatorModel = new PatientCoordinator();
                //             $patientCoordinatorModel->patient_id = $patientDetail->id;
                //             $patientCoordinatorModel->coordinator_id = $coordinatorModel->id;
                //         }
                //     }

                //     foreach ($patientDetails['Alerts'] as $key => $alert) {
                //         $alertModel = new Alert();
                //         $alertModel->name = $alert->name;

                //         if ($alertModel->save()) {
                //             $patientAlertModel = new PatientAlert();

                //             $patientAlertModel->patient_id = $patientDetail->id;
                //             $patientAlertModel->alert_id = $alertModel->id;
                //         }
                //     }
                    
                //     foreach ($patientDetails['AcceptedServices'] as $key => $acceptedService) {
                //         $acceptedServiceModel = new AcceptedService();
                //         $acceptedServiceModel->name = $acceptedService->name;

                //         if ($acceptedServiceModel->save()) {
                //             $patientAcceptedServiceModel = new PatientAcceptedService();

                //             $patientAcceptedServiceModel->patient_id = $patientDetail->id;
                //             $patientAcceptedServiceModel->accepted_service_id = $patientAcceptedServiceModel->id;
                //         }
                //     }
                    
                //     foreach ($patientDetails['SourceOfAdmission'] as $key => $sourceOfAdmission) {
                //         $sourceOfAdmissionModel = new SourceOfAdmission();
                //         $sourceOfAdmissionModel->name = $sourceOfAdmission->name;

                //         if ($sourceOfAdmissionModel->save()) {
                //             $patientSourceOfAdmissionModel = new PatientSourceOfAdmission();

                //             $patientSourceOfAdmissionModel->patient_id = $patientDetail->id;
                //             $patientSourceOfAdmissionModel->source_of_admission_id = $patientSourceOfAdmissionModel->id;
                //         }
                //     }
                          
                //     foreach ($patientDetails['Team'] as $key => $team) {
                //         $teamModel = new Team();
                //         $teamModel->name = $team->name;

                //         if ($teamModel->save()) {
                //             $patientTeamModel = new PatientTeam();

                //             $patientTeamModel->patient_id = $patientDetail->id;
                //             $patientTeamModel->team_id = $patientTeamModel->id;
                //         }
                //     }

                //     foreach ($patientDetails['Location'] as $key => $location) {
                //         $locationModel = new Location();
                //         $locationModel->name = $location->name;

                //         if ($teamModel->save()) {
                //             $patientLocationModel = new PatientLocation();

                //             $patientLocationModel->patient_id = $patientDetail->id;
                //             $patientLocationModel->location_id = $patientLocationModel->id;
                //         }
                //     }

                //     foreach ($patientDetails['Branch'] as $key => $branch) {
                //         $branchModel = new Branch();
                //         $branchModel->name = $branch->name;

                //         if ($teamModel->save()) {
                //             $patientBranch = new PatientBranch();

                //             $patientBranch->patient_id = $patientDetail->id;
                //             $patientBranch->branch_id = $patientBranch->id;
                //         }
                //     }

                //     foreach ($patientDetails['Addresses'] as $key => $value1) {

                //         $country_id = '';
                //         if (isset($value1['County']) && !empty($value1['County'])) {
                //             $country = Country::updateOrCreate(
                //                 ['name' =>  $value1['County']],
                //             );
        
                //             $country_id = $country->id;
                //         }

                //         $state_id = '';
                //         if (isset($value1['State']) && !empty($value1['State'])) {
                //             $state = State::updateOrCreate(
                //                 [
                //                     'state' =>  $value1['State'],
                //                     'country_id' =>  $country_id,
                //                 ],
                //             );
    
                //             $state_id = $state->id;
                //         }

                //         $city_id = '';
                //         if (isset($value1['City']) && !empty($value1['City'])) {
                //             $city = City::updateOrCreate(
                //                 ['city' =>  $value1['City']],
                //             );
                //             $city_id = $city->id;
                //         }

                //         $patientAddress = new PatientAddress();
                //         $patientAddress->patient_id = $patientDetail->id;
                //         // $patientAddress->address_id = $value1['AddressID'];
                //         // $patientAddress->address1 = $value1['Address1'];
                //         // $patientAddress->address2 = $value1['Address2'];
                //         // $patientAddress->cross_street = $value1['CrossStreet'];
                //         $patientAddress->city_id = $city_id;
                //         $patientAddress->zip5 = $value1['Zip5'];
                //         $patientAddress->zip4 = $value1['Zip4'];
                //         $patientAddress->state_id = $state_id;
                //         $patientAddress->county_id = $country_id;
                //         $patientAddress->is_primary_address = $value1['IsPrimaryAddress'];
                //         $patientAddress->addresstypes = $value1['AddressTypes'];
                        
                //         $patientAddress->save();
                //     }
                    
                //     foreach ($patientDetails['AlternateBilling'] as $key => $alternateBilling) {
                //         $alternateBillingModel = new AlternateBilling();

                //         $alternateBillingModel->patient_id = $patientDetail->id;
                //         $alternateBillingModel->first_name = $alternateBilling['FirstName'];
                //         $alternateBillingModel->middle_name = $alternateBilling['MiddleName'];
                //         $alternateBillingModel->last_name = $alternateBilling['LastName'];
                //         $alternateBillingModel->street = $alternateBilling['Street'];
                //         $alternateBillingModel->city = $alternateBilling['City'];
                //         $alternateBillingModel->state = $alternateBilling['State'];
                //         $alternateBillingModel->zip5 = $alternateBilling['Zip5'];

                //         $alternateBillingModel->save();
                        
                //     }

                //     foreach ($patientDetails['EmergencyContacts']['EmergencyContact'] as $key => $value) {

                //         // dump($value);
                //         $data2 = PatientEmergencyContact::where('patient_id',$patientDetail->id)->first();
                //         if ($data2) {
                //             $patientEmergencyContact = PatientEmergencyContact::where('patient_id',$patientDetail->id)->first();
                //         } else {
                //             $patientEmergencyContact = new PatientEmergencyContact();
                //         }
                       
                //         $name = '';
                //         if (! empty($value['Name'])) {
                //             $name = $value['Name'];
                //         }
                //         $patientEmergencyContact->patient_id = $patientDetail->id;
                //         $patientEmergencyContact->name = $name;
                //         $patientEmergencyContact->lives_with_patient = $value['LivesWithPatient'];
                //         $patientEmergencyContact->have_keys = $value['HaveKeys'];
                //         // $patientEmergencyContact->phone1 = $value['Phone1'];
                //         // $patientEmergencyContact->phone2 = $value['Phone2'];
                //         // $patientEmergencyContact->address = $value['Address'];

                //         $patientEmergencyContact->save();
                //     }

                //     foreach ($patientDetails['EmergencyPreparedness'] as $key => $alternateBilling) {
                //         dump($alternateBilling);
                //         $emergencyPreparednessModel = new EmergencyPreparedness();
                //         // $emergencyPreparednessModel->save();
                        
                //     }

                
                // }
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
