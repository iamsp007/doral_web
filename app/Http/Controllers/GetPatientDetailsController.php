<?php

namespace App\Http\Controllers;

use App\Models\AcceptedService;
use App\Models\AlternateBilling;
use App\Models\CareTeam;
use App\Models\CaseManagement;
use App\Models\City;
use App\Models\Coordinator;
use App\Models\Country;
use App\Models\EmergencyPreparedness;
use App\Models\LabReportType;
use App\Models\PatientAddress;
use App\Models\PatientAllergy;
use App\Models\PatientClinicalDetail;
use App\Models\PatientCoordinator;
use App\Models\PatientDetail;
use App\Models\PatientEmergencyContact;
use App\Models\CompanyPaymentPlanInfo;
use App\Models\PatientInsurance;
use App\Models\PatientLabReport;
use App\Models\PatientReferralInfo;
use App\Models\PatientReport;
use App\Models\Services;
use App\Models\State;
use App\Models\User;
use App\Models\UserDevice;
use App\Models\UserDeviceLog;
use App\Models\VisitorDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
            ->addColumn('id', function($q){
                return '<label><input type="checkbox" /><span></span></label>';
            })
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

        $tbpatientLabReports = PatientLabReport::with('labReportType')->where('user_id', $paient_id)->whereIn('lab_report_type_id', ['1','2','3','4','5','6'])->get();
        $tbLabReportTypes = LabReportType::doesnthave('patientLabReport','or' ,function($query) use($paient_id) {
            $query->where('user_id', $paient_id)->whereDate('expiry_date', '>=', date('Y-m-d', strtotime(now())));
           })->where('status','1')->where('parent_id', 1)->orderBy('sequence', 'asc')->get();
        
        $immunizationLabReports = PatientLabReport::with('labReportType')->where('user_id', $paient_id)->whereIn('lab_report_type_id', ['7','8','9','10','11'])->get();
        $immunizationLabReportTypes = LabReportType::doesnthave('patientLabReport','or' ,function($query) use($paient_id) {
            $query->where('user_id', $paient_id)->whereDate('expiry_date', '>=', date('Y-m-d', strtotime(now())));
           })->where('status','1')->where('parent_id', 2)->orderBy('sequence', 'asc')->get();

        $drugLabReports = PatientLabReport::with('labReportType')->where('user_id', $paient_id)->whereIn('lab_report_type_id', ['12','13','14'])->get();
        $drugLabReportTypes = LabReportType::doesnthave('patientLabReport','or' ,function($query) use($paient_id) {
            $query->where('user_id', $paient_id)->whereDate('expiry_date', '>=', date('Y-m-d', strtotime(now())));
           })->where('status','1')->where('parent_id', 3)->orderBy('sequence', 'asc')->get();

        $employeePhysicalForm = PatientLabReport::with('labReportType')->where('user_id', $paient_id)->whereIn('lab_report_type_id', ['15','16','17','18','19'])->get();
        $employeePhysicalFormTypes = LabReportType::doesnthave('patientLabReport','or' ,function($query) use($paient_id) {
            $query->where('user_id', $paient_id)->whereDate('expiry_date', '>=', date('Y-m-d', strtotime(now())));
           })->where('status','1')->where('parent_id', 4)->orderBy('sequence', 'asc')->get();

        $services = Services::select('id','name')->where('display_type',1)->get();

        $insurances = PatientInsurance::where('user_id', $paient_id)->get();

        $patient = PatientDetail::with('coordinators', 'acceptedServices', 'patientAddress', 'alternateBilling', 'patientEmergencyContact', 'emergencyPreparednes', 'visitorDetail', 'patientClinicalDetail.patientAllergy')->find($paient_id);

        $patient = User::with('demographic', 'patientEmergency')->find($paient_id);
        $caseManagements = CaseManagement::with('clinician')->where('patient_id', $paient_id)->get();
        $careTeams = CareTeam::where('patient_id', $paient_id)->get();
        $payment = array();
        if(isset($patient->demographic->service_id) and isset($patient->demographic->company_id)){
            $payment = CompanyPaymentPlanInfo::where('service_id',$patient->demographic->service_id)->where('company_id',$patient->demographic->company_id)->get();
            if($payment) {
                $payment = json_decode($payment);
            }
        }
        $emergencyPreparednesValue = '';
        if (isset($patient->emergencyPreparednes) && !empty($patient->emergencyPreparednes)) {
            $emergencyPreparednesValue = json_decode($patient->emergencyPreparednes->value, true);
        }

        $ethnicity = $mobile = $maritalStatus = $status = $referralSource = $notificationPreferences = $caregiverOffices = $inactiveReasonDetail = $team = $location = $branch = $acceptedServices = $address = $language = $emergencyAddress = [];

        if (isset($patient->demographic)) {
            if (isset($patient->demographic->notification_preferences)) {
                $notificationPreferences = $patient->demographic->notification_preferences;
            }
       
            if (isset($patient->demographic->accepted_services)) {
                $acceptedServices = $patient->demographic->accepted_services;
            }

            if (isset($patient->demographic->address)) {
                $address = $patient->demographic->address;
            }

            if (isset($patient->patientEmergency)) {
                $emergencyAddress = $patient->patientEmergency;
            }
        }

        $today =  date('Y-m-d');
      
        $userDeviceLogs = UserDeviceLog::with('userDevice')->whereHas('userDevice',function ($q) use($paient_id) {
            $q->where('patient_id', $paient_id);
        })
        ->select('*', DB::raw('MAX(id) as id, DATE(created_at) as date'))
        ->groupBy('user_device_id','date')
        ->get()->toArray();
        
        return view('pages.patient_detail.index', compact('patient','payment','labReportTypes', 'labReportTypes', 'tbpatientLabReports', 'tbLabReportTypes', 'immunizationLabReports', 'immunizationLabReportTypes', 'drugLabReports', 'drugLabReportTypes', 'paient_id', 'emergencyPreparednesValue', 'ethnicity', 'mobile', 'maritalStatus', 'status', 'referralSource', 'caregiverOffices', 'inactiveReasonDetail', 'team', 'location', 'branch', 'acceptedServices', 'address', 'language', 'notificationPreferences', 'employeePhysicalForm', 'employeePhysicalFormTypes', 'services', 'insurances', 'emergencyAddress','userDeviceLogs','today', 'caseManagements','careTeams'));
    }

    public function checkCurrentVisitorDetails(Request $request)
    {
        $patientId = $request->patient_id;
        $date = Carbon::now();// will get you the current date, time
        $today = $date->format("Y-m-d");

        $input['from_date'] = $today;
        $input['to_date'] = $today;

        $curlFunc = searchVisits($input);
        if (isset($curlFunc['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits'])) {
            $visitID = $curlFunc['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits']['VisitID'];
            $patientForeignId = PatientDetail::where('patient_id',$patientId)->first();
            foreach ($visitID as $viId) {
                $vid = $viId;
                $scheduleInfo = getScheduleInfo($viId);
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
    public function searchPatients()
    {
        $searchPatientIds = searchPatients();

        $patientArray = $searchPatientIds['soapBody']['SearchPatientsResponse']['SearchPatientsResult']['Patients']['PatientID'];
       
        $patientArray = ['388069', '404874','394779','395736','488452','488987','488996','490045','504356','516752','517000','518828','532337','540428','541579','542628','1005036','1008858','1009943','1010785','1010967','1015287','1019171','1030319','1031322','1048580','688245','695223','697606','698180','698859','698935','701845','704228','742010','742023','762544','762584','772465','772468','772470','783693','817770','826323','832638','894642','904265','909877','916609','916702','946557','948750','952551','961283','987170','989414','990437','994958','996056','841005','854502','865729','965077'];

        $counter = 0;
        foreach ($patientArray as $patient_id) {
            if ($counter < 5) {
                $date = Carbon::now();// will get you the current date, time
                $today = $date->format("Y-m-d");
                $input['from_date'] = $today;
                $input['to_date'] = $today;
                $searchVisitorId = searchVisits($input);
                if (isset($searchVisitorId['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits'])) {

                    /** Store patirnt demographic detail */
                    $getpatientDemographicDetails = getPatientDemographics($patient_id);
                   
                    $patient_detail_id = $this->storePatientDetail($getpatientDemographicDetails, 'add');

                    // if($patient_detail_id) {

                        /** Pending store process start*/

                        /** Get and Store Version2 of Patient Detail */
                        // $patientChangesV2 = getPatientChangesV2();
                        // $this->storePatientDetail($patientChangesV2, 'edit');

                        /** Get and Store Patient Referral Detail */
                        // $patientReferralInfo = getPatientReferralInfo($patient_id);

                        // if (isset($patientReferralInfo['soapBody']['GetPatientReferralInfoResponse']['GetPatientReferralInfoResult']['PatientReferralInfo'])) {
                        //     $getPatientReferralInfo = $patientReferralInfo['soapBody']['GetPatientReferralInfoResponse']['GetPatientReferralInfoResult']['PatientReferralInfo'];

                        //     if ($getPatientReferralInfo['ReferralMasterId'] != 0) {
                        //         $this->storePatientReferralInfo($getPatientReferralInfo, $patient_detail_id);
                        //     }
                        // }

                        /** Get and Store Schedule Info */
                        // $visitID = $searchVisitorId['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits']['VisitID'];
                        // $scheduleInfo = $this->getScheduleInfo($visitID);
                        // $this->storeScheduleInfo($scheduleInfo, $patient_detail_id);

                        /** Get and Store Patient Clinical Info */
                        // $getPatientClinicalInfo = getPatientClinicalInfo($patient_id);
                        // $this->storePatientClinicalDetail($getPatientClinicalInfo, $patient_detail_id);
                    // }
                }
            }
            $counter++;
        }
    }

    public function storePatientDetail($apiResponse, $action)
    {
        // if ($action == 'add') {
            $patientDetails = $apiResponse['soapBody']['GetPatientDemographicsResponse']['GetPatientDemographicsResult']['PatientInfo'];
        //     $patientDetailData = PatientDetail::where('patient_id', $patientDetails['PatientID'])->first();

        //     if ($patientDetailData) {
        //         $patientDetail = PatientDetail::find($patientDetailData->id);
        //     } else {
        //         $patientDetail = new PatientDetail();
        //     }

        //     $patientDetail->doral_id = 'DORAL' . mt_rand(100000, 999999);
        //     $patientDetail->patient_status_id = ($patientDetails['PatientStatusID']) ? $patientDetails['PatientStatusID'] : '' ;
        //     $patientDetail->birth_date = ($patientDetails['BirthDate']) ? $patientDetails['BirthDate'] : '' ;

        // } else if ($action == 'edit') {
            // $patientDetails = $apiResponse['soapBody']['GetPatientChangesV2Response']['GetPatientChangesV2Result']['GetPatientChangesV2Info'];

            $patientDetailData = PatientDetail::where('patient_id', $patientDetails['PatientID'])->first();

            if ($patientDetailData) {
                $patientDetail = PatientDetail::find($patientDetailData->id);
            } else {
                $patientDetail = new PatientDetail();
            }
            // $patientDetail->modified_date = ($patientDetails['ModifiedDate']) ? $patientDetails['ModifiedDate'] : '' ;
            // $patientDetail->patient_status_id = ($patientDetails['StatusID']) ? $patientDetails['StatusID'] : '' ;
            // $patientDetail->birth_date = ($patientDetails['DateOfBirth']) ? $patientDetails['DateOfBirth'] : '' ;
            // $patientDetail->mr_number = ($patientDetails['MRNumber']) ? $patientDetails['MRNumber'] : '' ;
            // $patientDetail->mr_number = ($patientDetails['AcceptedServices']) ? $patientDetails['AcceptedServices'] : '' ;

        // }

        $patientDetail->doral_id = 'DOR-' . mt_rand(100000, 999999);
        $patientDetail->patient_status_id = ($patientDetails['PatientStatusID']) ? $patientDetails['PatientStatusID'] : '' ;
        $patientDetail->birth_date = ($patientDetails['BirthDate']) ? $patientDetails['BirthDate'] : '' ;

        $patientDetail->agency_id = ($patientDetails['AgencyID']) ? $patientDetails['AgencyID'] : '' ;
        $patientDetail->office_id = ($patientDetails['OfficeID']) ? $patientDetails['OfficeID'] : '' ;
        $patientDetail->patient_id = ($patientDetails['PatientID']) ? $patientDetails['PatientID'] : '' ;

        $patientDetail->first_name = ($patientDetails['FirstName']) ? $patientDetails['FirstName'] : '' ;
        $patientDetail->middle_name = ($patientDetails['MiddleName']) ? $patientDetails['MiddleName'] : '' ;
        $patientDetail->last_name = ($patientDetails['LastName']) ? $patientDetails['LastName'] : '' ;

        $patientDetail->gender =  ($patientDetails['Gender']) ? $patientDetails['Gender'] : '' ;

        $patientDetail->priority_code = ($patientDetails['PriorityCode']) ? $patientDetails['PriorityCode'] : '' ;
        $patientDetail->service_request_start_date = ($patientDetails['ServiceRequestStartDate']) ? $patientDetails['ServiceRequestStartDate'] : '' ;

        if (isset($patientDetails['Nurse']) && !empty($patientDetails['Nurse'])){
            $patientDetail->nurse_id = ($patientDetails['Nurse']['ID']) ? $patientDetails['Nurse']['ID'] : '';
            $patientDetail->nurse_name = ($patientDetails['Nurse']['Name']) ? $patientDetails['Nurse']['Name'] : '';
        }

        $patientDetail->admission_id = ($patientDetails['AdmissionID']) ? $patientDetails['AdmissionID'] : '' ;
        $patientDetail->medicaid_number = ($patientDetails['MedicaidNumber']) ? $patientDetails['MedicaidNumber'] : '' ;
        $patientDetail->medicare_number = ($patientDetails['MedicareNumber']) ? $patientDetails['MedicareNumber'] : '' ;
        $patientDetail->ssn = ($patientDetails['SSN']) ? $patientDetails['SSN'] : '' ;
        $patientDetail->alert = ($patientDetails['Alerts']) ? $patientDetails['Alerts'] : '' ;

        if (isset($patientDetails['SourceOfAdmission']) && !empty($patientDetails['SourceOfAdmission'])){
            $patientDetail->source_admission_id = ($patientDetails['SourceOfAdmission']['ID']) ? $patientDetails['SourceOfAdmission']['ID'] : '';
            $patientDetail->source_admission_name = ($patientDetails['SourceOfAdmission']['Name']) ? $patientDetails['SourceOfAdmission']['Name'] : '';
        }

        if (isset($patientDetails['Team']) && !empty($patientDetails['Team'])) {
            $patientDetail->team_id = ($patientDetails['Team']['ID']) ? $patientDetails['Team']['ID'] : '';
            $patientDetail->team_name = ($patientDetails['Team']['Name']) ? $patientDetails['Team']['Name'] : '';
        }

        if (isset($patientDetails['Location']) && !empty($patientDetails['Location'])) {
            $patientDetail->location_id = ($patientDetails['Location']['ID']) ? $patientDetails['Location']['ID'] : '';
            $patientDetail->location_name = ($patientDetails['Location']['Name']) ? $patientDetails['Location']['Name'] : '';
        }

        if (isset($patientDetails['Branch']) && !empty($patientDetails['Branch'])) {
            $patientDetail->branch_id = ($patientDetails['Branch']['ID']) ? $patientDetails['Branch']['ID'] : '';
            $patientDetail->branch_name = ($patientDetails['Branch']['Name']) ? $patientDetails['Branch']['Name'] : '';
        }

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
        $patientDetail->status = '4';

        $patientDetail->save();

        if($patientDetail) {
            /** Store  Coordinator */
            $this->storeCoordinator($patientDetails['Coordinators']['Coordinator'], $patientDetail->id);

            /** Store accepted services */
            $this->storeAcceptedServices($patientDetails['AcceptedServices'], $patientDetail->id, $action);

            /** Store address */
            $this->storeAddress($patientDetails['Addresses']['Address'], $patientDetail->id);

            /** Store alternate billing */
            $this->storeAlternateBilling($patientDetails['AlternateBilling'], $patientDetail->id, $action);

            /** Store emergency contact */
            $this->storeEmergencyContact($patientDetails, $patientDetail->id, $action);

            /** Store emergency contact */
            $this->emergencyPreparedness($patientDetails['EmergencyPreparedness'], $patientDetail->id);
        }

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
                    PatientCoordinator::updateOrCreate(
                        ['patient_id' => $patientDetail_id],
                        ['coordinator_id' => $coordinatorModel->id]
                    );
                }
            }
        }
    }

    public function storeAcceptedServices($acceptedServices, $patientDetail_id, $action)
    {
        if ($action == 'add') {
            if (isset($acceptedServices['Discipline']) && !empty($acceptedServices['Discipline'])) {
                foreach ($acceptedServices as $key => $acceptedService) {
                    $encodedTypeValue = json_encode($acceptedService);
                    AcceptedService::updateOrCreate(
                        ['type' => $key, 'patient_id' =>$patientDetail_id],
                        ['value' => $encodedTypeValue]
                    );
                }
            }
        } elseif ($action == 'edit') {
            $acceptedServiceModel = AcceptedService::where('patient_id', $patientDetail_id);
            $value = json_decode($acceptedServiceModel->value, true);

            $value[] = $acceptedServices;
            AcceptedService::updateOrCreate(
                ['type' => $acceptedServiceModel->type, 'patient_id' => $patientDetail_id],
                ['value' => $value]
            );
        }
    }

    public function storeAddress($address, $patientDetail_id)
    {
        $country_id = 226;
        //     if (isset($address['County']) && !empty($address['County'])) {
        //         $country = Country::updateOrCreate(
        //             ['name' =>  $address['County']]
        //         );
        //         $country = Country::where('state_code',$address['State'])->first();
        //         if(!empty($state)) {
        //             $state_id = $state['id'];
        //         }
        //         $country_id = $country->id;
        //     }

        //  $state_id = '';
        //  if (isset($address['State']) && !empty($address['State'])) {
        //      $state = State::where('state_code',$address['State'])->first();
        //      if(!empty($state)) {
        //          $state_id = $state['id'];
        //      }
        //  }

        //  $city_id = '';
        //  if (isset($address['City']) && !empty($address['City'])) {
        //     $city = City::where('city',$address['City'])->first();
        //      if(!empty($city)) {
        //          $city_id = $city['id'];
        //      }
        //  }
        PatientAddress::updateOrCreate(
            ['patient_id' => $patientDetail_id],
            [
                'address_id' => ($address['AddressID']) ? $address['AddressID'] : '',
                'address1' => ($address['Address1']) ? $address['Address1'] : '',
                'address2' => ($address['Address2']) ? $address['Address2'] : '',
                'cross_street' => ($address['CrossStreet']) ? $address['CrossStreet'] : '',
                // 'city_id' => $city_id,
                'zip5' => ($address['Zip5']) ? $address['Zip5'] : '',
                'zip4' => ($address['Zip4']) ? $address['Zip4'] : '',
                // 'state_id' => $state_id,
                'county_id' => $country_id,
                'is_primary_address' => ($address['IsPrimaryAddress'] == 'Yes') ? 1 : 0,
                'address_type' => ($address['AddressTypes']) ? $address['AddressTypes'] : ''
            ]
        );
    }

    public function storeAlternateBilling($alternateBilling, $patientDetail_id, $action)
    {
        if ($action == 'add') {
            $isAlternateBilling = '';
            $zipCode = ($alternateBilling['Zip5']) ? $alternateBilling['Zip5'] : '';
        } elseif ($action == 'edit') {
            $zipCode = ($alternateBilling['ZipCode']) ? $alternateBilling['ZipCode'] : '';
            $isAlternateBilling = ($alternateBilling['IsAlternateBilling']) ? $alternateBilling['IsAlternateBilling'] : '';
        }
        if (! empty($alternateBilling['FirstName'])) {
            AlternateBilling::updateOrCreate(
                ['patient_id' => $patientDetail_id],
                [
                    // 'is_alternate_billing' => $isAlternateBilling,
                    'first_name' => ($alternateBilling['FirstName']) ? $alternateBilling['FirstName'] : '',
                    'middle_name' => ($alternateBilling['MiddleName']) ? $alternateBilling['MiddleName'] : '',
                    'last_name' => ($alternateBilling['LastName']) ? $alternateBilling['LastName'] : '',
                    'street' => ($alternateBilling['Street']) ? $alternateBilling['Street'] : '',
                    // 'city' => ($alternateBilling['City']) ? $alternateBilling['City'] : '',
                    // 'state' => ($alternateBilling['State']) ? $alternateBilling['State'] : '',
                    'zip5' => $zipCode,
                ]
            );
        }

    }

    public function storeEmergencyContact($patientDetails, $patientDetail_id, $action)
    {
        if ($action == 'add') {
            foreach ($patientDetails['EmergencyContacts']['EmergencyContact'] as $emergencyContact) {
                PatientEmergencyContact::updateOrCreate(
                    ['patient_id' => $patientDetail_id],
                    [
                        'name' => ($emergencyContact['Name']) ? $emergencyContact['Name'] : '',
                        'relationship_id' => ($emergencyContact['Relationship']['ID']) ? $emergencyContact['Relationship']['ID'] : '',
                        'relationship_name' => ($emergencyContact['Relationship']['Name']) ? $emergencyContact['Relationship']['Name'] : '',
                        'lives_with_patient' => ($emergencyContact['LivesWithPatient']) ? $emergencyContact['LivesWithPatient'] : '',
                        'have_keys' => ($emergencyContact['HaveKeys']) ? $emergencyContact['HaveKeys'] : '',
                        'phone1' => ($emergencyContact['Phone1']) ? $emergencyContact['Phone1'] : '',
                        'phone2' => ($emergencyContact['Phone2']) ? $emergencyContact['Phone2'] : '',
                        'address' => ($emergencyContact['Address']) ? $emergencyContact['Address'] : '',
                    ]
                );
            }
        } elseif ($action == 'edit') {
            $number = 1;
            foreach ($patientDetails['EmergencyContact'.$number] as $emergencyContact) {
                PatientEmergencyContact::updateOrCreate(
                    ['patient_id' => $patientDetail_id],
                    [
                        'name' => ($emergencyContact['Name']) ? $emergencyContact['Name'] : '',
                        'relationship_id' => ($emergencyContact['RelationshipID']) ? $emergencyContact['RelationshipID'] : '',
                        'relationship_name' => ($emergencyContact['RelationshipName']) ? $emergencyContact['RelationshipName'] : '',
                        'relationship_other' => ($emergencyContact['RelationshipOther']) ? $emergencyContact['RelationshipOther'] : '',
                        'lives_with_patient' => ($emergencyContact['LivesWithPatient']) ? $emergencyContact['LivesWithPatient'] : '',
                        'have_keys' => ($emergencyContact['HaveKeys']) ? $emergencyContact['HaveKeys'] : '',
                        'phone1' => ($emergencyContact['Phone1']) ? $emergencyContact['Phone1'] : '',
                        'phone2' => ($emergencyContact['Phone2']) ? $emergencyContact['Phone2'] : '',
                        'address' => ($emergencyContact['Address']) ? $emergencyContact['Address'] : '',
                    ]
                );
                $number++;
            }
        }
    }

    public function emergencyPreparedness($emergencyPreparedness, $patientDetail_id)
    {
        foreach ($emergencyPreparedness as $key => $emergencyPreparednes) {

            $encodedTypeValue = json_encode($emergencyPreparednes);
            $emergencyPreparednessModel = new EmergencyPreparedness();

            $emergencyPreparednessModel->type = $key;
            $emergencyPreparednessModel->value = $encodedTypeValue;
            $emergencyPreparednessModel->patient_id = $patientDetail_id;

            $emergencyPreparednessModel->save();
        }
    }

    public function storeScheduleInfo($scheduleInfo, $patient_detail_id)
    {
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
    }

    public function storePatientReferralInfo($getScheduleInfo, $patient_detail_id)
    {
        dump($getScheduleInfo);
        $patientReferralInfoModel = PatientReferralInfo::updateOrCreate(
            ['patient_id' => $patient_detail_id],
            [
                'referral_master_id' => ($getScheduleInfo['ReferralMasterId']) ? $getScheduleInfo['ReferralMasterId'] : '',
                'referral_created_date' => ($getScheduleInfo['ReferralCreatedDate']) ? $getScheduleInfo['ReferralCreatedDate'] : '',
                'referral_name' => ($getScheduleInfo['ReferralName']) ? $getScheduleInfo['ReferralName'] : '',
                'referral_received_date' => ($getScheduleInfo['ReferralReceivedDate']) ? $getScheduleInfo['ReferralReceivedDate'] : '',
                'referral_status_id' => ($getScheduleInfo['ReferralStatusId']) ? $getScheduleInfo['ReferralStatusId'] : '',
                'referral_status' => ($getScheduleInfo['ReferralStatus']) ? $getScheduleInfo['ReferralStatus'] : '',
                'referral_commission_status_id' => ($getScheduleInfo['ReferralCommissionStatusID']) ? $getScheduleInfo['ReferralCommissionStatusID'] : '',
                'referral_commission_status' => ($getScheduleInfo['ReferralCommissionStatus']) ? $getScheduleInfo['ReferralCommissionStatus'] : '',
                'referral_source_id' => ($getScheduleInfo['ReferralSourceId']) ? $getScheduleInfo['ReferralSourceId'] : '',
                'referral_source_name' => ($getScheduleInfo['ReferralSourceName']) ? $getScheduleInfo['ReferralSourceName'] : '',
                'referral_source_type' => ($getScheduleInfo['ReferralSourceType']) ? $getScheduleInfo['ReferralSourceType'] : '',
                'referral_contact_id' => ($getScheduleInfo['ReferralContactId']) ? $getScheduleInfo['ReferralContactId'] : '',
                'referral_contact_name' => ($getScheduleInfo['ReferralContactName']) ? $getScheduleInfo['ReferralContactName'] : '',
                'referral_intake_person_id' => ($getScheduleInfo['ReferralIntakePersonId']) ? $getScheduleInfo['ReferralIntakePersonId'] : '',
                'referral_intake_person_name' => ($getScheduleInfo['ReferralIntakePersonName']) ? $getScheduleInfo['ReferralIntakePersonName'] : '',
                'referral_account_manager_id' => ($getScheduleInfo['ReferralAccountManagerId']) ? $getScheduleInfo['ReferralAccountManagerId'] : '',
                'referral_account_manager_name' => ($getScheduleInfo['ReferralAccountManagerName']) ? $getScheduleInfo['ReferralAccountManagerName'] : '',
            ]
        );

        /** Get and Store Patient Referral Info */
        $referralProfile = getReferralProfile($patientReferralInfoModel->referral_master_id);
        $getReferralProfile = $referralProfile['soapBody']['GetReferralProfileResponse']['GetReferralProfileResult']['ReferralSearch'];
        $this->storeReferralProfile($getReferralProfile, $patient_detail_id);
    }

    public function storeReferralProfile($getReferralProfile, $patient_detail_id)
    {
        // $this->storePatientReferralInfo($getReferralProfile, $patient_detail_id);
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


    public function getLabReportReferral(Request $request){

        $labReportTypes = LabReportType::where('status','=','1')
            ->where('parent_id','=',$request->id)
            ->get();
        return response()->json([
            'status'=>false,
            'message'=>'Lab referral get successfully!',
            'data'=>$labReportTypes
        ],200);
    }

    public function labReportUpload(Request $request)
    {
        $this->validate($request, [
            'lab_report_id' => 'required',
            'patient_id' => 'required',
            'files' => 'required'
        ]);
        if ($request->hasfile('files')) {
            try {
                $file = $request->file('files');
                $name = time() .'.'.$file->getClientOriginalExtension();
                $filePath = 'patient_report';
                $file->move($filePath,$name);
                $patientReport = new PatientReport();
                $patientReport->file_name = $name;
                $patientReport->original_file_name = $name;
                $patientReport->user_id = $request->patient_id;
                $patientReport->lab_report_type_id = $request->lab_report_id;
                if ($patientReport->save()){
                    return response()->json([
                        'status'=>true,
                        'message'=>'File upload Successfully '.$file->getClientOriginalName()
                    ],200);
                }
            }catch (\Exception $exception){
                return response()->json([
                    'status'=>false,
                    'message'=>$exception->getMessage(),
                    'data'=>null
                ],422);
            }
        }
        return response()->json([
            'status'=>false,
            'message'=>'Something Went Wrong!'
        ],200);
    }

    public function labReportData(Request $request){
        $this->validate($request,[
            'patient_id'=>'required|exists:users,id'
        ]);
        $patientReport = PatientReport::with('labReports')
            ->where('user_id','=',$request->patient_id);
        return DataTables::of($patientReport)
            ->addColumn('report_type', function($report) {
                return $report->labReports->name;
            })
            ->make(true);

    }

    public function viewLabReport(Request $request){
        $this->validate($request,[
            'patient_id'=>'required|exists:users,id',
            'id'=>'required'
        ]);

        $labTypeIds = LabReportType::where('parent_id','=',$request->id)->pluck('id');

        $patientReport = PatientReport::where('user_id','=',$request->patient_id)
            ->whereIn('lab_report_type_id',$labTypeIds)
            ->get();
        if (count($patientReport)>0){
            return response()->json([
                'status'=>true,
                'message'=>'Patient lab report file get successfully!',
                'data'=>$patientReport
            ],200);
        }
        return response()->json([
            'status'=>false,
            'message'=>'Report Not Found!',
            'data'=>$patientReport
        ],422);
    }

    public function removeLabReport(Request $request){
        $this->validate($request,[
            'id'=>'required'
        ]);
        $patientReport = PatientReport::find($request->id);
        if ($patientReport){
//            $filePath = 'patient_report/' . $patientReport->original_file_name;
//            if (Storage::disk('s3')->exists($filePath)){
//                Storage::disk('s3')->delete($filePath);
//            }
            $patientReport->delete();
            return response()->json([
                'status'=>true,
                'message'=>'Patient lab Deleted',
                'data'=>$patientReport
            ],200);
        }
        return response()->json([
            'status'=>false,
            'message'=>'Report Not Found!',
            'data'=>$patientReport
        ],422);
    }

    public function labReportFileShow(Request $request){
        $this->validate($request,[
            'id'=>'required'
        ]);
        $patientReport = PatientReport::find($request->id);
        if ($patientReport){
            return response()->json([
                'status'=>true,
                'message'=>'Patient lab Deleted',
                'data'=>$patientReport
            ],200);
        }
        return response()->json([
            'status'=>false,
            'message'=>'Report Not Exists!',
            'data'=>$patientReport
        ],422);
    }
}
