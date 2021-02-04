<?php

namespace App\Http\Controllers;

use App\Services\AdminService;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
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
                $patientLabReports = PatientLabReport::with('labReportType')->where('patient_referral_id', $paient_id);
                $ppdquantiferon = $patientLabReports->where('lab_report_type_id', 1)->first();
             
                $details = $response->data;
                $labReportTypes = LabReportType::all();
                return view('pages.patient-detail',compact('details', 'labReportTypes', 'ppdquantiferon'));
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
}
