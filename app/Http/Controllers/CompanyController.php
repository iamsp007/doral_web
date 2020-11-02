<?php

namespace App\Http\Controllers;

use App\Models\company;
use Illuminate\Http\Request;
use Exception;

class CompanyController extends Controller
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
            $apiToken = session('token');
            
            $headerValue = array(
                'Content-Type: application/json',
                'X-Requested-With: XMLHttpRequest',
                'Access-Control-Allow-Origin: http://localhost',
                'Authorization: Bearer '.$apiToken
            );

            $url = 'http://127.0.0.1:8001/api/auth/company';
            $ch = curl_init($url);
            curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 40,
            CURLOPT_HTTPHEADER => $headerValue
            ));
            
            $curlResponse = curl_exec($ch);
            curl_close($ch);    

            $responseArray = json_decode($curlResponse, true);
            //dd($responseArray);
            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data'];
            }
            $message = $responseArray['message'];

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }
        //dd($record);
        return View('pages.admin.referral-approval')->with('record',$record);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = 0;
        $message = "";
        try {
            if(empty($request->email)) {
                throw new Exception("Please Enter Email");
            }
            $data = array(
                'data'=>array(
                    'name' => $request->company,
                    'referral_id' => $request->referralType,
                    'email' => $request->email
                )
            );

            $headerValue = array(
                'Content-Type: application/json',
                'X-Requested-With: XMLHttpRequest',
                'Access-Control-Allow-Origin: http://localhost'
            );

            $Data = json_encode($data);
            $url = 'http://127.0.0.1:8001/api/auth/company/store';
            $ch = curl_init($url);
            curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_POSTFIELDS => $Data,
            CURLOPT_TIMEOUT => 40,
            CURLOPT_HTTPHEADER => $headerValue
            ));
            
            $curlResponse = curl_exec($ch);
            curl_close($ch);
            //dd($curlResponse);
            $responseArray = json_decode($curlResponse, true);
            if($responseArray['status']) {
                $status = 1;
            }
            $message = $responseArray['message'];

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }

        $response = [
            'status' => $status,
            'message' => $message
        ];

        return response()->json($response, 201);
    }

    /**
     * Login Company
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $status = 0;
        $message = "";
        try {
            if(empty($request->email)) {
                throw new Exception("Please Enter Username");
            }
            $data = array(
                'data'=>array(
                    'email' => $request->email,
                    'password' => $request->password
                )
            );

            $headerValue = array(
                'Content-Type: application/json',
                'X-Requested-With: XMLHttpRequest',
                'Access-Control-Allow-Origin: http://localhost'
            );

            $Data = json_encode($data);
            $url = 'http://127.0.0.1:8001/api/auth/company/login';
            $ch = curl_init($url);
            curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_POSTFIELDS => $Data,
            CURLOPT_TIMEOUT => 40,
            CURLOPT_HTTPHEADER => $headerValue
            ));
            
            $curlResponse = curl_exec($ch);
            curl_close($ch);
            $responseArray = json_decode($curlResponse, true);
            //dd($responseArray);
            if($responseArray['status']) {
                $status = 1;
            }
            $message = $responseArray['message'];

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }

        $response = [
            'status' => $status,
            'message' => $message
        ];

        return response()->json($response, 201);
    }

    /**
     * Reset Password
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resetpassword(Request $request)
    {
        $status = 0;
        $message = "";
        try {
            if(empty($request->email)) {
                throw new Exception("Please Enter Email");
            }
            $data = array(
                'data'=>array(
                    'email' => $request->email
                )
            );

            $Data = json_encode($data);
            $url = 'http://127.0.0.1:8001/api/company/resetpassword';
            $ch = curl_init($url);
            curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_POSTFIELDS => $Data,
            CURLOPT_TIMEOUT => 40
            ));
            
            $curlResponse = curl_exec($ch);
            curl_close($ch);
            $responseArray = json_decode($curlResponse, true);
            //dd($responseArray);
            if($responseArray['status'] == 1) {
                $status = 1;
            }
            $message = $responseArray['message'];

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }

        $response = [
            'status' => $status,
            'message' => $message
        ];

        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {
        //
    }

    /**
     * Update Status
     *
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $apiToken = session('token');
            $headerValue = array(
                'Content-Type: application/json',
                'X-Requested-With: XMLHttpRequest',
                'Access-Control-Allow-Origin: http://localhost',
                'Authorization: Bearer '.$apiToken
            );

            $data = array(
                'data'=>array(
                    'company_id' => $request->company_id,
                    'status' => $request->status
                )
            );
            $Data = json_encode($data);

            $url = 'http://127.0.0.1:8001/api/auth/company/updatestatus';
            $ch = curl_init($url);
            curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 40,
            CURLOPT_POSTFIELDS => $Data,
            CURLOPT_HTTPHEADER => $headerValue
            ));
            
            $curlResponse = curl_exec($ch);
            curl_close($ch);    

            $responseArray = json_decode($curlResponse, true);
            //dd($responseArray);
            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data'];
            }
            $message = $responseArray['message'];

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }

        $response = [
            'status' => $status,
            'message' => $message
        ];

        return response()->json($response, 201);
    }

    /**
     * Profile View
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $apiToken = session('token');
            $headerValue = array(
                'Content-Type: application/json',
                'X-Requested-With: XMLHttpRequest',
                'Access-Control-Allow-Origin: http://localhost',
                'Authorization: Bearer '.$apiToken
            );

            $data = array(
                'data'=>array(
                    'company_id' => $request->company_id
                )
            );
            $Data = json_encode($data);

            $url = 'http://127.0.0.1:8001/api/auth/company/updatestatus';
            $ch = curl_init($url);
            curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 40,
            CURLOPT_POSTFIELDS => $Data,
            CURLOPT_HTTPHEADER => $headerValue
            ));
            
            $curlResponse = curl_exec($ch);
            curl_close($ch);    

            $responseArray = json_decode($curlResponse, true);
            //dd($responseArray);
            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data'];
            }
            $message = $responseArray['message'];

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }

        $response = [
            'status' => $status,
            'message' => $message
        ];

        return response()->json($response, 201);
    }
}
