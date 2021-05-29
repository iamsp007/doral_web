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

    public $company_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($company_id)
    {
        $this->company_id = $company_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $searchCaregiverIds = $this->searchCaregiverDetails();
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

                $getdemographicDetails = $this->getCaregiverDemographicDetails($patient_id);
                $demographics = $getdemographicDetails['soapBody']['GetCaregiverDemographicsResponse']['GetCaregiverDemographicsResult']['CaregiverInfo'];

                $user_id = self::storeUser($demographics);
                
                if ($user_id) {
                    $data[] = $patient_id;
                    $stored_user_id[] = $user_id;
                    self::storeDemographic($demographics, $user_id, $this->company_id);

                    self::storeEmergencyContact($demographics, $user_id);
                }
            }
        }
        log::info('stored user id'.count($stored_user_id));
        log::info('missing caregiver count'.count($data));
        log::info('hha exchange search caregiver detail end');

        try {
            $company_email = $this->company->email;
            $company = $this->company;
            
            $details = [
                'name' => $this->company->name,
                'total' => count($stored_user_id),
            ];
            
            SendEmailJob::dispatch($company_email,$details,'SendPatientImpotNotification');
        }catch (\Exception $exception){
            Log::info($exception->getMessage());
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchCaregiverDetails()
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SearchCaregivers xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><SearchFilters><Status>Active</Status><EmployeeType>Employee</EmployeeType></SearchFilters></SearchCaregivers></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        //<FirstName>string</FirstName><LastName>string</LastName><PhoneNumber>string</PhoneNumber><CaregiverCode>string</CaregiverCode><EmployeeType>string</EmployeeType><SSN>string</SSN>Employee/Applicant

        $method = 'POST';
        return $this->curlCall($data, $method);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCaregiverDemographicDetails($cargiver_id)
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetCaregiverDemographics xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><CaregiverInfo><ID>' . $cargiver_id . '</ID></CaregiverInfo></GetCaregiverDemographics></SOAP-ENV:Body></SOAP-ENV:Envelope>';

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

    public static function storeUser($demographics)
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
        
        $doral_id = createDoralId();
        $first_name = ($demographics['FirstName']) ? $demographics['FirstName'] : '';
        $password = str_replace(" ", "",$first_name) . '@' . $doral_id;
            
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
            'href' => $url,
        ];

        SendEmailJob::dispatch($user->email,$details,'WelcomeEmail');

        return $user->id;
    }

    public static function storeDemographic($demographics, $user_id, $company_id)
    {
        $doral_id = createDoralId();

        $demographic = new Demographic();
        
        $demographic->doral_id = $doral_id;
        $demographic->user_id = $user_id;
        $demographic->company_id = $company_id;
     
        $demographic->service_id = config('constant.OccupationalHealth');
        $demographic->patient_id = $demographics['ID'] ? $demographics['ID'] : '';
        $demographic->ethnicity = $demographics['Ethnicity'] && $demographics['Ethnicity']['Name'] ? $demographics['Ethnicity']['Name'] : '';

        $language = $demographics['Language1'] ? $demographics['Language1'] : '';

        $addressData = [];
        if ($demographics['Address']) {
            $address = $demographics['Address'];
            $zip = '';
            if(isset($address['Zip5']) && $address['Zip5'] != ''){
                $zip = $address['Zip5'];
            } else if(isset($address['Zip4']) && $address['Zip4'] != ''){
                $zip = $address['Zip4'];
            }

            $addressData = [
                'address1' => $address['Street1'] ? $address['Street1'] : '',
                'address2' => $address['Street2'] ? $address['Street2'] : '',
                'city' => $address['City'] ? $address['City'] : '',
                'state' => $address['State'] ? $address['State'] : '',
                'zip_code' => $zip,
            ];
        }

        $notificationPreferencesData = [];
        if ($demographics['NotificationPreferences']) {

            $notificationPreferences = $demographics['NotificationPreferences'];
            $notificationPreferencesData = [
                'method' => ($notificationPreferences['Method'] && $notificationPreferences['Method']['Name']) ? $notificationPreferences['Method']['Name'] : '',
                'email' => $notificationPreferences['Email'] ? $notificationPreferences['Email'] : '',
                'mobile_or_SMS' => $notificationPreferences['MobileOrSMS'] ? $notificationPreferences['MobileOrSMS'] : '',
                'voice_message' => $notificationPreferences['VoiceMessage'] ? $notificationPreferences['VoiceMessage'] : '',
            ];
        }
        $demographic->country_of_birth = $demographics['CountryOfBirth'] ? $demographics['CountryOfBirth'] : '';
        $demographic->employee_type =  $demographics['EmployeeType'] ? $demographics['EmployeeType'] : '';
        $demographic->marital_status = ($demographics['MaritalStatus'] && $demographics['MaritalStatus']['Name']) ? $demographics['MaritalStatus']['Name'] : '';
                   
        $demographic->notification_preferences = $notificationPreferencesData;
            
        $demographic->ssn = setSsn($demographics['SSN'] ? $demographics['SSN'] : '');
        $demographic->address = $addressData;
        $demographic->status = 'Active';
        $demographic->language = $language;
        $demographic->type = '1';

        $demographic->save();

        self::getAddressLatlngAttribute($addressData, $user_id);
    }

    /**
     * Get the user's Date Of Birth.
     *
     * @return string
     */
    public static function getAddressLatlngAttribute($addressData, $user_id)
    {
        $address='';
        if ($addressData['address1']){
            $address.= $addressData['address1'];
        }
        if ($addressData['city']){
            $address.=', '.$addressData['city'];
        }
        if ($addressData['state']){
            $address.=', '.$addressData['state'];
        }
       
        if ($addressData['zip_code']){
            $address.=', '.$addressData['zip_code'];
        }

        if ($address){
            $helper = new Helper();
            $response = $helper->getLatLngFromAddress($address);
            if ($response->status === "OK"){
                $latlong =  $response->results[0]->geometry->location;

                User::find($user_id)->update([
                    'latitude' => $latlong->lat,
                    'longitude' => $latlong->lng,
                ]);
            }
        }
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
}
