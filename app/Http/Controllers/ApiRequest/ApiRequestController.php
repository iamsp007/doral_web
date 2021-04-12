<?php

namespace App\Http\Controllers\ApiRequest;

use App\Http\Controllers\Controller;
use App\Models\Api;
use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //
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
