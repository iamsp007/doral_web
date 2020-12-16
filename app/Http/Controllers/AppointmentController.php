<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use App\Models\CurlModel\CurlFunction;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $employeeServices = new EmployeeService();
            $responseArray = $employeeServices->getAllAppointment();
            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data'];                
                $appointments = [];
                foreach($record['appointments'] as $key => $val) {
                    $appointment[$key]['title'] = $val['title'];
                    $appointment[$key]['start'] = $val['start_datetime'];
                    $appointment[$key]['end'] = $val['end_datetime'];
                    $appointment[$key]['color'] = '';
                    $appointment[$key]['url'] = '';
                }
            }
            $message = $responseArray['message'];
            $appointment = json_encode($appointment);             
        } catch(\Exception $e) {
            $status = 0;
            $message = $e->getMessage();
            
        }
        return view('pages.appoinment.calendar')->with(['record'=> $appointment, 'message'=>$message]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.appoinment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
