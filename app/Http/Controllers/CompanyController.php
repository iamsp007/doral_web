<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\Company;
use App\Models\CurlModel\CurlFunction;
use App\Models\Referral;
use App\Services\AdminService;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\ServicePaymentPlan;
use Exception;
use Illuminate\Support\Facades\Hash;
use URL;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use App\Helpers\Helper;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($status)
    {
        $referrals = Referral::where('guard_name','=','referral')->get();
        $companies = Company::get();
        return View('admin.referral.index',compact('status', 'referrals','companies'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getReferralApprovalList(Request $request)
    {
        $input = $request->all();
        $companies = Company::
            whereHas('roles',function ($q){
                $q->where('name','=','referral');
            })
            ->when($input['status'] ,function ($query) use($input) {
                if ($input['status'] == 'pending') {
                    $query->where('status', '0');
                } else if ($input['status'] == 'active') {
                    $query->where('status', '1');
                } else if ($input['status'] == 'rejected') {
                    $query->where('status', '3');
                }
            })
            ->when($input['company_id'], function ($query) use($input){
                $query->where('id', $input['company_id']);
            })
            ->when($input['referal_id'], function ($query) use($input){
                $query->where('referal_id', $input['referal_id']);
            })
            ->when($input['email'], function ($query) use($input){
                $email = $input['email'];
                $query->where('email','LIKE',"%$email%");
            })
        ->get();

        return DataTables::of($companies)
            ->addColumn('checkbox_id', function($q) {
                return '<div class="checkbox"><label><input class="innerallchk" onclick="chkmain();" type="checkbox" name="allchk[]" value="' . $q['id'] . '" /><span></span></label></div>';
            })
            ->addColumn('name', function ($row){
                return '<a href="'.url("/admin/referral-profile/".$row['id']).'" title="View Profile">'.$row['name'].'</a>';
            })
            ->addColumn('referal_id', function ($row){
                if ($row['referal_id'] == 1) {
                    return 'Insurance';
                } elseif ($row['referal_id'] == 2) {
                    return 'Home Care';
                } elseif ($row['referal_id'] == 3) {
                    return 'Others';
                } 
                return '';
            })
            ->addColumn('action', function($row){
                $action = '';
                if ($row->status === '0') {
                    $action .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Accept" class="btn btn-primary btn-green shadow-sm btn--sm mr-2 update-status" data-status="1">Accept</a>';
                    $action .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Reject" class="btn btn-danger shadow-sm btn--sm mr-2 update-status" data-status="3">Reject</a>';
                } else if ($row->status === '1') {
                    $action .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Reject" class="btn btn-danger shadow-sm btn--sm mr-2 update-status" data-status="3">Reject</a>';
                } else if ($row->status === '3') {
                    $action .= '<a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Accept" class="btn btn-primary btn-green shadow-sm btn--sm mr-2 update-status" data-status="1">Accept</a>';
                }

                $action .= '<a href="'.url("/admin/referral-profile/".$row['id']).'" class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="View Profile">View Profile</a>';

                return $action;
            })
            ->rawColumns(['action','name','checkbox_id'])
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getReferralData(Request $request) {
       $requestData = $request->all();
       $data = [];
        if (isset($requestData['searchTerm']) && $requestData['searchTerm']) {
            $status = "0";
            if (isset($requestData['type']) && $requestData['type']) {
                $type = $requestData['type'];

                if ($type === "2") {
                    $status = "1";
                } elseif ($type === "3") {
                    $status = "3";
                }
            }

            $companies = Company::where('status','=',$status)
                ->where($requestData['searchField'], 'like', '%' . $requestData['searchTerm'] . '%')
                ->whereHas('roles',function ($q) {
                    $q->where('name','=','referral');
                })
                ->get();
                
            $data['data'] = $companies; 
        }
        return $data;
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
        $record = [];
        try {
            if(empty($request->email)) {
                throw new Exception("Please Enter Email");
            }
            $data = array(
                'name' => $request->company,
                'referral_id' => $request->referralType,
                'email' => $request->email
            );
            $adminServices = new AdminService();
            $responseArray = $adminServices->storeCompany($data);
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

            $url = CurlFunction::getURL().'/api/auth/company/login';
            $curlResponse = CurlFunction::withOutToken($url, $data);
            $responseArray = json_decode($curlResponse, true);
            
            if($responseArray['status']) {
                $status = 1;
                session(['referral_id' => $responseArray['data']['Company']['referal_id']]);
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
            $url = CurlFunction::getURL().'/api/company/resetpassword';
            $ch = curl_init($url);
            curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_POSTFIELDS => $Data,
            CURLOPT_TIMEOUT => 40
            ));

            $curlResponse = curl_exec($ch);
            curl_close($ch);
            $responseArray = json_decode($curlResponse, true);
            
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
     * Update Status
     *
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {
        $input = $request->all();
          
        $companies = Company::whereIn('id',$input['id']);
        $companies->update(['status' => $input['status']]);

        if ($input['status'] === '1') {
            foreach ($companies->get() as $company) {
               
                $details = [
                    'name' => $company->first_name,
                    'password' => env('REFERRAL_PASSWORD'),
                    'email' => $company->email,
                    'login_url' => route('login'),
                ];
                SendEmailJob::dispatch($company->email,$details,'AcceptedMail');
            }
        }
        $responce = array('status' => 200, 'message' => 'Referral status change  successfully.', 'result' => array());
        return \Response::json($responce);
    }

    /**
     * Profile View
     *
     * @return \Illuminate\Http\Response
     */
    public function profile($id = '')
    {   
        if($id == '') {
           $id = Auth::user()->id;
        }
        $status = 0;
        $message = "";
        $record = $paymentInfo = $paymentPlanDetailsIds = [];
        $services = Services::select('id','name')->where('display_type',1)->get();
        $i = 0;
        foreach ($services as $key => $value) {
            $servicePaymentPlan = ServicePaymentPlan::with('planDetails')->where('service_id',$value['id'])->get()->toArray();
            if ($servicePaymentPlan) {
                $paymentInfo[$i]['company_id'] = $id;
                $paymentInfo[$i]['service_id'] = $value['id'];
                $paymentInfo[$i]['name'] = $value['name'];
                $paymentInfo[$i]['payment_plan'] = $servicePaymentPlan;
                $i++;
            }
        }

        $adminServices = new AdminService();
        $responseArray = $adminServices->getProfile($id);
        if($responseArray->status===true) {
            $record = $responseArray->data;
            if (isset($record->payment_info) && $record->payment_info) {
                $paymentPlanDetailsIds = array_column($record->payment_info, 'service_payment_plan_details_id');
            }
            return view('pages.admin.referral-profile')->with('record',$record)->with('services',$services)->with('paymentInfo',$paymentInfo)->with('paymentPlanDetailsIds',$paymentPlanDetailsIds);
        }
        $message = $responseArray->message;

        return redirect()->back()->with('errors',$message);
    }

    /**
     * Profile Update
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(request $request)
    {
        $helper = new Helper();
        $to = "eaPYO9xjyqE:APA91bHu5SqlOBB3keVhnS-4ZSnkHMRMuZvHkaid7bS5MsxNJcj1WYy-JWU17V3moGRDczPyjVsjYOSTRfxMSvNE8zYOF_vGiNIh3o53bf0i-GDSkiK895ZveHJR64iKAQb8__R6SH2K";
        $data = array("body"=>"Referral Updated");
        $helper->sendSpecialNotification($to,$data);
        
        $data = $request->all();
        $id = $request['id'];
        $status = 0;
        $message = "";
        $record = [];
        $adminServices = new AdminService();
        $dataobj = $adminServices->updateProfile($data);
       return json_encode($dataobj);
    }

    /**
     * Insert / Update Service Payment
     *
     * @return \Illuminate\Http\Response
     */
    public function insertUpdateServicePayment(request $request)
    {
        $data = $request->all();
        $status = 0;
        $message = "";
        $record = [];
        $adminServices = new AdminService();
        $dataobj = $adminServices->insertUpdateServicePayment($data);
       return json_encode($dataobj);
    }
}
