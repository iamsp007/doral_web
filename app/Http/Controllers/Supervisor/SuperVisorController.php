<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Services\SupervisorService;

class SuperVisorController extends Controller
{
    protected $view_path='pages.supervisor.';

    public function __construct(){

    }

    public function index(){
        return view($this->view_path.'dashboard');
    }

    public function viewPatients(){
        return view($this->view_path.'patients');
    }

    public function getPatients(Request $request){
        $supervisorService = new SupervisorService();
        $response = $supervisorService->getPatientList($request->all());
        dd($response);
        if ($response->status===true){
            return DataTables::of($response->data)->make(true);
        }
        return DataTables::of($response)->make(true);
    }
}
