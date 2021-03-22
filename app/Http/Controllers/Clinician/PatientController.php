<?php

namespace App\Http\Controllers\Clinician;

use App\Http\Controllers\Controller;
use App\Models\CovidForm;
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

        return DataTables::of($patientList)
        ->editColumn('dob', function ($contact){
                if($contact->dob!='')
                return date('m-d-Y', strtotime($contact->dob));
                else
                return '--';
            })->editColumn('patient_detail.city', function ($contact){
                if($contact->city!='')
                return $contact->city;
                else
                return '--';
            })->editColumn('patient_detail.state', function ($contact){
                if($contact->state!='')
                return $contact->state;
                else
                return '--';
        })->editColumn('patient_detail.Zip', function ($contact){
                if($contact->Zip!='')
                return $contact->Zip;
                else
                return '--';
            })->editColumn('patient_detail.status', function ($contact){
                if($contact->zipcode!='')
                return $contact->status;
                else
                return '--';
               })->editColumn('patient_detail.service.name', function ($contact){
                if($contact->service!='')
                return $contact->service['name'];
                else
                return '--';
            })->editColumn('patient_detail.filetype.name', function ($contact){
                if($contact->filetype!='')
                return $contact->filetype['name'];
                else
                return '--';
            })->editColumn('patient_detail.gender', function ($contact){
                if($contact->gender!='')
                return $contact->gender;
                else
                return '--';
            })->make(true);
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
            ->editColumn('dob', function ($contact){
                if($contact->dob!='')
                return date('m-d-Y', strtotime($contact->dob));
                else
                return '--';
            })->editColumn('patient_detail.city', function ($contact){
                if($contact->city!='')
                return $contact->city;
                else
                return '--';
            })->editColumn('patient_detail.state', function ($contact){
                if($contact->state!='')
                return $contact->state;
                else
                return '--';
            })->make(true);
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
            })->editColumn('patients.dob', function ($user){
                 if($user->patients->dob!='')
                return date('m-d-Y', strtotime($user->patients->dob));
                else
                return '--';
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

    public function getNewPatientListData(Request $request)
    {
         $clinicianService = new ClinicianService();
         $response = $clinicianService->newpatientData($request->all());
         if ($response->status===true){
            return response()->json($response,200);
        }
        return response()->json($response,422);
    }

   public function getPatientListData(Request $request) {
     $clinicianService = new ClinicianService();
         $response = $clinicianService->patientData($request->all());
         if ($response->status===true){
            return response()->json($response,200);
        }
        return response()->json($response,422);
   }

   public function scheduleAppoimentListData(Request $request){

        $clinicianService = new ClinicianService();
        $response = $clinicianService->scheduleAppoimentListData($request->all());
        if ($response->status===true){
            return response()->json($response,200);
        }
        return response()->json($response,422);
    }

 public function cancelAppoimentListData(Request $request) {
     $clinicianService = new ClinicianService();
        $response = $clinicianService->cancelAppoimentListData($request->all());
        if ($response->status===true){
            return response()->json($response,200);
        }
        return response()->json($response,422);
 }

    /**
     * Covid 19 data table
     * 
     * @return \Illuminate\Http\Response
     */
    public function covid19()
    {
        return view($this->view_path.'covid-19-datatable');
    }

    /**
     * Covid 19 data will display
     * 
     * @return \Illuminate\Http\Response
     */
    public function covid19PatientList()
    {
        $patientList = CovidForm::all();

        return  DataTables::of($patientList)
            ->addIndexColumn()
            ->addColumn('pdf', function(){
                return env('APP_URL')."pdf/new.pdf";
            })
            ->rawColumns(['pdf'])->make(true);

        $clinicianService = new ClinicianService();
        $response = $clinicianService->getCovid19PatientList();
        if ($response->status===true){
            return response()->json($response,200);
        }
        return response()->json($response,422);
    }
}
