<?php

namespace App\Jobs;

use App\Mail\SendPatientImpotNotification;
use App\Mail\WelcomeEmail;
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
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Permission;

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
        $searchPatientIds = $this->searchPatientDetails();
        $patientArray = $searchPatientIds['soapBody']['SearchPatientsResponse']['SearchPatientsResult']['Patients']['PatientID'];
        log::info('hha exchange search patient detail start');
        log::info('total hha count'.count($patientArray));

        $missing_patient_id = [];
        $userCaregiver1 = Demographic::get();
        foreach ($userCaregiver1 as $userCaregivers) { 
            $missing_patient_id[] = $userCaregivers->patient_id;
        }
        
        $data = [];
        $stored_user_id = [];
        foreach ($patientArray as $patient_id) {
            if (! in_array($patient_id, $missing_patient_id)) {
                
                $apiResponse = $this->getDemographicDetails($patient_id);
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
        log::info('stored user id'.count($stored_user_id));
        log::info('missing patient count'.count($data));
        log::info('hha exchange search patient detail end');

        try {
            $company_email = $this->company->email;
            $company = $this->company;
            
            Mail::to($company_email)->send(new SendPatientImpotNotification($company, count($stored_user_id)));
           
        }catch (\Exception $exception){
            Log::info($exception->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchPatientDetails()
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SearchPatients xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><SearchFilters><FirstName></FirstName><LastName></LastName><Status>Active</Status><PhoneNumber></PhoneNumber><AdmissionID></AdmissionID><MRNumber></MRNumber><SSN></SSN></SearchFilters></SearchPatients></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        $method = 'POST';
        return $this->curlCall($data, $method);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDemographicDetails($patientId)
    {
        
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetPatientDemographics xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><PatientInfo><ID>'.$patientId.'</ID></PatientInfo></GetPatientDemographics></SOAP-ENV:Body></SOAP-ENV:Envelope>';

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

    public static function storeUser($demographics, $doral_id)
    {      
        $user = new User();
      
        $phone_number = $demographics['HomePhone'] ? $demographics['HomePhone'] : '';
        $tele_phone = $demographics['Phone2'] ? $demographics['Phone2'] : '';
        
        if ($phone_number != '') {
           
            $userDuplicatePhone = User::where('phone', setPhone($phone_number))->first();
           
            if (empty($userDuplicatePhone)) {
                $user->phone = setPhone($phone_number);
                $user->phone_verified_at = now();
                $status = '0';
            } else {
                $status = '4';
            }
           
        } else {
            $status = '4';
        }
        
        $first_name = ($demographics['FirstName']) ? $demographics['FirstName'] : '';
        $password = str_replace("-", "@",$doral_id);
            
        $user->first_name = $first_name;
        $user->last_name = ($demographics['LastName']) ? $demographics['LastName'] : '';
        $user->password = setPassword($password);

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
            'href' => $url
        ];
        Mail::to($user->email)->send(new WelcomeEmail($details));

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
            
        $demographic->ssn = setSsn($demographics['SSN'] ? $demographics['SSN'] : '');
        $demographic->address = $addressData;
        $demographic->status = 'Active';
        $demographic->language = $language;
        $demographic->type = '1';

        $demographic->save();
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
        log::info($exception);
    }
}
