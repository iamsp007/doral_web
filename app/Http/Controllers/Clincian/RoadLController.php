<?php

namespace App\Http\Controllers\Clincian;

use App\Http\Controllers\Controller;
use App\Models\PatientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoadLController extends Controller
{
    protected $view_path='pages.clincian.';

    public function __construct(){

    }
    //
    public function index(){

        return view($this->view_path.'roadl');
    }

    public function getPatientRequestList(Request $request){

        $patientList = PatientRequest::with('patientDetail','ccrm')
            ->get();

        return response()->json($patientList,200);
    }

    public function startRoadLRequest(Request $request){

        $patientRequestList = PatientRequest::with('patientDetail','ccrm')
            ->where([['clincial_id','=',Auth::user()->id],['is_active','=','1']])
            ->get();

        return view($this->view_path.'roadL_view',compact('patientRequestList'));
    }
}
