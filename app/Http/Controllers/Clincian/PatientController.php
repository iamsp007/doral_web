<?php

namespace App\Http\Controllers\Clincian;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\PatientReferral;
use App\Models\User;
use App\Services\ClinicianService;
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

    public function scheduleAppointmentRquest(){

        return view($this->view_path.'schedule');
    }

    public function getPatientList(Request $request){
        $clinicianService = new ClinicianService();
        $response = $clinicianService->getPatientList($request->all());
        if ($response->status===true){
            return DataTables::of($response->data)->make(true);
        }
        return DataTables::of($response)->make(true);
    }

    public function getPatientDetail(Request $request,$patient_id){

        $patient_detail = PatientReferral::find($patient_id);
//        dd($patient_detail);
        return view($this->view_path.'patient-detail',compact('patient_detail'));
    }

    public function getNewPatientList(Request $request){

        $clinicianService = new ClinicianService();
        $response = $clinicianService->getNewPatientList($request->all());
        $data=[];
        if ($response->status===true){
            $data=$response->data;
        }
        return  DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){

                if ($row->detail->status==='0'){
                    $btn = '<a href="#accept" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm" onclick="changePatientStatus(this,1)">Accept</a>';

                    $btn = $btn.' <a href="#reject" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm" onclick="changePatientStatus(this,0)">Reject</a>';

                    return $btn;
                }
                return '';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function scheduleAppoimentList(Request $request){

        $clinicianService = new ClinicianService();
        $response = $clinicianService->scheduleAppoimentList($request->all());
        $data=[];
        if ($response->status===true){
            $data=$response->data;
        }
        return  DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){

                if ($row->detail->status==='0'){
                    $btn = '<a href="#accept" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm" onclick="changePatientStatus(this,1)">Accept</a>';

                    $btn = $btn.' <a href="#reject" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm" onclick="changePatientStatus(this,0)">Reject</a>';

                    return $btn;
                }
                return '';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function changePatientStatus(Request $request){
        $clinicianService = new ClinicianService();
        $response = $clinicianService->changePatientStatus($request->all());
        if ($response->status===true){
            return response()->json($response,200);
        }
        return response()->json($response,422);
    }
}
