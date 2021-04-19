<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;
use Exception;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $post_data = $request->all();
            $employeeServices = new EmployeeService();
            $response = $employeeServices->sendNotification($post_data);
            if ($response->status===true){
                return response()->json($response,200);
            }
            return response()->json($response,422);
        } catch (Exception $exception){
            return response()->json(['status'=>false,'message'=>$exception->getMessage(),'data'=>null],422);
        }
    }
}
