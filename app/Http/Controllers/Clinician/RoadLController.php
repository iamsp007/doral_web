<?php

namespace App\Http\Controllers\Clinician;

use App\Http\Controllers\Controller;
use App\Models\PatientRequest;
use App\Services\ClinicianService;
use Illuminate\Http\Request;

class RoadLController extends Controller
{
    protected $view_path='pages.clincian.';
    protected $clinicianService;

    public function __construct(ClinicianService $clinicianService){
        $this->clinicianService=$clinicianService;
    }
   
    public function index(Request $request)
    {
        $type='0';
        if ($request->has('type')){
            $type = $request->type;
        }
        $status = explode(",",$type);
        $roles = \Auth::user()->roles->pluck('id');
            $patientRequestLists = PatientRequest::with(['requests','detail','patient','requestType','patient_detail','ccrm'])
                ->where(function ($q) use ($status,$type){
                    if ($type!=='0'){
                        $q->whereIn('status',$status);
                    }
                })
                // ->whereIn('status',$status)
                ->whereNotNull('parent_id')
                // ->where(function ($q){
                //     $q->where('clincial_id','=',\Auth::user()->id)
                //         ->orWhere(function ($q){
                //            $q->whereNull('clincial_id')
                //                ->where('type_id','=',\Auth::user()->designation_id);
                //         });
                // })
                ->groupBy('parent_id')
                ->orderBy('id','asc')
                ->get();
                // dd($patientRequestLists);
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
        $response = $this->clinicianService->getVendorList($request->all());
        if ($response->status===true){
            $clinicianList = $response->data;
            return response()->json($clinicianList,200);
        }
        return response()->json($response,422);
    }

    public function getClinicianList(Request $request){
        $response = $this->clinicianService->getClinicianList($request->all());
        if ($response->status===true){
            $clinicianList = $response->data;
            return response()->json($clinicianList,200);
        }
        return response()->json($response,422);
    }
}
