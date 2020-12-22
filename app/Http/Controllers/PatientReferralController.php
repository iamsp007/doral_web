<?php

namespace App\Http\Controllers;

use App\Models\PatientReferral;
use App\Models\CurlModel\CurlFunction;
use Illuminate\Http\Request;
use App\Services\ReferralService;
use Exception;
use CURLFile;
use Auth;
use Yajra\DataTables\DataTables;

class PatientReferralController extends Controller
{
    public function index() {
        return view('pages.referral.md-order');
    }
    public function vbc() {
        return view('pages.referral.vbc');
    }
    public function occupationalHealth() {
        return view('pages.referral.occupational-health');
    }
    public function vbcUploadBulk() {
        return view('pages.referral.vbc-upload-bulk-data');
    }
    public function occupationalHealthUploadBulk() {
        return view('pages.referral.occupational-health-upload-bulk-data');
    }
    public function mdOrderUploadBulk() {
        return view('pages.referral.md-order-upload-bulk-data');
    }
    public function mdOrder() {
        /*$service = new ReferralService();
        $response = $service->getPatient(2);
        if ($response->status===true){
            return DataTables::of($response->data)->make(true);
        }
        return DataTables::of($response)->make(true);*/

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
            $response = json_decode($curlResponse);
            curl_close($ch);
            return DataTables::of($response->data)
            ->editColumn('created_at', function ($contact){
                if($contact->created_at!='')
                return date('m-d-Y', strtotime($contact->created_at) );
                else
                return '--';    
            })
            ->editColumn('cert_next_date', function ($contact){
                if($contact->cert_next_date!='')
                return date('m-d-Y', strtotime($contact->cert_next_date) );
                else
                return '--';    
            })
            ->make(true);


        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }
        
    }
    public function vbcGetData() {
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
            $response = json_decode($curlResponse);
            //dd($responseArray->data);
            curl_close($ch);
            
            return DataTables::of($response->data)->make(true);


        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }
    }
    public function occupationalHealthGetData() {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $url = CurlFunction::getURL().'/api/auth/patient-occupational/3';

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
            $response = json_decode($curlResponse);
            //dd($responseArray->data);
            curl_close($ch);
            
            return DataTables::of($response->data)
            ->editColumn('created_at', function ($contact){
                if($contact->created_at!='')
                return date('m-d-Y', strtotime($contact->created_at) );
                else
                return '--';    
            })
            ->editColumn('dob', function ($contact){
                if($contact->dob!='')
                return date('m-d-Y', strtotime($contact->dob) );
                else
                return '--';    
            })
            ->make(true);


        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }
    }
    
    
    public function store(Request $request)
    {
        $user = Auth::user();
        $referral_id = $user->referal_id;
        $fileName = request()->file('file_name');
        $status = 0;
        $message = "";
        try {
            //  ---------------
            $url = CurlFunction::getURL().'/api/auth/patient-referral/store';
            if($request->service_id == 2 && $request->vbc_select == 3)
            $url = CurlFunction::getURL().'/api/auth/patient-referral/storecert';
            //dd($url);
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
                    'service_id' => $request->service_id,
                    'file_type' => $request->vbc_select,
                    'form_id' => isset($request->formSelect) ? $request->formSelect : NULL
            );
            //$data = json_encode($data);
            //dd($data);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headerValue);
            curl_setopt($ch, CURLOPT_TIMEOUT, 600); 
            $curlResponse = curl_exec($ch);
            dd($curlResponse);
            $responseArray = json_decode($curlResponse, true);
            if(curl_errno($ch)) {
                throw new Exception(curl_error($ch));
            }

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

    public function storeOccupational(Request $request)
    {
        $user = Auth::user();
        $referral_id = $user->referal_id;
        $fileName = request()->file('file_name');
        $status = 0;
        $message = "";
        try {
            //  ---------------
            $url = CurlFunction::getURL().'/api/auth/patient-occupational/storeoccupational';
            //dd($url);
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
                    'service_id' => $request->service_id,
                    'file_type' => $request->vbc_select,
                    'form_id' => isset($request->formSelect) ? $request->formSelect : NULL
            );
            //$data = json_encode($data);
            //dd($url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headerValue);
            curl_setopt($ch, CURLOPT_TIMEOUT, 600); 
            $curlResponse = curl_exec($ch);
            dd($curlResponse);
            $responseArray = json_decode($curlResponse, true);
            if(curl_errno($ch)) {
                throw new Exception(curl_error($ch));
            }

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

}
