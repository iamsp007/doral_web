<?php

namespace App\Http\Controllers\Clincian;

use App\Http\Controllers\Controller;
use App\Models\PatientReferral;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PatientController extends Controller
{
    //
    protected $view_path='pages.clincian.';

    public function __construct(){

    }

    public function index(){

        return view($this->view_path.'patient');
    }

    public function newPatientRquest(){

        return view($this->view_path.'newpatient');
    }

    public function getPatientList(){

        $patientList = PatientReferral::with('detail')
            ->whereHas('detail',function ($q){
                $q->where('status','=','active');
            })
            ->get();
        return DataTables::of($patientList)
            ->make(true);
    }

    public function getNewPatientList(){

        $patientList = PatientReferral::with('detail')
            ->whereHas('detail',function ($q){
                $q->where('status','=','pending')
                    ->orWhere('status','=','reject');
            })->get();
        return DataTables::of($patientList)
            ->addIndexColumn()
            ->addColumn('action', function($row){

                if ($row->detail->status==='pending'){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->patient_id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm" onclick="changePatientStatus(this,1)">Accept</a>';

                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->patient_id.'" data-original-title="Delete" class="btn btn-danger btn-sm" onclick="changePatientStatus(this,0)">Reject</a>';

                    return $btn;
                }
                return '';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function changePatientStatus(Request $request){
        $this->validate($request,[
           'id'=>'required',
           'status'=>'required'
        ]);
        $status='active';
        if ($request->status===0){
            $status='reject';
        }

        $patient = User::find($request->id);
        if ($patient){
            $patient->status=$status;
            if($patient->save()){

                return response()->json(['message'=>'Change Patient Status Successfully!'],200);
            }
        }
        return response()->json(['message'=>'Something Went Wrong!'],422);
    }
}
