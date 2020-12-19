<?php

namespace App\Http\Controllers\Coordinator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoordinatorController extends Controller
{
    protected $view_path='pages.coordinator.';

    public function __construct(){

    }

    public function index(){
        return view($this->view_path.'dashboard');
    }

    public function patientListShow(){
        return view($this->view_path.'patient-list');
    }

    public function getPatientList(Request $request){

    }
}
