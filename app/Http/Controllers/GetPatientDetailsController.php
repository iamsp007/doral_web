<?php

namespace App\Http\Controllers;

use App\Models\AcceptedService;
use App\Models\AlternateBilling;
use App\Models\Branch;
use App\Models\City;
use App\Models\Coordinator;
use App\Models\Country;
use App\Models\EmergencyPreparedness;
use App\Models\Location;
use App\Models\Nurse;
use App\Models\PatientAcceptedService;
use App\Models\PatientAddress;
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
            ->addColumn('action', function($row){
                return '<a href="' . route('patient.details', ['patient_id' => $row->id]) . '" class="btn btn-primary btn-view shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="View Patient" data-original-title="View Patient Chart"><i class="las la-binoculars"></i></a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function show($id)
    {
        $patient = PatientDetail::with('patientEmergencyContact', 'nurses', 'visitorDetail')->find($id);
        return view('pages.clincian.index', compact('patient'));
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

        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SearchVisits xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><SearchFilters><StartDate>2021-02-11</StartDate><EndDate>2021-02-11</EndDate><PatientID>' . $patientId . '</PatientID></SearchFilters></SearchVisits></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        $method = 'POST';

        return $this->curlCall($data, $method);
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
    public function searchPatients(Request $request)
    {
        $searchPatientIds = $this->searchPatientDetails();
        // $patientArray = $searchPatientIds['soapBody']['SearchPatientsResponse']['SearchPatientsResult']['Patients']['PatientID'];
        $patientArray = ['388069', '404874','394779','395736','488452','488987','488996','489003','490045','504356','516752','517000','518828','532337','540428','541579','542628'];
        // dump($patientArray);
        $counter = 0;
        // foreach ($patientArray as $patient_id) {
            // if ($counter < 100) {
            //  dump($patient_id);
                $passPatientId = '772465'; 
                $searchVisitorId = $this->getSearchVisitorDetails($passPatientId);
                
                // if (isset($searchVisitorId['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits'])) {

                    $getpatientDemographicDetails = $this->getDemographicDetails($passPatientId);
                
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
               
                        /** Store  Coordinator */
                        $this->storeCoordinator($patientDetails['Coordinators']['Coordinator'], $patient_detail_id);
                        
                        /** Store nurse detail */
                        $this->storeNurse($patientDetails['Nurse'], $patient_detail_id);

                        /** Store accepted services */
                        // $this->storeAcceptedServices($patientDetails['AcceptedServices'], $patient_detail_id);

                        // /** Store source Of admission */
                        // $this->storeSourceOfAdmission($patientDetails['SourceOfAdmission'], $patient_detail_id);

                        // /** Store team */
                        $this->storeTeam($patientDetails['Team'], $patient_detail_id);

                        // /** Store location */
                        $this->storeLocation($patientDetails['Location'], $patient_detail_id);
                
                        // /** Store branch */
                        $this->storeBranch($patientDetails['Branch'], $patient_detail_id);
                
                        // /** Store branch */
                        $this->storeAddress($patientDetails['Addresses'], $patient_detail_id);
                        
                        // /** Store branch */
                        $this->storeAlternateBilling($patientDetails['AlternateBilling'], $patient_detail_id);

                        // /** Store branch */
                        $this->storeEmergencyContact($patientDetails['EmergencyContacts']['EmergencyContact'], $patient_detail_id);
                    }
                // } else {
                //     echo $counter;
                //     echo '/n';
                // }
            // }
            // $counter++;
        // }
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

    public function storeNurse($nurse, $patientDetail_id)
    {
        $nurseModel = Nurse::updateOrCreate(
            ['nurse_id' => ($nurse['ID']) ? $nurse['ID'] : ''],
            ['name' => ($nurse['Name']) ? $nurse['Name'] : '']
        );
        if ($nurseModel) {
            $patientNurseModel = new PatientNurse();

            $patientNurseModel->patient_id = $patientDetail_id;
            $patientNurseModel->nurse_id = $nurseModel->id;

            $patientNurseModel->save();
        }
    }

    public function storeAcceptedServices($acceptedServices, $patientDetail_id)
    {
        foreach ($acceptedServices as $key => $acceptedService) {
            $acceptedServiceModel = new AcceptedService();
            
            $acceptedServiceModel->type = $key;
            $acceptedServiceModel->name = $acceptedService->Discipline;

            if ($acceptedServiceModel->save()) {
                $patientAcceptedServiceModel = new PatientAcceptedService();

                $patientAcceptedServiceModel->patient_id = $patientDetail_id;
                $patientAcceptedServiceModel->accepted_service_id = $acceptedServiceModel->id;
            }
        }
    }

    public function storeSourceOfAdmission($sourceOfAdmission, $patientDetail_id)
    {
        $sourceOfAdmissionModel = SourceOfAdmission::updateOrCreate(
            ['source_of_admission_id' => $sourceOfAdmission['ID']],
            ['name' => ($sourceOfAdmission['Name']) ? $sourceOfAdmission['Name'] : '']
        );

        if ($sourceOfAdmissionModel) {
            $patientSourceOfAdmissionModel = new PatientSourceOfAdmission();

            $patientSourceOfAdmissionModel->patient_id = $patientDetail_id;
            $patientSourceOfAdmissionModel->source_of_admission_id = $sourceOfAdmissionModel->id;

            $patientSourceOfAdmissionModel->save();
        }
    }    

    public function storeTeam($team, $patientDetail_id)
    {
        $teamModel = Team::updateOrCreate(
            ['team_id' => $team['ID']],
            ['name' => ($team['Name']) ? $team['Name'] : '']
        );
        
        if ($teamModel) {
            $patientTeamModel = new PatientTeam();

            $patientTeamModel->patient_id = $patientDetail_id;
            $patientTeamModel->team_id = $teamModel->id;

            $patientTeamModel->save();
        }
    }

    public function storeLocation($location, $patientDetail_id)
    {
        $locationModel = Location::updateOrCreate(
            ['location_id' => $location['ID']],
            ['name' => ($location['Name']) ? $location['Name'] : '']
        );
        
        if ($locationModel) {
            $patientLocationModel = new PatientLocation();

            $patientLocationModel->patient_id = $patientDetail_id;
            $patientLocationModel->location_id = $locationModel->id;

            $patientLocationModel->save();
        }
    }

    public function storeBranch($branch, $patientDetail_id)
    {
        $branchModel = Branch::updateOrCreate(
            ['branch_id' => $branch['ID']],
            ['name' => ($branch['Name']) ? $branch['Name'] : '']
        );
        
        if ($branchModel) {
            $patientBranch = new PatientBranch();

            $patientBranch->patient_id = $patientDetail_id;
            $patientBranch->branch_id = $branchModel->id;

            $patientBranch->save();
        }
    }

    public function storeAddress($addresses, $patientDetail_id)
    {
        foreach ($addresses as $address) {

            // $country_id = '';
            // if (isset($address['County']) && !empty($address['County'])) {
            //     $country = Country::updateOrCreate(
            //         ['name' =>  $address['County']],
            //     );

            //     $country_id = $country->id;
            // }

            // $state_id = '';
            // if (isset($address['State']) && !empty($address['State'])) {
            //     $state = State::updateOrCreate(
            //         [
            //             'state' =>  $address['State'],
            //             'country_id' =>  $country_id,
            //         ],
            //     );

            //     $state_id = $state->id;
            // }

            // $city_id = '';
            // if (isset($address['City']) && !empty($address['City'])) {
            //     $city = City::updateOrCreate(
            //         ['city' =>  $address['City']],
            //     );
            //     $city_id = $city->id;
            // }

            $patientAddress = new PatientAddress();
            $patientAddress->patient_id = $patientDetail_id;
            $patientAddress->address_id = ($address['AddressID']) ? $address['AddressID'] : '' ;
            $patientAddress->address1 = ($address['Address1']) ? $address['Address1'] : '' ;
            $patientAddress->address2 = ($address['Address2']) ? $address['Address2'] : '' ;
            $patientAddress->cross_street = ($address['CrossStreet']) ? $address['CrossStreet'] : '' ;
            // $patientAddress->city_id = $city_id;
            $patientAddress->zip5 = ($address['Zip5']) ? $address['Zip5'] : '' ;
            $patientAddress->zip4 = ($address['Zip4']) ? $address['Zip4'] : '' ;
            // $patientAddress->state_id = $state_id;
            // $patientAddress->county_id = $country_id;
            $patientAddress->is_primary_address = ($address['IsPrimaryAddress'] == 'Yes') ? 1 : 0 ;
            $patientAddress->addresstypes = ($address['AddressTypes']) ? $address['AddressTypes'] : '' ;
            
            $patientAddress->save();
        }
    }

    public function storeAlternateBilling($alternateBilling, $patientDetail_id)
    {
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


    public function storeEmergencyContact($emergencyContacts, $patientDetail_id)
    {
        foreach ($emergencyContacts as $value) {
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
