<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\LabReportType;
use App\Models\PatientLabReport;
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
            $response = $this->adminServices->demographyDataUpdate($request->all());
            if ($response->status===true){
                return response()->json($response,200);
            }
            return response()->json($response,422);
        }catch (\Exception $exception){
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