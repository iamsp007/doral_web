<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Services\SupervisorService;
use App\Models\PatientReferral;
use App\Models\CaseManagement;
use App\Models\User;
Use Exception;



class SuperVisorController extends Controller
{
    protected $view_path='pages.supervisor.';

    public function __construct(){

    }

    public function index(){
        return view($this->view_path.'dashboard');
    }

    // public function viewNewPatients(){
    //     //$clinician_list = 
    //     return view($this->view_path.'new_patients_list');
    // }

    // public function getPatients(Request $request){
    //     // $supervisorService = new SupervisorService();
    //     // $response = $supervisorService->getPatientList($request->all());
    //     // if ($response->status===true){
    //     //     return DataTables::of($response->data)
    //     //     ->editColumn('dob', function ($contact){
    //     //         if($contact->dob!='')
    //     //         return date('m-d-Y', strtotime($contact->dob));
    //     //         else
    //     //         return '--';
    //     //     })->make(true);
    //     // }
    //     // return DataTables::of($response)->make(true);
    //     $data = PatientReferral::getAccepted();
    //     return DataTables::of($data)->make(true);
    // }
    public function viewClinician($id)
    {   
        $clinicians = User::
            whereHas('roles', function($q) {
                $q->where('name','=', 'clinician');
            })->select('id','first_name','last_name')->orderBy('first_name','ASC');
            
        $clinicians = $clinicians->get();
        $total = $clinicians->count();
        $patient_id = $id;
        
        return view('pages.supervisor.popup', compact('clinicians','total','patient_id'));
    }

    public function getClinician($id)
    {   
        $clinicians = User::where('id',$id)->select('id','first_name','last_name')->first();
       
        if (count($clinicians) > 0) {
            $arr = array("status" => 200, "msg" => "Success", "result" => $clinicians);
        } else {
            $arr = array("status" => 400, "msg" => "This item has no any types.", "result" => []);
        }
        return \Response::json($arr);
    }
    
    public function add_case_management(Request $request){
        try {
            if (isset($request['section'])) {
                if ($request['section'] === 'casemanager') {
                    CaseManagement::where('patient_id', $request['patient_id'])->update([
                        'flag' => '2',
                    ]);

                    CaseManagement::where('id', $request['care_team_id'])->update([
                        'flag' => '1',
                    ]);

                    $arr = ['status' => 200, 'message' => 'Change priority successfully.'];
                } else  if ($request['section'] === 'casemanager-texted') {
                    CaseManagement::where('id', $request['care_team_id'])->update([
                        'texted' => '1',
                    ]);
                }
            } else {
                $patients = explode(',',$request->patient_id);

                foreach ($patients as $patient) {
                    $caseManagement = new CaseManagement();
                    $caseManagement->patient_id = $patient;
                    $caseManagement->clinician_id = $request->clinician_id;
    
                    $caseManagement->save();
                }
                
                $arr = ['status' => 200, 'message' => 'Sucessfully assigned.'];
            }
        } catch(Exception $e) {
            $arr = ["status" => 400, "message" => $e->getMessage()];
        }

        return \Response::json($arr);
    }

    public function viewAssigedPatients(){
        return view($this->view_path.'assigned_patients_list');
    }

    public function getAssignedPatients(Request $request){

        $data = CaseManagement::getAccepted();
        return DataTables::of($data)->make(true);
    }

    public function remove_case_management(Request $request){
        try
        {
            CaseManagement::destroy($request->all()['arr_data']);
            return json_encode(array("status"=>'1','message'=>"Sucessfully removed"));
               
        }
        catch(Exception $e)
        {
           return json_encode(array("status"=>0,'message'=>$e->getMessage()));
        }

    }


    public function update_case_management(Request $request){
        try
        {
            CaseManagement::destroy($request->all()['arr_data']);
            return json_encode(array("status"=>'1','message'=>"Sucessfully removed"));
               
        }
        catch(Exception $e)
        {
           return json_encode(array("status"=>0,'message'=>$e->getMessage()));
        }

    }

}
