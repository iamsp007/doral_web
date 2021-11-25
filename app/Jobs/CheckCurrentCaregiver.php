<?php

namespace App\Jobs;

use App\Mail\SendErrorEmail;
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
        $demographics = Demographic::where('flag','1')->get();
        $date = Carbon::now();// will get you the current date, time
        $today = $date->format("Y-m-d");

        $input['from_date'] = $today;
        $input['to_date'] = $today;
        
        // foreach ($demographics as $key => $demographic) {
        //     $input['patientId'] = $demographic->patient_id;
        //     Log::info('input data start');
        //     Log::info($input);
        //     Log::info('input data end');
        //     $curlFunc = searchVisits($input);
        //     Log::info('input data start');
        //     Log::info($curlFunc);
        //     Log::info('input data end');
            //SendEmailJob::dispatch($company_email,$details,'SendPatientImpotNotification');

            // if (isset($curlFunc['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits'])) {
            //     $viId = $curlFunc['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits']['VisitID'];
            //     // $data = [];
            //     Log::info('visit id data start');
            //     Log::info($viId);
            //     Log::info('visit id data end');
            //     //foreach ($visitID as $viId) {
               
            //         $scheduleInfo = getScheduleInfo($viId);
            //         $getScheduleInfo = $scheduleInfo['soapBody']['GetScheduleInfoResponse']['GetScheduleInfoResult']['ScheduleInfo'];
            //         $caregiver_id = ($getScheduleInfo['Caregiver']['ID']) ? $getScheduleInfo['Caregiver']['ID'] : '' ;
        
            //         $demographic = Demographic::select('id','user_id','patient_id')->where('patient_id', $caregiver_id)->with(['user' => function($q) {
            //             $q->select('id', 'email', 'phone');
            //         }])->first();
                       
            //         if ($demographic) {
            //             $phoneNumber = $demographic->user->phone;
            //         } else {
            //             $getdemographicDetails = getCaregiverDemographics($caregiver_id);
            //             $demographics = $getdemographicDetails['soapBody']['GetCaregiverDemographicsResponse']['GetCaregiverDemographicsResult']['CaregiverInfo'];
    
            //             $phoneNumber = $demographics['Address']['HomePhone'] ? $demographics['Address']['HomePhone'] : '';
                        
            //             $doral_id = createDoralId();
    
            //             $user_id = storeUser($demographics, $doral_id);
        
            //             if ($user_id) {
            //                 $company_id = '16';
            //                 storeDemographic($demographics, $user_id, $company_id, $doral_id,'caregiver-check');
        
            //                 storeEmergencyContact($demographics, $user_id);
            //             }
            //         }                        
                    
            //         $scheduleStartTime = ($getScheduleInfo['ScheduleStartTime']) ? $getScheduleInfo['ScheduleStartTime'] : '' ;
            //         $scheduleEndTime = ($getScheduleInfo['ScheduleEndTime']) ? $getScheduleInfo['ScheduleEndTime'] : '' ;
            //         $firstName = ($getScheduleInfo['Caregiver']['FirstName']) ? $getScheduleInfo['Caregiver']['FirstName'] : '' ;
            //         $lastName = ($getScheduleInfo['Caregiver']['LastName']) ? $getScheduleInfo['Caregiver']['LastName'] : '' ;
    
            //         $data = Caregivers::create([
            //             'patient_id' => $this->patient_id,
            //             'phone' => $phoneNumber,
            //             'start_time' => $scheduleStartTime,
            //             'end_time' => $scheduleEndTime,
            //             'name' => $firstName . ' ' . $lastName,
            //         ]);   
            //         try {
            //             $company_email = 'manishak@hcbspro.com';
                        
            //             $details = [
            //                 'data' => $data,
            //                 'message' => 'Caregiver detail.',
            //             ];
                        
            //             SendEmailJob::dispatch($company_email,$details,'SendPatientImpotNotification');
            //         }catch (\Exception $exception){
            //             Log::info($exception->getMessage());
            //         } 
            //    // }
            // } else {
            //     try {
            //         $company_email = 'manishak@hcbspro.com';
                    
            //         $details = [
            //             'message' => 'Caregiver not found.',
            //             'patient_id' => $demographic->patient_id,
            //         ];
                    
            //         SendEmailJob::dispatch($company_email,$details,'SendPatientImpotNotification');
            //     }catch (\Exception $exception){
            //         Log::info($exception->getMessage());
            //     }
            // }
        // }

        $details = [
            'message' => 'success message',
         ];

         Mail::to('shashikant@hcbspro.com')->send(new SendErrorEmail($details));
    }
}
