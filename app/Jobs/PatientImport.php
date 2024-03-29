<?php

namespace App\Jobs;

use App\Helpers\Helper;
use App\Models\Demographic;
use App\Models\PatientEmergencyContact;
use App\Models\User;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class PatientImport implements ShouldQueue
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
        $searchPatientIds = searchPatients();
        $patientArray = $searchPatientIds['soapBody']['SearchPatientsResponse']['SearchPatientsResult']['Patients']['PatientID'];
        Log::info('hha exchange search patient detail start');
        Log::info('total hha count'.count($patientArray));
	//$patientArray = ['327365','327914','328109'];
        $missing_patient_id = [];
        $userCaregiver1 = Demographic::get();
        foreach ($userCaregiver1 as $userCaregivers) { 
            $missing_patient_id[] = $userCaregivers->patient_id;
        }
         
        $data = [];
        $stored_user_id = [];
        //foreach ($patientArray as $patient_id) {
        foreach (array_slice($patientArray, 150 , 50) as $patient_id) {
            if (! in_array($patient_id, $missing_patient_id)) {            
                $apiResponse = getPatientDemographics($patient_id);
                $demographics = $apiResponse['soapBody']['GetPatientDemographicsResponse']['GetPatientDemographicsResult']['PatientInfo'];
                $doral_id = createDoralId();
                $user_id = self::storeUser($demographics, $doral_id);
                
                if ($user_id) {
                    $data[] = $patient_id;
                    $stored_user_id[] = $user_id;
                    $company_id = $this->company->id;
                    self::storeDemographic($demographics, $user_id, $company_id, $doral_id);

                    self::storeEmergencyContact($demographics, $user_id);
                }
            } 
        }
        Log::info('stored user id'.count($stored_user_id));
        Log::info('missing patient count'.count($data));
        Log::info('hha exchange search patient detail end');

         try {
             $company_email = $this->company->email;
           
             $details = [
                 'name' => $this->company->name,
                 'total' => count($stored_user_id),
                 'type' => 'Patient',
             ];

             SendEmailJob::dispatch('gjoshi@doralhw.org',$details,'SendPatientImpotNotification');
            // SendEmailJob::dispatch($company_email,$details,'SendPatientImpotNotification');
            
         }catch (\Exception $exception){
             Log::info($exception->getMessage());
         }
    }

    public static function storeUser($demographics, $doral_id)
    {      
        $user = new User();
      
        $phone_number = $demographics['HomePhone'] ? $demographics['HomePhone'] : '';
        $tele_phone = $demographics['Phone2'] ? $demographics['Phone2'] : '';
        
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
        $password = 'patient';
            
        if (isset($demographics['email'])) {
            $email = $demographics['email'];
                
            $userDuplicateEmail = User::where('email', $email)->first();
    
            if (empty($userDuplicateEmail)) {
                $user->email = $email;
            } 
        }
        
        $user->first_name = $first_name;
        $user->last_name = ($demographics['LastName']) ? $demographics['LastName'] : '';
        $user->password = setPassword($password);
        $user->status = $status;
        $user->gender = setGender($demographics['Gender']);
        $user->phone = setPhone($phone_number);
        $user->phone_verified_at = now();
        $user->dob = dateFormat($demographics['BirthDate']);

        if ($tele_phone != '') {
            $user->tele_phone = setPhone($tele_phone);
        }
       
        $user->save();
        $user->assignRole('patient')->syncPermissions(Permission::all());
        $url = route('partnerEmailVerified', base64_encode($user->id));
        $details = [
            'name' => $user->first_name,
            'href' => $url
        ];
    
        if (isset($user->email)) {
            //SendEmailJob::dispatch($user->email,$details,'WelcomeEmail');
        }

        return $user->id;
    }

    public static function storeDemographic($demographics, $user_id, $company_id, $doral_id)
    {
        $demographic = new Demographic();
        
        $demographic->doral_id = $doral_id;
        $demographic->user_id = $user_id;
        $demographic->company_id = $company_id;
        $demographic->service_id = config('constant.MDOrder');

        $demographic->patient_id = $demographics['PatientID'] ? $demographics['PatientID'] : '';
        $accepted_services = [
            'Discipline' => $demographics['AcceptedServices']['Discipline'] ? $demographics['AcceptedServices']['Discipline'] : ''
        ];
        $demographic->accepted_services = $accepted_services;

        $language = $demographics['PrimaryLanguage'] ? $demographics['PrimaryLanguage'] : '';

       
        $addressData = [];
      
      	if (count($demographics['Addresses']) > 0) { 
      	   $address = $demographics['Addresses']['Address'];
           $zip = '';
           if(isset($address['Zip5']) && $address['Zip5'] != ''){
              $zip = $address['Zip4'];
           } else if(isset($address['Zip4']) && $address['Zip4'] != ''){
            $zip = $address['Zip4'];
           }
      	   $addressData = [
            'address1' => isset($address['Address1']) ? $address['Address1'] : '',
            'address2' => isset($address['Address2']) ? $address['Address2'] : '',
            'crossStreet' => isset($address['CrossStreet']) ? $address['CrossStreet'] : '',
            'city' => isset($address['City']) ? $address['City'] : '',
            'state' => isset($address['State']) ? $address['State'] : '',
            'county' => isset($address['County']) ? $address['County'] : '',
            'zip_code' => $zip,
            'isPrimaryAddress' => isset($address['IsPrimaryAddress']) ? $address['IsPrimaryAddress'] : '',
            'addressTypes' => isset($address['AddressTypes']) ? $address['AddressTypes'] : '',
          ];
      	}      
       
        $demographic->ssn = setSsn($demographics['SSN'] ? $demographics['SSN'] : '');
        $demographic->address = $addressData;
        $demographic->status = 'Active';
        $demographic->language = $language;
        $demographic->type = '1';

        $demographic->save();

        getAddressLatlngAttribute($addressData, $user_id);
    }
 

    public static function storeEmergencyContact($demographics, $user_id)
    {
        if ($demographics['EmergencyContacts']['EmergencyContact']) {
            foreach ($demographics['EmergencyContacts']['EmergencyContact'] as $emergencyContact) {
                if($emergencyContact['Name']) {
                    $relationship = '';
                    if ($emergencyContact['Relationship'] && $emergencyContact['Relationship']['Name']) {
                        $relationship = $emergencyContact['Relationship']['Name'];
                    }
                 
                    $patientEmergencyContact = new PatientEmergencyContact();
    
                    $patientEmergencyContact->user_id = $user_id;
                    $patientEmergencyContact->name = $emergencyContact['Name'];
                    $patientEmergencyContact->relation = $relationship;
                   
                    $patientEmergencyContact->lives_with_patient = ($emergencyContact['LivesWithPatient']) ? $emergencyContact['LivesWithPatient'] : '';
                    $patientEmergencyContact->have_keys = ($emergencyContact['HaveKeys']) ? $emergencyContact['HaveKeys'] : '';
                   
                    $patientEmergencyContact->phone1 = setPhone($emergencyContact['Phone1'] ? $emergencyContact['Phone1'] : '');
                    $patientEmergencyContact->phone2 = setPhone($emergencyContact['Phone2'] ? $emergencyContact['Phone2'] : '');
                   
                    if ($emergencyContact['Address']) {
                        $addressData = [
                            'address1' => ($emergencyContact['Address']) ? $emergencyContact['Address'] : ''
                        ];
    
                        $patientEmergencyContact->address = $addressData;
                    }
                   
                    $patientEmergencyContact->save();
                }
            }
        }
       
    }

    /**
     * The job failed to process.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(Exception $exception)
    {
        Log::info($exception);
    }
}
