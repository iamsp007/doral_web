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
        $detail = $type = '';
        if ($input['section'] === 'family') {
            $detail = [
                'name' => $input['name'],
                'relation' => $input['relation'],
                'phone' => $input['phone'],
                'hcp' => (isset($input['hcp'])) ? $input['hcp'] : '',
            ];
            $type = "1";
        } else if ($input['section'] === 'physician') {
            $detail = [
                'name' => $input['name'],
                'fax' => $input['fax'],
                'phone' => $input['phone'],
                'address' => $input['address'],
                'npi' => $input['address'],
                'primary' => (isset($input['primary'])) ? $input['primary'] : '',
            ];
            $type = "2";
        } else if ($input['section'] === 'pharmacy') {
            $detail = [
                'name' => $input['name'],
                'phone' => $input['phone'],
                'address' => $input['address'],
                'active' => (isset($input['active'])) ? $input['active'] : '',
            ];
            $type = "3";
        } 

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            $arr = array('status' => 400, 'message' => $validator->getMessageBag()->toArray(), 'result' => array(), 'action' => $action);
        } else {
            try {
                if ($input['section'] === 'careTeamUpdate') {
                    CareTeam::where('patient_id',$input['patient_id'])->update([
                        'detail->'.$input['field'] => ''
                    ]);

                    CareTeam::where('id', $input['care_team_id'])->update([
                        'detail->'.$input['field'] => 'on'
                    ]);
                        
                    $arr = array('status' => 200, 'message' => 'Change priority successfully.','resultdata' => $careTeam, 'modal' => $input['section']);
                } else {
                    $careTeam->detail = $detail;
                    $careTeam->type = $type;
                    $careTeam->fill($input)->save();           
                
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
