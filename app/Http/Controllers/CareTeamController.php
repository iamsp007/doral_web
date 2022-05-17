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
        //dd($input);
        $rules = $messages = [];
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
        $detail = $type =  $texed ='';

        if (isset($input['texed'])) {
            $texed =  $input['texed'];
        }

        if ($input['section'] === 'family') {
            $hcp = '';
            $input['field'] = '';
            if (isset($input['hcp'])) {
                $input['field'] = 'hcp';
                $hcp =  $input['hcp'];
            }
            $detail = [
                'name' => $input['name'],
                'relation' => $input['relation'],
                'phone' => $input['phone'],
                'hcp' => $hcp,
                'texed' => $texed,
            ];
            $type = "1";
        } else if ($input['section'] === 'physician') {
            $primary = '';
            if (isset($input['primary'])) {
                $input['field'] = 'primary';
                $primary =  $input['primary'];
            }

            $detail = [
                'name' => $input['name'],
                'fax' => $input['fax'],
                'phone' => $input['phone'],
                'address' => $input['address'],
                'npi' => $input['address'],
                'primary' => $primary,
                'texed' => $texed,
            ];
            $type = "2";
        } else if ($input['section'] === 'pharmacy') {
            $active = '';
            if (isset($input['active'])) {
                $input['field'] = 'active';
                $active =  $input['active'];
            }

            $detail = [
                'name' => $input['name'],
                'phone' => $input['phone'],
                'address' => $input['address'],
                'active' => $active,
            ];
            $type = "3";
        } 

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            $arr = array('status' => 400, 'message' => $validator->getMessageBag()->toArray(), 'resultdata' => array(), 'action' => $action);
        } else {
            try {
                if ($input['section'] === 'physician-checked' || $input['section'] === 'pharmacy-checked' || $input['section'] === 'family-checked') {
                    
                    self::updateData($input);
                    //$careTeam = CareTeam::where('patient_id',$input['patient_id'])->get();
                   
                    $arr = array('status' => 200, 'message' => 'Change priority successfully.','resultdata' => $careTeam, 'modal' => $input['section']);
                } else {
                   
                    $careTeam->detail = $detail;
                    $careTeam->type = $type;
                    $careTeam->fill($input)->save();
			
		    if ((isset($careTeam->detail['hcp']) && $careTeam->detail['hcp'] === 'on') || (isset($careTeam->detail['primary']) && $careTeam->detail['primary'] === 'on') || (isset($careTeam->detail['active']) && $careTeam->detail['active'] === 'on')) {
		  
                    $input['care_team_id'] = $careTeam->id;
                    self::updateData($input);
                    }

                    $arr = array('status' => 200, 'message' => $message, 'resultdata' => $careTeam, 'action' => $action, 'modal' => $input['section']);
                }
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

    public static function updateData($input)
    {
        $careTeam = CareTeam::where('patient_id',$input['patient_id'])->update([
            'detail->'.$input['field'] => ''
        ]);

        CareTeam::where('id', $input['care_team_id'])->update([
            'detail->'.$input['field'] => 'on'
        ]);
        
        return $careTeam;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     dd($id);
    // }
}
