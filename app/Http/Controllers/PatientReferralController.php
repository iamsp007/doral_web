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
        //echo env('API_URL');
        $status = 0;
        $message = "";
        $record = [];
        try {
            //echo "1";
            $referralservice = new ReferralService();
            //echo "2";
            $response = $referralservice->mdOrderUploadBulk();
            if ($response->status===true){
                return view('pages.referral.md-order-upload-bulk-data')->with('data', $response->data);
            }
            $status = 0;
            $message = $response->message;
        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
            //dd($message);
        }
        //dd('test');
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
            ->editColumn('ssn', function ($contact){
                return 'xxx-xxx-'.substr($contact->ssn, -4);
            })
            ->editColumn('dob', function ($contact){
                if($contact->dob!='')
                return date('m-d-Y', strtotime($contact->dob) );
                else
                return '--';
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

            return DataTables::of($record)
            ->editColumn('first_name', function ($contact){
                return $contact->first_name." ".$contact->last_name;
            })
            ->editColumn('ssn', function ($contact){
                return 'xxx-xxx-'.substr($contact->ssn, -4);
            })
            ->editColumn('dob', function ($contact){
                if($contact->dob!='')
                return date('m-d-Y', strtotime($contact->dob) );
                else
                return '--';
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
            ->editColumn('ssn', function ($contact){
                return 'xxx-xxx-'.substr($contact->ssn, -4);
            })
            ->editColumn('plans.name', function ($contact){
                if($contact->benefit_plan!='')
                return $contact->plans->name;
                else
                return '--';
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


    public function store(Request $request)
    {
        $user = \Illuminate\Support\Facades\Auth::guard('referral')->user();
        $referral_id = $user->referal_id;

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
            $response = [
                'status' => $status,
                'message' => $message,
                'data' => $resp->data
            ];
            return response()->json($response,$status===1?200:422);
        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
            $response = [
                'status' => $status,
                'message' => $message
            ];
        }
        return response()->json($response, 422);
    }

    public function addPatient()
    {
        $client = new Client();
        $states = $client->request('GET', env('API_URL').'/auth/states');
        $states = json_decode($states->getBody()->getContents());

        return view('pages.referral.add-patient',compact('states'));
    }

    public function getCities(Request $request)
    {
        $client = new Client();

        $states = $client->request('GET', env('API_URL').'/auth/states');
        $states = json_decode($states->getBody()->getContents());
        $neededObject = array_filter(
            $states,
            function ($e) use (&$request) {
                return $e->id == $request->state;
            }
        );
        $cities = $client->request('POST', env('API_URL').'/auth/filter-cities', [
            'multipart' => [
                [
                    'name'=>'state_code',
                    'contents'=>reset($neededObject)->state_code
                ]
            ],
            'headers' => [
                'X-Requested-With' => 'XMLHttpRequest',
                'Access-Control-Allow-Origin' => 'http://localhost'
            ]
        ]);

        return json_decode($cities->getBody()->getContents());
    }

    public function storePatient(Request $request)
    {
        try {
            $client = new Client();

            $data = $request->all();

            $referralservice = new ReferralService();

            $responseArray = $referralservice->storePatient($data);

            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data'];
                return redirect()->route('referral.patient-detail', ['patient_id' => $record['user_id']]);
            }
            $message = $responseArray->message;
            return redirect()->back()->withErrors($message);
        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
            return redirect()->back()->withErrors($message);
        }
        $response = [
            'status' => $status,
            'message' => $message
        ];

        return response()->json($response, 201);
    }
}
