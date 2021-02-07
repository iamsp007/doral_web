<?php

namespace App\Http\Controllers\Clinician;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\PatientReferral;
use App\Models\User;
use App\Services\ClinicianService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function cancelAppointmentRquest(){

        return view($this->view_path.'cancel-schedule');
    }

    public function getPatientList(Request $request){
        $patientList = User::with('patientDetail','roles')
            ->whereHas('roles',function ($q){
                $q->where('name','=','patient');
            })
            ->where('status','=','1')
            ->get();

        return DataTables::of($patientList)->make(true);
    }

    public function getNewPatientList(Request $request){

        $patientList = User::with('patientDetail','roles')
            ->whereHas('roles',function ($q){
                $q->where('name','=','patient');
            })
            ->whereHas('patientDetail',function ($q){
                $q->where('status','=','pending')->whereNotNull('first_name');
            });

        return  DataTables::of($patientList)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                if ($row->status==='0'){
                    $id=$row->id!==null?$row->id:null;
                    $btn ='';
                    if ($id!==null){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$id.'" data-original-title="Edit" class="edit btn btn-sm" style="background: #006c76; color: #fff" onclick="changePatientStatus(this,1)">Accept</a>';

                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$id.'" data-original-title="Delete" class="btn btn-sm" style="background: #eaeaea; color: #000" onclick="changePatientStatus(this,0)">Reject</a>';
                    }
                    return $btn;
                }
                return '-';
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
            ->addColumn('is_provider1', function ($user) {
                return Auth::user()->id===$user->provider1;
            })
            ->make(true);
    }

    public function cancelAppoimentList(Request $request){

        $clinicianService = new ClinicianService();
        $response = $clinicianService->cancelAppoimentList($request->all());
        $data=[];
        if ($response->status===true){
            $data=$response->data;
        }
        return  DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                if (!empty($row->meeting) && $row->meeting!==null){
                    $btn = '<a href="'.route('start.meeting',['appointment_id'=>$row->id]).'" id="meeting-btn-'.$row->id.'" target="_blank" class="btn btn-primary btn-vedio shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="Start Video" data-original-title="Start Meeting" aria-describedby="tooltip910346" style="display: none"><i class="las la-video"></i></a>';
                    $btn .= '<a href="'.route('patient.detail',['patient_id'=>$row->patients->id]).'" class="btn btn-primary btn-view shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="View Patient" data-original-title="View Patient Chart"><i class="las la-binoculars"></i></a>';

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

    public function changeAppointmentStatus(Request $request){
        $clinicianService = new ClinicianService();
        $response = $clinicianService->cancelAppointmentStatus($request->all());
        if ($response->status===true){
            return response()->json($response,200);
        }
        return response()->json($response,422);
    }

    public function patientRequest(Request $request){
        $clinicianService = new ClinicianService();
        $response = $clinicianService->patientRequest($request->all());
        if ($response->status===true){
            return response()->json($response,200);
        }
        return response()->json($response,422);
    }
}
