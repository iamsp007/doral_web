<?php

namespace App\Http\Controllers\Clincian;

use App\Http\Controllers\Controller;
use App\Models\PatientRequest;
use App\Models\RoadlInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoadLController extends Controller
{
    protected $view_path='pages.clincian.';

    public function __construct(){

    }
    //
    public function index(){
        $patientRequestList = PatientRequest::with('patientDetail','ccrm')
            ->where([['status','=','active']])
            ->get();
        return view($this->view_path.'roadl',compact('patientRequestList'));
    }

    public function getPatientRequestList(Request $request){

        $patientList = PatientRequest::with('patientDetail','ccrm')
            ->get();

        return response()->json($patientList,200);
    }

    public function startRoadLRequest(Request $request){

        $patientRequestList = PatientRequest::with('patientDetail','ccrm')
            ->where([['clincial_id','=',Auth::user()->id],['status','=','active']])
            ->get();

        return view($this->view_path.'roadL_view',compact('patientRequestList'));
    }

    public function runningRoadLRequest(Request $request,$patient_request_id){
        return view($this->view_path.'roadL_running',compact('patient_request_id'));
    }

    public function getRoadLProccess(Request $request){
        $roadlProcess = RoadlInformation::where([['patient_requests_id','=',$request->patient_request_id]])
            ->whereIn('status',['running','complete','start'])
            ->get();
        return response()->json($roadlProcess,200);
    }
}
