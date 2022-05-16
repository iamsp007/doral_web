<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\CaseManagement;
use App\Models\User;
Use Exception;

class SuperVisorController extends Controller
{
    protected $view_path='pages.supervisor.';

    public function index()
    {
        return view($this->view_path.'dashboard');
    }

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
    
    public function store(Request $request)
    {
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
}
