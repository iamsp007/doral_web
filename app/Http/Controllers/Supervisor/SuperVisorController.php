<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Services\SupervisorService;
use App\Models\PatientReferral;
use App\Models\CaseManagement;
Use Exception;



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
        // $supervisorService = new SupervisorService();
        // $response = $supervisorService->getPatientList($request->all());
        // //dd($response);
        // if ($response->status===true){
        //     return DataTables::of($response->data)
        //     ->editColumn('dob', function ($contact){
        //         if($contact->dob!='')
        //         return date('m-d-Y', strtotime($contact->dob));
        //         else
        //         return '--';
        //     })->make(true);
        // }
        // return DataTables::of($response)->make(true);
        $data = PatientReferral::getAccepted();
        return DataTables::of($data)->make(true);
    }
    public function case_management(Request $request){
        try
        {
            CaseManagement::insert($request->all()['arr_data']);
            return json_encode(array("status"=>'1','message'=>"Sucessfully assigned"));
               
        }
        catch(Exception $e)
        {
           return json_encode(array("status"=>0,'message'=>$e->getMessage()));
        }

    }
}
