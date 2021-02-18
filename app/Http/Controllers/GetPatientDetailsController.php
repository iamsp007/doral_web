<?php

namespace App\Http\Controllers;

use App\Models\AcceptedService;
use App\Models\AlternateBilling;
use App\Models\Branch;
use App\Models\City;
use App\Models\Coordinator;
use App\Models\Country;
use App\Models\EmergencyPreparedness;
use App\Models\LabReportType;
use App\Models\Location;
use App\Models\Nurse;
use App\Models\PatientAcceptedService;
use App\Models\PatientAddress;
use App\Models\PatientAllergy;
use App\Models\PatientBranch;
use App\Models\PatientClinicalDetail;
use App\Models\PatientCoordinator;
use App\Models\PatientDetail;
use App\Models\PatientEmergencyContact;
use App\Models\PatientLabReport;
use App\Models\PatientLocation;
use App\Models\PatientSourceOfAdmission;
use App\Models\PatientTeam;
use App\Models\SourceOfAdmission;
use App\Models\State;
use App\Models\Team;
use App\Models\VisitorDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class GetPatientDetailsController extends Controller
{

    public function index()
    {
        return view('pages.clincian.get-patient-detail');
    }

    public function getPatientDetail()
    {
        $patientList = PatientDetail::get();

        return DataTables::of($patientList)
            ->addColumn('full_name', function($q){
                return $q->full_name;
            })
            ->addColumn('action', function($row){
                return '<a href="' . route('patient.details', ['patient_id' => $row->id]) . '" class="btn btn-primary btn-view shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="View Patient" data-original-title="View Patient Chart"><i class="las la-binoculars"></i></a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function show($paient_id)
    {
        $labReportTypes = LabReportType::where('status','1')->whereNull('parent_id')->orderBy('sequence', 'asc')->get();

        $tbpatientLabReports = PatientLabReport::with('labReportType')->where('patient_referral_id', $paient_id)->whereIn('lab_report_type_id', ['2','3','4','5','6'])->get();
        $tbLabReportTypes = LabReportType::where('status','1')->where('parent_id', 1)->doesntHave('patientLabReport')->orderBy('sequence', 'asc')->get();

        $immunizationLabReports = PatientLabReport::with('labReportType')->where('patient_referral_id', $paient_id)->whereIn('lab_report_type_id', ['8','9','10','11'])->get();
        $immunizationLabReportTypes = LabReportType::where('status','1')->where('parent_id', 2)->doesntHave('patientLabReport')->orderBy('sequence', 'asc')->get();

        $drugLabReports = PatientLabReport::with('labReportType')->where('patient_referral_id', $paient_id)->whereIn('lab_report_type_id', ['13','14'])->get();
        $drugLabReportTypes = LabReportType::where('status','1')->where('parent_id', 3)->doesntHave('patientLabReport')->orderBy('sequence', 'asc')->get();
        
        $patient = PatientDetail::with('coordinators', 'nurse', 'acceptedServices', 'sourceOfAdmission', 'team','location', 'branch' , 'patientAddress', 'alternateBilling', 'patientEmergencyContact', 'emergencyPreparedness', 'visitorDetail', 'patientClinicalDetail.patientAllergy')->find($paient_id);

        return view('pages.patient_detail.index', compact('patient', 'labReportTypes', 'labReportTypes', 'tbpatientLabReports', 'tbLabReportTypes', 'immunizationLabReports', 'immunizationLabReportTypes', 'drugLabReports', 'drugLabReportTypes', 'paient_id'));
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
    public function getSearchVisitorDetails($patientId)
    {
        $date = Carbon::now();// will get you the current date, time 
        $today = $date->format("Y-m-d"); 

        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SearchVisits xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><SearchFilters><StartDate>' . $today . '</StartDate><EndDate>' . $today . '</EndDate><PatientID>' . $patientId . '</PatientID></SearchFilters></SearchVisits></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        $method = 'POST';

        return $this->curlCall($data, $method);
    }
    
    public function checkCurrentVisitorDetails(Request $request)
    {
        $patientId = $request->patient_id;
        $date = Carbon::now();// will get you the current date, time 
        $today = $date->format("Y-m-d");
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SearchVisits xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><SearchFilters><StartDate>' . $today .'</StartDate><EndDate>' . $today . '</EndDate><PatientID>' . $patientId . '</PatientID></SearchFilters></SearchVisits></SOAP-ENV:Body></SOAP-ENV:Envelope>';
        $method = 'POST';
        $curlFunc = $this->curlCall($data, $method);
        if (isset($curlFunc['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits'])) {
            $visitID = $curlFunc['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits']['VisitID'];
            $patientForeignId = PatientDetail::where('patient_id',$patientId)->first();
            foreach ($visitID as $viId) {
                $vid = $viId;
                $scheduleInfo = $this->getScheduleInfo($viId);
                $getScheduleInfo = $scheduleInfo['soapBody']['GetScheduleInfoResponse']['GetScheduleInfoResult']['ScheduleInfo'];
                
                $visitorDetail = new VisitorDetail();
                $visitorDetail->patient_id = $patientForeignId->id;
                $visitorDetail->visitor_id = ($getScheduleInfo['ID']) ? $getScheduleInfo['ID'] : '' ;
                $visitorDetail->visit_date = ($getScheduleInfo['VisitDate']) ? $getScheduleInfo['VisitDate'] : '' ;
                $visitorDetail->caregiver_id = ($getScheduleInfo['Caregiver']['ID']) ? $getScheduleInfo['Caregiver']['ID'] : '' ;
                $visitorDetail->first_name = ($getScheduleInfo['Caregiver']['FirstName']) ? $getScheduleInfo['Caregiver']['FirstName'] : '' ;
                $visitorDetail->last_name = ($getScheduleInfo['Caregiver']['LastName']) ? $getScheduleInfo['Caregiver']['LastName'] : '' ;
                $visitorDetail->caregiver_code = ($getScheduleInfo['Caregiver']['CaregiverCode']) ? $getScheduleInfo['Caregiver']['CaregiverCode'] : '' ;
                $visitorDetail->time_attendance_PIN = ($getScheduleInfo['Caregiver']['TimeAndAttendancePIN']) ? $getScheduleInfo['Caregiver']['TimeAndAttendancePIN'] : '' ;
                $visitorDetail->schedule_start_time = ($getScheduleInfo['ScheduleStartTime']) ? $getScheduleInfo['ScheduleStartTime'] : '' ; 
                $visitorDetail->schedule_end_time = ($getScheduleInfo['ScheduleEndTime']) ? $getScheduleInfo['ScheduleEndTime'] : '' ; 

                $visitorDetail->save();
            }
            $response = [
                'status' => 'Sucess',
                'data' => $patientForeignId->id
            ];
            return response()->json($response, 201);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getScheduleInfo($visitorID)
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetScheduleInfo xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><ScheduleInfo><ID>' . $visitorID . '</ID></ScheduleInfo></GetScheduleInfo></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        $method = 'POST';

        return $this->curlCall($data, $method);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPatientClinicalInfo($patientID)
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetPatientClinicalInfo xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><PatientID>' .$patientID. '</PatientID></GetPatientClinicalInfo></SOAP-ENV:Body></SOAP-ENV:Envelope>';

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
        // $patientArray = $searchPatientIds['soapBody']['SearchPatientsResponse']['SearchPatientsResult']['Patients']['PatientID'];
        $patientArray = ['388069', '404874','394779','395736','488452','488987','488996','490045','504356','516752','517000','518828','532337','540428','541579','542628','1005036','1008858','1009943','1010785','1010967','1015287','1019171','1030319','1031322','1048580','688245','695223','697606','698180','698859','698935','701845','704228','742010','742023','762544','762584','772465','772468','772470','783693','817770','826323','832638','841005','854502','865729','894642','904265','909877','916609','916702','946557','948750','952551','961283','965077','987170','989414','990437','994958','996056'];
//        $patientArray = [];
    // $patient_id = '404874';
        $counter = 0;
        foreach ($patientArray as $patient_id) {
            // echo "<pre>";
            // print_r($patient_id);
//            exit();
//             if ($counter < 100) {
//                 echo "<pre>";
//                 print_r($patient_id);
//                 exit();
//                 $patient_id = '388069'; 
               
                $searchVisitorId = $this->getSearchVisitorDetails($patient_id);
                if (isset($searchVisitorId['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits'])) {

                    $getpatientDemographicDetails = $this->getDemographicDetails($patient_id);
                
                    $patientDetails = $getpatientDemographicDetails['soapBody']['GetPatientDemographicsResponse']['GetPatientDemographicsResult']['PatientInfo'];

                    // dump($patientDetails);

                    /** Store patirnt demographic detail */
                    $patient_detail_id = $this->storePatientDetail($patientDetails);
                    
                    if($patient_detail_id) {
                        $visitID = $searchVisitorId['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits']['VisitID'];
                    
                        $scheduleInfo = $this->getScheduleInfo($visitID); 

                        $getScheduleInfo = $scheduleInfo['soapBody']['GetScheduleInfoResponse']['GetScheduleInfoResult']['ScheduleInfo'];

                        $visitorDetail = new VisitorDetail();
                        $visitorDetail->patient_id = $patient_detail_id;
                        $visitorDetail->visitor_id = ($getScheduleInfo['ID']) ? $getScheduleInfo['ID'] : '' ;
                        $visitorDetail->visit_date = ($getScheduleInfo['VisitDate']) ? $getScheduleInfo['VisitDate'] : '' ;
                        $visitorDetail->caregiver_id = ($getScheduleInfo['Caregiver']['ID']) ? $getScheduleInfo['Caregiver']['ID'] : '' ;
                        $visitorDetail->first_name = ($getScheduleInfo['Caregiver']['FirstName']) ? $getScheduleInfo['Caregiver']['FirstName'] : '' ;
                        $visitorDetail->last_name = ($getScheduleInfo['Caregiver']['LastName']) ? $getScheduleInfo['Caregiver']['LastName'] : '' ;
                        $visitorDetail->caregiver_code = ($getScheduleInfo['Caregiver']['CaregiverCode']) ? $getScheduleInfo['Caregiver']['CaregiverCode'] : '' ;
                        $visitorDetail->time_attendance_PIN = ($getScheduleInfo['Caregiver']['TimeAndAttendancePIN']) ? $getScheduleInfo['Caregiver']['TimeAndAttendancePIN'] : '' ;
                        $visitorDetail->schedule_start_time = ($getScheduleInfo['ScheduleStartTime']) ? $getScheduleInfo['ScheduleStartTime'] : '' ; 
                        $visitorDetail->schedule_end_time = ($getScheduleInfo['ScheduleEndTime']) ? $getScheduleInfo['ScheduleEndTime'] : '' ; 

                        $visitorDetail->save();

                        $getPatientClinicalInfo = $this->getPatientClinicalInfo($patient_id);
                       
                        /** Store  Coordinator */
                        $this->storePatientClinicalDetail($getPatientClinicalInfo, $patient_detail_id);

                        /** Store  Coordinator */
                        $this->storeCoordinator($patientDetails['Coordinators']['Coordinator'], $patient_detail_id);
                        
                        /** Store nurse detail */
//                        $this->storeNurse($patientDetails['Nurse'], $patient_detail_id);
//
//                        /** Store accepted services */
//                        $this->storeAcceptedServices($patientDetails['AcceptedServices'], $patient_detail_id);
//
//                        // /** Store source Of admission */
//                        $this->storeSourceOfAdmission($patientDetails['SourceOfAdmission'], $patient_detail_id);
//
//                        // /** Store team */
//                        $this->storeTeam($patientDetails['Team'], $patient_detail_id);
//
//                        // /** Store location */
//                        $this->storeLocation($patientDetails['Location'], $patient_detail_id);
//                
//                        // /** Store branch */
//                        $this->storeBranch($patientDetails['Branch'], $patient_detail_id);
                
                        // /** Store branch */
                        $this->storeAddress($patientDetails['Addresses']['Address'], $patient_detail_id);
                        
                        // /** Store branch */
//                        $this->storeAlternateBilling($patientDetails['AlternateBilling'], $patient_detail_id);

                        // /** Store branch */
                        $this->storeEmergencyContact($patientDetails['EmergencyContacts']['EmergencyContact'], $patient_detail_id);
                    }
                } else {
                    echo 'success';
                }
//             }
//            $counter++;
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

    public function storePatientClinicalDetail($getPatientClinicalInfo, $patient_detail_id)
    {
        $clinicalDetails = $getPatientClinicalInfo['soapBody']['GetPatientClinicalInfoResponse']['GetPatientClinicalInfoResult']['PatientClinicalInfo'];
      
        $patientClinicalDetail = new PatientClinicalDetail();
        $patientClinicalDetail->patient_id = $patient_detail_id;
        
        $patientClinicalDetail->nursing_visits_due = ($clinicalDetails['NursingVisitsDue']) ? $clinicalDetails['NursingVisitsDue'] : '';

        if ($clinicalDetails['MDOrderRequired'] == 'Yes') {
            $MDOrderRequiredValue = '1';
        } else if ($clinicalDetails['MDOrderRequired'] == 'No') {
            $MDOrderRequiredValue = '2';
        } 
        $patientClinicalDetail->md_order_required = $MDOrderRequiredValue;
        $patientClinicalDetail->md_order_due = ($clinicalDetails['MDOrderDue']) ? $clinicalDetails['MDOrderDue'] : '';
        $patientClinicalDetail->md_visit_due = ($clinicalDetails['MDVisitDue']) ? $clinicalDetails['MDVisitDue'] : '';

        $patientClinicalDetail->save();

        $patientAllergy = new PatientAllergy();
        $patientAllergy->patient_clinical_detail_id = $patientClinicalDetail->id;
        $patientAllergy->allergy = ($clinicalDetails['Comments']) ? $clinicalDetails['Comments'] : '';
        $patientAllergy->comment = ($clinicalDetails['Allergies']) ? $clinicalDetails['Allergies'] : '';
        $patientAllergy->save();
    }

    public function storePatientDetail($patientDetails)
    {
        $patientDetail = new PatientDetail();
                
        $patientDetail->doral_id = mt_rand(100000, 999999);
        $patientDetail->agency_id = ($patientDetails['AgencyID']) ? $patientDetails['AgencyID'] : '' ;
        $patientDetail->office_id = ($patientDetails['OfficeID']) ? $patientDetails['OfficeID'] : '' ;
        $patientDetail->patient_id = ($patientDetails['PatientID']) ? $patientDetails['PatientID'] : '' ;
        $patientDetail->first_name = ($patientDetails['FirstName']) ? $patientDetails['FirstName'] : '' ;
        $patientDetail->middle_name = ($patientDetails['MiddleName']) ? $patientDetails['MiddleName'] : '' ;
        $patientDetail->last_name = ($patientDetails['LastName']) ? $patientDetails['LastName'] : '' ;
        $patientDetail->birth_date = ($patientDetails['BirthDate']) ? $patientDetails['BirthDate'] : '' ;
        if ($patientDetails['Gender'] == 'Male') {
            $gender = '1';
        } else if ($patientDetails['Gender'] == 'Female') {
            $gender = '2';
        } else {
            $gender = '3';
        }
                
        $patientDetail->gender = $gender;
        $patientDetail->priority_code = ($patientDetails['PriorityCode']) ? $patientDetails['PriorityCode'] : '' ;
        $patientDetail->service_request_start_date = ($patientDetails['ServiceRequestStartDate']) ? $patientDetails['ServiceRequestStartDate'] : '' ;
        $patientDetail->admission_id = ($patientDetails['AdmissionID']) ? $patientDetails['AdmissionID'] : '' ;
        $patientDetail->medicaid_number = ($patientDetails['MedicaidNumber']) ? $patientDetails['MedicaidNumber'] : '' ;
        $patientDetail->medicare_number = ($patientDetails['MedicareNumber']) ? $patientDetails['MedicareNumber'] : '' ;
        $patientDetail->ssn = ($patientDetails['SSN']) ? $patientDetails['SSN'] : '' ;
        $patientDetail->alert = ($patientDetails['Alerts']) ? $patientDetails['Alerts'] : '' ;
        $patientDetail->home_phone = ($patientDetails['HomePhone']) ? $patientDetails['HomePhone'] : '' ;
        $patientDetail->phone2 = ($patientDetails['Phone2']) ? $patientDetails['Phone2'] : '' ;
        $patientDetail->phone2_description = ($patientDetails['Phone2Description']) ? $patientDetails['Phone2Description'] : '' ;
        $patientDetail->phone3 = ($patientDetails['Phone3']) ? $patientDetails['Phone3'] : '' ;
        $patientDetail->phone3_description = ($patientDetails['Phone3Description']) ? $patientDetails['Phone3Description'] : '' ;
        $patientDetail->home_phone_location_address_id = ($patientDetails['HomePhoneLocationAddressID']) ? $patientDetails['HomePhoneLocationAddressID'] : '' ;
        $patientDetail->home_phone_location_address = ($patientDetails['HomePhoneLocationAddress']) ? $patientDetails['HomePhoneLocationAddress'] : '' ;
        $patientDetail->home_phone2_location_address_id = ($patientDetails['HomePhone2LocationAddressID']) ? $patientDetails['HomePhone2LocationAddressID'] : '' ;
        $patientDetail->home_phone2_location_address = ($patientDetails['HomePhone2LocationAddress']) ? $patientDetails['HomePhone2LocationAddress'] : '' ;
        $patientDetail->home_phone3_location_address_id = ($patientDetails['HomePhone3LocationAddressID']) ? $patientDetails['HomePhone3LocationAddressID'] : '' ;
        $patientDetail->home_phone3_location_address = ($patientDetails['HomePhone3LocationAddress']) ? $patientDetails['HomePhone3LocationAddress'] : '' ;
        $patientDetail->direction = ($patientDetails['Direction']) ? $patientDetails['Direction'] : '' ;
                
        $patientDetail->payer_id = ($patientDetails['PayerID']) ? $patientDetails['PayerID'] : '' ;
        $patientDetail->payer_name = ($patientDetails['PayerName']) ? $patientDetails['PayerName'] : '' ;
        $patientDetail->payer_coordinator_id = ($patientDetails['PayerCoordinatorID']) ? $patientDetails['PayerCoordinatorID'] : '' ;
        $patientDetail->payer_coordinator_name = ($patientDetails['PayerCoordinatorName']) ? $patientDetails['PayerCoordinatorName'] : '' ;
        $patientDetail->patient_status_id = ($patientDetails['PatientStatusID']) ? $patientDetails['PatientStatusID'] : '' ;
        $patientDetail->patient_status_name = ($patientDetails['PatientStatusName']) ? $patientDetails['PatientStatusName'] : '' ;
        $patientDetail->wage_parity = ($patientDetails['WageParity']) ? $patientDetails['WageParity'] : '' ;
        $patientDetail->wage_parity_from_date1 = ($patientDetails['WageParityFromDate1']) ? $patientDetails['WageParityFromDate1'] : '' ;
        $patientDetail->wage_parity_to_date1 = ($patientDetails['WageParityToDate1']) ? $patientDetails['WageParityToDate1'] : '' ;
        $patientDetail->wage_parity_from_date2 = ($patientDetails['WageParityFromDate2']) ? $patientDetails['WageParityFromDate2'] : '' ;
        $patientDetail->wage_parity_to_date2 = ($patientDetails['WageParityToDate2']) ? $patientDetails['WageParityToDate2'] : '' ;
        $patientDetail->primary_language_id = ($patientDetails['PrimaryLanguageID']) ? $patientDetails['PrimaryLanguageID'] : '' ;
        $patientDetail->primary_language = ($patientDetails['PrimaryLanguage']) ? $patientDetails['PrimaryLanguage'] : '' ;
        $patientDetail->secondary_language_id = ($patientDetails['SecondaryLanguageID']) ? $patientDetails['SecondaryLanguageID'] : '' ;
        $patientDetail->secondary_language = ($patientDetails['SecondaryLanguage']) ? $patientDetails['SecondaryLanguage'] : '' ;

        $patientDetail->save();

        return $patientDetail->id;

    }

    public function storeCoordinator($coordinators, $patientDetail_id)
    {
        foreach ($coordinators as $coordinator) {
            if(!empty($coordinator['Name'])) {
                 $coordinatorModel = Coordinator::updateOrCreate(
                    ['coordinator_id' => $coordinator['ID']],
                    ['name' => ($coordinator['Name']) ? $coordinator['Name'] : '']
                );

                if ($coordinatorModel) {
                    $patientCoordinatorModel = new PatientCoordinator();
                    $patientCoordinatorModel->patient_id = $patientDetail_id;
                    $patientCoordinatorModel->coordinator_id = $coordinatorModel->id;
                    $patientCoordinatorModel->save();
                }
            }
        }
    }

    public function storeNurse($nurse, $patientDetail_id)
    {
        if(!empty($nurse['Name'])) {
            $nurseModel = new Nurse();
            $nurseModel->patient_id = $patientDetail_id;
            $nurseModel->nurse_id = ($nurse['ID']) ? $nurse['ID'] : '';
            $nurseModel->name = ($nurse['Name']) ? $nurse['Name'] : '';

            $nurseModel->save();
        }
    }

    public function storeAcceptedServices($acceptedServices, $patientDetail_id)
    {
        foreach ($acceptedServices as $key => $acceptedService) {
            if(!empty($acceptedService)) {
                $acceptedServiceModel = new AcceptedService();
            
                $acceptedServiceModel->type = $key;
                $acceptedServiceModel->name = $acceptedService;
    //            $acceptedServiceModel->name = $acceptedService->Discipline;

                if ($acceptedServiceModel->save()) {
                    $patientAcceptedServiceModel = new PatientAcceptedService();

                    $patientAcceptedServiceModel->patient_id = $patientDetail_id;
                    $patientAcceptedServiceModel->accepted_service_id = $acceptedServiceModel->id;
                }
            }
        }
    }

    public function storeSourceOfAdmission($sourceOfAdmission, $patientDetail_id)
    {
        if(!empty($sourceOfAdmission['Name'])) {
            $sourceOfAdmissionModel = new SourceOfAdmission();
            $sourceOfAdmissionModel->patient_id = $patientDetail_id;
            $sourceOfAdmissionModel->source_of_admission_id = ($sourceOfAdmission['ID']) ? $sourceOfAdmission['ID'] : '';
            $sourceOfAdmissionModel->name = ($sourceOfAdmission['Name']) ? $sourceOfAdmission['Name'] : '';

            $sourceOfAdmissionModel->save();
        }
        
    }    

    public function storeTeam($team, $patientDetail_id)
    {
        if(!empty($team['Name'])) {
            $teamModel = new Team();
            $teamModel->patient_id = $patientDetail_id;
            $teamModel->team_id = ($team['ID']) ? $team['ID'] : '';
            $teamModel->name = ($team['Name']) ? $team['Name'] : '';

            $teamModel->save();
        }
    }

    public function storeLocation($location, $patientDetail_id)
    {
        if(!empty($location['Name'])) {
            $locationModel = new Location();
            $locationModel->patient_id = $patientDetail_id;
            $locationModel->location_id = ($location['ID']) ? $location['ID'] : '';
            $locationModel->name = ($location['Name']) ? $location['Name'] : '';

            $locationModel->save();
        }
        
    }

    public function storeBranch($branch, $patientDetail_id)
    {
        if(!empty($branch['Name'])) {
            $branchModel = new Branch();
            $branchModel->patient_id = $patientDetail_id;
            $branchModel->branch_id = ($branch['ID']) ? $branch['ID'] : '';
            $branchModel->name = ($branch['Name']) ? $branch['Name'] : '';

            $branchModel->save();
        }
    }

    public function storeAddress($address, $patientDetail_id)
    {
//        foreach ($addresses as $addressWithKey) {
            
             $country_id = 226;
//             if (isset($address['County']) && !empty($address['County'])) {
//                $country = Country::updateOrCreate(
//                    ['name' =>  $address['County']]
//                );
//                 $country = Country::where('state_code',$address['State'])->first();
//                 if(!empty($state)) {
//                     $state_id = $state['id'];
//                 }
//                $country_id = $country->id;
//             }

             $state_id = '';
             if (isset($address['State']) && !empty($address['State'])) {
                 $state = State::where('state_code',$address['State'])->first();
                 if(!empty($state)) {
                     $state_id = $state['id'];
                 }
             }

             $city_id = '';
             if (isset($address['City']) && !empty($address['City'])) {
                $city = City::where('city',$address['City'])->first();
                 if(!empty($city)) {
                     $city_id = $city['id'];
                 }
             }
            $patientAddress = new PatientAddress();
            $patientAddress->patient_id = $patientDetail_id;
            $patientAddress->address_id = ($address['AddressID']) ? $address['AddressID'] : '' ;
            $patientAddress->address1 = ($address['Address1']) ? $address['Address1'] : '' ;
            $patientAddress->address2 = ($address['Address2']) ? $address['Address2'] : '' ;
            $patientAddress->cross_street = ($address['CrossStreet']) ? $address['CrossStreet'] : '' ;
             $patientAddress->city_id = $city_id;
            $patientAddress->zip5 = ($address['Zip5']) ? $address['Zip5'] : '' ;
            $patientAddress->zip4 = ($address['Zip4']) ? $address['Zip4'] : '' ;
             $patientAddress->state_id = $state_id;
             $patientAddress->county_id = $country_id;
            $patientAddress->is_primary_address = ($address['IsPrimaryAddress'] == 'Yes') ? 1 : 0 ;
            $patientAddress->address_type = ($address['AddressTypes']) ? $address['AddressTypes'] : '' ;
            
            $patientAddress->save();
//        }
    }

    public function storeAlternateBilling($alternateBilling, $patientDetail_id)
    {
        if(!empty($alternateBilling['FirstName'])) {
            // foreach ($alternateBillings as $alternateBilling) {
            $alternateBillingModel = new AlternateBilling();

            $alternateBillingModel->patient_id = $patientDetail_id;
            $alternateBillingModel->first_name = ($alternateBilling['FirstName']) ? $alternateBilling['FirstName'] : '';
            $alternateBillingModel->middle_name = ($alternateBilling['MiddleName']) ? $alternateBilling['MiddleName'] : '';
            $alternateBillingModel->last_name = ($alternateBilling['LastName']) ? $alternateBilling['LastName'] : '';
            $alternateBillingModel->street = ($alternateBilling['Street']) ? $alternateBilling['Street'] : '';
            // $alternateBillingModel->city = ($alternateBilling['City']) ? $alternateBilling['City'] : '';
            // $alternateBillingModel->state = ($alternateBilling['State']) ? $alternateBilling['State'] : '';
            $alternateBillingModel->zip5 = ($alternateBilling['Zip5']) ? $alternateBilling['Zip5'] : '';

            $alternateBillingModel->save();
        // }
        }
    }


    public function storeEmergencyContact($emergencyContacts, $patientDetail_id)
    {
        foreach ($emergencyContacts as $value) {
            if(!empty($value['Name'])) {
                $patientEmergencyContact = new PatientEmergencyContact();
         
                $patientEmergencyContact->patient_id = $patientDetail_id;
                $patientEmergencyContact->name = ($value['Name']) ? $value['Name'] : '';
                $patientEmergencyContact->lives_with_patient = ($value['LivesWithPatient']) ? $value['LivesWithPatient'] : '';
                $patientEmergencyContact->have_keys = ($value['HaveKeys']) ? $value['HaveKeys'] : '';
                $patientEmergencyContact->phone1 = ($value['Phone1']) ? $value['Phone1'] : '';
                $patientEmergencyContact->phone2 = ($value['Phone2']) ? $value['Phone2'] : '';
                $patientEmergencyContact->address = ($value['Address']) ? $value['Address'] : '';

                $patientEmergencyContact->save();
            }
        }
    }

    public function EmergencyPreparedness($emergencyPreparedness, $patientDetail_id)
    {
        foreach ($emergencyPreparedness as $key => $alternateBilling) {
            $emergencyPreparednessModel = new EmergencyPreparedness();
            
            $emergencyPreparednessModel->type = $key;
            $emergencyPreparednessModel->name = $alternateBilling->Discipline;
            $emergencyPreparednessModel->patient_id = $patientDetail_id;

            $emergencyPreparednessModel->save();
        }
    }    
}
