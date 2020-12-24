<?php

namespace App\Http\Controllers;
use Session,Auth;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\CurlModel\CurlFunction;
use App\Services\EmployeeService;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $patientId )
    {
        
        $status = 0;
        $message = "";
        $appointments = [];        
        try {
            $employeeServices = new EmployeeService();
            $responseArray = $employeeServices->getAllAppointment();
            if($responseArray['status'] && isset( $responseArray['data']['appointments'] )) {
                $status = 1;
                foreach ($responseArray['data']['appointments'] as $app_key => $app_row) {
                    $appointments[ $app_key ]['title'] = $app_row['title'];
                    $appointments[ $app_key ]['start'] = $app_row['start_datetime'];
                    $appointments[ $app_key ]['end'] = $app_row['end_datetime'];
                    
                }
            }

            $message = $responseArray['message'];

        } catch(\Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }
        $data =array(
            'appointments' => $appointments,
            'patientId' => $patientId,
        );        
        return view('calendar')->with( $data );
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
        return view('pages.appoinment.create')->with( $data );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        /*$request->validate([
            'title' => 'required',
            'start_datetime' => 'required',
            'end_datetime' => 'required',
            //'booked_user_id' => 'required',
            'patient_id' => 'required',
            'provider_pa_ma' => 'required', 
            'provider' => 'required',
            'service_id' => 'required'            
        ]);*/
        try {
            $post_data = $request->all();
            $employeeServices = new EmployeeService();
            return $responseArray = $employeeServices->storeAppointment( $post_data );
        } catch (\Exception $e) {            
            $response = array(
                "status" => false,
                "code" => 200,
                "message" => $e->getMessage(),
                "data" => [],
            );
            return response()->json($response, 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
