<?php

namespace App\Http\Controllers\Clinician;

use App\Events\SendClinicianPatientRequestNotification;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SmsController;
use App\Models\Appointment;
use App\Models\Category;
use App\Models\CovidForm;
use App\Models\DiesesMaster;
use App\Models\NotificationHistory;
use App\Models\Patient;
use App\Models\PatientReferral;
use App\Models\PatientRequest;
use App\Models\SymptomsMaster;
use App\Models\Test;
use App\Models\User;
use App\Services\ClinicianService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Nexmo\Laravel\Facade\Nexmo;
use Mail;
use App\Http\Requests\PatientRequest as PatientRequestValidation;
use App\Helpers\Helper;
use App\Models\RoadlRequestTo;

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
            })->whereHas('demographic', function($q) {
                $q->where('flag','1');
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
            })->whereHas('demographic', function($q) {
                $q->where('flag','1');
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
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$id.'" data-original-title="Accept" class="edit btn btn-sm" style="background: #006c76; color: #fff" onclick="changePatientStatus(this,1)">Accept</a>';

                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$id.'" data-original-title="Reject" class="btn btn-sm" style="background: #eaeaea; color: #000" onclick="changePatientStatus(this,0)">Reject</a>';
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

        $appointmentList = Appointment::with(['bookedDetails' => function ($q) {
                $q->select('first_name', 'last_name', 'id');
            }])
            ->with(['patients','meeting','service','filetype','roadl'])
            ->with(['provider1Details' => function ($q) {
                $q->select('first_name', 'last_name', 'id');
            }])
            ->with(['provider2Details' => function ($q) {
                $q->select('first_name', 'last_name', 'id');
            }])
            ->whereDate('start_datetime','>=',Carbon::now()->format('Y-m-d'))
            ->orderBy('start_datetime','asc')
            ->get()->toArray();

        return  DataTables::of($appointmentList)
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

        $appointmentList = Appointment::with(['bookedDetails' => function ($q) {
            $q->select('first_name', 'last_name', 'id');
        }])
        ->with(['patients','cancelAppointmentReasons','service','filetype','cancelByUser'])
        ->with(['provider1Details' => function ($q) {
            $q->select('first_name', 'last_name', 'id');
        }])
        ->with(['provider2Details' => function ($q) {
            $q->select('first_name', 'last_name', 'id');
        }])
        ->where('status','=','cancel')
        ->orderBy('start_datetime','desc')
        ->get()->toArray();

        return  DataTables::of($appointmentList)
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

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequestValidation $request)
    {

        try {
            $check = PatientRequest::where('user_id', $request->user_id)
                ->where('type_id','=',$request->type_id)
                ->whereIn('status', ['1','2','3','6','7'])->count();

            if ($check>0){
                if (isset($request['roadlStatus']) && $request['roadlStatus'] == 'multipleRequest') {
                    $response = [
                        'message' => 'Already Create This Request',
                    ];

                    return $response;
                } else {
                    return $this->generateResponse(false,'Already Create This Request',null,200);
                }
            }

            if ($request->patient_id) {
                $latlong = $this->getLatlong($request->patient_id);
                $request['latitude'] = $latlong['latitude'];
                $request['longitude'] = $latlong['longitude'];
            }

            $request_id = Auth::user()->id;
            $patientRequest = PatientRequest::where('user_id', $request->patient_id)->whereNull('parent_id')->where('status', '1')->first();

            if(! $patientRequest) {

                $patient = new PatientRequest();
                $patient->user_id = $request->user_id;
                $patient->requester_id = $request_id;
                $patient->latitude = $request->latitude;
                $patient->longitude = $request->longitude;
                $patient->reason = $request->reason;
                $patient->save();

                $patientSecond = new PatientRequest();

                $patientSecond->user_id = $request->user_id;
                $patientSecond->requester_id = $request_id;
                $patientSecond->type_id = $request->type_id;
                $patientSecond->latitude = $request->latitude;
                $patientSecond->longitude = $request->longitude;
                $patientSecond->reason = $request->reason;

               if($request->has('test_name')){
                    $patientSecond->test_name=$request->test_name;
                }

                if($request->has('sub_test_name')){
                    $patientSecond->sub_test_name=$request->sub_test_name;
                }

                if($request->has('dieses')){
                    $patientSecond->dieses=$request->dieses;
                }

                if($request->has('symptoms')){
                    $patientSecond->symptoms=$request->symptoms;
                }
                if($request->has('is_parking')){
                    $patientSecond->is_parking=$request->is_parking;
                }

                if(isset($request->clinician_list_id) && $request->clinician_list_id !='' && $request->clinician_list_id !=0) {
                    $patientSecond->clincial_id = $request->clinician_list_id;
                }
                $patientSecond->parent_id = $patient->id;

                $patientSecond->save();
                $parent_id=$patient->id;

                $notificationHistory = new NotificationHistory();
                $notificationHistory->type = 'RoadL Request';
                $notificationHistory->sender_id = $request->user_id;
                $notificationHistory->request_id = $patientSecond->id;
                $notificationHistory->model_type = PatientRequest::class;
                $notificationHistory->status = 'active';

                $notificationHistory->save();
            } else {
                $patientSecond = new PatientRequest();

                $patientSecond->user_id = $request->user_id;
                $patientSecond->requester_id = $request_id;
                $patientSecond->type_id = $request->type_id;
                $patientSecond->latitude = $request->latitude;
                $patientSecond->longitude = $request->longitude;
                $patientSecond->reason = $request->reason;
                if($request->has('test_name')){
                    $patientSecond->test_name=$request->test_name;
                }
                if($request->has('sub_test_name')){
                    $patientSecond->sub_test_name=$request->sub_test_name;
                }
                if($request->has('dieses')){
                    $patientSecond->dieses=$request->dieses;
                }
                if($request->has('symptoms')){
                    $patientSecond->symptoms=$request->symptoms;
                }
                if($request->has('is_parking')){
                    $patientSecond->is_parking=$request->is_parking;
                }
                $patientSecond->parent_id = $patientRequest->id;

                if(isset($request->clinician_list_id) && $request->clinician_list_id !='' && $request->clinician_list_id !=0) {
                    $patientSecond->clincial_id = $request->clinician_list_id;
                }

                $patientSecond->save();
                $parent_id=$patientRequest->id;

                $notificationHistory = new NotificationHistory();
                $notificationHistory->type = 'RoadL Request';
                $notificationHistory->sender_id = $request->user_id;
                $notificationHistory->request_id = $patientSecond->id;
                $notificationHistory->model_type = PatientRequest::class;
                $notificationHistory->status = 'active';

                $notificationHistory->save();
            }

            // If assign clinician
            $checkAssignId = '';
            if($request->clinician_list_id !='' && $request->clinician_list_id !=0) {
                $checkAssignId = $request->clinician_list_id;
            }

            if($checkAssignId == '') {

                if($request->type_id == 4) {
                    $clinicianIds = User::with('roles')
                    ->whereHas('roles',function($q){
                        $q->where('name','=','clinician');
                    })
                    //->where('is_available','=','1')
                    ->get();

                } else if($request->type_id == 6) {
                    $clinicianIds = User::with('roles')
                    ->whereHas('roles',function($q) use($request){
                        $q->where('id','=', '18');
                    })
                    //->where('is_available','=','1')
                    ->get();

                } else if($request->type_id == 7) {
                    $clinicianIds = User::with('roles')
                    ->whereHas('roles',function($q) use($request){
                        $q->where('id','=', '19');
                    })
                    //->where('is_available','=','1')
                    ->get();

                } else if($request->type_id == 8) {
                    $clinicianIds = User::with('roles')
                    ->whereHas('roles',function($q) use($request){
                        $q->where('id','=', '20');
                    })
                    //->where('is_available','=','1')
                    ->get();

                } else if($request->type_id == 9) {
                    $clinicianIds = User::with('roles')
                    ->whereHas('roles',function($q) use($request){
                        $q->where('id','=', '21');
                    })
                    //->where('is_available','=','1')
                    ->get();

                } else if($request->type_id == 10) {
                    $clinicianIds = User::with('roles')
                    ->whereHas('roles',function($q) use($request){
                        $q->where('id','=', '22');
                    })
                    ->where('is_available','=','1')->get();

                } else if($request->type_id == 11) {
                    $clinicianIds = User::with('roles')
                    ->whereHas('roles',function($q) use($request){
                        $q->where('id','=', '23');
                    })
                    //->where('is_available','=','1')
                    ->get();

                } else if($request->type_id == 12) {
                    $clinicianIds = User::with('roles')
                    ->whereHas('roles',function($q) use($request){
                        $q->where('id','=', '24');
                    })
                    //->where('is_available','=','1')
                    ->get();
                } else if($request->type_id == 2) {
                    $clinicianIds = User::with('roles')->where('designation_id','=', '9')
                    ->whereHas('roles',function($q) use($request){
                        $q->where('name','=','clinician');
                    })
                    //->where('is_available','=','1')
                    ->get();
                } else if($request->type_id == 1) {
                    $clinicianIds = User::with('roles')->where('designation_id','=', '1')
                    ->whereHas('roles',function($q) use($request){
                        $q->where('name','=','clinician');
                    })
                    //->where('is_available','=','1')
                    ->get();
                }

                $markers = collect($clinicianIds)->map(function($item) use ($request){
                    $item['distance'] = $this->calculateDistanceBetweenTwoAddresses($item->latitude, $item->longitude, $request->latitude,$request->longitude);
                    return $item;
                })
                // ->where('distance','<=',20)
                ->pluck('id');

                $clinicianList = User::whereIn('id',$markers)->get();

            }else {
                $clinicianList = User::where('id',$checkAssignId)->get();
            }


            foreach ($clinicianList as $key => $list) {
                RoadlRequestTo::create([
                    'patient_request_id' => $patientSecond->id,
                    'clinician_id' => $list->id,
                ]);
            }

            $data = PatientRequest::with('detail','patient','requests')
                ->where('id','=',$patientSecond->id)
                ->first();


                event(new SendClinicianPatientRequestNotification($data,$clinicianList));

                $smsController = new SmsController();
                $smsController->sendSms($data,'1');

                if (isset($request['roadlStatus']) && $request['roadlStatus'] == 'multipleRequest') {
                    $response = [
                        'message' => 'Add Request Successfully!!',
                        'parent_id' => $parent_id,
                        'data' => $data,
                    ];

                    return $response;
                } else {
                 	$response = [
                        'data' => $data,
                        'parent_id' => $parent_id,
                    ];

                    return $this->generateResponse(true,'Add Request Successfully!',$response,200);
                }

        } catch (Exception $exception){
            return $this->generateResponse(false,$exception->getMessage());
        }
    }

    public function getLatlong($patient_id)
    {
        $details = User::with('demographic')->find($patient_id);

        if (isset($details->demographic->address) && $details->demographic){
            $addresses=$details->demographic->address;
            $address='';
            if (isset($addresses['address1'])){
                $address.=$addresses['address1'];
            }
            if (isset($addresses['address2'])){
                $address.=$addresses['address2'];
            }
            if (isset($addresses['city'])){
                $address.=','.$addresses['city'];
            }
            if (isset($addresses['state'])){
                $address.=','.$addresses['state'];
            }
            if (isset($addresses['country'])){
                $address.=','.$addresses['country'];
            }
            if (isset($addresses['zip'])){
                $address.=','.$addresses['zip'];
            }
            $helper = new Helper();
            $response = $helper->getLatLngFromAddress($address);
            if ($response->status==='REQUEST_DENIED'){
                $latitude=$details->latitude;
                $longitude=$details->longitude;
            }else{
                $latitude=$response->results[0]->geometry->location->lat;
                $longitude=$response->results[0]->geometry->location->lng;
            }
        }else{
            $latitude=$details->latitude;
            $longitude=$details->longitude;
        }
        return [
            'latitude' => $latitude,
            'longitude' => $longitude
        ];
    }

    public function calculateDistanceBetweenTwoAddresses($lat1, $lon1, $lat2, $lon2, $unit="K"){
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }

    public function patientRequest(PatientRequestValidation $request)
    {
        if (isset($request->test_name)) {
            if (isset($request->patient_roles_name)) {
                $test_name = DiesesMaster::whereIn('id',$request->test_name)->get()->pluck('name')->toArray();
                if ($test_name) {
                    $request['test_name'] = implode(",",$test_name);
                }
            } else {
                $test_name = Category::whereIn('id',$request->test_name)->get()->pluck('name')->toArray();
                if ($test_name) {
                    $request['test_name'] = implode(",",$test_name);
                }
            }
        } else {
            $request['test_name'] = '';
        }

        if (isset($request->sub_test_name)) {
            if (isset($request->patient_roles_name)) {
                $sub_test_name = SymptomsMaster::whereIn('id',$request->sub_test_name)->get()->pluck('name')->toArray();
                if ($sub_test_name) {
                    $request['sub_test_name'] = implode(",",$sub_test_name);
                }
            } else {
                $sub_test_name = Test::whereIn('id',$request->sub_test_name)->get()->pluck('name')->toArray();
                if ($sub_test_name) {
                    $request['sub_test_name'] = implode(",",$sub_test_name);
                }
            }
        } else {
            $request['sub_test_name'] = '';
        }

         try {
            $user_ids = explode(",",$request->user_id);

            $parentIds = [];
            foreach ($user_ids as $key => $user_id) {

                $request['user_id'] = $user_id;
                $request['patient_id'] = $user_id;
                $request['roadlStatus'] = 'multipleRequest';
                $res_array = $this->store($request);

                $parentIds = isset($res_array['parent_id']) ? $res_array['parent_id'] : '';
                $requestData = isset($res_array['data']) ? $res_array['data'] : '';
                $message = $res_array['message'];
            }

            return $this->generateResponse(true,$message,['parent_id'=>$parentIds, 'requestData' => $requestData],200);

        } catch (Exception $exception){
            return $this->generateResponse(false,$exception->getMessage());
        }
    }

    public function generateResponse($status = false, $message = NULL,  $data = array(), $statusCode = 200, $error = array(), $url = '')
    {
        $response["status"] = $status;
        $response["code"] = $statusCode;
        $response["message"] = $message;
        $response["data"] = $data;

        return response()->json($response, $statusCode);
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

   public function scheduleAppoimentListData(Request $request)
   {
        $requestData = $request->all();
        $appointmentList = Appointment::with(['bookedDetails' => function ($q) {
                $q->select('first_name', 'last_name', 'id');
            }])
            ->with(['meeting','service','filetype','roadl'])
            ->with(['patients' => function ($q) use($requestData) {
                $q->where(DB::raw('concat(first_name," ",last_name)'), 'like', '%'.$requestData['searchTerm'].'%');
            }])

            ->with(['provider1Details' => function ($q) {
                $q->select('first_name', 'last_name', 'id');
            }])
            ->with(['provider2Details' => function ($q) {
                $q->select('first_name', 'last_name', 'id');
            }])
            ->whereDate('start_datetime','>=',Carbon::now()->format('Y-m-d'))
            ->orderBy('start_datetime','asc')
            ->get()->toArray();

        return $this->generateResponse(true,'get schedule patient list',$appointmentList,200);
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
        $patientList = CovidForm::with('clinician')->get();

        return  DataTables::of($patientList)
            ->addIndexColumn()
            // ->addColumn('pdf', function(){
            //     return env('APP_URL')."pdf/new.pdf";
            // })
            ->addColumn('full_name', function($q){
                $fullName = '';
                if ($q->clinician) {
                    $fullName = $q->clinician->full_name;
                }
                return $fullName;
            })
            ->addColumn('action', function($row){
                $btn = '<a onclick="return popEmail('.$row->id.')" class="btn btn-info btn-sm mr-2" target="__blank">Email</a>';

                $btn .= '<a onclick="return popText('.$row->id.')" class="btn btn-info btn-sm mr-2" target="__blank">Text</a>';

                $btn .= '<a href="'.route('clinician.covid-19.info',['id'=>$row->id]).'" class="btn btn-primary btn-sm mr-2" target="__blank">View</a>';

                $btn .= '<a href="'.route('clinician.covid-19.remove',['id'=>$row->id]).'" class="btn btn-warning btn-sm">Remove</a>';

                return $btn;
            })
            ->rawColumns(['action'])->make(true);

        $clinicianService = new ClinicianService();
        $response = $clinicianService->getCovid19PatientList();
        if ($response->status===true){
            return response()->json($response,200);
        }
        return response()->json($response,422);
    }

    /**
     * Covid 19 data will display
     *
     * @return \Illuminate\Http\Response
     */
    public function covid19Info($id)
    {
        $patient = CovidForm::find($id);

        $data = $patient->data;

        return view($this->view_path.'covid-form', compact('patient', 'data'));
    }

    /**
     * Covid 19 data will remove
     *
     * @return \Illuminate\Http\Response
     */
    public function covid19Remove($id)
    {
        $patient = CovidForm::find($id);

        if ($patient->delete()) {
            return redirect()->back();
        }
    }

    public function sendEmail(Request $request)
    {
        try {
            $patient = CovidForm::find($request->id);

            $url = env('APP_URL').'covid-19/'.$patient->id.'/detail';

            $response = Mail::send([], [], function ($message) use ($request, $patient, $url) {
                $message->to($request->email)
                    ->subject(env('APP_NAME'))
                    ->setBody('COVID-19 report of '.$patient->patient_name.'. Here is the report: <a href='.$url.'>'.$url.'</a>', 'text/html');
            });

            return response()->json($response, 200);
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }

    public function sendMessage(Request $request)
    {
        try {
            $patient = CovidForm::find($request->id);

            $sendSms = Nexmo::message()->send([
                'to' => setPhone($request->phone),
                'from' => env('APP_NAME'),
                'text' => 'COVID-19 report of '.$patient->patient_name.'. Here is the report: '.env('APP_URL').'covid-19/'.$patient->id.'/detail'
            ]);

            $response = $sendSms->getResponseData();

            return response()->json($response, 200);
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }

    // Add New Patient Form
    public function addNewPatient(){
        return view('pages.patient_detail.add_new');
    }
    public function calendarAppoimentListData(){

        // $clinicianService = new ClinicianService();
        // $response = $clinicianService->calendarAppoimentListData();
        // return view($this->view_path.'calendar', compact('response', 'response'));

        $response = Appointment::select(DB::raw('count(*) as total'),DB::raw('DATE_FORMAT(start_datetime, "%Y-%m-%d") as start_datetime'),DB::raw('DATE_FORMAT(end_datetime, "%Y-%m-%d") as end_datetime'))->with(['bookedDetails' => function ($q) {
            }])
        ->whereDate('start_datetime','>=',Carbon::now()->format('Y-m-d'))
        ->groupby('start_datetime','end_datetime')
        ->orderBy('start_datetime','asc')
        ->get()->toArray();

        return view($this->view_path.'calendar', compact('response'));
    }
}