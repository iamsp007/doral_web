<?php

namespace App\Http\Controllers\Coordinator;

use App\Http\Controllers\Controller;
use App\Services\AdminService;
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
        return view($this->view_path.'patient');
    }

    public function getPatientList(){
        $adminServices = new AdminService();
        $response = $adminServices->getAppointment();

        $data=array();
        if ($response['status']===true){
            $data=$response['data'];
            return response()->json($data,200);
        }

        return response()->json($data,422);
    }
}
