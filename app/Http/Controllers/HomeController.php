<?php

namespace App\Http\Controllers;

use App\Models\PatientReferral;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $view_path='pages.';

    public function __construct(){

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function getPatientDetail(Request $request,$patient_id){

        $details = User::with('patientDetail')->find($patient_id);
        return view($this->view_path.'patient-detail',compact('details'));
    }
}
