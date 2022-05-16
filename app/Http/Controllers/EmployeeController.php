<?php

namespace App\Http\Controllers;

use App\Models\CurlModel\CurlFunction;
use App\Services\EmployeeService;
use App\Services\DesignationService;
use Illuminate\Http\Request;
use Exception;

class EmployeeController extends Controller
{
    public function index() {
    	$status = 0;
        $message = "";
        $record = [];
        try {
            $employeeServices = new EmployeeService();
            $responseArray = $employeeServices->getEmployee();
            
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
        $status = 0;
        $message = "";
        $record = 0;
        try {
            $services = new DesignationService();
            $responseArray = $services->getDesignation();
            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data'];
            }
            $message = $responseArray['message'];

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }
    	return view('pages.admin.employee-add')->with('record',$record);
    }

    public function employeeStore(Request $request) {

        $fileName = request()->file('uploadphoto');
        $status = 0;
        $message = "";
        $record = 0;
        try {

            $url = CurlFunction::getURL().'/api/auth/employee/store';
            $headerValue = array(
                'X-Requested-With: XMLHttpRequest',
                'Access-Control-Allow-Origin: http://localhost'
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
             
            //If the function curl_file_create exists
            if(function_exists('curl_file_create')){
                $filePath = curl_file_create($fileName->getpathname(), $fileName->getClientMimeType(), $fileName->getClientOriginalName());
            } else{
                $filePath = '@' . realpath($fileName->getClientOriginalName());
                curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
            }

            $data = array(
                    'file_name' => $filePath,
                    'first_name' => $request->firstname,
                    'last_name' => $request->lastname,
                    'dob' => $request->dob,
                    'gender' => $request->gender,
                    'address1' => $request->address,
                    'city' => $request->city,
                    'state' => $request->stateprovince,
                    'zip' => $request->zipcode,
                    'country' => $request->country,
                    'home_phone' => $request->hometelephone,
                    'phone' => $request->mobile,
                    'alternate_phone' => $request->worktelephone,
                    'email' => $request->email,
                    'marital_status' => $request->marital_status,
                    'blood_group' => $request->blood_group
            );
            
            
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headerValue);
            $curlResponse = curl_exec($ch);
            
            if(curl_errno($ch)) {
                throw new Exception(curl_error($ch));
            }
             
            $responseArray = json_decode($curlResponse, true);
            
            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data']['Employee_id'];
                //$record = 1;
            }
            $message = $responseArray['message'];
            $response = [
                'status' => $status,
                'message' => $message,
                'dataV' => $record
            ];
            return response()->json($response, 201);

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }

        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $record
        ];
        
        return redirect('/admin/employee');
    }

    public function employeeWork(Request $request) {

        $status = 0;
        $message = "";
        $record = [];
        try {
            $data = [
                    'role_id' => $request->role_id,
                    'experience' => $request->experience,
                    'current_job_location' => $request->joblocation,
                    'employeement_type' => $request->employement_type, 
                    'language_known' => $request->languageKnown,
                    'employee_id' => $request->employeeId
            ];
            $Data = json_encode($data, true);
            $url = CurlFunction::getURL().'/api/auth/employee/work';
            $headerValue = array(
                'Content-Type: application/json',
                'X-Requested-With: XMLHttpRequest',
                'Access-Control-Allow-Origin: http://localhost'
            );
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            curl_setopt($ch, CURLOPT_POSTFIELDS, $Data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headerValue);
            $curlResponse = curl_exec($ch);
            
            if(curl_errno($ch)) {
                throw new Exception(curl_error($ch));
            }
            $responseArray = json_decode($curlResponse, true);
            if($responseArray['status']) {
                $status = 1;
                //$record = $responseArray['data']['id'];
                $record = 1;
            }
            $message = $responseArray['message'];
            $response = [
                'status' => $status,
                'message' => $message
            ];
            return redirect('/admin/employee');

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }

        $response = [
            'status' => $status,
            'message' => $message
        ];
        
        return redirect('/admin/employee');
    }

    /**
     * Profile View
     *
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $employeeServices = new EmployeeService();
            $responseArray = $employeeServices->getProfile($id);
            
            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data']['employee'];
                
                return view('pages.admin.employee-view')->with('record',$record);
            }
            $message = $responseArray['message'];

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }

        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $record
        ];

        return redirect('/admin/employee');
    }

    /**
     * Remove Employee
     *
     * @return \Illuminate\Http\Response
     */
    public function removeEmployee($id)
    {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $employeeServices = new EmployeeService();
            $responseArray = $employeeServices->removeEmployee($id);
            
            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data']['employee'];
                
                return view('pages.admin.employee-view')->with('record',$record);
            }
            $message = $responseArray['message'];

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }

        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $record
        ];

        return redirect('/admin/employee');
    }
}
