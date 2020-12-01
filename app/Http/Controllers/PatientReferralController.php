<?php

namespace App\Http\Controllers;

use App\Models\PatientReferral;
use App\Models\CurlModel\CurlFunction;
use Illuminate\Http\Request;
use Exception;
use CURLFile;

class PatientReferralController extends Controller
{
    public function vbc() {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $url = CurlFunction::getURL().'/api/auth/patient-referral/1';
            
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
        //if($id == 2) 
        //return View('pages.referral.vbc-upload-bulk-data')->with('record',$record);
        //else
        return View('pages.referral.vbc')->with('record',$record);
    }
    public function vbcUploadBulk() {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $url = CurlFunction::getURL().'/api/auth/patient-referral/1';
            
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
        //if($id == 2) 
        //return View('pages.referral.vbc-upload-bulk-data')->with('record',$record);
        //else
        return View('pages.referral.vbc-upload-bulk-data')->with('record',$record);
    }
    public function mdOrder() {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $url = CurlFunction::getURL().'/api/auth/patient-referral/2';
            
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
        //if($id == 2) 
        //return View('pages.referral.md-order-upload-bulk-data')->with('record',$record);
        //else
        return View('pages.referral.md-order')->with('record',$record);    
    }
    public function mdOrderUploadBulk() {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $url = CurlFunction::getURL().'/api/auth/patient-referral/2';
            
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
        //if($id == 2) 
        //return View('pages.referral.md-order-upload-bulk-data')->with('record',$record);
        //else
        return View('pages.referral.md-order-upload-bulk-data')->with('record',$record);    
    }
    public function employeePrePhysical() {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $url = CurlFunction::getURL().'/api/auth/patient-referral/3';
            
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
        return View('pages.referral.employee-pre-physical')->with('record',$record);    
    }
    public function employeePrePhysicalUploadBulk() {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $url = CurlFunction::getURL().'/api/auth/patient-referral/3';
            
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
        return View('pages.referral.employee-pre-physical-upload-bulk-data')->with('record',$record);    
    }
    public function store(Request $request)
    {
        $referral_id = session('referral_id');
        $fileName = request()->file('file_name');
        $status = 0;
        $message = "";
        try {
            //  ---------------
            $url = CurlFunction::getURL().'/api/auth/patient-referral/store';
            $headerValue = array(
                'X-Requested-With: XMLHttpRequest',
                'Access-Control-Allow-Origin: http://localhost'
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
             
            //If the function curl_file_create exists
            if(function_exists('curl_file_create')){
                $filePath = curl_file_create($fileName->getpathname(), $fileName->getClientMimeType(), $fileName->getClientOriginalName());
            } else{
                $filePath = '@' . realpath($fileName->getClientOriginalName());
                curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
            }

            $data = array(
                    'file_name' => $filePath,
                    'referral_id' => $referral_id,
                    'service_id' => $request->service_id
            );
            //$data = json_encode($data);
            //dd($data);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headerValue);
            $result = curl_exec($ch);
            dd($result);
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
