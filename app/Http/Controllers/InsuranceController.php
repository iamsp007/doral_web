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
            'name' => 'required',
            'payer_id' => 'required',
            'phone' => 'required',
            'policy_no' => 'required',
        ];

        $messages = [
            'name.required' => 'Please enter company name.',
            'payer_id.required' => 'Please enter payer id.',
            'phone.required' => 'Please enter phone.',
            'policy_no.required' => 'Please enter policy no.',
        ];

        if (isset($input['insurance_id']) && !empty($input['insurance_id'])) {
            $patientInsurance = PatientInsurance::find($input['insurance_id']);
            $action = 'edit';
            $message = 'Patient Insurance updated successfully..!';
        } else {
            $patientInsurance = new PatientInsurance();
            $action = 'add';
            $message = 'Patient Insurance added successfully..!';

            $patientInsurance->user_id = $input['user_id'];
        }
        
        $patientInsurance->name = $input['name'];
        $patientInsurance->payer_id = $input['payer_id'];
        $patientInsurance->phone = $input['phone'];
        $patientInsurance->policy_no = $input['policy_no'];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            $arr = array('status' => 400, 'message' => $validator->getMessageBag()->toArray(), 'result' => array(), 'action' => $action);
        } else {
            try {
              
                $patientInsurance->save();              
                
                $arr = array('status' => 200, 'message' => $message, 'resultdata' => $patientInsurance, 'action' => $action);
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
