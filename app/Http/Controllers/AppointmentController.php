<?php

namespace App\Http\Controllers;
use Session;
use App\Models\Appointment;
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
        //Session::put('token', "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MjQ0NDU4NC0wNzk1LTQwNDYtYTBjMi0zMTM2M2U4OGJjZjciLCJqdGkiOiI2MDFjNTk0YzQ1NjZkNWE1MGZmOGE3NzBiODFkNWQ5YzRiNjY3ODEwZjE1ZDViMzllYzAzODZjOGRhMDdmZmQ3NWJmMzkzMWQzNWYyNWE5MyIsImlhdCI6MTYwODQ5Mjc1OCwibmJmIjoxNjA4NDkyNzU4LCJleHAiOjE2MjQyMTc1NTcsInN1YiI6IjUiLCJzY29wZXMiOltdfQ.TvBd4KV6ZyEZDOLLhTYuQWANZnEqHqD9dspPJVMahQVXG8P1b2des18NHk8Kdr22Slotzba4Jv0IxaqYM-W2yPh2ebwSr0wBhiSN66fabFipyehhukjmc0Tjgc3phOW_jetEKhrQBLUlGQg2HFieeypM6B3H21afxLk05FgrmRdxcv8o2t1hEVeZnhl20H_dvKr8yyYUv5eb-Y_9xRFiOfTosAC4dr6-bUQgIfR705X57VJs72BzNwNJt6vc2mWJ6Z-HeSD5nYZRN2n2MsqYMY8Y1oiQOSsR1E3kMn795q1Ha5pDXK5TL4IyuOuNzRGAFAX4CBJdlz2PnIB3msmjzmHONtxG-D2l2I4XQ7DknULqXlDsyAyr22ZQPt1VvU-xXNpy69XaGbpISJ7DuR3CkiIIA1No_YzLpPrXyFHhn8-sVQjP9Q7OeTfClTYs3tMPiYdeZ2zoNmXnhN8gJFrxJ-3xOQ7WUczCY6daELdw11utv39M1s-pLqc0btN6Rpuhq4k0c8k1lYkYotLNAUIOxiMbofPxx_d74iPO4APG31CHj9M0OodkhzZBhRFsI0SyOZcKVh-7W0ogMw7mKRYU3WQVuTVsqdVk-trS9Kd7iDeVku2nl5zoGxxDHJFP4vsln358nK22ZqqeIfZ93dqmHMZFE1gmEQnB8d052FXSim0");
        $status = 0;
        $message = "";
        $appointments = [];
        try {
            $apiToken = session('token');                        
            $url = CurlFunction::getURL().'/api/auth/appointment';
            $curlResponse = CurlFunction::withTokenGet($url, $apiToken);
            $responseArray = json_decode($curlResponse, true);            
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
            'appointments' => $appointments
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
            $apiToken = session('token');                        
            $url = CurlFunction::getURL().'/api/auth/service';            
            $curlResponse = CurlFunction::withTokenGet($url, $apiToken);
            $responseArray = json_decode($curlResponse, true);

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
