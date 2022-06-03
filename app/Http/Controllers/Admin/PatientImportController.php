<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GetPatientDetailsController;
use App\Jobs\CaregiverImport;
use App\Jobs\CheckCurrentCaregiver;
use App\Jobs\PatientImport;
use App\Jobs\VisitorImport;
use App\Models\Caregivers;
use App\Models\Demographic;
use App\Models\PatientEmergencyContact;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nexmo\Laravel\Facade\Nexmo;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;

class PatientImportController extends Controller
{
    
    public function importPatient()
    {
        try {
            $company='';
            if(Auth::guard('referral')) {
                $company = Auth::guard('referral')->user();
            }
            
            PatientImport::dispatch($company);

            $arr = array('status' => 200, 'message' => 'Please be patient, the import patient process is taking place in the background. You will receive mail after the all patient imported successfully.', 'data' => []);
        
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

    public function importCaregiver(Request $reqtest)
    { 
        try {
            $company_id='';
            if(Auth::guard('referral')) {
                $company_id = Auth::guard('referral')->user();
            } 
           
            if($reqtest['action'] == 'check-caregiver-queue') {
                CheckCurrentCaregiver::dispatch($reqtest['patient_id']);
                $arr = array('status' => 200, 'message' => '', 'data' => []);
            }else {
              
                CaregiverImport::dispatch($company_id);

                $message = 'Please be patient, the import patient process is taking place in the background.';

                $arr = array('status' => 200, 'message' => $message, 'data' => []);
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

        return \Response::json($arr);
    }

    public static function storeUser($demographics, $doral_id)
    {      
        $user = new User();
           
        if ($demographics['NotificationPreferences'] && isset($demographics['NotificationPreferences']['Email'])) {
            $email = $demographics['NotificationPreferences']['Email'];
                
            $userDuplicateEmail = User::where('email', $email)->first();
    
            if (empty($userDuplicateEmail)) {
                $user->email = $email;
            } 
        }
        
        $phone_number = $demographics['Address']['HomePhone'] ? $demographics['Address']['HomePhone'] : '';
        $tele_phone = $demographics['Address']['Phone2'] ? $demographics['Address']['Phone2']: '';

        if ($phone_number != '') {
           
            // $userDuplicatePhone = User::where('phone', setPhone($phone_number))->first();
           
            // if (empty($userDuplicatePhone)) {
            //     $user->phone = setPhone($phone_number);
            //     $user->phone_verified_at = now();
            //     $status = '0';
            // } else {
            //     $status = '4';
            // }
            $status = '0';
        } else {
            $status = '4';
        }
      
        $first_name = ($demographics['FirstName']) ? $demographics['FirstName'] : '';
        $password = str_replace("-", "@",$doral_id);
            
        $user->first_name = $first_name;
        $user->last_name = ($demographics['LastName']) ? $demographics['LastName'] : '';
        $user->password = setPassword($password);
        $user->phone = setPhone($phone_number);
        $user->phone_verified_at = now();
        $user->status = $status;
        $user->gender = setGender($demographics['Gender']);
        
        $user->dob = dateFormat($demographics['BirthDate']);

        if ($tele_phone != '') {
            $user->tele_phone = setPhone($tele_phone);
        }
       
        $user->save();
        $user->assignRole('patient')->syncPermissions(Permission::all());
        $url = route('partnerEmailVerified', base64_encode($user->id));
        $details = [
            'name' => $user->first_name,
            'href' => $url,
        ];

        if (isset($user->email)) {
            SendEmailJob::dispatch($user->email,$details,'WelcomeEmail');
        }
        return $user->id;
    }
    
    public function getPatientId(Request $request)
    {
        try {
            $input = $request->all();
            $searchPatientIds = searchPatientId($input);
            $patientIDs = $searchPatientIds['soapBody']['SearchPatientsResponse']['SearchPatientsResult']['Patients']['PatientID'];
            return $patientIDs;
            $data = [];
          
            //foreach (array_slice($visitIDs, $request['from'] , $request['to']) as $visitID) {
               // $scheduleInfo = getVisitInfo($visitIDs,$input);
                
               // $getVisitorInfo = $scheduleInfo['soapBody']['GetVisitInfoResponse']['GetVisitInfoResult']['VisitInfo'];
                //$data[] = [
                   // 'VisitID' => ($getVisitorInfo['ID']) ? $getVisitorInfo['ID'] : '',
                    //'VisitDate' => ($getVisitorInfo['VisitDate']) ? $getVisitorInfo['VisitDate'] : '',
                    //'PatientID' => ($getVisitorInfo['Patient']['ID']) ? $getVisitorInfo['Patient']['ID'] : '',
                   // 'PatientAdmissionNumber' => ($getVisitorInfo['Patient']['AdmissionNumber']) ? $getVisitorInfo['Patient']['AdmissionNumber'] : '',
                   // 'CaregiverID' => ($getVisitorInfo['Caregiver']['ID']) ? $getVisitorInfo['Caregiver']['ID'] : '',
                   // 'CaregiverCode' => ($getVisitorInfo['Caregiver']['CaregiverCode']) ? $getVisitorInfo['Caregiver']['CaregiverCode'] : '',
               // ];
            //}
            $arr = $visitIDs;
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
    public function getCaregiverId(Request $request)
    {
        try {
            $input = $request->all();
            $searchPatientIds = searchCaregiverId($input);
            $caregiverIDs = $searchPatientIds['soapBody']['SearchCaregiversResponse']['SearchCaregiversResult']['Caregivers']['CaregiverID'];
            return $caregiverIDs;
            $data = [];
          
            //foreach (array_slice($visitIDs, $request['from'] , $request['to']) as $visitID) {
               // $scheduleInfo = getVisitInfo($visitIDs,$input);
                
               // $getVisitorInfo = $scheduleInfo['soapBody']['GetVisitInfoResponse']['GetVisitInfoResult']['VisitInfo'];
                //$data[] = [
                   // 'VisitID' => ($getVisitorInfo['ID']) ? $getVisitorInfo['ID'] : '',
                    //'VisitDate' => ($getVisitorInfo['VisitDate']) ? $getVisitorInfo['VisitDate'] : '',
                    //'PatientID' => ($getVisitorInfo['Patient']['ID']) ? $getVisitorInfo['Patient']['ID'] : '',
                   // 'PatientAdmissionNumber' => ($getVisitorInfo['Patient']['AdmissionNumber']) ? $getVisitorInfo['Patient']['AdmissionNumber'] : '',
                   // 'CaregiverID' => ($getVisitorInfo['Caregiver']['ID']) ? $getVisitorInfo['Caregiver']['ID'] : '',
                   // 'CaregiverCode' => ($getVisitorInfo['Caregiver']['CaregiverCode']) ? $getVisitorInfo['Caregiver']['CaregiverCode'] : '',
               // ];
            //}
            $arr = $visitIDs;
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
    public function importVisitor(Request $request)
    {
        try {
            $input = $request->all();
            \Log::info($input);
            $searchPatientIds = searchVisits($input);
            $visitIDs = $searchPatientIds['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits']['VisitID'];
            \Log::info($visitIDs);
            return $visitIDs;
            $data = [];
          
            //foreach (array_slice($visitIDs, $request['from'] , $request['to']) as $visitID) {
               // $scheduleInfo = getVisitInfo($visitIDs,$input);
                
               // $getVisitorInfo = $scheduleInfo['soapBody']['GetVisitInfoResponse']['GetVisitInfoResult']['VisitInfo'];
                //$data[] = [
                   // 'VisitID' => ($getVisitorInfo['ID']) ? $getVisitorInfo['ID'] : '',
                    //'VisitDate' => ($getVisitorInfo['VisitDate']) ? $getVisitorInfo['VisitDate'] : '',
                    //'PatientID' => ($getVisitorInfo['Patient']['ID']) ? $getVisitorInfo['Patient']['ID'] : '',
                   // 'PatientAdmissionNumber' => ($getVisitorInfo['Patient']['AdmissionNumber']) ? $getVisitorInfo['Patient']['AdmissionNumber'] : '',
                   // 'CaregiverID' => ($getVisitorInfo['Caregiver']['ID']) ? $getVisitorInfo['Caregiver']['ID'] : '',
                   // 'CaregiverCode' => ($getVisitorInfo['Caregiver']['CaregiverCode']) ? $getVisitorInfo['Caregiver']['CaregiverCode'] : '',
               // ];
            //}
            $arr = $visitIDs;
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

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmVisits(Request $request)
    {
    	try { 
            $input = $request->all();
            $result = confirmVisits($input);
            
            $arr = $result;
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
    public function serchVisitId1(Request $request)
    {
    	try {
            $result = searchVisits();
            
            $arr = $result;
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
    public function serchVisitId() {
        echo"<pre>";
        print_r(phpinfo());
        exit();
        \Log::info("serchVisitId");
        $appName = "COTT_1031";
        $appKey = "MQAyADEAMAA0ADIALQAwADcAQQAxADcAMQBFAEEANQA5AEQANQAzAEYAOAA3ADIARgA2ADEANAA3AEMAOAAyADIAMQA5AEYANQA=";
        $appSecretKey = "e2bc8653-4f0c-49b7-a161-a6578cdff11f";
        $patientID = '<PatientID>14680984</PatientID>';
        $caregiverID = '<CaregiverID>3028555</CaregiverID>';
        $data = '<?xml version="1.0" encoding="UTF-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SearchVisits xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>COTT_1031</AppName><AppSecret>e2bc8653-4f0c-49b7-a161-a6578cdff11f</AppSecret><AppKey>MQAyADEAMAA0ADIALQAwADcAQQAxADcAMQBFAEEANQA5AEQANQAzAEYAOAA3ADIARgA2ADEANAA3AEMAOAAyADIAMQA5AEYANQA=</AppKey></Authentication><SearchFilters><StartDate>2022-03-20</StartDate><EndDate>2022-03-20</EndDate><PatientID>14680984</PatientID><CaregiverID>3028555</CaregiverID></SearchFilters></SearchVisits></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        $method = 'POST';
        $resp = $this->curlCallNew($data, $method);
        $arr = array("status" => 400, "message" => "Sucess", "resultdata" => $resp);
        return \Response::json($arr);
    }
    
    function curlCallNew($data, $method) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => config('patientDetailAuthentication.AppUrl'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_HTTPHEADER => array(
            'Content-Type: text/xml'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $response);
        $xml = new \SimpleXMLElement($response);
        
        $searchPatientIds = json_decode(json_encode((array)$xml), TRUE);
        $visitIDs = $searchPatientIds['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits']['VisitID'];
        return $visitIDs;
    }
}