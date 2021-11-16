<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GetPatientDetailsController;
use App\Jobs\CaregiverImport;
use App\Jobs\PatientImport;
use App\Jobs\VisitorImport;
use App\Models\Demographic;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nexmo\Laravel\Facade\Nexmo;

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
            
            if ($reqtest['action'] = 'check-caregiver') {

                $input['patient_id'] = $reqtest['patient_id'];
                $date = Carbon::now();// will get you the current date, time
                $today = $date->format("Y-m-d");

                $input['from_date'] = $today;
                $input['to_date'] = $today;

                $curlFunc = searchVisits($input);

                if (isset($curlFunc['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits'])) {
                    $visitID = $curlFunc['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits']['VisitID'];
                  
                    foreach ($visitID as $viId) {
                        $scheduleInfo = getScheduleInfo($viId);
                        $getScheduleInfo = $scheduleInfo['soapBody']['GetScheduleInfoResponse']['GetScheduleInfoResult']['ScheduleInfo'];

                        $caregiver_id = ($getScheduleInfo['Caregiver']['ID']) ? $getScheduleInfo['Caregiver']['ID'] : '' ;
                        $getdemographicDetails = getCaregiverDemographics($caregiver_id);

                        $demographics = $getdemographicDetails['soapBody']['GetCaregiverDemographicsResponse']['GetCaregiverDemographicsResult']['CaregiverInfo'];

                        $doral_id = createDoralId();

                        $user_id = storeUser($demographics, $doral_id);

                        if ($user_id) {
                            
                            storeDemographic($demographics, $user_id, $company_id, $doral_id);

                            storeEmergencyContact($demographics, $user_id);
                        }
                    }
                }
                dump($getScheduleInfo);
                $arr = array('status' => 200, 'message' => 'Get current caregiver', 'data' => $getScheduleInfo);
            } else {
               
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
    public function importVisitor(Request $request)
    {
        try {
           	$input = $request->all();
            //VisitorImport::dispatch();

            $searchPatientIds = searchVisits($input);
            $visitIDs = $searchPatientIds['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits']['VisitID'];
		 $data = [];
            //
	   // if ($request['from'] == 0 && $request['to'] == 0) {
	    //	foreach ($visitIDs as $visitID) {
	    //} else {
		foreach (array_slice($visitIDs, $request['from'] , $request['to']) as $visitID) {
	   // }
	    
                $scheduleInfo = $this->getVisitInfo($visitID, $input);
                $getVisitorInfo = $scheduleInfo['soapBody']['GetVisitInfoResponse']['GetVisitInfoResult']['VisitInfo'];
                $data[] = [
		        'VisitID' => ($getVisitorInfo['ID']) ? $getVisitorInfo['ID'] : '',
		        'VisitDate' => ($getVisitorInfo['VisitDate']) ? $getVisitorInfo['VisitDate'] : '',
		        'PatientID' => ($getVisitorInfo['Patient']['ID']) ? $getVisitorInfo['Patient']['ID'] : '',
			'PatientAdmissionNumber' => ($getVisitorInfo['Patient']['AdmissionNumber']) ? $getVisitorInfo['Patient']['AdmissionNumber'] : '',
			'CaregiverID' => ($getVisitorInfo['Caregiver']['ID']) ? $getVisitorInfo['Caregiver']['ID'] : '',
			'CaregiverCode' => ($getVisitorInfo['Caregiver']['CaregiverCode']) ? $getVisitorInfo['Caregiver']['CaregiverCode'] : '',
		 ];
            }
            $arr = $data;
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
    public function getVisitInfo($visitorID,$input)
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetVisitInfo xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>' . $input['AppName']. '</AppName><AppSecret>' . $input['AppSecret']. '</AppSecret><AppKey>' . $input['AppKey']. '</AppKey></Authentication><VisitInfo><ID>' . $visitorID . '</ID></VisitInfo></GetVisitInfo></SOAP-ENV:Body></SOAP-ENV:Envelope>';
        $method = 'POST';

        return curlCall($data, $method);
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
//	$duties = explode(',' ,$input['duties']);
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><ConfirmVisits xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>' . $input['AppName']. '</AppName><AppSecret>' . $input['AppSecret']. '</AppSecret><AppKey>' . $input['AppKey']. '</AppKey></Authentication><VisitInfo><VisitID>' . $input['visitId'] . '</VisitID><VisitStartTime>' . $input['startTime']. '</VisitStartTime><VisitEndTime>' . $input['endTime']. '</VisitEndTime><ReasonCode>100</ReasonCode><ActionCode>10</ActionCode></VisitInfo></ConfirmVisits></SOAP-ENV:Body></SOAP-ENV:Envelope>';
     	
        $method = 'POST';
        $result =  curlCall($data, $method);
        
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
}
