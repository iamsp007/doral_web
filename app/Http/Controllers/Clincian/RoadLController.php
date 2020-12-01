<?php

namespace App\Http\Controllers\Clincian;

use App\Http\Controllers\Controller;
use App\Models\PatientRequest;
use Illuminate\Http\Request;

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
}
