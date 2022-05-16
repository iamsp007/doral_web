<?php

namespace App\Http\Controllers;

use App\Models\Caregivers;
use App\Models\CareTeam;
use App\Models\CaseManagement;
use App\Models\LabReportType;
use App\Models\CompanyPaymentPlanInfo;
use App\Models\PatientInsurance;
use App\Models\PatientLabReport;
use App\Models\PatientReport;
use App\Models\Services;
use App\Models\User;
use App\Models\UserDevice;
use App\Models\UserDeviceLog;
use App\Models\UserLatestDeviceLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class GetPatientDetailsController extends Controller
{
    public function show($paient_id)
    {
        $labReportTypes = LabReportType::where('status','1')->whereNull('parent_id')->orderBy('sequence', 'asc')->get();

        $tbpatientLabReports = PatientLabReport::with('labReportType')->where('user_id', $paient_id)->whereIn('lab_report_type_id', ['1','2','3','4','5','6'])->get();
        $tbLabReportTypes = LabReportType::doesnthave('patientLabReport','or' ,function($query) use($paient_id) {
            $query->where('user_id', $paient_id)->whereDate('expiry_date', '>=', date('Y-m-d', strtotime(now())));
           })->where('status','1')->where('parent_id', 1)->orderBy('sequence', 'asc')->get();
        
        $immunizationLabReports = PatientLabReport::with('labReportType')->where('user_id', $paient_id)->whereIn('lab_report_type_id', ['7','8','9','10','11'])->get();
        $immunizationLabReportTypes = LabReportType::doesnthave('patientLabReport','or' ,function($query) use($paient_id) {
            $query->where('user_id', $paient_id)->whereDate('expiry_date', '>=', date('Y-m-d', strtotime(now())));
           })->where('status','1')->where('parent_id', 2)->orderBy('sequence', 'asc')->get();

        $drugLabReports = PatientLabReport::with('labReportType')->where('user_id', $paient_id)->whereIn('lab_report_type_id', ['12','13','14'])->get();
        $drugLabReportTypes = LabReportType::doesnthave('patientLabReport','or' ,function($query) use($paient_id) {
            $query->where('user_id', $paient_id)->whereDate('expiry_date', '>=', date('Y-m-d', strtotime(now())));
           })->where('status','1')->where('parent_id', 3)->orderBy('sequence', 'asc')->get();

        $employeePhysicalForm = PatientLabReport::with('labReportType')->where('user_id', $paient_id)->whereIn('lab_report_type_id', ['15','16','17','18','19'])->get();
        $employeePhysicalFormTypes = LabReportType::doesnthave('patientLabReport','or' ,function($query) use($paient_id) {
            $query->where('user_id', $paient_id)->whereDate('expiry_date', '>=', date('Y-m-d', strtotime(now())));
           })->where('status','1')->where('parent_id', 4)->orderBy('sequence', 'asc')->get();

        $services = Services::select('id','name')->where('display_type',1)->get();

        $insurances = PatientInsurance::where('user_id', $paient_id)->get();

        $patient = User::with('demographic', 'patientEmergency','userDevices')->find($paient_id);
        $caseManagements = CaseManagement::with('clinician')->where('patient_id', $paient_id)->get();
        
        $family_detail = CareTeam::where([['patient_id', '=',$paient_id],['type', '=','1']])->get();
        $physician_detail = CareTeam::where([['patient_id', '=',$paient_id],['type', '=','2']])->get();
        $pharmacy_detail = CareTeam::where([['patient_id', '=',$paient_id],['type', '=','3']])->get();
        $caregiver = Caregivers::where('patient_id', $paient_id)->orderBy('id','DESC')->first();
        $payment = array();
        if(isset($patient->demographic->service_id) and isset($patient->demographic->company_id)){
            $payment = CompanyPaymentPlanInfo::where('service_id',$patient->demographic->service_id)->where('company_id',$patient->demographic->company_id)->get();
            if($payment) {
                $payment = json_decode($payment);
            }
        }
        $emergencyPreparednesValue = '';
        if (isset($patient->emergencyPreparednes) && !empty($patient->emergencyPreparednes)) {
            $emergencyPreparednesValue = json_decode($patient->emergencyPreparednes->value, true);
        }

        $ethnicity = $mobile = $maritalStatus = $status = $referralSource = $notificationPreferences = $caregiverOffices = $inactiveReasonDetail = $team = $location = $branch = $acceptedServices = $address = $language = $emergencyAddress = [];

        if (isset($patient->demographic)) {
            if (isset($patient->demographic->notification_preferences)) {
                $notificationPreferences = $patient->demographic->notification_preferences;
            }
       
            if (isset($patient->demographic->accepted_services)) {
                $acceptedServices = $patient->demographic->accepted_services;
            }

            if (isset($patient->demographic->address)) {
                $address = $patient->demographic->address;
            }

            if (isset($patient->patientEmergency)) {
                $emergencyAddress = $patient->patientEmergency;
            }
        }

        $today =  date('Y-m-d');
      
        $device_logs = UserLatestDeviceLog::with('userDevice','userDevice.user');
        $high = $device_logs->where('patient_id',$paient_id)->orderBy('id','desc')->groupBy('user_device_id')->get()->toArray();
        
        // $userDeviceLogs = UserDeviceLog::with('userDevice')->whereHas('userDevice',function ($q) use($paient_id) {
        //     $q->where('patient_id', $paient_id);
        // })
        // ->select('*', DB::raw('MAX(id) as id, DATE(created_at) as date'))
        // ->groupBy('user_device_id','date')
        // ->get()->toArray();


        $userDeviceLogs = UserDeviceLog::with('userDevice')->whereHas('userDevice',function ($q) use($paient_id) {
            $q->where('patient_id', $paient_id);
        })    
    ->latest()
    ->get()
    ->unique('created_at','user_device_id')->toArray();
        
        dd($userDeviceLogs); 

        $results = UserDeviceLog::get();
        foreach ($results as $key => $result) {
            $date = date('d-m-Y', strtotime($result->reading_time));

            $result->update(['reading_time' => $date]);
        }
       
        dd($results->pluck('user_id'));

        return view('pages.patient_detail.index', compact('patient','payment','labReportTypes', 'labReportTypes', 'tbpatientLabReports', 'tbLabReportTypes', 'immunizationLabReports', 'immunizationLabReportTypes', 'drugLabReports', 'drugLabReportTypes', 'paient_id', 'emergencyPreparednesValue', 'ethnicity', 'mobile', 'maritalStatus', 'status', 'referralSource', 'caregiverOffices', 'inactiveReasonDetail', 'team', 'location', 'branch', 'acceptedServices', 'address', 'language', 'notificationPreferences', 'employeePhysicalForm', 'employeePhysicalFormTypes', 'services', 'insurances', 'emergencyAddress','userDeviceLogs','today', 'caseManagements','family_detail','physician_detail','pharmacy_detail','caregiver'));
    }

    public function getLabReportReferral(Request $request){

        $labReportTypes = LabReportType::where('status','=','1')
            ->where('parent_id','=',$request->id)
            ->get();
        return response()->json([
            'status'=>false,
            'message'=>'Lab referral get successfully!',
            'data'=>$labReportTypes
        ],200);
    }

    public function labReportUpload(Request $request)
    {
        $this->validate($request, [
            'lab_report_id' => 'required',
            'patient_id' => 'required',
            'files' => 'required'
        ]);
        if ($request->hasfile('files')) {
            try {
                $file = $request->file('files');
                $name = time() .'.'.$file->getClientOriginalExtension();
                $filePath = 'patient_report';
                $file->move($filePath,$name);
                $patientReport = new PatientReport();
                $patientReport->file_name = $name;
                $patientReport->original_file_name = $name;
                $patientReport->user_id = $request->patient_id;
                $patientReport->lab_report_type_id = $request->lab_report_id;
                if ($patientReport->save()){
                    return response()->json([
                        'status'=>true,
                        'message'=>'File upload Successfully '.$file->getClientOriginalName()
                    ],200);
                }
            }catch (\Exception $exception){
                return response()->json([
                    'status'=>false,
                    'message'=>$exception->getMessage(),
                    'data'=>null
                ],422);
            }
        }
        return response()->json([
            'status'=>false,
            'message'=>'Something Went Wrong!'
        ],200);
    }

    public function labReportData(Request $request){
        $this->validate($request,[
            'patient_id'=>'required|exists:users,id'
        ]);
        $patientReport = PatientReport::with('labReports')
            ->where('user_id','=',$request->patient_id);
        return DataTables::of($patientReport)
            ->addColumn('report_type', function($report) {
                return $report->labReports->name;
            })
            ->make(true);

    }

    public function viewLabReport(Request $request){
        $this->validate($request,[
            'patient_id'=>'required|exists:users,id',
            'id'=>'required'
        ]);

        $labTypeIds = LabReportType::where('parent_id','=',$request->id)->pluck('id');

        $patientReport = PatientReport::where('user_id','=',$request->patient_id)
            ->whereIn('lab_report_type_id',$labTypeIds)
            ->get();
        if (count($patientReport)>0){
            return response()->json([
                'status'=>true,
                'message'=>'Patient lab report file get successfully!',
                'data'=>$patientReport
            ],200);
        }
        return response()->json([
            'status'=>false,
            'message'=>'Report Not Found!',
            'data'=>$patientReport
        ],422);
    }

    public function removeLabReport(Request $request){
        $this->validate($request,[
            'id'=>'required'
        ]);
        $patientReport = PatientReport::find($request->id);
        if ($patientReport){
            //            $filePath = 'patient_report/' . $patientReport->original_file_name;
            //            if (Storage::disk('s3')->exists($filePath)){
            //                Storage::disk('s3')->delete($filePath);
            //            }
            $patientReport->delete();
            return response()->json([
                'status'=>true,
                'message'=>'Patient lab Deleted',
                'data'=>$patientReport
            ],200);
        }
        return response()->json([
            'status'=>false,
            'message'=>'Report Not Found!',
            'data'=>$patientReport
        ],422);
    }

    public function labReportFileShow(Request $request){
        $this->validate($request,[
            'id'=>'required'
        ]);
        $patientReport = PatientReport::find($request->id);
        if ($patientReport){
            return response()->json([
                'status'=>true,
                'message'=>'Patient lab Deleted',
                'data'=>$patientReport
            ],200);
        }
        return response()->json([
            'status'=>false,
            'message'=>'Report Not Exists!',
            'data'=>$patientReport
        ],422);
    }
}
