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
           
            if ($reqtest['action'] == 'check-caregiver') {
		        $demographic = Demographic::where('user_id',$reqtest['patient_id'])->select('patient_id')->first();
                $input['patientId'] = $demographic->patient_id;
                $date = Carbon::now();// will get you the current date, time
                $today = $date->format("Y-m-d");

                $input['from_date'] = $today;
                $input['to_date'] = $today;
	
                $curlFunc = searchVisits($input);
		
                if (isset($curlFunc['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits'])) {
                    $viId = $curlFunc['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits']['VisitID'];
                    // $data = [];
                    
                    //foreach ($visitID as $viId) {
                   
                        $scheduleInfo = getScheduleInfo($viId);
                        $getScheduleInfo = $scheduleInfo['soapBody']['GetScheduleInfoResponse']['GetScheduleInfoResult']['ScheduleInfo'];
                        $caregiver_id = ($getScheduleInfo['Caregiver']['ID']) ? $getScheduleInfo['Caregiver']['ID'] : '' ;
			
                        $demographic = Demographic::select('id','user_id','patient_id')->where('patient_id', $caregiver_id)->with(['user' => function($q) {
                            $q->select('id', 'email', 'phone');
                        }])->first();
                       	
                        if ($demographic) {
                            $phoneNumber = $demographic->user->phone;
                        } else {
                            $getdemographicDetails = getCaregiverDemographics($caregiver_id);
                            $demographics = $getdemographicDetails['soapBody']['GetCaregiverDemographicsResponse']['GetCaregiverDemographicsResult']['CaregiverInfo'];
    
                            $phoneNumber = $demographics['Address']['HomePhone'] ? $demographics['Address']['HomePhone'] : '';
                            
                              $doral_id = createDoralId();

                            $user_id = storeUser($demographics, $doral_id);

                            if ($user_id) {
                                $company_id = '16';
                                storeDemographic($demographics, $user_id, $company_id, $doral_id,'caregiver-check');

                                storeEmergencyContact($demographics, $user_id);
                            }
                        }                        
                        
                        $scheduleStartTime = ($getScheduleInfo['ScheduleStartTime']) ? $getScheduleInfo['ScheduleStartTime'] : '' ;
                        $scheduleEndTime = ($getScheduleInfo['ScheduleEndTime']) ? $getScheduleInfo['ScheduleEndTime'] : '' ;
                        $firstName = ($getScheduleInfo['Caregiver']['FirstName']) ? $getScheduleInfo['Caregiver']['FirstName'] : '' ;
                        $lastName = ($getScheduleInfo['Caregiver']['LastName']) ? $getScheduleInfo['Caregiver']['LastName'] : '' ;

                        $data = Caregivers::create([
                            'patient_id' => $reqtest['patient_id'],
                            'phone' => $phoneNumber,
                            'start_time' => $scheduleStartTime,
                            'end_time' => $scheduleEndTime,
                            'name' => $firstName . ' ' . $lastName,
                        ]);    
                   // }
                   
                    $arr = array('status' => 200, 'message' => 'Get current caregiver', 'data' => $data);
                } else {
                    $arr = array('status' => 200, 'message' => 'Data not found', 'data' => []);
                }
                
            } else if($reqtest['action'] == 'check-caregiver-queue') {
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
    public function importVisitor(Request $request)
    {
        try {
           	$input = $request->all();
            //VisitorImport::dispatch();

            $searchPatientIds = searchVisits($input);
            $visitIDs = $searchPatientIds['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits']['VisitID'];
		    $data = [];
          
		    foreach (array_slice($visitIDs, $request['from'] , $request['to']) as $visitID) {
                $scheduleInfo = getVisitInfo($visitID,$input);
                
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
    public function confirmVisits(Request $request)
    {
    	try {
            $input = $request->all();
            //	$duties = explode(',' ,$input['duties']);
           
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
}