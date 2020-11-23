<?php

namespace App\Http\Controllers;

use App\Models\CurlModel\CurlFunction;
use Illuminate\Http\Request;

class PatientReferralController extends Controller
{

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
            /*if (function_exists('curl_file_create')) { // php 5.5+
              $cFile = curl_file_create($file_name_with_full_path);
            } else { // 
              $cFile = '@' . realpath($file_name_with_full_path);
            }
            $data = array(
                'data'=>array(
                    'file_name' => $request->file_name,
                    'referral_id' => $request->referralType
                )
            );

            $url = 'http://127.0.0.1:8001/api/auth/patient-referral/store';
            $curlResponse = CurlFunction::withOutToken($url, $data);
            $responseArray = json_decode($curlResponse, true);
            if($responseArray['status']) {
                $status = 1;
            }
            $message = $responseArray['message'];*/

            //  ---------------
            $url = CurlFunction::getURL().'/api/auth/patient-referral/store';
            $headerValue = array(
                'Content-Type: application/json',
                'X-Requested-With: XMLHttpRequest',
                'Access-Control-Allow-Origin: http://localhost'
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
             
            //If the function curl_file_create exists
            if(function_exists('curl_file_create')){
                $filePath = curl_file_create($request->file_name);
            } else{
                $filePath = '@' . realpath($request->file_name);
                curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
            }

            $data = array(
                'data'=>array(
                    'file_name' => $filePath,
                    'referral_id' => 1
                )
            );
            $data = json_encode($data);
            //dd($data);

            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headerValue);
            $result = curl_exec($ch);
            if(curl_errno($ch)) {
                throw new Exception(curl_error($ch));
            }
             
            echo $result;

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
