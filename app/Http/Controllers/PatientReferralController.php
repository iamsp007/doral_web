<?php

namespace App\Http\Controllers;

use App\Models\CurlModel\CurlFunction;
use Illuminate\Http\Request;
use Exception;

class PatientReferralController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $url = CurlFunction::getURL().'/api/auth/patient-referral';
            
            $headerValue = array(
                'Content-Type: application/json',
                'X-Requested-With: XMLHttpRequest',
                'Access-Control-Allow-Origin: http://localhost'
            );

            $ch = curl_init($url);
            curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 40,
            CURLOPT_HTTPHEADER => $headerValue
            ));
        
            $curlResponse = curl_exec($ch);
            $responseArray = json_decode($curlResponse, true);
            //dd($responseArray);
            curl_close($ch); 
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
        return View('pages.referral.vbc-upload-bulk-data')->with('record',$record);
    }
    public function index1() {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $url = CurlFunction::getURL().'/api/auth/patient-referral';
            
            $headerValue = array(
                'Content-Type: application/json',
                'X-Requested-With: XMLHttpRequest',
                'Access-Control-Allow-Origin: http://localhost'
            );

            $ch = curl_init($url);
            curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 40,
            CURLOPT_HTTPHEADER => $headerValue
            ));
        
            $curlResponse = curl_exec($ch);
            $responseArray = json_decode($curlResponse, true);
            //dd($responseArray);
            curl_close($ch); 
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
        return View('pages.referral.vbc')->with('record',$record);
    }
    public function store(Request $request)
    {

        $fileName = request()->file('file-1');
        ///dd($fileName[0]->getClientOriginalName());
        $status = 0;
        $message = "";
        try {
            //  ---------------
            $url = CurlFunction::getURL().'/api/auth/patient-referral/store';
            $headerValue = array(
                'X-Requested-With: XMLHttpRequest',
                'Access-Control-Allow-Origin: http://localhost'
            );
            /*$ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
             
            //If the function curl_file_create exists
            if(function_exists('curl_file_create')){
                $filePath = curl_file_create($fileName[0]->getClientOriginalName());
            } else{
                $filePath = '@' . realpath($fileName[0]->getClientOriginalName());
                curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
            }

            $data = array(
                    'file_name' => $filePath,
                    'referral_id' => 1
            );
            //$data = json_encode($data);
            //dd($data);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headerValue);
            $result = curl_exec($ch);
            
            if(curl_errno($ch)) {
                throw new Exception(curl_error($ch));
            }
             
            echo $result;
            */
            $data = array(
                  'file_name' => $fileName,
                  'referral_id' => 1
                );
            dd($data);
            $r = curl_init($url);
            curl_setopt($r, CURLOPT_POST, true);
            curl_setopt(
                $r,
                CURLOPT_POSTFIELDS,
                $data);

            // output the response
            curl_setopt($r, CURLOPT_HTTPHEADER, $headerValue);
            curl_setopt($r, CURLOPT_RETURNTRANSFER, true);
            dd(curl_exec($r));

            // close the session
            curl_close($r);

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
