<?php

namespace App\Http\Controllers\Clinician;

use App\Http\Controllers\Controller;
use App\Models\PatientRequest;
use App\Models\Category;
use App\Models\DiesesMaster;
use App\Models\Referral;
use App\Models\User;
use App\Services\ClinicianService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SymptomsMaster;
use App\Models\Test;

class RoadLController extends Controller
{
    protected $view_path='pages.clincian.';
    protected $clinicianService;

    public function __construct(ClinicianService $clinicianService){
        $this->clinicianService=$clinicianService;
    }
   
    public function index(Request $request)
    {
        $user_id = '0';
        if ($request->has('user_id')){
            $user_id = $request->user_id;
        }

        $clinician_id = '0';
        if ($request->has('clinician_id')){
            $clinician_id = $request->clinician_id;
        }
        
        $type='0';
        if ($request->has('type')){
            $type = $request->type;
        }
        $status = explode(",",$type);
        $roles = Auth::user()->roles->pluck('id');
        $patientRequestLists = PatientRequest::with(['requests','detail','patient','requestType','patient_detail','ccrm'])
            ->where(function ($q) use ($status,$type){
                if ($type!=='0'){
                    $q->whereIn('status',$status);
                }
            })
            ->whereNotNull('parent_id')
            ->where(function ($q) use ($user_id){
                if ($user_id !== '0'){
                    $q->where('user_id','=',$user_id);
                }
            })
            ->where(function ($q) use ($clinician_id){
                if ($clinician_id !== '0'){
                    $q->where('clincial_id','=',$clinician_id);
                }
            })
            ->groupBy('parent_id')
            ->orderBy('id','desc')
            ->get();
            
            // $clinicianService = new ClinicianService();
            // $response = $clinicianService->getPatientRequestList($type);
        
        $patientRequestList=array();
        if (count($patientRequestLists)>0){
            $patientRequestList = $patientRequestLists;
        }
        return view($this->view_path.'roadl',compact('patientRequestList'));
    }

    public function getPatientRequestList(Request $request){

        $patientList = PatientRequest::with('patientDetail','ccrm')
            ->get();

        return response()->json($patientList,200);
    }

    public function startRoadLRequest(Request $request,$patient_request_id){

//        $patientRequestList = PatientRequest::with('patientDetail','ccrm')
//            ->where([['clincial_id','=',Auth::user()->id],['status','=','1']])
//            ->get();

        return view($this->view_path.'roadL_view',compact('patient_request_id'));
    }

    public function runningRoadLRequest(Request $request,$patient_request_id){
        return view($this->view_path.'roadL_running',compact('patient_request_id'));
    }
    
    public function updateDriveMode(Request $request){
        $patientRequest = PatientRequest::find($request['id'])->update(['driving_mode' => $request['driving_mode']]);
        return response()->json($patientRequest,200);
    }

    public function getRoadLProccess(Request $request){
        $response = $this->clinicianService->getRoadlProccessList($request->patient_request_id);
        if ($response->status===true){
            $routeList = $response->data;
            return response()->json($routeList,200);
        }
        return response()->json($response,422);
    }

    public function getNearByClinicianList(Request $request,$patient_request_id){

        $response = $this->clinicianService->getNearByClinicianList($patient_request_id);
        if ($response->status===true){
            $clinicianList = $response->data;
            return response()->json($clinicianList,200);
        }
        return response()->json($response,422);
    }

    public function getVendorList(Request $request){
       $vendorList = Referral::where('guard_name','=','partner')
            ->where('status','=','active')
            ->get();
        if ($request->has('parent_id')){
            $vendorList = collect($vendorList)->map(function ($row) use ($request){
                $check = PatientRequest::where('parent_id', $request->parent_id)
                    ->whereNotNull('parent_id')
                    ->where('type_id','=',$row->role_id)
                    // ->where('status','!=','1')
                    ->first();
                $row->check = $check;
                return $row;
            });
        }
        return $this->generateResponse(true,'Vendor List APi',$vendorList,200);
    }

 public function generateResponse($status = false, $message = NULL,  $data = array(), $statusCode = 200, $error = array(), $url = '')
    {
        $response["status"] = $status;
        $response["code"] = $statusCode;
        $response["message"] = $message;
        $response["data"] = $data;

        return response()->json($response, $statusCode);
    }
    
    public function getClinicianList(Request $request){
      
        $clinicianList = User::where([['designation_id','=',$request->role_id], ['status','=','1']])->get();
        // $clinicianList = User::where([['designation_id','=',$request->role_id], ['status','=','1'], ['is_available','=','1']])->get();

        $categories = Category::where('type_id',$request->role_id)->where('status',"1")->get();

        $dieses = DiesesMaster::where('status','=',1)->get();
        $data = [
            'clinicianList' => $clinicianList,
            'categories' => $categories,
            'dieses' => $dieses
        ];
        
        return $this->generateResponse(true,'Clinician List APi',$data,200);
   
    }

    public function getSubTestNameList(Request $request){
     
     
        
        $input = $request->all();
        $data = '';

        if (isset($input['patient_roles_name']) && isset($input['category_id'])) {
            $data = SymptomsMaster::where('dieser_id',$input['category_id'])->where('status',1)->get();
        } else if (isset($input['category_id'])) {
            $data = Test::with('subTestName')->whereIn('category_id',$input['category_id'])
            ->where('status',"1")
            ->get();
        }

        return $this->generateResponse(true,'Test List',$data,200);
    }

    public function getUserData(Request $request)
    {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            
            $data = User::whereHas('roles',function ($q){
                    $q->where('name','=','patient');
                })->whereHas('patientRequest')
                ->whereHas('demographic', function($q) {
                    $q->where('flag','1');
                })->select("id","first_name", 'last_name')
                ->where('first_name','LIKE',"%$search%")->orWhere('last_name', 'LIKE', "%$search%")
                ->get();
        }
       
        return response()->json($data);
    }

    public function getClinicianData(Request $request)
    {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            
            $data = User::whereHas('roles',function ($q){
                    $q->where('name','=','clinician');
                })->whereHas('clinicianRequest')->select("id","first_name", 'last_name')
                ->where('first_name','LIKE',"%$search%")->orWhere('last_name', 'LIKE', "%$search%")
                ->get();
        }
       
        return response()->json($data);
    }
}

