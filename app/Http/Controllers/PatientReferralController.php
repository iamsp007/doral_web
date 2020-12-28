<?php

namespace App\Http\Controllers;

use App\Models\PatientReferral;
use App\Models\CurlModel\CurlFunction;
use GuzzleHttp\Client;
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
        $status = 0;
        $message = "";
        $record = [];
        try {

            $referralservice = new ReferralService();
            $response = $referralservice->mdOrderUploadBulk();
            if ($response->status===true){
                return view('pages.referral.md-order-upload-bulk-data')->with('data', $response->data);
            }
            $status = 0;
            $message = $response->message;
        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }
        return view('pages.referral.md-order-upload-bulk-data');
    }
    public function mdOrder() {
        $record = [];
        try {

            $referralServices = new ReferralService();
            $response = $referralServices->mdOrder(2);
            if ($response->status===true){
                $record = $response->data;
            }
            return DataTables::of($record)
            ->editColumn('first_name', function ($contact){
                return $contact->first_name." ".$contact->last_name;
            })
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
            $referralServices = new ReferralService();
            $response = $referralServices->mdOrder(1);
            if ($response->status===true){
                $record = $response->data;
            }

            return DataTables::of($record)->make(true);


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
            $referralServices = new ReferralService();
            $response = $referralServices->mdOrder(3);
            if ($response->status===true){
                $record = $response->data;
            }

            return DataTables::of($record)
            ->editColumn('first_name', function ($contact){
                return $contact->first_name." ".$contact->last_name;
            })
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
        $user = \Illuminate\Support\Facades\Auth::guard('referral')->user();
        $referral_id = $user->referal_id;
        $fileName = request()->file('file_name');
        $status = 0;
        $message = "";
        try {
            $file_path = $request->file('file_name')->getPathname();
            $file_mime = $request->file('file_name')->getmimeType();
            $file_org  = $request->file('file_name')->getClientOriginalName();

            $client = new Client();
            $response = $client->request(
                'POST',
                env('API_URL').'/auth/patient-referral/store',
                [
                    'multipart' => [
                        [
                            'name'=>'referral_id',
                            'contents'=>$referral_id
                        ],
                        [
                            'name'=>'service_id',
                            'contents'=>$request->service_id
                        ],
                        [
                            'name'=>'file_type',
                            'contents'=>$request->vbc_select
                        ],
                        [
                            'name'=>'form_id',
                            'contents'=>isset($request->formSelect) ? $request->formSelect : NULL
                        ],
                        [
                            'name'     => 'file_name',
                            'filename' => $file_org,
                            'Mime-Type'=> $file_mime,
                            'contents' => fopen( $file_path, 'r' ),
                        ]
                    ],
                    'headers' => [
                        'X-Requested-With' => 'XMLHttpRequest',
                        'Access-Control-Allow-Origin' => 'http://localhost'
                    ]
                ]
            );

            $resp = json_decode($response->getBody()->getContents());
            $status = $resp->status===true?1:0;
            $message = $resp->message;

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
                'Access-Control-Allow-Origin: '.$this->getOrigin()
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
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
    public function getOrigin() {
        if (strpos(request()->getHost(), '127.0.0.1') !== false) {
            return 'http://localhost';
        } else {
            return 'https://api.doralhealthconnect.com';
        }
    }

}
