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
            $adminService = new class AdminService();
            $responseArray = $adminService->getAllAppointment();
            dd($responseArray);
            $apiToken = session('token');
            dd($apiToken);
            $url = CurlFunction::getURL().'/api/auth/appointment';
            $curlResponse = CurlFunction::withTokenGet($url, $apiToken);
            $responseArray = json_decode($curlResponse, true);
            //dd($responseArray);
            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data'];
            }
            $message = $responseArray['message'];

        } catch(\Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }
        return view('calendar');
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
