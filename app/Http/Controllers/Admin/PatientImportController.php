<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\CaregiverImport;
use App\Jobs\CheckCurrentCaregiver;
use App\Jobs\PatientImport;
use App\Models\Caregivers;
use App\Models\Demographic;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                    $visitID = $curlFunc['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits']['VisitID'];

                    if(is_array($visitID)) {
                        foreach ($visitID as $viId) {
                            $data = self::getCaregiver($viId, $reqtest);
                        }
                        $arr = array('status' => 200, 'message' => 'Get current caregiver', 'data' => $data);
                    } else {
                        $viId = $curlFunc['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits']['VisitID'];

                        $data = self::getCaregiver($viId, $reqtest);

                        $arr = array('status' => 200, 'message' => 'Get current caregiver', 'data' => $data);
                    }
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

    public static function getCaregiver($viId, $reqtest)
    {
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
            if (isset($getdemographicDetails['soapBody']['GetCaregiverDemographicsResponse']['GetCaregiverDemographicsResult']['CaregiverInfo'])) {
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

        return $data;
    }

    public function getPatientId(Request $request)
    {
        try {
            $input = $request->all();
            $searchPatientIds = searchPatientId($input);
            $patientIDs = $searchPatientIds['soapBody']['SearchPatientsResponse']['SearchPatientsResult']['Patients']['PatientID'];

            return $patientIDs;
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
           
            $searchPatientIds = searchVisits($input);
            $visitIDs = $searchPatientIds['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits']['VisitID'];
           
            return $visitIDs;
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
}