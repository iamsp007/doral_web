<?php

namespace App\Http\Controllers\ApiRequest;

use App\Http\Controllers\Controller;
use App\Models\Api;
use App\Models\ApiRequest;
use App\Models\Software;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiRequestController extends Controller
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
        $user = Auth::user();
        
        return view('pages.admin.api_request.create_update', compact('user'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSoftware()
    {
        $software = Software::orderBy('name', 'asc')->get();

        if (count($software) > 0) {
            $arr = array("status" => 200, "msg" => "Success", "result" => $software);
        } else {
            $arr = array("status" => 400, "msg" => "Software not available.", "data" => []);
        }
        return \Response::json($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getApi($software_id)
    {
        $api = Api::where('software_id', $software_id)->orderBy('name', 'asc')->get();
        $authnticationFields = Software::find($software_id)->select('authentication_field')->get();
      
        if (count($api) > 0) {
            $arr = array("status" => 200, "msg" => "Success", "result" => $api, "authnticationField" => $authnticationFields);
        } else {
            $arr = array("status" => 400, "msg" => "Api not available.", "data" => []);
        }
        return \Response::json($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getField($api_id)
    {
        $searchFields = Api::find($api_id)->select('field')->get();
      
        if (count($searchFields) > 0) {
            $arr = array("status" => 200, "msg" => "Success", "result" => $searchFields);
        } else {
            $arr = array("status" => 400, "msg" => "Api not available.", "data" => []);
        }
        return \Response::json($arr);
    }
    
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
            'software_id' => 'required',
            'authentication_field' => 'required',
            'api_id' => 'required',
            'search_field' => 'required',
            'schedule' => 'required',
            'extra_schedule' => 'required',
        ];

        $messages = [
            'software_id.required' => 'Please select software.',
            'authentication_field.required' => 'Please enter authentication field.',
            'api_id.required' => 'Please select api.',
            'search_field.required' => 'Please enter search field.',
            'schedule.required' => 'Please select schedule.',
            'extra_schedule.required' => 'Please select extra schedule.',
        ];

        $validator = Validator::make($input, $rules, $messages);
       
        if ($validator->fails()) {
            $arr = array('status' => 400, 'message' => $validator->errors()->all(), 'result' => array());
        } else {
            try {
                if (isset($input['id_for_update']) && !empty($input['id_for_update'])) {
                    $software = ApiRequest::find($input['id_for_update']);
                    $message = "Api Request updated successfully.";
                } else {
                    $software = new ApiRequest();
                    $message = "Api Request added successfully.";
                }

                $input['extra_schedule'] = implode(",", $input['extra_schedule']);
                $input['company_id'] = Auth::user()->id;
                $software->fill($input)->save();
                $arr = array('status' => 200, 'message' => $message, 'data' => $software);
            } catch (QueryException $ex) {
                $message = $ex->getMessage();
                if (isset($ex->errorInfo[2])) {
                    $message = $ex->errorInfo[2];
                }
                $arr = array("status" => 400, "message" => $message, "data" => array());
            } catch (Exception $ex) {
                $message = $ex->getMessage();
                if (isset($ex->errorInfo[2])) {
                    $message = $ex->errorInfo[2];
                }
                $arr = array("status" => 400, "message" => $message, "data" => array());
            }
        } 
        return \Response::json($arr);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
