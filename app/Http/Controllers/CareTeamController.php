<?php

namespace App\Http\Controllers;

use App\Http\Requests\CareTeamRequest;
use App\Models\CareTeam;
use Illuminate\Http\Request;

class CareTeamController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CareTeamRequest $request)
    {
        try {
              
            $input =  $request->all();
       
            $message = $input['section'] .'added successfully!!';
            $careTeam = new CareTeam();
            
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
            $careTeam->fill($input)->save();           
            
            $arr = array('status' => 200, 'message' => $message, 'resultdata' => $careTeam);
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
        return \Response::json($arr);
    }
}
