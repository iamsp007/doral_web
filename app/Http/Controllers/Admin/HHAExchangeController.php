<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\HHAExchange;
use App\Models\Demographic;
use App\Models\PatientEmergencyContact;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;

class HHAExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // $avg = User::whereHas('roles',function ($q){
            //     $q->where('name','=','patient');
            // })->get();
            // // dd($avg);
            // if(Auth::guard('referral')) {
            //     $company_id = Auth::guard('referral')->user()->id;
              
            // }
            // dump($company_id);

            // $userCaregiver = Demographic::where('patient_id' , 78890)->first();
            // if ($userCaregiver) {
            //     $userCaregiver->update(['caregiver_code' => '1234']);
            // }  
            // return 'success';
            // exit;
            $demographic = Demographic::with('user')->get();
            foreach ($demographic as $key => $value) {
                $first_name = ($value->user->first_name) ? $value->user->first_name  : '';
                $doral_id = ($value->doral_id) ? $value->doral_id: '';
                $password =  $first_name. '@' . $doral_id;
                Log::info($password);
                $password = str_replace(" ", "",$password);
                User::whereHas('roles',function ($q) {
                    $q->where('name','=','patient');
                })->find($value->user_id)->update(['password' => setPassword($password)]);
            }

            // $demographic->delete();

            // return 'deleted successfully';
            // HHAExchange::dispatch();
            // $searchPatientIds = $this->searchPatientDetails();
            // $patientArray = $searchPatientIds['soapBody']['SearchPatientsResponse']['SearchPatientsResult']['Patients']['PatientID'];
            // $patientArray = ["1009943", "1039551","1275166","3441817", "4167073","4504347","7253633", "7340504","9460723", "9631427", "10627089", "10644590", "10649625", "11480065", "11601922","407321", "4651290", "4692900","6525242", "9356067", "10621669", "11456679", "11457980", "12001282", "12007263", "12007781", "12042016", "12042913", "12200770", "12432604", "12464304", "12510537", "12522880", "12629434", "12629435", "12635317", "12657429", "12662061", "12662228", "12662506", "12662622", "12697403", "12697858", "12708620", "12710126", "12710192", "12710196", "12710700", "12711343", "12714234", "12714291", "12715172", "12718761", "12718784", "12719038", "12725777","12728790", "12728865", "12729155", "12732892", "12733576", "12733587", "12736351", "12736536", "12736648", "12736936", "12736954", "12739937", "12739939", "12740232", "12740260", "12740508", "12740524", "12740548", "12743144", "12743222", "12743447", "12743523", "12743692", "12744504", "12758376", "12758955", "12759118","12761186", "12761315", "12761441", "12761724", "12761923", "12762006","12764338", "12764556", "12772823", "12773051", "12778071", "12778619","12778690", "12778961", "12779277", "12779735", "12787295", "12787433", "12787905", "12790510", "12790681","12790999", "12791097", "12791134", "12791212", "12791258", "12794738", "12794843", "12794872", "12797533", "12797818", "12797947", "12801252", "12801277", "12802007", "12802093", "12807135", "12807262", "12807322", "12807412", "12807495", "12807544","12807562", "12808019"];
            // $patientArray = ["1009943"];
            // dd(count($patientArray));
            //2513 - 2389

            // $missing_patient_id = [];
            // $userCaregiver1 = PatientEmergencyContact::get();
            // foreach ($userCaregiver1 as $userCaregivers) { 
            //     PatientEmergencyContact::find($userCaregivers->id)->update(['address_old'=> $userCaregivers->address]);
            // }
            // dd($missing_patient_id);
            // $data = [];
        
            // $data = [];
            // foreach (array_slice($patientArray, 0 , 2513) as $patient_id) {
            // foreach ($patientArray as $patient_id) {
                // if (! in_array($patient_id, $missing_patient_id))
                // {
                //     $data[] = $patient_id;
                // $patient_id = 11112261;
                //     $apiResponse = $this->getDemographicDetails($patient_id);
                //     $demographics = $apiResponse['soapBody']['GetPatientDemographicsResponse']['GetPatientDemographicsResult']['PatientInfo'];
                //     dd($demographics);
                    // $type = config('constant.PatientType');
                
                    // $userCaregiver = Demographic::where('patient_id' , $patient_id)->first();
                    // if (! $userCaregiver) {
                    //     $user_id = self::storeUser($demographics, $type);

                    //     if ($user_id) {

                    //         self::storeDemographic($demographics, $user_id, $type);

                    //         self::storeEmergencyContact($demographics, $user_id, $type);
                    //     }
                    // }
                // }
            // }

            $arr = array('status' => 200, 'message' => 'Patient created successfully.', 'data' => []);
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
    public function searchPatientDetails()
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><SearchPatients xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><SearchFilters><FirstName></FirstName><LastName></LastName><Status>Active</Status><PhoneNumber></PhoneNumber><AdmissionID></AdmissionID><MRNumber></MRNumber><SSN></SSN></SearchFilters></SearchPatients></SOAP-ENV:Body></SOAP-ENV:Envelope>';

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

    public static function storeUser($demographics, $type)
    {      
        $user = new User();

        if ($type === '1') {
            $phone_number = $demographics['HomePhone'] ? $demographics['HomePhone'] : '';
            $tele_phone = $demographics['Phone2'] ? $demographics['Phone2'] : '';
        } else {
            $phone_number = $demographics['Address']['HomePhone'] ? $demographics['Address']['HomePhone'] : '';
            $tele_phone = $demographics['Address']['Phone2'] ? $demographics['Address']['Phone2']: '';
           
            if ($demographics['NotificationPreferences'] && isset($demographics['NotificationPreferences']['Email'])) {
                $email = $demographics['NotificationPreferences']['Email'];
               
                if ($email) {
                   
                    $userDuplicateEmail = User::whereNotNull('email')->where('email', $email)->first();
           
                    if (! $userDuplicateEmail) {
                        $user->email = $email;
                    } else {
                        $user->email = $userDuplicateEmail->email;
                    }
                } else {
                    $user->email = null;
                }
            }
        }
        $phone_number = setPhone($phone_number);
        if ($phone_number == '') {
            $status = '4';
   
            $doral_id = createDoralId();
            $first_name = ($demographics['FirstName']) ? $demographics['FirstName'] : '';
            $password = str_replace(" ", "",$first_name) . '@' . $doral_id;
            
            $user->first_name = $first_name;
            $user->last_name = ($demographics['LastName']) ? $demographics['LastName'] : '';
            $user->password = setPassword($password);
            $user->phone = null;

            $user->status = $status;
            $user->gender = setGender($demographics['Gender']);
            
            $user->dob = dateFormat($demographics['BirthDate']);
            $user->tele_phone = setPhone($tele_phone);
            
            $user->save();
            $user->assignRole('patient')->syncPermissions(Permission::all());
            return $user->id;
        } else {
            $status = '0';

            $userDuplicatePhone = User::whereNotNull('phone')->where('phone', $phone_number)->first();
          
            if (empty($userDuplicatePhone)) {
                // dd($userDuplicatePhone);
                $doral_id = createDoralId();
                $first_name = ($demographics['FirstName']) ? $demographics['FirstName'] : '';
                $password = str_replace(" ", "",$first_name) . '@' . $doral_id;
                
                $user->first_name = $first_name;
                $user->last_name = ($demographics['LastName']) ? $demographics['LastName'] : '';
                $user->password = setPassword($password);
                $user->phone = $phone_number;
                $user->phone_verified_at = now();

                $user->status = $status;
                $user->gender = setGender($demographics['Gender']);
                
                $user->dob = dateFormat($demographics['BirthDate']);
                $user->tele_phone = setPhone($tele_phone);
                
                $user->save();
                $user->assignRole('patient')->syncPermissions(Permission::all());
                return $user->id;
            }
        }
        
    }

    public static function storeDemographic($demographics, $user_id, $type)
    {
        $doral_id = createDoralId();

        $demographic = new Demographic();
        
        $demographic->doral_id = $doral_id;
        $demographic->user_id = $user_id;
        $demographic->company_id = '9';
        if ($type === '1') {
            $demographic->service_id = config('constant.MDOrder');

            $demographic->patient_id = $demographics['PatientID'] ? $demographics['PatientID'] : '';
            $accepted_services = [
                'Discipline' => $demographics['AcceptedServices']['Discipline'] ? $demographics['AcceptedServices']['Discipline'] : ''
            ];
            $demographic->accepted_services = $accepted_services;

            $language = $demographics['PrimaryLanguage'] ? $demographics['PrimaryLanguage'] : '';

            $address = $demographics['Addresses']['Address'];
            $zip = '';
            if(isset($address['Zip4']) && $address['Zip4'] != ''){ 
                $zip = $address['Zip4'];
            } else if(isset($address['Zip5']) && $address['Zip5'] != ''){
                $zip = $address['Zip5'];
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
            
        } else {
            $demographic->service_id = config('constant.OccupationalHealth');
            $demographic->patient_id = $demographics['ID'] ? $demographics['ID'] : '';
            $demographic->ethnicity = $demographics['Ethnicity'] && $demographics['Ethnicity']['Name'] ? $demographics['Ethnicity']['Name'] : '';

            $language = $demographics['Language1'] ? $demographics['Language1'] : '';

            $addressData = [];
            if ($demographics['Address']) {
                $address = $demographics['Address'];
                $zip = '';
                if(isset($address['Zip4']) && $address['Zip4'] != ''){
                    $zip = $address['Zip4'];
                } else if(isset($address['Zip5']) && $address['Zip5'] != ''){
                    $zip = $address['Zip5'];
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

        }

        $demographic->ssn = setSsn($demographics['SSN'] ? $demographics['SSN'] : '');
        $demographic->address = $addressData;
        $demographic->status = 'Active';
        $demographic->language = $language;
        $demographic->type = $type;

        $demographic->save();
    }

    public static function storeEmergencyContact($demographics, $user_id, $type)
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
                    if ($type === '1') {
                    $patientEmergencyContact->lives_with_patient = ($emergencyContact['LivesWithPatient']) ? $emergencyContact['LivesWithPatient'] : '';
                    $patientEmergencyContact->have_keys = ($emergencyContact['HaveKeys']) ? $emergencyContact['HaveKeys'] : '';
                    }
                    $patientEmergencyContact->phone1 = setPhone($emergencyContact['Phone1'] ? $emergencyContact['Phone1'] : '');
                    $patientEmergencyContact->phone2 = setPhone($emergencyContact['Phone2'] ? $emergencyContact['Phone2'] : '');
                    
                    $patientEmergencyContact->address = ($emergencyContact['Address']) ? $emergencyContact['Address'] : '';
                    $patientEmergencyContact->save();
                }
            }
        }
       
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchCaregivers()
    {
        try {
        // $searchCaregiverIds = $this->searchCaregiverDetails();
        // $caregiverArray = $searchCaregiverIds['soapBody']['SearchCaregiversResponse']['SearchCaregiversResult']['Caregivers']['CaregiverID'];
        $caregiverArray = ["202436","221475","308434","337865","348813","355358","432993","433016","469157","490813","495298","497073","508667","586023","594933","594938","609803","621831","626991","631868","639801","647045","697896","698231","698787","704231","724208","729160","729822","733104","739673","754192","754968","755306","760877","764043","771762","777330","778792","783866","784671","785564","789212","790123","791010","791365","792914","797247","806148","810744","814804","815131","815414","815761","823123","829688","839392","853575","854942","855549","862004","874029","874467","877027","878164","891473","891484","891533","891599","900163","902748","902821","902846","909764","917004","917152","917162","920449","929085","929248","931944","940546","940679","946037","951898","954464","957924","970426","972753","976930","978745","984267","989974","991868","995324","999390","1006533","1010348","1017118","1023639", "1024955", "1029867", "1034948", "1035408", "1058930", "1062913", "1071830", "1072288", "1099113", "1104565", "1105817", "1113138", "1118437", "1122576", "1125876", "1131603", "1133842", "1134103", "1141100", "1148506", "1160821", "1188999", "1194698", "1210328", "1212475", "1213283", "1215723", "1217157", "1231499", "1246756", "1251412", "1251430", "1265764", "1270508", "1271509", "1271789", "1272671", "1272774", "1276460", "1282396", "1283316", "1286208", "1291799", "1293348", "1319725", "1325830", "1332706", "1332760", "1332962", "1348432", "1352824", "1353037", "1365064", "1372197","1377746","1379403","1380347","1381250","1392707","1393824","1405697","1417644","1425543","1431134","1451230","1455544","1473358","1473518","1475964","1476325","1477539","1477942","1486065","1488656","1488984","1496394","1497172","1530882","1538810","1550924","1553945","1553967","1557135","1557151","1561767","1565600","1565777","1570116","1576037","1576147","1577148","1577956","1592352","1599493","1599690","1600230","1604289","1608717","1609954","1624776","1634959","1637881","1652654","1655478","1659584","1663584","1674311","1691429","1699805","1709417","1734748","1743857","1747487","1748587","1750180","1750240","1750290","1753128","1753253","1759337","1759724","1760253","1764377","1768507","1768655","1783536","1787593","1787729","1797201","1801626","1801635","1804585","1815014","1822360","1838499","1840451","1840701","1845304","1846619","1862935","1883743","1939214","1939296","1941085","1942971","1956394","1958753","1960690","1969401","1972349","1972531","2000137","2016437","2024693","2027093","2043338","2056251","2057098","2064733","2073838","2075606","2078171","2079924","2109711","2112416","2112703","2131551","2165214","2178524","2188482","2191762","2195300","2196642","2197059","2201816","2201872","2203075","2207914","2212505","2212890","2215130","2215133","2220813","2223954","2242213","2251138","2256689","2268325","2286345","2286534","2287235","2287842","2287962","2299055","2309782","2314105","2315430","2329812","2336315","2337390","2338049","2339664","2349683","2349959","2350031","2354275","2364177","2369141","2371201","2377433","2382174","2384504","2392819","2393775","2393820","2396631","2398847","2404546","2404608","2407611","2408030","2411469","2415975","2418088","2418562","2423080","2425901","2432348","2434423","2434730","2436419","2442374","2442592","2451975","2455483","2457528","2459046","2461014","2463634","2466883","2467433","2469901","2474967","2476088","2480496","2484520","2484999","2503502","2518361","2518440","2519673","2524448","2524686","2525039","2525430","2526070","2527139","2528019","2528020","2528113","2528780","2529076","2530327","2530547","2530608", "2531323", "2531388", "2531566", "2534032", "2534288", "2534646", "2534796", "2535041", "2535661", "2535897", "2536278", "2539350", "2539451", "2539590", "2544108", "2547118","2547245", "2547295", "2547399", "2547629", "2547659", "2548495","2549790", "2549825", "2550504", "2550819", "2553994", "2554785","2554802", "2555243", "2555400", "2555433", "2555511", "2556023","2556321", "2556426", "2556586", "2557153", "2558376", "2559719", "2559766","2560159", "2560977", "2561588", "2561667", "2564392", "2564504", "2564776", "2564877", "2565651", "2570419", "2570504", "2570748", "2571039", "2571355","2579034","2580663", "2581211", "2581283"];

        //dump(count($caregiverArray));3017 - 2668
        // $missing_patient_id = [];
        // $userCaregiver1 = Demographic::get();
        // foreach ($userCaregiver1 as $userCaregivers) { 
        //     $missing_patient_id[] = $userCaregivers->patient_id;
        // }
        // // dd($missing_patient_id);
        // $data = [];

        // foreach (array_slice($caregiverArray, 0 , 400) as $cargiver_id) {
            // $cargiver_id = 110560;
        foreach ($caregiverArray as $cargiver_id) {
            /** Store patirnt demographic detail */
            //  if (! in_array($cargiver_id, $missing_patient_id))
            // {
            //     $data[] = $cargiver_id;
                $userCaregiver = Demographic::where('patient_id' , $cargiver_id)->first();

                if (! $userCaregiver) {
                    $getdemographicDetails = $this->getCaregiverDemographicDetails($cargiver_id);
                    $demographics = $getdemographicDetails['soapBody']['GetCaregiverDemographicsResponse']['GetCaregiverDemographicsResult']['CaregiverInfo'];
                    // dump($cargiver_id);

                    $type = config('constant.CaregiverType');
                    $user_id = self::storeUser($demographics, $type);

                    if ($user_id) {
                    
                        self::storeDemographic($demographics, $user_id, $type);
        
                        self::storeEmergencyContact($demographics, $user_id, $type);
                    }
                }
            // }
        }
        // dump(count($data));
        // dump($data);
        $arr = array('status' => 200, 'message' => 'Patient created successfully.', 'data' => []);
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

}
