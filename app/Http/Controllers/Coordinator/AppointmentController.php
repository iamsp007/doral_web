<?php
namespace App\Http\Controllers\Coordinator;

use App\Http\Controllers\Controller;
use Session,Auth;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\CurlModel\CurlFunction;
use App\Services\EmployeeService;

class AppointmentController extends Controller
{
    protected $view_path = 'pages.coordinator.';

    public function __construct()
    {
    }

    public function index( $patientId )
    {

        $status = 0;
        $message = "";
        $appointments = [];
        $data =array(
            'appointments' => $appointments,
            'patientId' => $patientId,
        );
        return view($this->view_path . 'appointment',compact('appointments','patientId'));
        //return view('calendar')->with( $data );
    }

    public function getClinicianTimeSlots(Request $request){
        try {
            $employeeServices = new EmployeeService();
            $response = $employeeServices->getClinicianTimeSlots($request->all());
            return response()->json(['status'=>$response->status,'message'=>$response->message,'data'=>$response->data],200);
        }catch (\Exception $exception){
            return response()->json(['status'=>false,'message'=>$exception->getMessage()],422);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request )
    {

        $all_get = $request->all();
        $services = [];
        try {
            $employeeServices = new EmployeeService();
            $responseArray = $employeeServices->getAllService();
            if( isset( $responseArray[0] ) && $responseArray[0] && isset( $responseArray[2]['services'] )) {
                foreach ($responseArray[2]['services'] as $ser_key => $ser_row) {
                    $services[ $ser_key ]['id'] = $ser_row['id'];
                    $services[ $ser_key ]['name'] = $ser_row['name'];
                }
            }
        } catch(\Exception $e) {
            $message = $e->getMessage();
        }

        $data = $all_get;
        $data['services'] = $services;
        return view($this->view_path . 'appointment.create')->with( $data );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {

        try {
            $employeeServices = new EmployeeService();
            $response = $employeeServices->storeAppointment($request->all());
            if ($response->status===true){
                return response()->json($response,200);
            }
            return response()->json($response,422);
        } catch (\Exception $e) {

            return response()->json(['status'=>false,'message'=>$e->getMessage()], 422);
        }
    }
}
