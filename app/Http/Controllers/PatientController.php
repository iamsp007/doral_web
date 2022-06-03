<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Company;
use App\Models\Demographic;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\LabReportType;
use App\Models\PatientEmergencyContact;
use App\Models\PatientLabReport;
use App\Models\User;
use App\Models\UserDevice;
use App\Models\UserDeviceLog;
use Exception;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    protected $adminServices;
    public function __construct(AdminService $adminServices)
    {
        $this->adminServices = $adminServices;
    }

    public function index(Request $request,$paient_id){
        try {
            $response = $this->adminServices->getPatientDetail($paient_id);
            if ($response->status===true){
                $details = $response->data;

                $labReportTypes = LabReportType::where('status','1')->whereNull('parent_id')->orderBy('sequence', 'asc')->get();

                $tbpatientLabReports = PatientLabReport::with('labReportType')->where('user_id', $paient_id)->whereIn('lab_report_type_id', ['2','3','4','5','6'])->get();
                $tbLabReportTypes = LabReportType::doesnthave('patientLabReport','or' ,function($query) use($paient_id) {
                    $query->where('user_id', $paient_id);
                })->where('status','1')->where('parent_id', 1)->orderBy('sequence', 'asc')->get();
                
                $immunizationLabReports = PatientLabReport::with('labReportType')->where('user_id', $paient_id)->whereIn('lab_report_type_id', ['8','9','10','11'])->get();
                $immunizationLabReportTypes = LabReportType::doesnthave('patientLabReport','or' ,function($query) use($paient_id) {
                    $query->where('user_id', $paient_id);
                })->where('status','1')->where('parent_id', 2)->orderBy('sequence', 'asc')->get();

                $drugLabReports = PatientLabReport::with('labReportType')->where('user_id', $paient_id)->whereIn('lab_report_type_id', ['13','14'])->get();
                $drugLabReportTypes = LabReportType::doesnthave('patientLabReport','or' ,function($query) use($paient_id) {
                    $query->where('user_id', $paient_id);
                })->where('status','1')->where('parent_id', 3)->orderBy('sequence', 'asc')->get();

                return view('pages.patient-detail',compact('details', 'labReportTypes', 'tbpatientLabReports', 'tbLabReportTypes', 'immunizationLabReports', 'immunizationLabReportTypes', 'drugLabReports', 'drugLabReportTypes', 'paient_id'));
            }
            return redirect()->route('home')->with('errors',$response->message);
        }catch (\Exception $exception){
            return redirect()->route('home')->with('errors',$exception->getMessage());
        }
    }

    public function patientMedicineList(Request $request,$paient_id){
        $data=array();
        try {
            $response = $this->adminServices->patientMedicineList($paient_id);
            if ($response->status===true){
                $data = $response->data;
            }
        }catch (\Exception $exception){

        }
        return DataTables::of($data)->make(true);
    }

    public function addInsurance(Request $request){
        try {
            $response = $this->adminServices->addInsurance($request->all());
            if ($response->status===true){
                return response()->json($response,200);
            }
            return response()->json($response,422);
        }catch (\Exception $exception){
            return response()->json(['status'=>false,'message'=>$exception->getMessage(),'data'=>null],422);
        }
    }

    public function addMedicine(Request $request){
        try {
            $response = $this->adminServices->addMedicine($request->all());
            if ($response->status===true){
                return response()->json($response,200);
            }
            return response()->json($response,422);
        }catch (\Exception $exception){
            return response()->json(['status'=>false,'message'=>$exception->getMessage(),'data'=>null],422);
        }
    }

    public function demographyDataUpdate(Request $request){
        
        try {
            $input = $request->all();
        
            if ($request->type==="1"){
                $parts = explode('-',$input['dob']);
                $yyyy_mm_dd = $parts[2] . '-' . $parts[0] . '-' . $parts[1];

                User::find($input['user_id'])->update([
                    'gender' => $input['gender'],
                    'first_name' => $input['first_name'],
                    'last_name' => $input['last_name'],
                    'dob' => $yyyy_mm_dd,
                    'phone' => $input['home_phone'],
                    'email' => $input['email'],
                ]);

                if (isset($input['notification']) && !empty($input['notification'])) {
                    $notification = implode(',',$input['notification']);
                } else {
                    $notification = '';
                }

                Demographic::where('user_id' ,$input['user_id'])->update([
                    'ssn' => isset($input['ssn']) ? $input['ssn'] : '' ,
                    'language' => isset($input['language']) ? $input['language'] : '' ,
                    'address->address1' => isset($input['address1']) ? $input['address1'] : '' ,
                    'address->address2' => isset($input['address2']) ? $input['address2'] : '' ,
                    'address->city' => isset($input['city']) ? $input['city'] : '' ,
                    'address->state' => isset($input['state']) ? $input['state'] : '' ,
                    'address->zip_code' => isset($input['zip_code']) ? $input['zip_code'] : '' ,
                    'address->apt_building' => isset($input['apt_building']) ? $input['apt_building'] : '' ,
                    'ethnicity' => isset($input['ethnicity']) ? $input['ethnicity'] : '' ,
                    'country_of_birth' => isset($input['country_of_birth']) ? $input['country_of_birth'] : '' ,
                    'marital_status' => isset($input['marital_status']) ? $input['marital_status'] : '' ,
                    // 'notification_preferences->email' => isset($input['email']) ? $input['email'] : '' ,
                    // 'notification_preferences->method_name' => isset($input['method_name']) ? $input['method_name'] : '' ,
                    // 'notification_preferences->mobile_or_sms' => isset($input['mobile_or_sms']) ? $input['mobile_or_sms'] : '' ,
                    // 'notification_preferences->voice_message' => isset($input['voice_message']) ? $input['voice_message'] : '' ,
                    'notification' => $notification,
                ]);

                $contactName = $input['contact_name'];
                $phone1 = $input['phone1'];
                $phone2 = $input['phone2'];
                $relation = $input['relationship_name'];
                // $address = $input['address'];
                // $emergencyAddress = [
                //     'apt_building' => $input['emergencyAptBuilding'],
                //     'address1' => $input['emergencyAddress1'],
                //     'address2' => $input['emergencyAddress2'],
                //     'city' => $input['emergencyAddress_city'],
                //     'state' => $input['emergencyAddress_state'],
                //     'zip_code' => $input['emergencyAddress_zip_code'],
                // ] ;

                $apt_building = $input['emergencyAptBuilding'];
                $address1 = $input['emergencyAddress1'];
                $address2 = $input['emergencyAddress2'];
                $city = $input['emergencyAddress_city'];
                $state = $input['emergencyAddress_state'];
                $zip_code = $input['emergencyAddress_zip_code'];
            
                PatientEmergencyContact::where('user_id', $input['user_id'])->delete();
                
                foreach ($contactName as $index => $value) {
                    $emergencyAddress = [
                        'apt_building' => ($apt_building[$index]) ? $apt_building[$index] : '',
                        'address1' =>  ($address1[$index]) ? $address1[$index] : '',
                        'address2' =>  ($address2[$index]) ? $address2[$index] : '',
                        'city' => ($city[$index]) ? $city[$index] : '',
                        'state' => ($state[$index]) ? $state[$index] : '',
                        'zip_code' => ($zip_code[$index]) ? $zip_code[$index] : '',
                    ];
                
                    PatientEmergencyContact::create([
                        'user_id' => $input['user_id'],
                        'name' => ($contactName[$index]) ? $contactName[$index] : '',
                        'phone1' => ($phone1[$index]) ? $phone1[$index] : '',
                        'phone2' => ($phone2[$index]) ? $phone2[$index] : '',
                        'relation' => ($relation[$index]) ? $relation[$index] : '',
                        'address' => $emergencyAddress,
                    ]);
                }

                return $this->generateResponse(true, 'Update Details Success', null, 200);
            } else if($request->type === "2") {
                Demographic::where('user_id' ,$input['user_id'])->update([
                    'medicaid_number' => $input['medicaid_number'],
                    'medicare_number' => $input['medicare_number'],
                ]);

                return $this->generateResponse(true, 'Update Details Success', $request->type, 200);
            } else if($request->type === "3") {
                $phone = preg_replace("/[^0-9]+/", "", $input['phone']);
                $administrator_phone_no = preg_replace("/[^0-9]+/", "", $input['administrator_phone_no']);
                Company::where('id' ,$input['company_id'])->update([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'phone' => $phone,
                    'fax_no' => $input['fax_no'],
                    'zip' => $input['zip'],
                    'address1' => $input['address1'],
                    'address2' => $input['address2'],
                    'administrator_name' => $input['administrator_name'],
                    'registration_no' => $input['registration_no'],
                    'administrator_emailId' => $input['administrator_emailId'],
                    'licence_no' => $input['licence_no'],
                    'administrator_phone_no' => $administrator_phone_no,
                    'insurance_id' => $input['insurance_id'],
                    'expiration_date' => $input['expiration_date'],
                    'services' => implode(",",$input['services'])
                ]);
                return $this->generateResponse(true, 'Update Details Success', null, 200);
            } else if($request->type === "4") {
                $user_ids = $input['doc_id'];
                $device_id = $input['device_id'];
                $ids = [];
                foreach ($user_ids as $index => $value) {
                    $ud = UserDevice::where([['user_id', '=', $user_ids[$index]],['device_type', '=', $device_id[$index]],['patient_id', '=', $input['patient_id']]])->first();
                
                    if ($ud){
                        $ud->update([
                        'user_id' => $user_ids[$index],
                            'device_type' => ($device_id[$index]) ? $device_id[$index] : '',
                            'patient_id' => $input['patient_id'],
                    ]);
                    } else {
                        $ud = new UserDevice();
                        $ud->user_id = $user_ids[$index];
                        $ud->device_type = $device_id[$index];
                        $ud->patient_id = $input['patient_id'];
                        $ud->save();
                    }
                } 
                return $this->generateResponse(true, 'Update Details Success', $ud, 200);
            }

            return $this->generateResponse(false, 'Something Went Wrong', null, 200);
        } catch (\Exception $exception){
            return response()->json(['status'=>false,'message'=>$exception->getMessage(),'data'=>null],422);
        }
    }

    public function ccmReadingLevelHigh()
    {
         try {
            $hignData = [];
            $high = UserDeviceLog::where('level',3)->with('userDevice','userDevice.user')->whereHas('userDevice')
                ->WhereIn('user_device_logs.id',DB::table('user_device_logs AS udl')
                    ->join('user_devices','user_devices.id','=','udl.user_device_id' )                   
                    ->groupBy('patient_id','device_type','udl.level')
                    ->orderBy('udl.id','DESC')->pluck(DB::raw('MAX(udl.id) AS id'))
                )
                ->get();
              
            if ($high) {
                foreach ($high as $key => $value) {                
                    $hignData[$value->userDevice->device_type][] = $value;
                }
            }

            $lowMidiumData = [];
            $low_midium = UserDeviceLog::whereIn('level',['1','2'])->take(10)
                ->with('userDevice','userDevice.user')->whereHas('userDevice')
                ->WhereIn('user_device_logs.id',DB::table('user_device_logs AS udl')
                    ->join('user_devices','user_devices.id','=','udl.user_device_id' )                   
                    ->groupBy('patient_id','device_type','udl.level')
                    ->orderBy('udl.id','DESC')->pluck(DB::raw('MAX(udl.id) AS id'))
                )
                ->get();

            if ($low_midium) {
                foreach ($low_midium as $key => $value1) {                 
                    $lowMidiumData[$value1->userDevice->device_type][] = $value1;
                }
            }
		
            $data = [
                'high' => $hignData,
                'low_midium' => $lowMidiumData
            ];

            return $this->generateResponse(true, 'CCM Readings!', $data, 200);
        } catch (\Exception $ex) {
            return $this->generateResponse(false, $ex->getMessage(), null, 200);
        }
    }
    
    public function generateResponse($status = false, $message = NULL,  $data = array(), $statusCode = 200, $error = array(), $url = '')
    {
        $response["status"] = $status;
        $response["code"] = $statusCode;
        $response["message"] = $message;
        $response["data"] = $data;

        return response()->json($response, $statusCode);
    }

    public function appointments(Request $request)
    {
        try {
            if (!$request->date) {
                throw new Exception("Invalid parameter passed");
            }
            $response = Appointment::getAppointments($request);
            return $this->generateResponse($response['status'], $response['message'], $response['data']);
        } catch (\Exception $e) {
            $status = false;
            $message = $e->getMessage();
            return $this->generateResponse($status, $message, null);
        }
    }
}
