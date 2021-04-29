<?php

namespace App\Http\Controllers;

use App\Jobs\HHAApiCaregiver;
use App\Models\CaregiverInfo;
use App\Models\Demographic;
use App\Models\PatientEmergencyContact;
use App\Models\PatientLabReport;
use App\Models\PatientReport;
use App\Models\User;
use App\Services\AdminService;
use App\Services\ClinicianService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Log;
use ZipArchive;

class CaregiverController extends Controller
{
    public function index($serviceStatus = null,$initial = null)
    {
        return view('pages.patient_detail.new_patient', compact('serviceStatus', 'initial'));
    }

    public function dashboard()
    {

        $count['vbc'] = Demographic::where('service_id',[1])->count();
        $count['vbc_active'] = $this->countStatus('1','1');
        $count['vbc_reject'] = $this->countStatus('1','3');
        $count['vbc_completed'] = $this->countStatus('1','5');
        $count['mdorder'] = Demographic::where('service_id', [2])->count();
        $count['mdorder_active'] = $this->countStatus('2','1');
        $count['mdorder_reject'] = $this->countStatus('2','3');
        $count['mdorder_completed'] = $this->countStatus('2','5');
        $count['occupational'] = Demographic::where('service_id', [3])->count();
        $count['occupational_active'] = $this->countStatus('3','1');
        $count['occupational_reject'] = $this->countStatus('3','3');
        $count['occupational_completed'] = $this->countStatus('3','5');
        $count['covid'] = Demographic::where('service_id', [6])->count();
        $count['covid_active'] = $this->countStatus('6','1');
        $count['covid_reject'] = $this->countStatus('6','3');
        $count['covid_completed'] = $this->countStatus('6','5');

        return view('pages.referral.dashboard',compact('count'));
    }

     public function dashboardAjaxPatient(Request $request)
    {
        $count = Demographic::where('service_id', [3])->count();
        $services = 3;
        $avg = User::whereHas('roles',function ($q){
                $q->where('name','=','patient');
            })->whereHas('patientLabReport',function ($q) use($request) {
                $q->where('lab_report_type_id','=',$request['type_services']);
            })->whereIn('status', [$request['status']])->get()->count();
        $result['avg'] = $avg;
        $result['total'] = $count;
        return  $result;
    }
    public static function countStatus($services,$status) 
        { 
           return $count = User::whereHas('roles',function ($q){
                $q->where('name','=','patient');
            })->whereHas('demographic',function ($q) use($services) {
                        $q->where('service_id', $services);
           })->whereIn('status', [$status])->count();
        }
    public function getCaregiverDetail(Request $request)
    {
        $patientList = User::whereHas('roles',function ($q){
                $q->where('name','=','patient');
            })
            ->when($request['serviceStatus'] ,function ($query) use($request) {
                if ($request['serviceStatus'] == 'vbc') {
                    $query->whereIn('status', ['0', '1', '2', '3', '5']);

                    $query->whereHas('demographic',function ($q) use($request) {
                        $q->where('service_id', 1);
                    });
                } else if($request['serviceStatus'] == 'md-order') {

                    if(! $request['initial']) {
                        $query->whereIn('status', ['0', '1', '2', '3', '5']);
                    } else {
                        $query->where('status', '4');
                    }

                    $query->whereHas('demographic',function ($q) {
                        $q->where('service_id', '2');
                        if(Auth::guard('referral')) {
                            $company_id = Auth::guard('referral')->user()->id;
                            $q->where('company_id', $company_id);
                        }
                    });
                } else if($request['serviceStatus'] == 'occupational-health') {
                    
                    if(! $request['initial']) {
                        $query->whereIn('status', ['0', '1', '2', '3', '5']);
                    } else {
                        $query->where('status', '4');
                    }
                    
                    $query->whereHas('demographic',function ($q) {
                        $q->where('service_id', '3');
                        if(Auth::guard('referral')) {
                            $company_id = Auth::guard('referral')->user()->id;
                            $q->where('company_id', $company_id);
                        }
                    });
                } else if($request['serviceStatus'] == 'covid-19') {
                    $query->where('status', '0');

                    $query->whereHas('demographic',function ($query) use($request) {
                        $query->where('service_id', 6);
                            if ($request['zip_code']) {
                                    $query->where('address->zip_code',$request['zip_code']);
                            }
                    });
                } else if ($request['serviceStatus'] == 'pending') {
                    $query->where('status', '0');
                } 
                // else if ($request['serviceStatus'] == 'initial') {
                   
                //     $query->where('status', '4');

                //     $query->whereHas('demographic',function ($q) {
                //         $q->where('service_id', '3');
                //         if(Auth::guard('referral')) {
                //             $company_id = Auth::guard('referral')->user()->id;
                //             $q->where('company_id', $company_id);
                //         }
                //     });
                // }
            })
            ->when(! $request['serviceStatus'] ,function ($query) use($request) {
                $query->whereIn('status', ['1', '2', '3', '5']);
           
                $query->when($request['service_id'], function ($query) use($request) {
                    $query->whereHas('demographic',function ($q) use($request) {
                        $q->where('service_id', $request['service_id']);
                    });
                })
                ->when($request['status'], function ($query) use($request) {
                    $query->where('status', $request['status']);
                })
                ->when($request['user_name'], function ($query) use($request){
                    $query->where('id', $request['user_name']);
                })
                ->when($request['gender'], function ($query) use($request){
                 
                    $query->where('gender', $request['gender']);
                })
                ->when($request['dob'], function ($query) use($request){
                    $dob = date('Y-d-m', strtotime($request['dob']));
                    $query->where('dob', $dob);
                // })
                // ->whereHas('patientLabReport',function ($query) use($request) {
                //     $query->when($request['lab_due_date'], function ($query) use($request){
                //         $date = explode('-', $request['lab_due_date']);
                //         $startDate  = date('Y-m-d', strtotime($date[0]));
                //         $endDate = date('Y-m-d', strtotime($date[1]));
                //         $query->whereBetween('due_date',[$startDate,$endDate]);
                //     });
                });
            })
            ->with('demographic', 'demographic.services', 'patientReport', 'patientReport.labReports');
            
        $datatble = DataTables::of($patientList->get());
            if($request['serviceStatus'] === 'pending') {
                $datatble->addColumn('checkbox_id', function($q) use($request) {
                    return '<div class="checkbox"><label><input class="innerallchk" onclick="chkmain();" type="checkbox" name="allchk[]" value="' . $q->id . '" /><span></span></label></div>';
                });
            }
            $datatble->addIndexColumn()
            ->addColumn('full_name', function($q) use($request) {
                if ($request['serviceStatus'] == 'initial') {
                    $full_name = "<span class='label'>".$q->full_name."</span>";
                    $full_name .= "<div class='fullname-text'><input class='first_name form-control' required type='text' name='first_name' value='".$q->first_name."' style='margin-bottom: 10px;'></div>";
                    $full_name .= "<div class='fullname-text'><input class='last_name form-control' type='text' name='last_name' value='".$q->last_name."'></div>";
                    return $full_name;
                } else {
                    return '<a href="' . route('patient.details', ['patient_id' => $q->id]) . '" class="" data-toggle="tooltip" data-placement="left" title="View Patient" data-original-title="View Patient Chart">' . $q->full_name . '</a>';
                }
            })
            ->addColumn('gender', function($q){
                return $q->gender_data;
            })
            ->addColumn('ssn_data', function($q) use($request) {
                if ($request['serviceStatus'] == 'initial') {
                    $ssn_data = '';
                    if ($q->demographic) {
                        $ssn_data = getSsn($q->demographic->ssn);
                    }
                   
                    $ssn = "<span class='label'>".$ssn_data."</span>";
                    $ssn .= "<div class='ssn-text'><input class='ssn ssnedit form-control' type='text' name='ssn'  maxlength='11' value='".$ssn_data."'></div>";
                    
                    return $ssn;
                } else {
                    $ssn_data = '';
                    if ($q->demographic) {
                        $ssn_data = getSsn($q->demographic->ssn);
                    }
                    return "<span class='label'>".$ssn_data."</span>";
                }
            })
            ->addColumn('phone', function($q) use($request){
                $phone = '';
                if ($request['serviceStatus'] == 'initial') {
                    $phone .= "<div class='phone-text'><input class='phone form-control' required type='text' name='phone' value=''></div>";
                } else {
                    $phone .= '';
                    if($q->phone){
                        $phone .= "<span class='label'><a href='tel:".$q->phone."'><i class='las la-phone circle'></i>".$q->phone."</a></span>";
                    }
                }
                return $phone;
            });
            if(! $request['serviceStatus'] || $request['serviceStatus'] === 'pending') {
                $datatble->addColumn('service_id', function($q) {
                    $services = '';
                    if ($q->demographic && $q->demographic->services) {
                        $services =  $q->demographic->services->name;
                    }
                    return $services;
                });
            }
            $datatble->addColumn('doral_id', function($q){
                $doral_id = '';
                if ($q->demographic) {
                    $doral_id =  $q->demographic->doral_id;
                }
                return $doral_id;
            })
            ->addColumn('city_state', function($q) use($request) {
                $city_state = '';
                if ($q->demographic) {
                    $city_state_json =  $q->demographic->address;
                    
                    if ($city_state_json) {
                        if ($city_state_json['city']) {
                            $city_state .= $city_state_json['city'];
                        }
                        if ($city_state_json['state']) {
                            $city_state .= ' - ' . $city_state_json['state'];
                        }

                    }
                }
                return $city_state;
            });
            $datatble->addColumn('dob', function($row) use($request){
                return date('m-d-Y', strtotime($row->dob));
            });
            if (! $request['serviceStatus']) {
                $datatble->addColumn('status', function($row) use($request){
                    $btn = '';
                    if ($row->status === '1') {
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm update-status" style="background: #eaeaea; color: #000" data-status="3">Reject</a>';
                    } else if ($row->status === '3') {
                        $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-sm update-status" style="background: #006c76; color: #fff" data-status="1" patient-name="' . $row->full_name . '">Accept</a>';
                    } else if ($row->status === '5') {
                        $btn .= '<a href="' . route('caregiver.downloadLabReport', ['user_id' => $row->id]) . '"><img src="'.asset("assets/img/icons/download-icon.svg").'"></a>';
                    }
                    return $btn;
                });
            }
            $datatble->addColumn('action', function($row) use($request){
                $btn = '';
                if ($request['serviceStatus'] == 'occupational-health' || $request['serviceStatus'] == 'md-order' || $request['serviceStatus'] == 'vbc' || $request['serviceStatus'] == 'covid-19' || $request['serviceStatus'] == 'initial') {
                    if ($request['serviceStatus'] == 'initial') {
                        $btn .= '<div class="normal"><a class="edit_btn btn btn-sm" title="Edit" style="background: #006c76; color: #fff;">Edit</a></div> ';
                        $btn .= '<div class="while_edit"><a class="save_btn btn btn-sm" data-id="'.$row->id.'" title="Save" style="background: #626a6b; color: #fff; margin-right: 10px;">Save</a><a class="cancel_edit btn btn-sm" title="Cancel" style="background: #bbc2c3; color: #fff">Close</a></div>';
                    } else if($request['serviceStatus'] == 'covid-19') {
                        $btn .= '<button type="button" class="btn btn-danger text-capitalize btn--sm assign" data-toggle="modal" data-target="#exampleModal" title="">Assign Clinician</button>';
                    } else {
                        if ($row->status === '5') {
                            $btn .= '<a href="' . route('caregiver.downloadLabReport', ['user_id' => $row->id]) . '"><img src="'.asset("assets/img/icons/download-icon.svg").'"></a>';
                        } else {
                            $btn .= $row->status_data;
                        }
                    }
                } else {
                    if ($row->status === '0') {
                        $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-sm update-status" style="background: #006c76; color: #fff" data-status="1" patient-name="' . $row->full_name . '">Accept</a>';

                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm update-status" style="background: #eaeaea; color: #000" data-status="3">Reject</a>';
                    } else { 
                        $btn .= '<button type="button" onclick="onBroadCastOpen(' . $row->id . ')" class="btn w-600 d-table mr-auto ml-auto" style="width: inherit;font-size: 18px;height: 36px;padding-left: 10px;padding-right: 10px;text-transform: uppercase;"><img src="https://app.doralhealthconnect.com/assets/img/icons/Request_RoadL.svg" alt="RoadL Request" class="icon_90 selected"><span></span></button>';
                    }
                }
                return $btn;
            });
            $datatble->rawColumns(['full_name', 'ssn_data', 'city_state', 'action', 'checkbox_id', 'phone','status']);
            return $datatble->make(true);
    }
    
    public function duePatientView()
    {
        return view('pages.patient_detail.due_patients');
    }

    public function getDuePatients(Request $request)
    {
        $dateBetween['today'] =  date('Y-m-d');
        
        $date = Carbon::createFromFormat('Y-m-d', $dateBetween['today'])->addMonth();
  
        $dateBetween['newDate'] = $date->format('Y-m-d');

        $patientList = User::whereHas('roles',function ($q) {
            $q->where('name','=','patient');
        })->whereHas('patientLabReport',function ($q) use($dateBetween) {
            $q->whereBetween('due_date',[$dateBetween['today'],$dateBetween['newDate']]);
        })->with('demographic')->orderBy('id', 'DESC');

        $datatble = DataTables::of($patientList)
            ->addIndexColumn()
            ->addColumn('full_name', function($q) {
                return '<a href="' . route('patient.details', ['patient_id' => $q->id]) . '" class="" data-toggle="tooltip" data-placement="left" title="View Patient" data-original-title="View Patient Chart">' . $q->full_name . '</a>';
            })
            ->addColumn('gender', function($q){
                return $q->gender_data;
            })
            ->addColumn('ssn', function($q) {
                $ssn_data = '';
                if ($q->demographic) {
                    $ssn_data = $q->demographic->ssn;
                }
                return $ssn_data;
            })
            ->addColumn('phone', function($q) {
                $phone = '';
                if ($q->phone) {
                    $phone .= $q->phone;
                }
                return $phone;
            })
            ->addColumn('service_id', function($q) {
                $services = '';
                if ($q->demographic && $q->demographic->services) {
                    $services =  $q->demographic->services->name;
                }
                return $services;
            })
            ->addColumn('doral_id', function($q){
                $doral_id = '';
                if ($q->demographic) {
                    $doral_id =  $q->demographic->doral_id;
                }
                return $doral_id;
            })
            ->addColumn('city_state', function($q) {
                $city_state = '';
                if ($q->demographic) {
                    $city_state_json =  json_decode($q->demographic->address);

                    if ($city_state_json) {
                        if ($city_state_json->City) {
                            $city_state .= $city_state_json->City;
                        }
                        if ($city_state_json->State) {
                            $city_state .= ' - ' . $city_state_json->State;
                        }

                    }
                }

                return $city_state;
            })
            ->addColumn('action', function($row){
                return '<a href="javascript:void(0)" data-toggle="tooltip" id="' . $row->id . '" data-original-title="Due Report" class="btn btn-sm viewMessage" style="background: #006c76; color: #fff">Due Report</a>';
            });
          
            $datatble->rawColumns(['full_name','action']);
            return $datatble->make(true);
    }


    public function getDueDetail(Request $request)
    {
        $dateBetween['today'] =  date('Y-m-d');
        
        $date = Carbon::createFromFormat('Y-m-d', $dateBetween['today'])->addMonth();
  
        $dateBetween['newDate'] = $date->format('Y-m-d');

        $patientList = PatientLabReport::where('patient_referral_id', $request['due_user_id'])->with('user','user.demographic','labReportType');
         
        $datatble = DataTables::of($patientList->get())
            ->addIndexColumn()
          
            ->addColumn('report_type', function($row){
                $report_type = '';
                    if ($row->labReportType) {
                        $report_type = $row->labReportType->name;
                    }
                    return $report_type;
            });
          
            return $datatble->make(true);
    }

    public function getDuePatientDetail($id)
    {
        
        $patientData = User::where('id', $id)->with('patientLabReport','patientLabReport.labReportType')->first();
       
        return view('pages.patient_detail.view_patient_due_report', compact('patientData'));
    }
    public function updatePatientStatus(Request $request)
    {
        $clinicianService = new ClinicianService();
        $response = $clinicianService->updatePatientStatus($request->all());
        
        //         $from = "12089104598";
        //         $api_key = "bb78dfeb";
        //         $api_secret = "PoZ5ZWbnhEYzP9m4";
        //         $uri = 'https://rest.nexmo.com/sms/json';
        //         $text = "This message is from Doral health Connect :
        // Congratulation! Your employer Housecalls home care has been enrolled to benefit plan where each employees will get certain medical facilities. If you have any medical concern or need annual physical please click on the link below and book your appointment now.
        // https://doralhealthconnect.com/book_appointment.html";
                    
        //         $to = 5166000122;
        //         $fields = '&from=' . urlencode($from) .
        //                 '&text=' . urlencode($text) .
        //                 '&to=+1' . urlencode($to) .
        //                 '&api_key=' . urlencode($api_key) .
        //                 '&api_secret=' . urlencode($api_secret);
        //         $res = curl_init($uri);
        //         curl_setopt($res, CURLOPT_POST, TRUE);
        //         curl_setopt($res, CURLOPT_RETURNTRANSFER, TRUE); // don't echo
        //         curl_setopt($res, CURLOPT_SSL_VERIFYPEER, FALSE);
        //         curl_setopt($res, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        //         curl_setopt($res, CURLOPT_POSTFIELDS, $fields);
        //         $result = curl_exec($res);
        //         $result = json_decode($result);
        //         curl_close($res);
                
        //         $too = 9293989855;
        //         $fields = '&from=' . urlencode($from) .
        //                 '&text=' . urlencode($text) .
        //                 '&to=+1' . urlencode($too) .
        //                 '&api_key=' . urlencode($api_key) .
        //                 '&api_secret=' . urlencode($api_secret);
        //         $res = curl_init($uri);
        //         curl_setopt($res, CURLOPT_POST, TRUE);
        //         curl_setopt($res, CURLOPT_RETURNTRANSFER, TRUE); // don't echo
        //         curl_setopt($res, CURLOPT_SSL_VERIFYPEER, FALSE);
        //         curl_setopt($res, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        //         curl_setopt($res, CURLOPT_POSTFIELDS, $fields);
        //         $result = curl_exec($res);
        //         $result = json_decode($result);
        //         curl_close($res);

        if ($response->status === true){
            return response()->json($response,200);
        }
        return response()->json($response,422);
    }

    public function updatePhoneNumber(Request $request)
    {
        $clinicianService = new ClinicianService();
        $response = $clinicianService->updatePhoneNumber($request->all());

        if ($response->status === true){
            return response()->json($response,200);
        }
        return response()->json($response,422);
    }

    public function downloadLabReport($id)
    {
        $patientReports = PatientReport::where('user_id', $id)->get();

     
        $public_dir=public_path();
        $zipFileName = 'invoicezipfile-'.$id.'.zip';
       
        $zip = new ZipArchive;

        if (!file_exists($public_dir.'/zip')) {
            mkdir($public_dir.'/zip', 0777, true);
        }
        
        if ($zip->open($public_dir . '/zip' . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
            foreach ($patientReports as $key => $patientReport) {
                $invoice_file = $patientReport->file_name;
                $zip->addFile($public_dir . '/patient_report/'.$invoice_file,$invoice_file);
            }
            // $zip->close();
        }
       
        // Set Header
        $headers = array(
            'Content-Type' => 'application/octet-stream',
        );
        $filetopath=$public_dir. '/zip' . '/'.$zipFileName;
       
        // Create Download Response
        if(file_exists($filetopath)){
            return response()->download($filetopath,$zipFileName,$headers);
        }
    }


    public function getUserData(Request $request)
    {
        
        $data = [];

        if($request->has('q')){
            $search = $request->q;
           
            $data =User::whereIn('status', ['1', '2', '3', '5'])->select("id","first_name", 'last_name')
                    ->where('first_name','LIKE',"%$search%")->orWhere('last_name', 'LIKE', "%$search%")
                    ->get();
        }
       
        return response()->json($data);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchCaregivers()
    {
        // $demographic = Demographic::get();
        // foreach ($demographic as $key => $value) {
        //     // $relation = $value->language;
        //     $language_decode = json_decode($value->language, true);
        //     if (isset($language_decode[0])) {
        //         PatientEmergencyContact::find($value->id)->update([
        //             'relation' => $language_decode[0]['Name']
        //         ]);
        //     }
        // }

        $searchCaregiverIds = $this->searchCaregiverDetails();
        $caregiverArray = $searchCaregiverIds['soapBody']['SearchCaregiversResponse']['SearchCaregiversResult']['Caregivers']['CaregiverID'];
        dump(count($caregiverArray));

        foreach (array_slice($caregiverArray, 0 , 500) as $cargiver_id) {

            // foreach ($caregiverArray as $cargiver_id) {
            /** Store patirnt demographic detail */
            $userCaregiver = Demographic::where('caregiver_id' , $cargiver_id)->first();

            if (! $userCaregiver) {
                $getdemographicDetails = $this->getDemographicDetails($cargiver_id);
                $demographicDetails = $getdemographicDetails['soapBody']['GetCaregiverDemographicsResponse']['GetCaregiverDemographicsResult']['CaregiverInfo'];

                self::saveUser($demographicDetails);
            }


            $getChangesV2 = $this->getChangesV2();
            $changesV2 = $getChangesV2['soapBody']['GetCaregiverChangesV2Response']['GetCaregiverChangesV2Result']['GetCaregiverChangesV2Info'];

            $createMedical = $this->createMedical($cargiver_id);
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
        $getPatientDetailsController = new GetPatientDetailsController();
        return $getPatientDetailsController->curlCall($data, $method);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDemographicDetails($cargiver_id)
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetCaregiverDemographics xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><CaregiverInfo><ID>' . $cargiver_id . '</ID></CaregiverInfo></GetCaregiverDemographics></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        $method = 'POST';
        $getPatientDetailsController = new GetPatientDetailsController();
        return $getPatientDetailsController->curlCall($data, $method);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getChangesV2()
    {
        $date = Carbon::now();// will get you the current date, time
        $today = $date->format("Y-m-d");

        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetCaregiverChangesV2 xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><ModifiedAfter>2015-03-19T04:31:57.077</ModifiedAfter></GetCaregiverChangesV2></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        $method = 'POST';
        $getPatientDetailsController = new GetPatientDetailsController();
        return $getPatientDetailsController->curlCall($data, $method);
    }

   
    public static function saveUser($demographicDetails)
    {
        $email = null;
        if ($demographicDetails['NotificationPreferences']['Email']) {
            $email = $demographicDetails['NotificationPreferences']['Email'];
        }

        $userDuplicateEmail = User::whereNotNull('email')->where('email', $email)->first();

        if ($userDuplicateEmail) {
            return;
        }

        $phone_number = null;
        if ($demographicDetails['Address']['HomePhone']) {
            $phone_number = $demographicDetails['Address']['HomePhone'];
        } else if($demographicDetails['Address']['Phone2']) {
            $phone_number = $demographicDetails['Address']['Phone2'];
        } else if($demographicDetails['Address']['Phone3']) {
            $phone_number = $demographicDetails['Address']['Phone3'];
        } else if($demographicDetails['NotificationPreferences']['MobileOrSMS']) {
            $phone_number = $demographicDetails['NotificationPreferences']['MobileOrSMS'];
        }

        if ($phone_number == '') {
            $status = '4';
        } else {
            $phone_number = str_replace("-","",$phone_number);
            $status = '0';

            $userDuplicatePhone = User::whereNotNull('phone')->where('phone', $phone_number)->first();
            if ($userDuplicatePhone) {
                return;
            }
        }

        $gender = '';
        if ($demographicDetails['Gender'] == 'MALE') {
            $gender = 1;
        } else if ($demographicDetails['Gender'] == 'FEMALE') {
            $gender = 2;
        } else {
            $gender = 3;
        }

        $user = DB::table('users')->insert([
            'gender' => $gender,
            'first_name' => $demographicDetails['FirstName'],
            'last_name' => $demographicDetails['LastName'],
            'dob' => $demographicDetails['BirthDate'],
            'status' => $status,
            'email' => $email,
            'phone' => $phone_number,
            'password' => Hash::make('Patient@doral'),
        ]);

        $user_id = DB::getPdo()->lastInsertId();

        $user = User::find($user_id);

        $user->assignRole('patient')->syncPermissions(Permission::all());

        self::saveCaregiverInfo($demographicDetails, $user_id);

        self::saveDemographic($demographicDetails, $user_id);

        self::storeEmergencyContact($demographicDetails, $user_id);

    }

    public static function saveCaregiverInfo($demographicDetails, $userId)
    {
        $caregiverInfo = new CaregiverInfo();

        $caregiverInfo->user_id = $userId;
        $caregiverInfo->company_id = '9';
        $caregiverInfo->service_id = '3';

        $caregiverInfo->caregiver_id = ($demographicDetails['ID']) ? $demographicDetails['ID'] : '';
        $caregiverInfo->intials = ($demographicDetails['Intials']) ? $demographicDetails['Intials'] : '';
        $caregiverInfo->caregiver_gender_id = ($demographicDetails['CaregiverGenderID']) ? $demographicDetails['CaregiverGenderID'] : '';
        $caregiverInfo->caregiver_code = ($demographicDetails['CaregiverCode']) ? $demographicDetails['CaregiverCode'] : '';
        $caregiverInfo->alternate_caregiver_code = ($demographicDetails['AlternateCaregiverCode']) ? $demographicDetails['AlternateCaregiverCode'] : '';
        $caregiverInfo->time_attendance_pin = ($demographicDetails['TimeAndAttendancePIN']) ? $demographicDetails['TimeAndAttendancePIN'] : '';

        $mobile = [];
        if ($demographicDetails['MobileID'] || $demographicDetails['MobileIDTypeDescription']) {
            $mobile = [
                'MobileID' => ($demographicDetails['MobileID']) ? $demographicDetails['MobileID'] : '',
                'MobileIDTypeDescription' => ($demographicDetails['MobileIDTypeDescription']) ? $demographicDetails['MobileIDTypeDescription'] : '',
            ];
        }
        $caregiverInfo->mobile = json_encode($mobile);

        $ethnicity = [];
        if ($demographicDetails['Ethnicity']) {
            $ethnicity = [
                $demographicDetails['Ethnicity'],
            ];
        }
        $caregiverInfo->ethnicity = json_encode($ethnicity);

        $caregiverInfo->country_of_birth = ($demographicDetails['CountryOfBirth']) ? $demographicDetails['CountryOfBirth'] : '';
        $caregiverInfo->employee_type = ($demographicDetails['EmployeeType']) ? $demographicDetails['EmployeeType'] : '';

        $maritalStatus = [];
        if ($demographicDetails['MaritalStatus']) {
            $maritalStatus = [
                $demographicDetails['MaritalStatus'],
            ];
        }
        $caregiverInfo->marital_status = json_encode($maritalStatus);

        $caregiverInfo->dependents = ($demographicDetails['Dependents']) ? $demographicDetails['Dependents'] : '';

        $status = [];
        if ($demographicDetails['Status']) {
            $status = [
                $demographicDetails['Status'],
            ];
        }
        $caregiverInfo->status = json_encode($status);

        $caregiverInfo->employee_id = ($demographicDetails['EmployeeID']) ? $demographicDetails['EmployeeID'] : '';
        $caregiverInfo->application_date = ($demographicDetails['ApplicationDate']) ? $demographicDetails['ApplicationDate'] : '';
        $caregiverInfo->hire_date = ($demographicDetails['HireDate']) ? $demographicDetails['HireDate'] : '';
        $caregiverInfo->rehire_date = ($demographicDetails['RehireDate']) ? $demographicDetails['RehireDate'] : '';
        $caregiverInfo->first_work_date = ($demographicDetails['FirstWorkDate']) ? $demographicDetails['FirstWorkDate'] : '';
        $caregiverInfo->last_work_date = ($demographicDetails['LastWorkDate']) ? $demographicDetails['LastWorkDate'] : '';
        $caregiverInfo->registry_number = ($demographicDetails['RegistryNumber']) ? $demographicDetails['RegistryNumber'] : '';
        $caregiverInfo->registry_checked_date = ($demographicDetails['RegistryCheckedDate']) ? $demographicDetails['RegistryCheckedDate'] : '';

        $referralSource = [];
        if ($demographicDetails['ReferralSource']) {
            $referralSource = [
                $demographicDetails['ReferralSource'],
            ];
        }
        $caregiverInfo->referral_source = json_encode($referralSource);

        $caregiverInfo->referral_person = ($demographicDetails['ReferralPerson']) ? $demographicDetails['ReferralPerson'] : '';

        $notificationPreferences = [];
        if ($demographicDetails['NotificationPreferences']) {
            $notificationPreferences = [
                $demographicDetails['NotificationPreferences'],
            ];
        }
        $caregiverInfo->notification_preferences = json_encode($notificationPreferences);;

        $caregiverOffices = [];
        if ($demographicDetails['CaregiverOffices']) {
            $caregiverOffices = [
                $demographicDetails['CaregiverOffices'],
            ];
        }
        $caregiverInfo->caregiver_offices = json_encode($caregiverOffices);

        $inactiveReasonDetail = json_encode([
            ($demographicDetails['InactiveReasonID']) ? $demographicDetails['InactiveReasonID'] : '',
            ($demographicDetails['InactiveReason']) ? $demographicDetails['InactiveReason'] : '',
            ($demographicDetails['InactiveNote']) ? $demographicDetails['InactiveNote'] : '',
        ]);
        $inactiveReasonDetail = [];
        if ($demographicDetails['InactiveReasonID'] || $demographicDetails['InactiveReason'] || $demographicDetails['InactiveNote']) {
            $inactiveReasonDetail = [
                'InactiveReasonID' => ($demographicDetails['InactiveReasonID']) ? $demographicDetails['InactiveReasonID'] : '',
                'InactiveReason' => ($demographicDetails['InactiveReason']) ? $demographicDetails['InactiveReason'] : '',
                'InactiveNote' => ($demographicDetails['InactiveNote']) ? $demographicDetails['InactiveNote'] : '',
            ];
        }
        $caregiverInfo->inactive_reason_detail = json_encode($inactiveReasonDetail);
        $caregiverInfo->professional_licensenumber = ($demographicDetails['ProfessionalLicensenumber']) ? $demographicDetails['ProfessionalLicensenumber'] : '';
        $caregiverInfo->npi_number = ($demographicDetails['NPINumber']) ? $demographicDetails['NPINumber'] : '';
        $caregiverInfo->signed_payroll_agreement_date = ($demographicDetails['SignedPayrollAgreementDate']) ? $demographicDetails['SignedPayrollAgreementDate'] : '';

        $caregiverInfo->save();
    }

    public static function saveDemographic($demographicDetails, $userId)
    {
        $demographic = new Demographic();

        $demographic->user_id = $userId;
        $demographic->doral_id = 'DOR-' . mt_rand(100000, 999999);
        $demographic->ssn = ($demographicDetails['SSN']) ? $demographicDetails['SSN'] : '';

        $team = [];
        if ($demographicDetails['Team'] && $demographicDetails['Team']['Name']) {
            $team = [
                $demographicDetails['Team'],
            ];
        }
        $demographic->team = json_encode($team);

        $location = [];
        if ($demographicDetails['Location'] && $demographicDetails['Location']['Name']) {
            $location = [
                $demographicDetails['Location'],
            ];
        }
        $demographic->location = json_encode($location);

        $branch = [];
        if ($demographicDetails['Branch'] && $demographicDetails['Branch']['Name']) {
            $branch = [
                $demographicDetails['Branch'],
            ];
        }
        $demographic->branch = json_encode($branch);

        $employmentTypes = [];
        if ($demographicDetails['EmploymentTypes']) {
            $employmentTypes = [
                $demographicDetails['EmploymentTypes'],
            ];
        }
        $demographic->accepted_services = json_encode($employmentTypes);

        $address = [];
        if ($demographicDetails['Address']) {
            $address = [
                $demographicDetails['Address'],
            ];
        }
        $demographic->address = json_encode($address);

        $language = [];
        if ($demographicDetails['LanguageID1'] || $demographicDetails['Language1'] || $demographicDetails['LanguageID2'] || $demographicDetails['Language2'] || $demographicDetails['LanguageID3'] || $demographicDetails['Language3'] || $demographicDetails['LanguageID4'] || $demographicDetails['Language4']) {
            $language[] = [
                'LanguageID1' => ($demographicDetails['LanguageID1']) ? $demographicDetails['LanguageID1'] : '',
                'Language1' => ($demographicDetails['Language1']) ? $demographicDetails['Language1'] : '',
                'LanguageID2' => ($demographicDetails['LanguageID2']) ? $demographicDetails['LanguageID2'] : '',
                'Language2' => ($demographicDetails['Language2']) ? $demographicDetails['Language2'] : '',
                'LanguageID3' =>($demographicDetails['LanguageID3']) ? $demographicDetails['LanguageID3'] : '',
                'Language3' => ($demographicDetails['Language3']) ? $demographicDetails['Language3'] : '',
                'LanguageID4' => ($demographicDetails['LanguageID4']) ? $demographicDetails['LanguageID4'] : '',
                'Language4' => ($demographicDetails['Language4']) ? $demographicDetails['Language4'] : '',
            ];
        }
        $demographic->language = json_encode($language);
        $demographic->type = '2';

        $demographic->save();
    }
    public static function storeEmergencyContact($demographicDetails, $user_id)
    {
        foreach ($demographicDetails['EmergencyContacts']['EmergencyContact'] as $emergencyContact) {
            if($emergencyContact['Name']) {
                $relationship = [];
                if ($emergencyContact['Relationship'] && $emergencyContact['Relationship']['Name']) {
                    $relationship = [
                        $emergencyContact['Relationship']
                    ];
                }
                $relationshipJson = json_encode($relationship);
                $patientEmergencyContact = new PatientEmergencyContact();

                $patientEmergencyContact->user_id = $user_id;
                $patientEmergencyContact->name = $emergencyContact['Name'];
                $patientEmergencyContact->relation = $relationshipJson;
                $patientEmergencyContact->phone1 = ($emergencyContact['Phone1']) ? $emergencyContact['Phone1'] : '';
                $patientEmergencyContact->phone2 = ($emergencyContact['Phone2']) ? $emergencyContact['Phone2'] : '';
                $patientEmergencyContact->address = ($emergencyContact['Address']) ? $emergencyContact['Address'] : '';
                $patientEmergencyContact->save();
            }
        }
    }
}
