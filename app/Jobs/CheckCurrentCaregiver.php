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
        $demographic = Demographic::with(['user'=> function($q){
            $q->select('id','first_name', 'last_name');
        }])->where('user_id',$this->patient_id)->select('id', 'user_id', 'patient_id')->first();
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
                    'patient_id' => $this->patient_id,
                    'phone' => $phoneNumber,
                    'start_time' => $scheduleStartTime,
                    'end_time' => $scheduleEndTime,
                    'name' => $firstName . ' ' . $lastName,
                ]);    
            // }
            
            $message = 'Thank you for choosing HHAExchange for the get current caregiver process.';
        } else {
            $data = [
                'patient_id' => $this->patient_id,
                'phone' => $demographic->user->phone,
                'name' => $demographic->user->first_name . ' ' . $demographic->user->last_name,
            ];
             
            $message = $curlFunc['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Result']['ErrorInfo']['ErrorMessage'];
        }

        $details = [
            'message' => $message,
            'data' => $data,
            'action' => 'CurrentCaregiverCheck',
            'name' => 'Doral',
        ];

        Mail::to('manishak@hcbspro.com')->send(new SendPatientImpotNotification($details));
    }
}