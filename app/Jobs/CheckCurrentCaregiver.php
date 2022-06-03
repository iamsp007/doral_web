<?php

namespace App\Jobs;

use App\Mail\SendErrorEmail;
use App\Mail\SendPatientImpotNotification;
use App\Models\Caregivers;
use App\Models\Demographic;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CheckCurrentCaregiver implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $patient_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($patient_id)
    {
        $this->patient_id = $patient_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $demographic = Demographic::where('user_id',$this->patient_id)->select('patient_id')->first();
		       
        $input['patientId'] = $demographic->patient_id;
        $date = Carbon::now();
        $today = $date->format("Y-m-d");

        $input['from_date'] = $today;
        $input['to_date'] = $today;

        $curlFunc = searchVisits($input);   

        if (isset($curlFunc['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits'])) {
            $visitID = $curlFunc['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits']['VisitID'];
            if(is_array($visitID)) {
                foreach ($visitID as $viId) {
                    self::getSchedule($viId, $this->patient_id);
                }
            } else {
                $viId = $curlFunc['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits']['VisitID'];
                self::getSchedule($viId, $this->patient_id);
            }
        }
    }

    public static function getSchedule($viId, $patient_id)
    {	
        $scheduleInfo = getScheduleInfo($viId);
        $getScheduleInfo = $scheduleInfo['soapBody']['GetScheduleInfoResponse']['GetScheduleInfoResult']['ScheduleInfo'];
        $caregiver_id = ($getScheduleInfo['Caregiver']['ID']) ? $getScheduleInfo['Caregiver']['ID'] : '' ;
        
        $demographicModal = Demographic::select('id','user_id','patient_id')->where('patient_id', $caregiver_id)->with(['user' => function($q) {
            $q->select('id', 'email', 'phone');
        }])->first();
        $phoneNumber = '';
        if ($demographicModal && $demographicModal->user->phone != '') {
            $phoneNumber = $demographicModal->user->phone;
        } else {
            $getdemographicDetails = getCaregiverDemographics($caregiver_id);
            if (isset($getdemographicDetails['soapBody']['GetCaregiverDemographicsResponse']['GetCaregiverDemographicsResult']['CaregiverInfo'])) {
                $demographics = $getdemographicDetails['soapBody']['GetCaregiverDemographicsResponse']['GetCaregiverDemographicsResult']['CaregiverInfo'];

                $phoneNumber = $demographics['Address']['HomePhone'] ? $demographics['Address']['HomePhone'] : '';

                $doral_id = createDoralId();
                $user_id = storeUser($demographics, $doral_id);
                
                if ($user_id) {
                    $company_id = '9';
                    storeDemographic($demographics, $user_id, $company_id, $doral_id,'caregiver-check');
                    storeEmergencyContact($demographics, $user_id);
                }
            }
        }

        $scheduleStartTime = ($getScheduleInfo['ScheduleStartTime']) ? $getScheduleInfo['ScheduleStartTime'] : '' ;
        $scheduleEndTime = ($getScheduleInfo['ScheduleEndTime']) ? $getScheduleInfo['ScheduleEndTime'] : '' ;
        $firstName = ($getScheduleInfo['Caregiver']['FirstName']) ? $getScheduleInfo['Caregiver']['FirstName'] : '' ;
        $lastName = ($getScheduleInfo['Caregiver']['LastName']) ? $getScheduleInfo['Caregiver']['LastName'] : '' ;

        Caregivers::create([
            'patient_id' => $patient_id,
            'phone' => $phoneNumber,
            'start_time' => $scheduleStartTime,
            'end_time' => $scheduleEndTime,
            'name' => $firstName . ' ' . $lastName,
        ]);	
    }
}
