<?php

namespace App\Http\Controllers;

use App\Http\Requests\CareTeamRequest;
use App\Models\CareTeam;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CareTeamController extends Controller
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
       
        if ($input['section'] === 'family') {
            $rules = [
                'name' => 'required',
                'relation' => 'required',
                'phone' => 'required',
            ];

            $messages = [
                'name.required' => 'Please enter name.',
                'relation.required' => 'Please enter relation.',
                'phone.required' => 'Please enter phone.',
            ];
        } else if ($input['section'] === 'physician') {
            $rules = [
                'name' => 'required',
                'fax' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ];

            $messages = [
                'name.required' => 'Please enter name.',
                'fax.required' => 'Please enter fax.',
                'phone.required' => 'Please enter phone.',
                'address.required' => 'Please enter address.',
            ];
        } else if ($input['section'] === 'pharmacy') {
            $rules = [
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
            ];

            $messages = [
                'name.required' => 'Please enter name.',
                'address.required' => 'Please enter address.',
                'phone.required' => 'Please enter phone.',
            ];
        }

        if (isset($input['care_team_id']) && !empty($input['care_team_id'])) {
            $careTeam = CareTeam::find($input['care_team_id']);
            $action = 'edit';
            $message = $input['section'] .' updated successfully..!';
        } else {
            $careTeam = new CareTeam();
            $action = 'add';
            $message = $input['section'] .' added successfully..!';
        }

        $careTeam->patient_id = $input['patient_id'];
        if ($input['section'] === 'family') {
            $family_detail = [
                'name' => $input['name'],
                'relation' => $input['relation'],
                'phone' => $input['phone'],
                'hcp' => $input['hcp'],
            ];
            $careTeam->family_detail = $family_detail;
          
        } else if ($input['section'] === 'physician') {
            $physician_detail = [
                'name' => $input['name'],
                'fax' => $input['fax'],
                'phone' => $input['phone'],
                'address' => $input['address'],
                'npi' => $input['address'],
                'primary' => $input['primary']
            ];
            $careTeam->physician_detail = $physician_detail;
        } else if ($input['section'] === 'pharmacy') {
            $physician_detail = [
                'name' => $input['name'],
                'phone' => $input['phone'],
                'address' => $input['address'],
                'active' => $input['active'],
            ];
            $careTeam->physician_detail = $physician_detail;
        }

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            $arr = array('status' => 400, 'message' => $validator->getMessageBag()->toArray(), 'result' => array(), 'action' => $action);
        } else {
            try {
                $careTeam->fill($input)->save();           
                
                $arr = array('status' => 200, 'message' => $message, 'resultdata' => $careTeam, 'action' => $action, 'modal' => $input['section']);
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
