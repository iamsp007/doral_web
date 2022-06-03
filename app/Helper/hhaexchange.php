<?php

use App\Helpers\Helper;
use App\Jobs\SendEmailJob;
use App\Models\Demographic;
use App\Models\PatientEmergencyContact;
use App\Models\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Permission;

if (!function_exists('curlCall')) {
        function curlCall($data, $method)
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
            
            $response = json_decode(json_encode((array)$xml), TRUE);
            return $response;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    if (!function_exists('searchVisits')) {
        
        function searchVisits()
        {
            $appName = "COTT_1031";
            $appKey = "MQAyADEAMAA0ADIALQAwADcAQQAxADcAMQBFAEEANQA5AEQANQAzAEYAOAA3ADIARgA2ADEANAA3AEMAOAAyADIAMQA5AEYANQA=";
            $appSecretKey = "e2bc8653-4f0c-49b7-a161-a6578cdff11f";
            $patientID = '<PatientID>14680984</PatientID>';
            $caregiverID = '<CaregiverID>3028555</CaregiverID>';
            $data = '<?xml version="1.0" encoding="UTF-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SearchVisits xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>COTT_1031</AppName><AppSecret>e2bc8653-4f0c-49b7-a161-a6578cdff11f</AppSecret><AppKey>MQAyADEAMAA0ADIALQAwADcAQQAxADcAMQBFAEEANQA5AEQANQAzAEYAOAA3ADIARgA2ADEANAA3AEMAOAAyADIAMQA5AEYANQA=</AppKey></Authentication><SearchFilters><StartDate>2022-03-20</StartDate><EndDate>2022-03-20</EndDate><PatientID>14680984</PatientID><CaregiverID>3028555</CaregiverID></SearchFilters></SearchVisits></SOAP-ENV:Body></SOAP-ENV:Envelope>';

            $method = 'POST';
            return curlCall($data, $method);
        }
    }
    if (!function_exists('searchPatientId')) {
        
        function searchPatientId($input)
        {
            $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SearchPatients xmlns="https://www.hhaexchange.com/apis/hhaws.integration">' . authentication(). '<SearchFilters><AdmissionID>' . $input['adminssionId'] .'</AdmissionID></SearchFilters></SearchPatients></SOAP-ENV:Body></SOAP-ENV:Envelope>';
        
            $method = 'POST';
            return curlCall($data, $method);
        }
    }
    if (!function_exists('searchCaregiverId')) {
        
        function searchCaregiverId($input)
        {
            $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SearchCaregivers xmlns="https://www.hhaexchange.com/apis/hhaws.integration">' . authentication(). '<SearchFilters><CaregiverCode>' . $input['caregiverCode'] .'</CaregiverCode></SearchFilters></SearchCaregivers></SOAP-ENV:Body></SOAP-ENV:Envelope>';
        
            $method = 'POST';
            return curlCall($data, $method);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    if (!function_exists('getPatientClinicalInfo')) {
        function getPatientClinicalInfo($patientID)
        {
            $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetPatientClinicalInfo xmlns="https://www.hhaexchange.com/apis/hhaws.integration">' . authentication(). '<PatientID>' .$patientID. '</PatientID></GetPatientClinicalInfo></SOAP-ENV:Body></SOAP-ENV:Envelope>';

            $method = 'POST';

            return curlCall($data, $method);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    if (!function_exists('getScheduleInfo')) {
        function getScheduleInfo($visitorID)
        {
            $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetScheduleInfo xmlns="https://www.hhaexchange.com/apis/hhaws.integration">' . authentication(). '<ScheduleInfo><ID>' . $visitorID . '</ID></ScheduleInfo></GetScheduleInfo></SOAP-ENV:Body></SOAP-ENV:Envelope>';

            $method = 'POST';

            return curlCall($data, $method);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    if (!function_exists('getCaregiverDemographics')) {
        function getCaregiverDemographics($cargiver_id)
        {
            $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetCaregiverDemographics xmlns="https://www.hhaexchange.com/apis/hhaws.integration">' . authentication(). '<CaregiverInfo><ID>' . $cargiver_id . '</ID></CaregiverInfo></GetCaregiverDemographics></SOAP-ENV:Body></SOAP-ENV:Envelope>';

            $method = 'POST';
            return curlCall($data, $method);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    if (!function_exists('createCaregiverMedical')) {
        function createCaregiverMedical($cargiver_id)
        {
            $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><CreateCaregiverMedical xmlns="https://www.hhaexchange.com/apis/hhaws.integration">' . authentication(). '<CaregiverMedicalInfo><CaregiverID>' . $cargiver_id . '</CaregiverID><MedicalID>int</MedicalID><DueDate>dateTime</DueDate><DateCompleted>dateTime</DateCompleted><Notes>string</Notes><ResultID>int</ResultID></CaregiverMedicalInfo>67467</CreateCaregiverMedical></SOAP-ENV:Body></SOAP-ENV:Envelope>';

            $method = 'POST';
            return curlCall($data, $method);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    if (!function_exists('SearchCaregivers')) {
        function SearchCaregivers()
        {
            $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SearchCaregivers xmlns="https://www.hhaexchange.com/apis/hhaws.integration">' . authentication(). '<SearchFilters><Status>Active</Status><EmployeeType>Employee</EmployeeType></SearchFilters></SearchCaregivers></SOAP-ENV:Body></SOAP-ENV:Envelope>';

            //<FirstName>string</FirstName><LastName>string</LastName><PhoneNumber>string</PhoneNumber><CaregiverCode>string</CaregiverCode><EmployeeType>string</EmployeeType><SSN>string</SSN>Employee/Applicant

            $method = 'POST';
            return curlCall($data, $method);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    if (!function_exists('getVisitInfo')) {
        function getVisitInfo($visitorID,$input = '')
        {
            $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetVisitInfo xmlns="https://www.hhaexchange.com/apis/hhaws.integration">' . authentication($input). '<VisitInfo><ID>' . $visitorID . '</ID></VisitInfo></GetVisitInfo></SOAP-ENV:Body></SOAP-ENV:Envelope>';
            $method = 'POST';

            return curlCall($data, $method);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    if (!function_exists('confirmVisits')) {
        function confirmVisits($input)
        {
            $duties = '';
//            if (isset($input['duties'])) {
//                $dutiesExplode = explode(',' ,$input['duties']);
//                foreach ($dutiesExplode as $v) {
////                    $duties .= '<Duty><DutyCode>'.$v.'</DutyCode><AdditionalData>'.$v.'</AdditionalData><Status>Open</Status></Duty>';
////                    $duties .= '<Duty><DutyCode>'.$v.'</DutyCode><AdditionalData>'.$v.'</AdditionalData><Status>Success</Status></Duty>';
//                }
//            }
            $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><ConfirmVisits xmlns="https://www.hhaexchange.com/apis/hhaws.integration">' . authentication($input). ''
                    . '<VisitInfo><VisitID>' . $input['visitId'] . '</VisitID><VisitStartTime>' . $input['startTime']. '</VisitStartTime><VisitEndTime>' . $input['endTime']. '</VisitEndTime></VisitInfo></ConfirmVisits></SOAP-ENV:Body></SOAP-ENV:Envelope>';
            
            $method = 'POST';
            return curlCall($data, $method);
        }
    }
    if (!function_exists('storeVisitor')) {
        function storeVisitor()
        {
            $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><CreateCaregiver xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>COTT_1031</AppName><AppSecret>e2bc8653-4f0c-49b7-a161-a6578cdff11f</AppSecret><AppKey>MQAyADEAMAA0ADIALQAwADcAQQAxADcAMQBFAEEANQA5AEQANQAzAEYAOAA3ADIARgA2ADEANAA3AEMAOAAyADIAMQA5AEYANQA=</AppKey></Authentication><CaregiverInfo><OfficeID>1754</OfficeID><FirstName>Shashikant</FirstName><MiddleName>S</MiddleName><LastName>Parmar</LastName><Initials></Initials><Gender>Male</Gender><Dependents></Dependents><BirthDate>1991-01-19</BirthDate<AlternateCaregiverCode></AlternateCaregiverCode><MobileIDType></MobileIDType><SSN>787-87-8787</SSN><CountryOfBirth></CountryOfBirth><MaritalStatus>Married</MaritalStatus><StatusID>1</StatusID><EmploymentTypes><Discipline>HHA</Discipline><Discipline>PCA</Discipline></EmploymentTypes><EmployeeID></EmployeeID><ApplicationDate>2022-04-13</ApplicationDate><ReferralPerson></ReferralPerson><Address><Street1>833 Meadow Rd</Street1><Street2></Street2><City>Smithtown</City><State>NY</State><Zip5>11787</Zip5><Zip4></Zip4><HomePhone>(777) 777-7777</HomePhone><Phone2>(777) 777-7777</Phone2><Phone3></Phone3></Address><EmergencyContacts><EmergencyContact><Name></Name><EmergencyContact><Name></Na<OtherRelationship></OtherRelationship><Address></Address><Phone1></Phone1><Phone2></Phone2></EmergencyContact><EmergencyContact><Name></Name></OtherRelationship><Address></Address><Phone1></Phone1><Phone2></Phone2></EmergencyContact></EmergencyContacts><NotificationPreferences><Email>shashikant@hcbspro.com</Email><MobileOrSMS>(777) 777-7777</MobileOrSMS><VoiceMessage></VoiceMessage></NotificationPreferences><EmployeeType>Applicant</EmployeeType><ProfessionalLicensenumber></ProfessionalLicensenumber><NPI></NPI><InactiveNote></InactiveNote></CaregiverInfo></CreateCaregiver></SOAP-ENV:Body></SOAP-ENV:Envelope>';
            $method = 'POST';
            return curlCall($data, $method);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    if (!function_exists('searchPatients')) {
        function searchPatients()
        {
            $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SearchPatients xmlns="https://www.hhaexchange.com/apis/hhaws.integration">' . authentication(). '<SearchFilters><FirstName></FirstName><LastName></LastName><Status></Status><PhoneNumber></PhoneNumber><AdmissionID></AdmissionID><MRNumber></MRNumber><SSN></SSN></SearchFilters></SearchPatients></SOAP-ENV:Body></SOAP-ENV:Envelope>';

            $method = 'POST';
            return curlCall($data, $method);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    if (!function_exists('getPatientDemographics')) {
        function getPatientDemographics($patientId)
        {
            $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetPatientDemographics xmlns="https://www.hhaexchange.com/apis/hhaws.integration">' . authentication(). '<PatientInfo><ID>'.$patientId.'</ID></PatientInfo></GetPatientDemographics></SOAP-ENV:Body></SOAP-ENV:Envelope>';

            $method = 'POST';

            return curlCall($data, $method);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    if (!function_exists('getPatientChangesV2')) {
        function getPatientChangesV2()
        {
            $date = Carbon::now();// will get you the current date, time
            $today = $date->format("Y-m-d");
            $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetPatientChangesV2 xmlns="https://www.hhaexchange.com/apis/hhaws.integration">' . authentication(). '<ModifiedAfter>' . $today . '</ModifiedAfter></GetPatientChangesV2></SOAP-ENV:Body></SOAP-ENV:Envelope>';

            $method = 'POST';

            return curlCall($data, $method);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    if (!function_exists('getPatientReferralInfo')) {
        function getPatientReferralInfo($patientId)
        {
            $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetPatientReferralInfo xmlns="https://www.hhaexchange.com/apis/hhaws.integration">' . authentication(). '<PatientID>' . $patientId . '</PatientID></GetPatientReferralInfo></SOAP-ENV:Body></SOAP-ENV:Envelope>';

            $method = 'POST';

            return curlCall($data, $method);
        }
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    if (!function_exists('getReferralProfile')) {
        function getReferralProfile($referralId)
        {
            $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetReferralProfile xmlns="https://www.hhaexchange.com/apis/hhaws.integration">' . authentication(). '<SearchFilters><ReferralID>' . $referralId . '</ReferralID></SearchFilters></GetReferralProfile></SOAP-ENV:Body></SOAP-ENV:Envelope>';

            // <SearchFilters><ReferralID>string</ReferralID><LastName>string</LastName><FirstName>string</FirstName><OfficeID>int</OfficeID><ReferralStatusID>int</ReferralStatusID><ReferralSourceID>int</ReferralSourceID><ReferralDateFrom>string</ReferralDateFrom><ReferralDateTo>string</ReferralDateTo><SalesStaffID>int</SalesStaffID><ReferralContractID>int</ReferralContractID><AdmittedDateFrom>string</AdmittedDateFrom><AdmittedDateTo>string</AdmittedDateTo></SearchFilters>

            $method = 'POST';

            return curlCall($data, $method);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    if (!function_exists('authentication')) {
        
        function authentication($input = '')
        {
            if (isset($input['AppName']) && isset($input['AppSecret']) && isset($input['AppKey'])) {
                $appName = $input['AppName'];
                $appSecret = $input['AppSecret'];
                $appKey = $input['AppKey'];
            } else {
                $appName = config('patientDetailAuthentication.AppName');
                $appSecret = config('patientDetailAuthentication.AppSecret');
                $appKey = config('patientDetailAuthentication.AppKey');
            }

            return '<Authentication><AppName>' . $appName . '</AppName><AppSecret>' . $appSecret . '</AppSecret><AppKey>' . $appKey. '</AppKey></Authentication>';
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    if (!function_exists('storeUser')) {
        function storeUser($demographics, $doral_id)
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
            $password = str_replace("-", "@",$doral_id);
                
            $user->first_name = $first_name;
            $user->last_name = ($demographics['LastName']) ? $demographics['LastName'] : '';
            $user->password = setPassword($password);
            $user->phone = setPhone($phone_number);
            $user->phone_verified_at = now();
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

            if (isset($user->email)) {
                SendEmailJob::dispatch($user->email,$details,'WelcomeEmail');
            }
            return $user->id;
        }
    }
    if (!function_exists('storeDemographic')) {
        function storeDemographic($demographics, $user_id, $company_id, $doral_id, $action = '')
        {
            $demographic = new Demographic();
            
            $demographic->doral_id = $doral_id;
            $demographic->user_id = $user_id;
            $demographic->company_id = $company_id;
        
            if ($action == 'caregiver-check') {
                $demographic->flag = '2';  
            }
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

            getAddressLatlngAttribute($addressData, $user_id);
        }
    }

    if (!function_exists('storeEmergencyContact')) {
        function storeEmergencyContact($demographics, $user_id)
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

     /**
     * Get the user's Date Of Birth.
     *
     * @return string
     */
    if (!function_exists('getAddressLatlngAttribute')) {
        function getAddressLatlngAttribute($addressData, $user_id)
        {
            if($addressData != '') {
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
        }
    }
    
