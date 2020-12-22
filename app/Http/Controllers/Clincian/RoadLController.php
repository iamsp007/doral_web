<?php

namespace App\Http\Controllers\Clincian;

use App\Http\Controllers\Controller;
use App\Models\PatientRequest;
use App\Models\RoadlInformation;
use App\Services\ClinicianService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoadLController extends Controller
{
    protected $view_path='pages.clincian.';
    protected $clinicianService;

    public function __construct(ClinicianService $clinicianService){
        $this->clinicianService=$clinicianService;
    }
    //
    public function index(){

        $clinicianService = new ClinicianService();
        $response = $clinicianService->getPatientRequestList();
        $patientRequestList=array();
        if ($response->status===true){
            $patientRequestList = $response->data;
        }
        return view($this->view_path.'roadl',compact('patientRequestList'));
    }

    public function getPatientRequestList(Request $request){

        $patientList = PatientRequest::with('patientDetail','ccrm')
            ->get();

        return response()->json($patientList,200);
    }

    public function startRoadLRequest(Request $request,$patient_request_id){

//        dd($patient_request_id);
//        $patientRequestList = PatientRequest::with('patientDetail','ccrm')
//            ->where([['clincial_id','=',Auth::user()->id],['status','=','active']])
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
}
