<?php

namespace App\Http\Controllers;

use App\Jobs\HHAApiCaregiver;
use App\Models\CaregiverInfo;
use App\Models\Demographic;
use App\Models\PatientEmergencyContact;
use App\Models\PatientReport;
use App\Models\User;
use App\Services\ClinicianService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Log;
use ZipArchive;

class CaregiverController extends Controller
{
    public function index($status)
    {
        return view('pages.patient_detail.new_patient', compact('status'));
    }

    public function getCaregiverDetail(Request $request)
    {
        $patientList = User::whereHas('roles',function ($q){
                $q->where('name','=','patient');
            })
            ->when($request['status'], function ($query) use($request) {
                if ($request['status'] == 'pending') {
                    $query->where('status', '0');
                } else if($request['status'] == 'active') {
                    $query->where('status', '1');
                } else if($request['status'] == 'initial') {
                    $query->where('status', '4');
                    $query->whereHas('caregiverInfo',function ($q) use($request) {
                        $company_id = Auth::guard('referral')->user()->id;
                        $q->where('service_id', '3')->where('company_id', $company_id);
                    });
                } else if($request['status'] == 'occupational-health') {
                    $query->whereIn('status', ['0', '1', '2', '3', '5']);
                    $query->whereHas('caregiverInfo',function ($q) use($request) {
                        $company_id = Auth::guard('referral')->user()->id;
                        $q->where('service_id', '3')->where('company_id', $company_id);
                    });
                } else if($request['status'] == 'md-order') {
                    $query->whereHas('caregiverInfo',function ($q) use($request) {
                        $company_id = Auth::guard('referral')->user()->id;
                        $q->where('service_id', '2')->where('company_id', $company_id);
                    });
                } else if($request['status'] == 'vbc') {
                    $query->whereHas('caregiverInfo',function ($q) use($request) {
                        $company_id = Auth::guard('referral')->user()->id;
                        $q->where('service_id', '1')->where('company_id', $company_id);
                    });
                }
            })
            ->with('demographic', 'patientReport', 'patientReport.labReports')->orderBy('id', 'DESC');
            
        $datatble = DataTables::of($patientList)
            ->addColumn('checkbox_id', function($q) use($request) {
                return '<div class="checkbox"><label><input class="innerallchk" onclick="chkmain();" type="checkbox" name="allchk[]" value="' . $q->id . '" /><span></span></label></div>';
            })
            ->addIndexColumn()
            ->addColumn('full_name', function($q) use($request) {
                if ($request['status'] == 'initial') {
                    $full_name = "<span class='label'>".$q->full_name."</span>";
                    $full_name .= "<div class='fullname-text'><input class='first_name form-control' required type='text' name='first_name' value='".$q->first_name."'></div>";
                    $full_name .= "<div class='fullname-text'><input class='last_name form-control' type='text' name='last_name' value='".$q->last_name."'></div>";
                    return $full_name;
                } else {
                    return '<a href="' . route('patient.details', ['patient_id' => $q->id]) . '" class="" data-toggle="tooltip" data-placement="left" title="View Patient" data-original-title="View Patient Chart">' . $q->full_name . '</a>';
                }
                // return $full_name;
            })
            ->addColumn('gender', function($q){
                return $q->gender_data;
            })
            ->addColumn('ssn', function($q) use($request) {
                if ($request['status'] == 'initial') {
                    $ssn_data = '';
                    if ($q->demographic) {
                        $ssn_data = $q->demographic->ssn;
                    }
                   
                    $ssn = "<span class='label'>".$ssn_data."</span>";
                    $ssn .= "<div class='ssn-text'><input class='ssn form-control' type='text' name='ssn' value='".$ssn_data."'></div>";
                    return $ssn;
                } else {
                    $ssn_data = '';
                    if ($q->demographic) {
                        $ssn_data = $q->demographic->ssn;
                    }
                    return "<span class='label'>".$ssn_data."</span>";
                }
            })
            ->addColumn('phone', function($q) use($request){
                $phone = '';
                if ($request['status'] == 'initial') {
                    $phone .= "<div class='phone-text'><input class='phone form-control' required type='text' name='phone' value=''></div>";
                } else {
                    $phone .= "<span class='label'><a href='tel:".$q->phone."'><i class='las la-phone circle'></i>".$q->phone."</a></span>";
                }
                return $phone;
            })
            ->addColumn('service_id', function($q) {
                $services = '';
                if ($q->caregiverInfo && $q->caregiverInfo->services) {
                    $services =  $q->caregiverInfo->services->name;
                }
                return $services;
            })
            ->addColumn('doral_id', function($q){
                $doral_id = '';
                if ($q->demographic) {
                    $doral_id =  $q->demographic->doral_id;
                }
                return $doral_id;
            })
            ->addColumn('city_state', function($q) use($request) {
                if ($request['status'] == 'initial') {
                    $city = $state = '';
                    if ($q->demographic) {
                        $city_state_json =  json_decode($q->demographic->address);

                        if ($city_state_json) {
                            if ($city_state_json->City) {
                                $city = $city_state_json->City;
                            }
                            if ($city_state_json->State) {
                                $state = $city_state_json->State;
                            }
                        }
                    }
                    $city_state = "<span class='label'>".$city . ' - ' . $state . "</span>";
                    $city_state .= "<div class='address-text'><input class='city form-control' type='text' name='city' value='".$city."'></div>";
                    $city_state .= "<div class='address-text'><input class='state form-control' type='text' name='state' value='".$state."'></div>";
                    return $city_state;
                } else {
                    $city_state = '';
                    if ($q->demographic) {
                        $city_state_json =  json_decode($q->demographic->address);

                        if ($city_state_json) {
                            if ($city_state_json->City) {
                                $city_state .= $city_state_json->City;
                            }
                            if ($city_state_json->State) {
                                $city_state .= ' - ' . $city_state_json->State;
                            }

                        }
                    }
                    return $city_state;
                }
               
            });
            if($request['status'] == 'active') {
                $datatble->addColumn('dob', function($row) use($request){
                    return date('m-d-Y', strtotime($row->dob));
                });
            } else {
                $datatble->addColumn('action', function($row) use($request){
                  
                    $btn = '';
                    if ($request['status'] == 'occupational-health' || $request['status'] == 'md-order' || $request['status'] == 'vbc' || $request['status'] == 'initial') {

                        if ($request['status'] == 'initial') {
                            $btn .= '<div class="normal"><a class="edit_btn btn btn-sm" title="Edit" style="background: #006c76; color: #fff">Edit</a></div> ';
                            $btn .= '<div class="while_edit"><a class="save_btn btn btn-sm" data-id="'.$row->id.'" title="Save" style="background: #626a6b; color: #fff">Save</a><a class="cancel_edit btn btn-sm" title="Cancel" style="background: #bbc2c3; color: #fff">Close</a></div>';
                        } else {
                         
                            if ($row->status === '5') {
                              
                                // $btn .= '<select class="form-control download_lab_report" name="referralType" id="referralType">';
                                //     if ($row->patientReport) {
                                //         foreach ($row->patientReport as $value) {
                                //             if ($value->labReports) {
                                //                 $btn .= '<option value="'.$value->labReports->id.'" data-value="single">'.$value->labReports->name.'</option>';
                                //             }
                                //         }
                                //     }
                                    
                                // $btn .='<option value="" data-value="multiple" data-id="'.$row->id.'">Download All</option>';
                                // $btn .= '</select>';
                                    $btn .= '<a href="' . route('caregiver.downloadLabReport', ['user_id' => $row->id]) . '"><img src="'.asset("assets/img/icons/download-icon.svg").'"></a>';
                            } else {
                                $btn .= $row->status_data;
                            }
                        }
                    } else {
                        if ($row->status === '0') {
                            $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-sm update-status" style="background: #006c76; color: #fff" data-status="1" patient-name="' . $row->full_name . '">Accept</a>';

                            $btn .= ' <a target="_blank" href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm update-status" style="background: #eaeaea; color: #000" data-status="3">Reject</a>';
                        }  else if ($row->status === '1') {
                            $btn .= '<p class="text-success">Accept</p>';
                        }
                    }
                    return $btn;
                });
            }
            $datatble->rawColumns(['full_name', 'ssn', 'city_state', 'action', 'checkbox_id', 'phone']);
            return $datatble->make(true);
    }

    public function updatePatientStatus(Request $request)
    {
        $clinicianService = new ClinicianService();
        $response = $clinicianService->updatePatientStatus($request->all());
        
        //         $from = "12089104598";
        //         $api_key = "bb78dfeb";
        //         $api_secret = "PoZ5ZWbnhEYzP9m4";
        //         $uri = 'https://rest.nexmo.com/sms/json';
        //         $text = "This message is from Doral health Connect :
        // Congratulation! Your employer Housecalls home care has been enrolled to benefit plan where each employees will get certain medical facilities. If you have any medical concern or need annual physical please click on the link below and book your appointment now.
        // https://doralhealthconnect.com/book_appointment.html";
                    
        //         $to = 5166000122;
        //         $fields = '&from=' . urlencode($from) .
        //                 '&text=' . urlencode($text) .
        //                 '&to=+1' . urlencode($to) .
        //                 '&api_key=' . urlencode($api_key) .
        //                 '&api_secret=' . urlencode($api_secret);
        //         $res = curl_init($uri);
        //         curl_setopt($res, CURLOPT_POST, TRUE);
        //         curl_setopt($res, CURLOPT_RETURNTRANSFER, TRUE); // don't echo
        //         curl_setopt($res, CURLOPT_SSL_VERIFYPEER, FALSE);
        //         curl_setopt($res, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        //         curl_setopt($res, CURLOPT_POSTFIELDS, $fields);
        //         $result = curl_exec($res);
        //         $result = json_decode($result);
        //         curl_close($res);
                
        //         $too = 9293989855;
        //         $fields = '&from=' . urlencode($from) .
        //                 '&text=' . urlencode($text) .
        //                 '&to=+1' . urlencode($too) .
        //                 '&api_key=' . urlencode($api_key) .
        //                 '&api_secret=' . urlencode($api_secret);
        //         $res = curl_init($uri);
        //         curl_setopt($res, CURLOPT_POST, TRUE);
        //         curl_setopt($res, CURLOPT_RETURNTRANSFER, TRUE); // don't echo
        //         curl_setopt($res, CURLOPT_SSL_VERIFYPEER, FALSE);
        //         curl_setopt($res, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        //         curl_setopt($res, CURLOPT_POSTFIELDS, $fields);
        //         $result = curl_exec($res);
        //         $result = json_decode($result);
        //         curl_close($res);

        if ($response->status === true){
            return response()->json($response,200);
        }
        return response()->json($response,422);
    }

    public function updatePhoneNumber(Request $request)
    {
        $clinicianService = new ClinicianService();
        $response = $clinicianService->updatePhoneNumber($request->all());

        if ($response->status === true){
            return response()->json($response,200);
        }
        return response()->json($response,422);
    }

    public function downloadLabReport($id)
    {
        $patientReports = PatientReport::where('user_id', $id)->get();

     
        $public_dir=public_path();
        $zipFileName = 'invoicezipfile-'.$id.'.zip';
       
        $zip = new ZipArchive;

        if (!file_exists($public_dir.'/zip')) {
            mkdir($public_dir.'/zip', 0777, true);
        }
        
        if ($zip->open($public_dir . '/zip' . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
            foreach ($patientReports as $key => $patientReport) {
                $invoice_file = $patientReport->file_name;
                $zip->addFile($public_dir . '/patient_report/'.$invoice_file,$invoice_file);
            }
            // $zip->close();
        }
        // dd($zip);
        // Set Header
        $headers = array(
            'Content-Type' => 'application/octet-stream',
        );
        $filetopath=$public_dir. '/zip' . '/'.$zipFileName;
       
        // Create Download Response
        if(file_exists($filetopath)){
            return response()->download($filetopath,$zipFileName,$headers);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchCaregivers()
    {
        $searchCaregiverIds = $this->searchCaregiverDetails();
        $caregiverArray = $searchCaregiverIds['soapBody']['SearchCaregiversResponse']['SearchCaregiversResult']['Caregivers']['CaregiverID'];
        //dump(count($caregiverArray));
        // whereIn($caregiverArray)
        // $data = HHAApiCaregiver::dispatch($caregiverArray);
        // $caregiverArray = ["78890","78961","79257","79303","79456","80831"];
        // return 'Update successfully';

        // dump($counter);2960
        foreach (array_slice($caregiverArray, 0 , 2960) as $cargiver_id) {

            // foreach ($caregiverArray as $cargiver_id) {
            /** Store patirnt demographic detail */
            $userCaregiver = CaregiverInfo::where('caregiver_id' , $cargiver_id)->first();

            if (! $userCaregiver) {
                $getdemographicDetails = $this->getDemographicDetails($cargiver_id);
                $demographicDetails = $getdemographicDetails['soapBody']['GetCaregiverDemographicsResponse']['GetCaregiverDemographicsResult']['CaregiverInfo'];

                self::saveUser($demographicDetails);
            }


            // $getChangesV2 = $this->getChangesV2();
            // $changesV2 = $getChangesV2['soapBody']['GetCaregiverChangesV2Response']['GetCaregiverChangesV2Result']['GetCaregiverChangesV2Info'];

            // $createMedical = $this->createMedical($cargiver_id);
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
        $getPatientDetailsController = new GetPatientDetailsController();
        return $getPatientDetailsController->curlCall($data, $method);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDemographicDetails($cargiver_id)
    {
        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetCaregiverDemographics xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><CaregiverInfo><ID>' . $cargiver_id . '</ID></CaregiverInfo></GetCaregiverDemographics></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        $method = 'POST';
        $getPatientDetailsController = new GetPatientDetailsController();
        return $getPatientDetailsController->curlCall($data, $method);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getChangesV2()
    {
        $date = Carbon::now();// will get you the current date, time
        $today = $date->format("Y-m-d");

        $data = '<?xml version="1.0" encoding="utf-8"?><SOAP-ENV:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/"><SOAP-ENV:Body><GetCaregiverChangesV2 xmlns="https://www.hhaexchange.com/apis/hhaws.integration"><Authentication><AppName>HCHS257</AppName><AppSecret>99473456-2939-459c-a5e7-f2ab47a5db2f</AppSecret><AppKey>MQAwADcAMwAxADMALQAzADEAQwBDADIAQQA4ADUAOQA3AEEARgBDAEYAMwA1AEIARQA0ADQANQAyAEEANQBFADIAQgBDADEAOAA=</AppKey></Authentication><ModifiedAfter>2015-03-19T04:31:57.077</ModifiedAfter></GetCaregiverChangesV2></SOAP-ENV:Body></SOAP-ENV:Envelope>';

        $method = 'POST';
        $getPatientDetailsController = new GetPatientDetailsController();
        return $getPatientDetailsController->curlCall($data, $method);
    }

   
    public static function saveUser($demographicDetails)
    {
        $email = null;
        if ($demographicDetails['NotificationPreferences']['Email']) {
            $email = $demographicDetails['NotificationPreferences']['Email'];
        }

        $userDuplicateEmail = User::whereNotNull('email')->where('email', $email)->first();

        if ($userDuplicateEmail) {
            return;
        }

        $phone_number = null;
        if ($demographicDetails['Address']['HomePhone']) {
            $phone_number = $demographicDetails['Address']['HomePhone'];
        } else if($demographicDetails['Address']['Phone2']) {
            $phone_number = $demographicDetails['Address']['Phone2'];
        } else if($demographicDetails['Address']['Phone3']) {
            $phone_number = $demographicDetails['Address']['Phone3'];
        } else if($demographicDetails['NotificationPreferences']['MobileOrSMS']) {
            $phone_number = $demographicDetails['NotificationPreferences']['MobileOrSMS'];
        }

        if ($phone_number == '') {
            $status = '4';
        } else {
            $phone_number = str_replace("-","",$phone_number);
            $status = '0';

            $userDuplicatePhone = User::whereNotNull('phone')->where('phone', $phone_number)->first();
            if ($userDuplicatePhone) {
                return;
            }
        }

        $gender = '';
        if ($demographicDetails['Gender'] == 'MALE') {
            $gender = 1;
        } else if ($demographicDetails['Gender'] == 'FEMALE') {
            $gender = 2;
        } else {
            $gender = 3;
        }

        $user = DB::table('users')->insert([
            'gender' => $gender,
            'first_name' => $demographicDetails['FirstName'],
            'last_name' => $demographicDetails['LastName'],
            'dob' => $demographicDetails['BirthDate'],
            'status' => $status,
            'email' => $email,
            'phone' => $phone_number,
            'password' => Hash::make('Patient@doral'),
        ]);

        $user_id = DB::getPdo()->lastInsertId();

        $user = User::find($user_id);

        $user->assignRole('patient')->syncPermissions(Permission::all());

        self::saveCaregiverInfo($demographicDetails, $user_id);

        self::saveDemographic($demographicDetails, $user_id);

        self::storeEmergencyContact($demographicDetails, $user_id);

    }

    public static function saveCaregiverInfo($demographicDetails, $userId)
    {
        $caregiverInfo = new CaregiverInfo();

        $caregiverInfo->user_id = $userId;
        $caregiverInfo->company_id = '9';
        $caregiverInfo->service_id = '3';

        $caregiverInfo->caregiver_id = ($demographicDetails['ID']) ? $demographicDetails['ID'] : '';
        $caregiverInfo->intials = ($demographicDetails['Intials']) ? $demographicDetails['Intials'] : '';
        $caregiverInfo->caregiver_gender_id = ($demographicDetails['CaregiverGenderID']) ? $demographicDetails['CaregiverGenderID'] : '';
        $caregiverInfo->caregiver_code = ($demographicDetails['CaregiverCode']) ? $demographicDetails['CaregiverCode'] : '';
        $caregiverInfo->alternate_caregiver_code = ($demographicDetails['AlternateCaregiverCode']) ? $demographicDetails['AlternateCaregiverCode'] : '';
        $caregiverInfo->time_attendance_pin = ($demographicDetails['TimeAndAttendancePIN']) ? $demographicDetails['TimeAndAttendancePIN'] : '';

        $mobile = [];
        if ($demographicDetails['MobileID'] || $demographicDetails['MobileIDTypeDescription']) {
            $mobile = [
                'MobileID' => ($demographicDetails['MobileID']) ? $demographicDetails['MobileID'] : '',
                'MobileIDTypeDescription' => ($demographicDetails['MobileIDTypeDescription']) ? $demographicDetails['MobileIDTypeDescription'] : '',
            ];
        }
        $caregiverInfo->mobile = json_encode($mobile);

        $ethnicity = [];
        if ($demographicDetails['Ethnicity']) {
            $ethnicity = [
                $demographicDetails['Ethnicity'],
            ];
        }
        $caregiverInfo->ethnicity = json_encode($ethnicity);

        $caregiverInfo->country_of_birth = ($demographicDetails['CountryOfBirth']) ? $demographicDetails['CountryOfBirth'] : '';
        $caregiverInfo->employee_type = ($demographicDetails['EmployeeType']) ? $demographicDetails['EmployeeType'] : '';

        $maritalStatus = [];
        if ($demographicDetails['MaritalStatus']) {
            $maritalStatus = [
                $demographicDetails['MaritalStatus'],
            ];
        }
        $caregiverInfo->marital_status = json_encode($maritalStatus);

        $caregiverInfo->dependents = ($demographicDetails['Dependents']) ? $demographicDetails['Dependents'] : '';

        $status = [];
        if ($demographicDetails['Status']) {
            $status = [
                $demographicDetails['Status'],
            ];
        }
        $caregiverInfo->status = json_encode($status);

        $caregiverInfo->employee_id = ($demographicDetails['EmployeeID']) ? $demographicDetails['EmployeeID'] : '';
        $caregiverInfo->application_date = ($demographicDetails['ApplicationDate']) ? $demographicDetails['ApplicationDate'] : '';
        $caregiverInfo->hire_date = ($demographicDetails['HireDate']) ? $demographicDetails['HireDate'] : '';
        $caregiverInfo->rehire_date = ($demographicDetails['RehireDate']) ? $demographicDetails['RehireDate'] : '';
        $caregiverInfo->first_work_date = ($demographicDetails['FirstWorkDate']) ? $demographicDetails['FirstWorkDate'] : '';
        $caregiverInfo->last_work_date = ($demographicDetails['LastWorkDate']) ? $demographicDetails['LastWorkDate'] : '';
        $caregiverInfo->registry_number = ($demographicDetails['RegistryNumber']) ? $demographicDetails['RegistryNumber'] : '';
        $caregiverInfo->registry_checked_date = ($demographicDetails['RegistryCheckedDate']) ? $demographicDetails['RegistryCheckedDate'] : '';

        $referralSource = [];
        if ($demographicDetails['ReferralSource']) {
            $referralSource = [
                $demographicDetails['ReferralSource'],
            ];
        }
        $caregiverInfo->referral_source = json_encode($referralSource);

        $caregiverInfo->referral_person = ($demographicDetails['ReferralPerson']) ? $demographicDetails['ReferralPerson'] : '';

        $notificationPreferences = [];
        if ($demographicDetails['NotificationPreferences']) {
            $notificationPreferences = [
                $demographicDetails['NotificationPreferences'],
            ];
        }
        $caregiverInfo->notification_preferences = json_encode($notificationPreferences);;

        $caregiverOffices = [];
        if ($demographicDetails['CaregiverOffices']) {
            $caregiverOffices = [
                $demographicDetails['CaregiverOffices'],
            ];
        }
        $caregiverInfo->caregiver_offices = json_encode($caregiverOffices);

        $inactiveReasonDetail = json_encode([
            ($demographicDetails['InactiveReasonID']) ? $demographicDetails['InactiveReasonID'] : '',
            ($demographicDetails['InactiveReason']) ? $demographicDetails['InactiveReason'] : '',
            ($demographicDetails['InactiveNote']) ? $demographicDetails['InactiveNote'] : '',
        ]);
        $inactiveReasonDetail = [];
        if ($demographicDetails['InactiveReasonID'] || $demographicDetails['InactiveReason'] || $demographicDetails['InactiveNote']) {
            $inactiveReasonDetail = [
                'InactiveReasonID' => ($demographicDetails['InactiveReasonID']) ? $demographicDetails['InactiveReasonID'] : '',
                'InactiveReason' => ($demographicDetails['InactiveReason']) ? $demographicDetails['InactiveReason'] : '',
                'InactiveNote' => ($demographicDetails['InactiveNote']) ? $demographicDetails['InactiveNote'] : '',
            ];
        }
        $caregiverInfo->inactive_reason_detail = json_encode($inactiveReasonDetail);
        $caregiverInfo->professional_licensenumber = ($demographicDetails['ProfessionalLicensenumber']) ? $demographicDetails['ProfessionalLicensenumber'] : '';
        $caregiverInfo->npi_number = ($demographicDetails['NPINumber']) ? $demographicDetails['NPINumber'] : '';
        $caregiverInfo->signed_payroll_agreement_date = ($demographicDetails['SignedPayrollAgreementDate']) ? $demographicDetails['SignedPayrollAgreementDate'] : '';

        $caregiverInfo->save();
    }

    public static function saveDemographic($demographicDetails, $userId)
    {
        $demographic = new Demographic();

        $demographic->user_id = $userId;
        $demographic->doral_id = 'DOR-' . mt_rand(100000, 999999);
        $demographic->ssn = ($demographicDetails['SSN']) ? $demographicDetails['SSN'] : '';

        $team = [];
        if ($demographicDetails['Team'] && $demographicDetails['Team']['Name']) {
            $team = [
                $demographicDetails['Team'],
            ];
        }
        $demographic->team = json_encode($team);

        $location = [];
        if ($demographicDetails['Location'] && $demographicDetails['Location']['Name']) {
            $location = [
                $demographicDetails['Location'],
            ];
        }
        $demographic->location = json_encode($location);

        $branch = [];
        if ($demographicDetails['Branch'] && $demographicDetails['Branch']['Name']) {
            $branch = [
                $demographicDetails['Branch'],
            ];
        }
        $demographic->branch = json_encode($branch);

        $employmentTypes = [];
        if ($demographicDetails['EmploymentTypes']) {
            $employmentTypes = [
                $demographicDetails['EmploymentTypes'],
            ];
        }
        $demographic->accepted_services = json_encode($employmentTypes);

        $address = [];
        if ($demographicDetails['Address']) {
            $address = [
                $demographicDetails['Address'],
            ];
        }
        $demographic->address = json_encode($address);

        $language = [];
        if ($demographicDetails['LanguageID1'] || $demographicDetails['Language1'] || $demographicDetails['LanguageID2'] || $demographicDetails['Language2'] || $demographicDetails['LanguageID3'] || $demographicDetails['Language3'] || $demographicDetails['LanguageID4'] || $demographicDetails['Language4']) {
            $language[] = [
                'LanguageID1' => ($demographicDetails['LanguageID1']) ? $demographicDetails['LanguageID1'] : '',
                'Language1' => ($demographicDetails['Language1']) ? $demographicDetails['Language1'] : '',
                'LanguageID2' => ($demographicDetails['LanguageID2']) ? $demographicDetails['LanguageID2'] : '',
                'Language2' => ($demographicDetails['Language2']) ? $demographicDetails['Language2'] : '',
                'LanguageID3' =>($demographicDetails['LanguageID3']) ? $demographicDetails['LanguageID3'] : '',
                'Language3' => ($demographicDetails['Language3']) ? $demographicDetails['Language3'] : '',
                'LanguageID4' => ($demographicDetails['LanguageID4']) ? $demographicDetails['LanguageID4'] : '',
                'Language4' => ($demographicDetails['Language4']) ? $demographicDetails['Language4'] : '',
            ];
        }
        $demographic->language = json_encode($language);
        $demographic->type = '2';

        $demographic->save();
    }
    public static function storeEmergencyContact($demographicDetails, $user_id)
    {
        foreach ($demographicDetails['EmergencyContacts']['EmergencyContact'] as $emergencyContact) {
            if($emergencyContact['Name']) {
                $relationship = [];
                if ($emergencyContact['Relationship'] && $emergencyContact['Relationship']['Name']) {
                    $relationship = [
                        $emergencyContact['Relationship']
                    ];
                }
                $relationshipJson = json_encode($relationship);
                $patientEmergencyContact = new PatientEmergencyContact();

                $patientEmergencyContact->user_id = $user_id;
                $patientEmergencyContact->name = $emergencyContact['Name'];
                $patientEmergencyContact->relation = $relationshipJson;
                $patientEmergencyContact->phone1 = ($emergencyContact['Phone1']) ? $emergencyContact['Phone1'] : '';
                $patientEmergencyContact->phone2 = ($emergencyContact['Phone2']) ? $emergencyContact['Phone2'] : '';
                $patientEmergencyContact->address = ($emergencyContact['Address']) ? $emergencyContact['Address'] : '';
                $patientEmergencyContact->save();
            }
        }
    }
}
