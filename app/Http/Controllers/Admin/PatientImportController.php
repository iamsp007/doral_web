<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GetPatientDetailsController;
use App\Jobs\CaregiverImport;
use App\Jobs\PatientImport;
use App\Jobs\VisitorImport;
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

            $arr = array('status' => 200, 'message' => 'Please be patient, the import patient process is taking place in the background.', 'data' => []);
            //Please be patient, the import patient process is taking place in the background. You will receive mail after the all patient imported successfully.
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

    public function importCaregiver()
    {
        try {
            $company_id='';
            if(Auth::guard('referral')) {
                $company_id = Auth::guard('referral')->user();
            } 
            CaregiverImport::dispatch($company_id);

            $arr = array('status' => 200, 'message' => 'Please be patient, the import patient process is taking place in the background.', 'data' => []);
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
            //VisitorImport::dispatch();

            $searchPatientIds = $this->searchVisitorDetails($input);
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
    public function searchVisitorDetails($input)
    {
        //$date = Carbon::now();
        //$today = date('Y-m-d', strtotime('-1 day', time()));
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SearchVisits xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>' . $input['AppName']. '</AppName><AppSecret>' . $input['AppSecret']. '</AppSecret><AppKey>' . $input['AppKey']. '</AppKey></Authentication><SearchFilters><StartDate>' . $input['from_date'] .'</StartDate><EndDate>' . $input['to_date']  . '</EndDate></SearchFilters></SearchVisits></SOAP-ENV:Body></SOAP-ENV:Envelope>';
     
        $method = 'POST';
        return $this->curlCall($data, $method);
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

        return $this->curlCall($data, $method);
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
        $result =  $this->curlCall($data, $method);
        
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
    
    public function curlCall($data, $method)
    {
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
        return json_decode(json_encode((array)$xml), TRUE);
    }
}
