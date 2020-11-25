<?php

namespace App\Http\Controllers;

use App\Models\PatientReferral;
use App\Models\CurlModel\CurlFunction;
use Illuminate\Http\Request;
use Exception;
use CURLFile;

class PatientReferralController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $url = CurlFunction::getURL().'/api/auth/patient-referral';
            
            $headerValue = array(
                'Content-Type: application/json',
                'X-Requested-With: XMLHttpRequest',
                'Access-Control-Allow-Origin: http://localhost'
            );

            $ch = curl_init($url);
            curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 40,
            CURLOPT_HTTPHEADER => $headerValue
            ));
        
            $curlResponse = curl_exec($ch);
            $responseArray = json_decode($curlResponse, true);
            //dd($responseArray);
            curl_close($ch); 
            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data'];
            }
            $message = $responseArray['message'];

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }
        //dd($record);
        return View('pages.referral.employee-pre-physical')->with('record',$record);
    }
    public function index1() {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $url = CurlFunction::getURL().'/api/auth/patient-referral';
            
            $headerValue = array(
                'Content-Type: application/json',
                'X-Requested-With: XMLHttpRequest',
                'Access-Control-Allow-Origin: http://localhost'
            );

            $ch = curl_init($url);
            curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 40,
            CURLOPT_HTTPHEADER => $headerValue
            ));
        
            $curlResponse = curl_exec($ch);
            $responseArray = json_decode($curlResponse, true);
            //dd($responseArray);
            curl_close($ch); 
            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data'];
            }
            $message = $responseArray['message'];

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }
        //dd($record);
        return View('pages.referral.employee-pre-physical-upload-bulk-data')->with('record',$record);
    }
    public function employeePrePhysical() {
        $status = 0;
        $message = "";
        $record = [];
        try {
            $url = CurlFunction::getURL().'/api/auth/patient-referral';
            
            $headerValue = array(
                'Content-Type: application/json',
                'X-Requested-With: XMLHttpRequest',
                'Access-Control-Allow-Origin: http://localhost'
            );

            $ch = curl_init($url);
            curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 40,
            CURLOPT_HTTPHEADER => $headerValue
            ));
        
            $curlResponse = curl_exec($ch);
            $responseArray = json_decode($curlResponse, true);
            //dd($responseArray);
            curl_close($ch); 
            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data'];
            }
            $message = $responseArray['message'];

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }
        //dd($record);
        return View('pages.referral.employee-pre-physical')->with('record',$record);
    }
    public function store(Request $request)
    {

        //dd($request->all());

        /*$fileName = request()->file('file-1');
        //dd($fileName);
        //dd($fileName->getClientOriginalName());
        $status = 0;
        $message = "";
        try {
            //  ---------------
            $url = CurlFunction::getURL().'/api/auth/patient-referral/store';
            $headerValue = array(
                'Content-Type: multipart/form-data',
                'X-Requested-With: XMLHttpRequest',
                'Access-Control-Allow-Origin: http://localhost'
            );
            /*$ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
             
            //If the function curl_file_create exists
            if(function_exists('curl_file_create')){
                $filePath = curl_file_create($fileName[0]->getClientOriginalName());
            } else{
                $filePath = '@' . realpath($fileName[0]->getClientOriginalName());
                curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
            }

            $data = array(
                    'file_name' => $filePath,
                    'referral_id' => 1
            );
            //$data = json_encode($data);
            //dd($data);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headerValue);
            $result = curl_exec($ch);
            
            if(curl_errno($ch)) {
                throw new Exception(curl_error($ch));
            }
             
            echo $result;
            */
            
            /*$cfile = new CURLFile($fileName->getClientOriginalName(),'text/csv','test_name');
            $data = array(
                  'referral_id' => 1,
                  'file_name' => $cfile
                );

            //dd($data);
            $r = curl_init($url);
            curl_setopt($r, CURLOPT_POST, true);
            curl_setopt(
                $r,
                CURLOPT_POSTFIELDS,
                $data);

            // output the response
            curl_setopt($r, CURLOPT_HTTPHEADER, $headerValue);
            curl_setopt($r, CURLOPT_RETURNTRANSFER, true);
            var_dump(curl_exec($r));

            // close the session
            curl_close($r);

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }

        $response = [
            'status' => $status,
            'message' => $message
        ];

        return response()->json($response, 201);*/

        $status = 0;
        $delimiter = ",";
        $message = 'Something wrong';
        try {
            //Post data
            //$request = json_decode($request->getContent(), true);
            $csvData = $request;

            //upload file
            if ($request->hasFile('file_name')) {
                // Get filename with the extension
                $filenameWithExt = $request->file('file_name')->getClientOriginalName();
                //Get just filename
                $filename =  preg_replace("/[^a-z0-9\_\-\.]/i", '_',pathinfo($filenameWithExt, PATHINFO_FILENAME));
                // Get just ext
                $extension = $request->file('file_name')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                // Upload Image
                $path = $request->file('file_name')->storeAs('csv', $fileNameToStore);
                //dd($path);
                //$user->avatar = $fileNameToStore;
                //$user->save();
            }

            // Get data from CSV
            if (!\Storage::disk('local')->exists($path))
                throw new \ErrorException('File not found');
            $filePath = storage_path('app/'.$path);
            $header = null;
            $patients = array();
             if (($handle = fopen($filePath, 'r')) !== false) {
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                    if (!$header)
                        $header = $row;
                    else
                        $patients[] = array_combine($header, $row);
                }
                fclose($handle);
            }
             foreach ($patients as $patient) {
                $data = array(
                    'referral_id' => $csvData['referral_id'],
                    'first_name' => $patient['First Name'],
                    'middle_name' => $patient['Middle Name'],
                    'last_name' => $patient['Last Name'],
                    'dob' => date('yy-m-d', strtotime($patient['Date of Birth'])),
                    'gender' => $patient['Gender'],
                    //'patient_id' => $patient['Patient ID'],
                    //'medicaid_number' => $patient['Medicaid Number'],
                    //'medicare_number' => $patient['Medicare Number'],
                    'ssn' => $patient['SSN'],
                    'start_date' => date('yy-m-d', strtotime($patient['Hire Date'])),
                    //'from_date' => date('yy-m-d', strtotime($patient['From Date'])),
                    //'to_date' => date('yy-m-d', strtotime($patient['To Date'])),
                    'address_1' => $patient['Street1'],
                    //'address_2' => $patient['Address Line 2'],
                    'city' => $patient['City'],
                    'state' => $patient['State'],
                    'county' => $patient['Country of Birth'],
                    'Zip' => $patient['Zip Code'],
                    'phone1' => $patient['Home Phone'],
                    'phone2' => $patient['Phone2'],
                    //'eng_name' => $patient['emg Name'],
                    //'eng_addres' => $patient['Address1'],
                    //'emg_phone' => $patient['Phone 1'],
                    'emg_relationship' => $patient['Marital Status'],
                );
                $id = patientReferral::insert($data);                
            }

            if ($id) {
                $status = 1;
                $message = 'CSV Uploaded successfully';
            }
        } catch (\Exception $e) {
            $status = 0;
            $message = $e->getMessage() . $e->getLine();
        }

        $response = [
            'status' => $status,
            'message' => $message
        ];

        return response()->json($response, 201);


    }

}
