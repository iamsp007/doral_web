<?php

namespace App\Jobs;

use App\Helpers\Helper;
use App\Models\Demographic;
use App\Models\PatientEmergencyContact;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;

class CaregiverImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $company;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($company)
    {
        $this->company = $company;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $searchCaregiverIds = SearchCaregivers();
        $caregiverArray = $searchCaregiverIds['soapBody']['SearchCaregiversResponse']['SearchCaregiversResult']['Caregivers']['CaregiverID'];

        log::info('hha exchange search caregiver detail start');
        log::info('total hha count'.count($caregiverArray));

        $missing_patient_id = [];
        $userCaregiver1 = Demographic::get();
        foreach ($userCaregiver1 as $userCaregivers) { 
            $missing_patient_id[] = $userCaregivers->patient_id;
        }
        
        $data = [];
        $stored_user_id = [];

        foreach ($caregiverArray as $patient_id) {
            if (! in_array($patient_id, $missing_patient_id)) {

                $getdemographicDetails = getCaregiverDemographics($patient_id);
                $demographics = $getdemographicDetails['soapBody']['GetCaregiverDemographicsResponse']['GetCaregiverDemographicsResult']['CaregiverInfo'];
                $doral_id = createDoralId();

                $user_id = storeUser($demographics, $doral_id);

                if ($user_id) {
                    $data[] = $patient_id;
                    $stored_user_id[] = $user_id;
                    $company_id = $this->company->id;

                    storeDemographic($demographics, $user_id, $company_id, $doral_id);

                    storeEmergencyContact($demographics, $user_id);
                }
            }
        }
        log::info('stored user id'.count($stored_user_id));
        log::info('missing caregiver count'.count($data));
        log::info('hha exchange search caregiver detail end');

        try {
            $company_email = $this->company->email;
            
            $details = [
                'name' => $this->company->name,
                'total' => count($stored_user_id),
                'type' => 'Caregiver',
            ];
            
            SendEmailJob::dispatch('manishak@hcbspro.com',$details,'SendPatientImpotNotification');
            SendEmailJob::dispatch($company_email,$details,'SendPatientImpotNotification');
        }catch (\Exception $exception){
            Log::info($exception->getMessage());
        }
    }
}
