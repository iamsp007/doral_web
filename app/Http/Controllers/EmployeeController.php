<?php

namespace App\Http\Controllers;

use App\Models\CurlModel\CurlFunction;
use Illuminate\Http\Request;
use Exception;

class EmployeeController extends Controller
{
    //
    public function index() {
    	$status = 0;
        $message = "";
        $record = [];
        try {
            //$apiToken = session('token');
            $url = CurlFunction::getURL().'/api/auth/employee';
            $curlResponse = CurlFunction::withOutTokenGet($url);
            $responseArray = json_decode($curlResponse, true);
            //dd($responseArray);
            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data'];
            }
            $message = $responseArray['message'];

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }
        return View('pages.admin.employee')->with('record',$record);
    }

    public function employeeAdd() {
    	return view('pages.admin.employee-add');
    }
}
