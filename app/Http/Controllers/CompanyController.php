<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CurlModel\CurlFunction;
use App\Services\AdminService;
use Illuminate\Http\Request;
use App\Models\Services;
use Exception;
use Illuminate\Support\Facades\Hash;
use URL;
use App\Mail\ReferralAcceptedMail;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $adminServices = new AdminService();
            $responseArray = $adminServices->getCompanyReferral(1);
            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data'];
            }
            $message = $responseArray['message'];
            return View('pages.admin.referral-approval')->with('record',$record);

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }
        return redirect()->back()->with('errors','Something Went Wrong!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function active()
    {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $adminServices = new AdminService();
            $responseArray = $adminServices->getCompanyReferral(2);
            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data'];
            }
            $message = $responseArray['message'];

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }
        return View('pages.admin.referral-approval')->with('record',$record);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function rejected()
    {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $adminServices = new AdminService();
            $responseArray = $adminServices->getCompanyReferral(3);
            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data'];
            }
            $message = $responseArray['message'];

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }
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
            //dd($responseArray['data']['Company']['referal_id']);
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
            $data = array(
                'data' => [
                    'Company_id' => $request->company_id,
                    'status' => $request->status
                ]
            );

            $adminServices = new AdminService();
            $responseArray = $adminServices->updatestatus($data);
            if($responseArray['status']) {
                $status = 1;
                if (isset($responseArray['data']['Company_status']) && $responseArray['data']['Company_status'] == 1) {

                    $company = Company::find($responseArray['data']['Company_id']);
                    $email = $company->email;

                    $data = 'abcefghijklmnopqrstuvwxyz';
                    $generate_password = substr(str_shuffle($data), 0, 6);
                    $company->password = Hash::make($generate_password);
                    $company->save();

                    $url = URL::to('/').'/referral/email_verified/'.base64_encode($company->id);
                    $details = [
                        'name' => $company->name,
                        'password' => $generate_password,
                        'href' => $url,
                        'email' => $email
                    ];

                    try {
                        \Mail::to($email)->send(new ReferralAcceptedMail($details));
                    }catch (\Exception $exception){
                        \Log::info($exception->getMessage());
                    }
                    
                }
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
    public function profile($id)
    {
        $status = 0;
        $message = "";
        $record = [];
        $services = Services::select('id','name')->where('display_type',1)->get();
        $adminServices = new AdminService();
        $responseArray = $adminServices->getProfile($id);
        if($responseArray->status===true) {
            $record = $responseArray->data;
            return view('pages.admin.referral-profile')->with('record',$record)->with('services',$services);
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
        $data = $request->all();
        $id = $request['id'];
        $status = 0;
        $message = "";
        $record = [];
        $adminServices = new AdminService();
        $dataobj = $adminServices->updateProfile($data);
       return json_encode($dataobj);
    }
}
