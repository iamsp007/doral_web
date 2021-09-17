<?php

namespace App\Http\Controllers;

use App\Mail\DueReportNotification;
use App\Models\City;
use App\Models\Demographic;
use App\Models\PatientLabReport;
use App\Models\PatientReport;
use App\Models\PatientRequest;
use App\Models\State;
use App\Models\User;
use App\Services\ClinicianService;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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
        return User::whereHas('roles',function ($q){
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

                $query->whereHas('demographic',function ($q) {
                    $q->where('service_id', '1');
                    if(Auth::guard('referral')) {
                        $company_id = Auth::guard('referral')->user()->id;
                        $q->where('company_id', $company_id);
                    }
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

                $query->whereHas('demographic',function ($query) use($request) {
                    $query->where('service_id', '6');
                    if(Auth::guard('referral')) {
                        $company_id = Auth::guard('referral')->user()->id;
                        $query->where('company_id', $company_id);
                    }
                    if ($request['zip_code']) {
                        $query->where('address->zip_code',$request['zip_code']);
                    }
                });
            } else if ($request['serviceStatus'] == 'pending') {
                $query->where('status', '0');
            } else if ($request['serviceStatus'] == 'roadl-request') {
                $user_id = Auth::guard('partner')->user()->id;
              
                $query->whereHas('patientRequest',function ($query) use($user_id) {
                    $query->where('clincial_id', $user_id);
                });
            } else if ($request['serviceStatus'] == 'due-reports') {
                $dateBetween['today'] =  date('Y-m-d');
        
                $date = Carbon::createFromFormat('Y-m-d', $dateBetween['today'])->addMonth();
                $dateBetween['newDate'] = $date->format('Y-m-d');
                $query->whereHas('patientLabReport',function ($q) use($dateBetween) {
                    $q->where('due_date',$dateBetween['newDate']);
                });
            }
        })
        ->when(! $request['serviceStatus'] ,function ($query) use($request) {
            $query->whereIn('status', ['1', '2', '3', '5']);
        })
        ->when($request['service_id'], function ($query) use($request) {
            if ($request['service_id'] == 'due_patient') {
                $dateBetween['today'] =  date('Y-m-d');
        
                $date = Carbon::createFromFormat('Y-m-d', $dateBetween['today'])->addMonth();
                $dateBetween['newDate'] = $date->format('Y-m-d');
               
                $query->whereHas('patientLabReport',function ($q) use($dateBetween) {
                    $q->where('due_date',$dateBetween['newDate']);
                });
            } else {
                $query->whereHas('demographic',function ($q) use($request) {
                    $q->where('service_id', $request['service_id']);
                });
            }
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
            $dob = date('Y-m-d', strtotime($request['dob']));
            $query->where('dob', $dob);
        })
        ->when($request['between_date'], function ($query) use($request){
            $query->whereHas('patientLabReport',function ($query) use($request) {
                $date = explode('-', $request['between_date']);
                $startDate  = date('Y-m-d', strtotime($date[0]));
                $endDate = date('Y-m-d', strtotime($date[1]));
                $query->whereBetween('due_date',[$startDate,$endDate]);
            });
        })
        ->with('demographic', 'demographic.services', 'patientReport', 'patientReport.labReports','patientRequest');
            
        $datatble = DataTables::of($patientList->get());
            $datatble->addColumn('checkbox_id', function($q) use($request) {
                return '<div class="checkbox"><label><input class="innerallchk" onclick="chkmain();" type="checkbox" name="allchk[]" value="' . $q->id . '" /><span></span></label></div>';
            });
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
                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Reject" class="btn btn-danger shadow-sm btn--sm mr-2 update-status" data-status="3">Reject</a>';
                        $btn .= '<a id="' . $row->id . '" class="btn btn-danger btn-view shadow-sm btn--sm mr-2 resendEmail" data-toggle="tooltip" data-placement="left" title="Resend Email Verify Email" data-original-title="Resend Email Verify Email"><i class="las la-redo-alt"></i></a>';
                    } else if ($row->status === '3') {
                        $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Accept" class="btn btn-primary btn-green shadow-sm btn--sm mr-2 update-status" data-status="1">Accept</a>';
                    } else if ($row->status === '5') {
                        $btn .= '<a href="' . route('caregiver.downloadLabReport', ['user_id' => $row->id]) . '"><img src="'.asset("assets/img/icons/download-icon.svg").'"></a>';
                    }
                    return $btn;
                });
            }       
            $datatble->addColumn('action', function($row) use($request){
                $btn = '';
                if ($request['serviceStatus'] == 'occupational-health' || $request['serviceStatus'] == 'md-order' || $request['serviceStatus'] == 'vbc' || $request['serviceStatus'] == 'covid-19' || $request['serviceStatus'] == 'initial' || $request['serviceStatus'] == 'roadl-request') {
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
                } else if ($request['serviceStatus'] == 'due-reports') {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" id="' . $row->id . '" data-original-title="Due Report" class="btn btn-sm viewMessage" style="background: #006c76; color: #fff">Due Report</a>';
                } else {
                    if ($row->status === '0') {
                        $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Accept" class="btn btn-primary btn-green shadow-sm btn--sm mr-2 update-status" data-status="1">Accept</a>';

                        $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Reject" class="btn btn-danger shadow-sm btn--sm mr-2 update-status" data-status="3">Reject</a>';
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

    public function getDuePatients()
    {
        $dateBetween['today'] =  date('Y-m-d');
        
        $date = Carbon::createFromFormat('Y-m-d', $dateBetween['today'])->addMonth();
        $dateBetween['newDate'] = $date->format('Y-m-d');
       
        $patientList = User::whereHas('roles',function ($q) {
            $q->where('name','=','patient');
        })->whereHas('patientLabReport',function ($q) use($dateBetween) {
            $q->where('due_date',$dateBetween['newDate']);
        })->with('demographic');
      
        return DataTables::of($patientList->get())
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
            })
            ->addColumn('action', function($row){
                return '<a href="javascript:void(0)" data-toggle="tooltip" id="' . $row->id . '" data-original-title="Due Report" class="btn btn-sm viewMessage" style="background: #006c76; color: #fff">Due Report</a>';
            })
            ->rawColumns(['full_name','action'])
            ->make(true);
    }

    public function getDueDetail(Request $request)
    {
        $patientList = PatientLabReport::
            when($request['duereport'] ,function ($query) use($request) {
                $dateBetween['today'] =  date('Y-m-d');
                $date = Carbon::createFromFormat('Y-m-d', $dateBetween['today'])->addMonth(2);
                $dateBetween['newDate'] = $date->format('Y-m-d');
                $query->whereBetween('due_date',[$dateBetween['today'],$dateBetween['newDate']]);
                
            })
            ->where('user_id', $request['due_user_id'])->with('user','user.demographic','labReportType');

        return DataTables::of($patientList->get())
            ->addIndexColumn()
            ->addColumn('report_type', function($row){
                $report_type = '';
                    if ($row->labReportType) {
                        $report_type = $row->labReportType->name;
                    }
                    return $report_type;
            })->make(true);
    }

    public function getPatientRequestDetail(Request $request)
    {
        $user_id = Auth::user()->id;
        
        $patientRequestList = PatientRequest::where('user_id', $request['patient_id'])->whereNotNull('parent_id')->with('detail','requestType');
        
        $datatble = DataTables::of($patientRequestList->get())
            ->addIndexColumn()
            ->addColumn('clinician_name', function($row){
                $full_name = '';
                if ($row->detail) {
                    $full_name = $row->detail->first_name . ' ' . $row->detail->last_name;
                }
                return $full_name;
            })
            ->addColumn('type_id', function($row){
                $type = '';
                if ($row->requestType) {
                    $type = $row->requestType->name;
                }
                return $type;
            })
            ->addColumn('status', function($row){
                return $row->status_data;
            })
            ->addColumn('action', function($row) use($user_id){
                $btn = '';
              
                if($row->clincial_id != '') {
                    if($row->clincial_id = $user_id) {
                        $btn .= '<a class="nav-link  d-flex align-items-center" id="clinical-tab" data-toggle="pill"
                        href="#clinical" role="tab" aria-controls="clinical" aria-selected="false">Upload Report</a>';
                        // $btn .= '<a class="upload-report" data-toggle="tooltip" data-placement="left" title="View Patient" data-original-title="View Patient Chart" id="' . $row->id . '">Upload Report</a>';
                    }
                } 
                
               return $btn;
            });
          
            return $datatble->rawColumns(['status','action'])->make(true);
    }

    public function getDuePatientDetail($id)
    {
        $dateBetween['today'] =  date('Y-m-d');
        
        $date = Carbon::createFromFormat('Y-m-d', $dateBetween['today'])->addMonth(2);
        $dateBetween['newDate'] = $date->format('Y-m-d');

        $patientData = PatientLabReport::whereBetween('due_date',[$dateBetween['today'],$dateBetween['newDate']])->where('user_id', $id)->with('labReportType')->orderBy('due_date', 'ASC')->get();

        return view('pages.patient_detail.view_patient_due_report', compact('patientData'));
    }
    public function updatePatientStatus(Request $request)
    {
        $clinicianService = new ClinicianService();
        $response = $clinicianService->updatePatientStatus($request->all());

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
           
            $data = User::whereHas('roles',function ($q){
                $q->where('name','clinician');
            })->whereIn('status', ['1', '2', '3', '5'])->select("id","first_name", 'last_name')
                ->where('first_name','LIKE',"%$search%")->orWhere('last_name', 'LIKE', "%$search%")
                ->get();
        }
       
        return response()->json($data);
    }

    public function getCityData($state_code)
    {
        $city = City::select('id', 'city', 'state_code')->where('state_code', $state_code)->orderBy('city','ASC')->get();
      
        if (count($city) > 0) {
            $arr = array("status" => 200, "msg" => "Success", "result" => $city);
        } else {
            $arr = array("status" => 400, "msg" => "This item has no any types.", "users" => []);
        }
        return \Response::json($arr);
    }

    public function getCity($city_name,Request $request)
    {
        $input = $request->all();
        $city = City::select('id', 'city', 'state_code')->where([['city', '=',$city_name],['state_code', '=', $input['state_code']]])->orderBy('city','ASC')->get();
        $state =   $state = State::select('id','state','state_code')->where('state_code', $input['state_code'])->orderBy('state','ASC')->get();
        
        if (count($city) > 0) {
            $arr = array("status" => 200, "msg" => "Success", "cities" => $city ,"states" => $state);
        } else {
            $arr = array("status" => 400, "msg" => "This item has no any types.", "users" => []);
        }
        return \Response::json($arr);
    }
    
    public function getStateData($state_code)
    {
        $state_code = explode("-",$state_code);

        $state = State::select('id','state','state_code')->where('state_code', $state_code[1])->orderBy('state','ASC')->get();
        
        if (count($state) > 0) {
            $arr = array("status" => 200, "msg" => "Success", "result" => $state);
        } else {
            $arr = array("status" => 400, "msg" => "This item has no any types.", "users" => []);
        }

        return \Response::json($arr);
    }

    public function getSelectStateData(Request $request)
    {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
           
            $data =State::select('id','state','state_code')->where('state','LIKE',"%$search%")->get();
        }
        
        return response()->json($data);
    }
    
    public function getSelectCityData(Request $request)
    {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            
            $data =City::select('id','city','state_code')->where('city','LIKE',"%$search%")->get();
        }
        
        return response()->json($data);
    }
}
