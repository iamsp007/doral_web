<?php

namespace App\Http\Controllers;

use App\Models\LabReportType;
use App\Models\PatientDetail;
use App\Models\CompanyPaymentPlanInfo;
use App\Models\PatientInsurance;
use App\Models\PatientLabReport;
use App\Models\PatientReport;
use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GetPatientDetailsController extends Controller
{
    public function index()
    {
        return view('pages.clincian.get-patient-detail');
    }

    public function getPatientDetail()
    {
        $patientList = PatientDetail::get();

        return DataTables::of($patientList)
            ->addColumn('id', function($q){
                return '<label><input type="checkbox" /><span></span></label>';
            })
            ->addColumn('full_name', function($q){
                return $q->full_name;
            })
            ->addColumn('action', function($row){
                return '<a href="' . route('patient.details', ['patient_id' => $row->id]) . '" class="btn btn-primary btn-view shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="View Patient" data-original-title="View Patient Chart"><i class="las la-binoculars"></i></a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

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

        //$patient = PatientDetail::with('coordinators', 'acceptedServices', 'patientAddress', 'alternateBilling', 'patientEmergencyContact', 'emergencyPreparednes', 'visitorDetail', 'patientClinicalDetail.patientAllergy')->find($paient_id);

        $patient = User::with('demographic', 'patientEmergency')->find($paient_id);
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

        $status = $notificationPreferences = $acceptedServices = $address = $emergencyAddress = [];

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

        return view('pages.patient_detail.index', compact('patient','payment','labReportTypes', 'labReportTypes', 'tbpatientLabReports', 'tbLabReportTypes', 'immunizationLabReports', 'immunizationLabReportTypes', 'drugLabReports', 'drugLabReportTypes', 'paient_id', 'emergencyPreparednesValue', 'status', 'acceptedServices', 'address', 'notificationPreferences', 'employeePhysicalForm', 'employeePhysicalFormTypes', 'services', 'insurances', 'emergencyAddress'));
    }

    public function getLabReportReferral(Request $request)
    {
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

    public function labReportData(Request $request)
    {
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

    public function viewLabReport(Request $request)
    {
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

    public function removeLabReport(Request $request)
    {
        $this->validate($request,[
            'id'=>'required'
        ]);
        $patientReport = PatientReport::find($request->id);
        if ($patientReport){
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

    public function labReportFileShow(Request $request)
    {
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
