<?php

namespace App\Http\Controllers;

use App\Models\PatientInsurance;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InsuranceController extends Controller
{
       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
    
        $rules = [
            'payerId' => 'required',
            'phoneNo' => 'required',
            'policyNo' => 'required'
        ];

        $messages = [
            'payerId.required' => 'Please enter payer id.',
            'phoneNo.required' => 'Please enter phone.',
            'policyNo.required' => 'Please enter policy no.',
        ];

        $validator = Validator::make($input, $rules, $messages);
       
        if ($validator->fails()) {
            $arr = array('status' => 400, 'message' => $validator->errors()->all(), 'result' => array());
        } else {
            try {
                $patientInsurance = new PatientInsurance();
                $message = 'Patient Insurance added successfully..!';

                $patientInsurance->payer_id = $input['payerId'];
                $patientInsurance->phone = $input['phoneNo'];
                $patientInsurance->policy_no = $input['policyNo'];

                $patientInsurance->save();              
                
                $arr = array('status' => 200, 'message' => 'success', 'resultdata' => $patientInsurance);
            } catch (\Illuminate\Database\QueryException $ex) {
                $message = $ex->getMessage();
                if (isset($ex->errorInfo[2])) {
                    $message = $ex->errorInfo[2];
                }
                $arr = array("status" => 400, "message" => $message, "resultdata" => array());
            } catch (Exception $ex) {
                $message = $ex->getMessage();
                if (isset($ex->errorInfo[2])) {
                    $message = $ex->errorInfo[2];
                }
                $arr = array("status" => 400, "message" => $message, "resultdata" => array());
            }
        } 
        return \Response::json($arr);
    }
}
