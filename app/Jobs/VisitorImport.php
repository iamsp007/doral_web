<?php

namespace App\Jobs;

use App\Models\Visitor;
use App\Models\VisitorDetail;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class VisitorImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $searchPatientIds = $this->searchVisitorDetails();
        $visitIDs = $searchPatientIds['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits']['VisitID'];

        log::info('hha exchange search patient detail start');
        log::info('total hha count'.count($visitIDs));

        $missing_visitor_id = [];
        $visitors = VisitorDetail::get();
        // foreach ($visitors as $visitor) { 
        //     $missing_visitor_id[] = $visitor->visitor_id;
        // }
        
        $data = [];
        $stored_visit_id = [];
        foreach ($visitIDs as $visitID) {
        // foreach (array_slice($visitIDs, 0 , 1) as $visitID) {
            // if (! in_array($visitID, $missing_visitor_id)) {
            // }
            $scheduleInfo = $this->getVisitInfo($visitID);
                $getVisitorInfo = $scheduleInfo['soapBody']['GetVisitInfoResponse']['GetVisitInfoResult']['VisitInfo'];

                self::storeVisitor($getVisitorInfo);
        }
        log::info('stored visit id'.count($stored_visit_id));
        log::info('missing visit count'.count($data));
        log::info('hha exchange search visit detail end');

        try {
            // $company_email = $this->company->email;
           
            $details = [
                'name' => 'HCBS',
                'total' => count($stored_visit_id),
            ];
            
            SendEmailJob::dispatch('shashikant@hcbspro.com',$details,'SendPatientImpotNotification');
        }catch (\Exception $exception){
            Log::info($exception->getMessage());
        }
    }

    public static function storeVisitor($getVisitorInfo)
    { 
        $visitorDetail = new Visitor();

        $visitorDetail->visitor_id = ($getVisitorInfo['ID']) ? $getVisitorInfo['ID'] : '' ;
        $visitorDetail->visit_date = ($getVisitorInfo['VisitDate']) ? $getVisitorInfo['VisitDate'] : '' ;
        if ($getVisitorInfo['Patient']) {
            $patientData = [
                'id' => ($getVisitorInfo['Patient']['ID']) ? $getVisitorInfo['Patient']['ID'] : '',
                'admission_number' => ($getVisitorInfo['Patient']['AdmissionNumber']) ? $getVisitorInfo['Patient']['AdmissionNumber'] : '',
                'first_name' => ($getVisitorInfo['Patient']['FirstName']) ? $getVisitorInfo['Patient']['FirstName'] : '',
                'last_name' => ($getVisitorInfo['Patient']['LastName']) ? $getVisitorInfo['Patient']['LastName'] : '',
            ];

            $visitorDetail->patient_detail = $patientData;
        }

        if ($getVisitorInfo['Caregiver']) {
            $caregiverData = [
                'id' => ($getVisitorInfo['Caregiver']['ID']) ? $getVisitorInfo['Caregiver']['ID'] : '',
                'caregiver_code' => ($getVisitorInfo['Caregiver']['CaregiverCode']) ? $getVisitorInfo['Caregiver']['CaregiverCode'] : '',
                'first_name' => ($getVisitorInfo['Caregiver']['FirstName']) ? $getVisitorInfo['Caregiver']['FirstName'] : '',
                'last_name' => ($getVisitorInfo['Caregiver']['LastName']) ? $getVisitorInfo['Caregiver']['LastName'] : '',
                'time_and_attendance_PIN' => ($getVisitorInfo['Caregiver']['TimeAndAttendancePIN']) ? $getVisitorInfo['Caregiver']['TimeAndAttendancePIN'] : '',
                'pay_code' => [
                    'id' => ($getVisitorInfo['Caregiver']['PayCode']['ID']) ? $getVisitorInfo['Caregiver']['PayCode']['ID'] : '',
                    'name' => ($getVisitorInfo['Caregiver']['PayCode']['Name']) ? $getVisitorInfo['Caregiver']['PayCode']['Name'] : '',
                ],
            ];

            $visitorDetail->caregiver_detail = $caregiverData;
        }

        $caregiverData = [
            'schedule_start_time' => ($getVisitorInfo['ScheduleStartTime']) ? $getVisitorInfo['ScheduleStartTime'] : '' ,
            'schedule_end_time' => ($getVisitorInfo['ScheduleEndTime']) ? $getVisitorInfo['ScheduleEndTime'] : '' ,
            'visitor_start_time' => ($getVisitorInfo['VisitStartTime']) ? $getVisitorInfo['VisitStartTime'] : '' ,
            'visitor_end_time' => ($getVisitorInfo['VisitEndTime']) ? $getVisitorInfo['VisitEndTime'] : '',
            'evv_start_time' => ($getVisitorInfo['EVVStartTime']) ? $getVisitorInfo['EVVStartTime'] : '',
            'evv_end_time' => ($getVisitorInfo['EVVEndTime']) ? $getVisitorInfo['EVVEndTime'] : '',
        ];

        $visitorDetail->schedule_time_detail = $caregiverData;

        $visitorDetail->is_missed_visit = ($getVisitorInfo['IsMissedVisit']) ? $getVisitorInfo['IsMissedVisit'] : '' ;

        if ($getVisitorInfo['TTOT']) {
            $TTOTData = [
                'hours' => ($getVisitorInfo['TTOT']['Hours']) ? $getVisitorInfo['TTOT']['Hours']   : '' ,
                'minutes' => ($getVisitorInfo['TTOT']['Minutes']) ? $getVisitorInfo['TTOT']['Minutes']   : '' ,
            ];

            $visitorDetail->ttot_detail = $TTOTData;
        }

        if ($getVisitorInfo['Verification']) {
            $verificationData = [
                'verified_By' => ($getVisitorInfo['Verification']['VerifiedBy']) ? $getVisitorInfo['Verification']['VerifiedBy']   : '',
                'notes' => ($getVisitorInfo['Verification']['Notes']) ? $getVisitorInfo['Verification']['Notes']   : '',
                'verified_date' => ($getVisitorInfo['Verification']['VerifiedDate']) ? $getVisitorInfo['Verification']['VerifiedDate']   : '',
                'verified_time ' => ($getVisitorInfo['Verification']['VerifiedTime ']) ? $getVisitorInfo['Verification']['VerifiedTime ']   : '',
                'supervisor_name ' => ($getVisitorInfo['Verification']['SupervisorName ']) ? $getVisitorInfo['Verification']['SupervisorName ']   : '',
            ];

            $visitorDetail->verification_detail = $verificationData;
        }

        if ($getVisitorInfo['Timesheet']) {
            $verificationData = [
                'required' => ($getVisitorInfo['Timesheet']['Required']) ? $getVisitorInfo['Timesheet']['Required']   : '',
                'Approved' => ($getVisitorInfo['Timesheet']['Approved']) ? $getVisitorInfo['Timesheet']['approved']   : '',
            ];

            $visitorDetail->timesheet_detail = $verificationData;
        }

        $visitorDetail->save();
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchVisitorDetails()
    {
        $date = Carbon::now();
        $today = $date->format("Y-m-d");
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SearchVisits xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><SearchFilters><StartDate>' . $today .'</StartDate><EndDate>' . $today . '</EndDate></SearchFilters></SearchVisits></SOAP-ENV:Body></SOAP-ENV:Envelope>';
     
        $method = 'POST';
        return $this->curlCall($data, $method);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getVisitInfo($visitorID)
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetVisitInfo xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><VisitInfo><ID>' . $visitorID . '</ID></VisitInfo></GetVisitInfo></SOAP-ENV:Body></SOAP-ENV:Envelope>';
        $method = 'POST';

        return $this->curlCall($data, $method);
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
