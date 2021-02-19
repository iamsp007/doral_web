<?php

namespace App\Http\Controllers;

use App\Models\referral;
use App\Models\Company;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function show(referral $referral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function edit(referral $referral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, referral $referral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function destroy(referral $referral)
    {
        //
    }

    public function emailVerified(Request $request,$user_id){
        $data=array();
        try {
            $userId = base64_decode($user_id);
            $company = Company::find($userId);
            if ($company) {
                $company->email_verified = '1';
                $company->save();
            }
            
            return redirect(route('login'));
        } catch (\Exception $exception){
            \Log::info($exception->getMessage());
        }
    }
}
