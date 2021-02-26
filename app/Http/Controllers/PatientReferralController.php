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

            $patientReferral = PatientReferral::with('detail', 'service', 'filetype', 'mdforms', 'plans')
                ->where('service_id', '=','2')
                ->whereNotNull('first_name');
            return DataTables::of($patientReferral)
            ->editColumn('first_name', function ($contact){
                return $contact->first_name." ".$contact->last_name;
            })
            ->editColumn('ssn', function ($contact){
                if($contact->ssn)
                return 'xxx-xx-'.substr($contact->ssn, -4);
                else
                return '';
            })
            ->editColumn('gender', function ($contact){
                if($contact->gender === 'MALE'){
                    $gender = 'Male';
                } elseif ($contact->gender === 'FEMALE') {
                    $gender = 'Female';
                } else if ($contact->gender === '1') {
                    $gender = 'Male';
                } else if ($contact->gender === '2') {
                    $gender = 'Female';
                } else {
                    $gender = 'Other';
                }
                return $gender;
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
            $patientReferral = PatientReferral::with('detail', 'service', 'filetype', 'mdforms', 'plans')
                ->where('service_id', '=',1)
                ->whereNotNull('first_name');

            return DataTables::of($patientReferral)
            ->editColumn('first_name', function ($contact){
                return $contact->first_name." ".$contact->last_name;
            })
            ->editColumn('ssn', function ($contact){
                if($contact->ssn)
                return 'xxx-xx-'.substr($contact->ssn, -4);
                else
                return '';
            })
            ->editColumn('gender', function ($contact){
                if($contact->gender === 'MALE'){
                    $gender = 'Male';
                } elseif ($contact->gender === 'FEMALE') {
                    $gender = 'Female';
                } else if ($contact->gender === '1') {
                    $gender = 'Male';
                } else if ($contact->gender === '2') {
                    $gender = 'Female';
                } else {
                    $gender = 'Other';
                }
                return $gender;
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
            $patientReferral = PatientReferral::with('detail', 'service', 'filetype', 'mdforms', 'plans')
                ->where('service_id', '=','3')
                ->whereNotNull('first_name');
            return DataTables::of($patientReferral)
            ->editColumn('first_name', function ($contact){
                return $contact->first_name." ".$contact->last_name;
            })
            ->editColumn('ssn', function ($contact){
                if($contact->ssn)
                return 'xxx-xx-'.substr($contact->ssn, -4);
                else
                return '';
            })
            ->editColumn('gender', function ($contact){
                if($contact->gender === 'MALE'){
                    $gender = 'Male';
                } elseif ($contact->gender === 'FEMALE') {
                    $gender = 'Female';
                } else if ($contact->gender === '1') {
                    $gender = 'Male';
                } else if ($contact->gender === '2') {
                    $gender = 'Female';
                } else {
                    $gender = 'Other';
                }
                return $gender;
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
                return date('m-d-Y', strtotime($contact->dob));
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

    public function occupationalHealthFailData(Request $request) {
        return view('pages.referral.occupational-health-failed');
    }

     public function occupationalHealthGetFaileData() {

        $referralservice = new ReferralService();
        $responseArray = $referralservice->occupationalHealthFailData(3);
        $record = $responseArray['data'];
       return DataTables::of($record)
             ->addColumn('action', function($row){
                        $id = $row['id'];
                        return '<a href="view-failed-data/'.$id.'"
                            class="btn btn-primary btn-blue shadow-sm btn--sm mr-2"
                            data-toggle="tooltip" data-placement="left">View Recode
                        </a>';
            })
            ->make(true);


     }

     public function viewoccupationalHealthFailData(Request $request) {
        $id = $request->id;
        return view('pages.referral.view-occupational-health-failed',compact('id'));
    }

     public function viewoccupationalHealthGetFaileData(Request $request) {
        $referralservice = new ReferralService($request->id);
        $responseArray = $referralservice->viewoccupationalHealthGetFaileData($request->id);
        $record = $responseArray['data'];
       return DataTables::of($record)
            ->make(true);
     }

     public function vbcFailData() {
        return view('pages.referral.vbc-failed');
     }

     public function vbcGetFaileData() {
         $referralservice = new ReferralService();
        $responseArray = $referralservice->occupationalHealthFailData(1);
        $record = $responseArray['data'];
       return DataTables::of($record)
             ->addColumn('action', function($row){
                        $id = $row['id'];
                        return '<a href="view-failed-data/'.$id.'"
                            class="btn btn-primary btn-blue shadow-sm btn--sm mr-2"
                            data-toggle="tooltip" data-placement="left">View Recode
                        </a>';
            })
            ->make(true);
     }

     public function mdorderFailData() {
        return view('pages.referral.md-order-failed');
     }

     public function mdorderGetFaileData() {
         $referralservice = new ReferralService();
        $responseArray = $referralservice->occupationalHealthFailData(2);
        $record = $responseArray['data'];
       return DataTables::of($record)
             ->addColumn('action', function($row){
                        $id = $row['id'];
                        return '<a href="view-failed-data/'.$id.'"
                            class="btn btn-primary btn-blue shadow-sm btn--sm mr-2"
                            data-toggle="tooltip" data-placement="left">View Recode
                        </a>';
            })
            ->make(true);
     }

     public function occupationalHealthGetDataSearch(Request $request) {
         $referralservice = new ReferralService();
          $data = $request->all();
         $responseArray = $referralservice->occupationalHealthGetDataSearch($data);
         $record = $responseArray->data;
         return $record;
              
     }

    public function getFaileDataSearch(Request $request) {
         $referralservice = new ReferralService();
          $data = $request->all();
         $responseArray = $referralservice->getFaileDataSearch($data);
         $record = $responseArray->data;
         return $record;
    }
}
