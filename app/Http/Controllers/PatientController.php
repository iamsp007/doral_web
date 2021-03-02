<?php

namespace App\Http\Controllers;

use App\Services\AdminService;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\LabReportType;
use App\Models\PatientLabReport;

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

                $tbpatientLabReports = PatientLabReport::with('labReportType')->where('patient_referral_id', $paient_id)->whereIn('lab_report_type_id', ['2','3','4','5','6'])->get();
                $tbLabReportTypes = LabReportType::where('status','1')->where('parent_id', 1)->doesntHave('patientLabReport')->orderBy('sequence', 'asc')->get();

                $immunizationLabReports = PatientLabReport::with('labReportType')->where('patient_referral_id', $paient_id)->whereIn('lab_report_type_id', ['8','9','10','11'])->get();
                $immunizationLabReportTypes = LabReportType::where('status','1')->where('parent_id', 2)->doesntHave('patientLabReport')->orderBy('sequence', 'asc')->get();

                $drugLabReports = PatientLabReport::with('labReportType')->where('patient_referral_id', $paient_id)->whereIn('lab_report_type_id', ['13','14'])->get();
                $drugLabReportTypes = LabReportType::where('status','1')->where('parent_id', 3)->doesntHave('patientLabReport')->orderBy('sequence', 'asc')->get();

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
            $response = $this->adminServices->ccmReadingLevelHigh();
            if ($response->status===true){
                return response()->json($response,200);
            }
            return response()->json($response,422);
        }catch (\Exception $exception){
            return response()->json(['status'=>false,'message'=>$exception->getMessage(),'data'=>null],422);
        }
    }

    public function appointments(Request $request)
    {
        try {
            $payload = $request->all();
            $response = $this->adminServices->appointments($payload);
            if ($response->status===true){
                return response()->json($response,200);
            }
            return response()->json($response,422);
        }catch (\Exception $exception){
            return response()->json(['status'=>false,'message'=>$exception->getMessage(),'data'=>null],422);
        }
    }

    public function getEmployeePhysicalExaminationReport($id)
    {
        $apiResponse = $this->adminServices->getPatientDetail($id);

        $patient = $apiResponse->data;

        return view('pages.employee-physical-examination-report', compact('patient'));
    }

    public function postEmployeePhysicalExaminationReport(Request $request, $id)
    {
        dd($request->all());
        return view('pages.employee-physical-examination-report');
    }
}
