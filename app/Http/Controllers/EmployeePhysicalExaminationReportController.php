<?php
namespace App\Http\Controllers;
use App\Models\EmployeePhysicalExaminationReport;
use App\Models\LabReportType;
use App\Models\User;
use App\Models\PatientReport;
use App\Services\AdminService;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Exception, PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EmployeePhysicalExaminationReportController extends Controller
{
    protected $adminServices;
    protected $employeeServices;
    /**
     * Construct method for employee physical report data
     * 
     * @param AdminService $adminServices
     * @param EmployeeService $employeeServices
     * 
     */
    public function __construct(AdminService $adminServices, EmployeeService $employeeServices)
    {
        $this->adminServices = $adminServices;
        $this->employeeServices = $employeeServices;
    }
    /**
     * Open the specified resource
     * 
     * @param $id
     * 
     * @return view
     */
    public function getEmployeePhysicalExaminationReport($id)
    {
        $loginUser = Auth::user();
        $apiResponse = $this->adminServices->getPatientDetail($id);
        $patient = $apiResponse->data;
       
        $maritalStatus = $address = [];
        if (isset($patient->caregiver_info->marital_status)) {
            $maritalStatus = json_decode($patient->caregiver_info->marital_status);
        }

        if (isset($patient->demographic->address)) {
            $address = json_decode($patient->demographic->address);
        }
      
        $labReportTypes = LabReportType::whereNotIn('parent_id', [4])->pluck('name', 'id');
        // $reportExist = EmployeePhysicalExaminationReport::where('patient_id', $id)->first();
        // if(isset($reportExist->report_details) && !empty($reportExist->report_details)) {
        //     $patient = $reportExist->report_details;
      
        //     return view('pages.autofill-employee-physical-examination-report', compact(['patient', 'labReportTypes']));
        // }else {
            return view('pages.employee-physical-examination-report', compact(['patient', 'labReportTypes','maritalStatus','loginUser', 'address']));
        // }
    }
    /**
     * Store employee physical report data
     * 
     * @param $id
     * @param Request $request
     * 
     * @return $response;
     */
    public function postEmployeePhysicalExaminationReport(Request $request, $id)
    {
        $status = 0;
        $message = "Something went wrong";
        $record = [];
        try {
            // return $this->pdfEmployeePhysicalExaminationReport(9);
            /* start enable code block and remove above 1 line of code */
                       
            $lookup = $request->all();
          
            unset($lookup['_token']);
            $report = new EmployeePhysicalExaminationReport();
            $report->patient_id = $id;
            $report->report_details = $lookup;
            if ($report->save()) {
                // $this->createCaregiverMedical($id);
                $report['patient_id'] = $id;
                return $this->pdfEmployeePhysicalExaminationReport($report);
                // return redirect()->route('patient.details', $id);
            }
            
            /* end enable code block*/
            /* start API code block for future purpose */
            // $responseArray = $this->employeeServices->storeReport($id, $lookup);
            // if($responseArray->status) {
            //     $status = 1;
            //     $record = $responseArray->data->data;
            //     return view('pages.admin.employee-view')->with('record', $record);
            // }
            // $message = $responseArray->message;
            /* end API code block for future purpose */
        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $record
        ];
        return redirect()->back();
    }
    /**
     * Fetch employee physical report data
     * 
     * @param $id
     * 
     * @return $response;
     */
    public function report($id)
    {
        $status = 0;
        $message = "Something went wrong";
        $record = [];
        try {
            $responseArray = $this->employeeServices->getReport($id);
            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data']['data'];
                return view('pages.admin.employee-view')->with('record',$record);
            }
            $message = $responseArray['message'];
        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $record
        ];
        return redirect('/admin/employee');
    }
    /**
     * Remove employee physical report data
     * 
     * @param $id
     * 
     * @return $response;
     */
    public function removeEmployee($id)
    {
        $status = 0;
        $message = "Something went wrong";
        $record = [];
        try {
            $responseArray = $this->employeeServices->removeReport($id);
            if($responseArray['status']) {
                $status = 1;
                $record = $responseArray['data']['data'];
                return view('pages.admin.employee-view')->with('record',$record);
            }
            $message = $responseArray['message'];
        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $record
        ];
        return redirect('/admin/employee');
    }
    /**
     * PDF feature for employee physical report
     * 
     * @param $report
     */
    public function pdfEmployeePhysicalExaminationReport($report)
    {
        try {
            // $report = EmployeePhysicalExaminationReport::find($report);
            // $data = $report['report_details'];
            // $pdf = PDF::loadView('pages.pdf.employee-physical-examination-report', ['report' => $data]);
            // return $pdf->stream('employee-physical-examination-report-'.$report->id.'.pdf');
            /* start enable code block and remove above 3 line of code*/
            $pdf = PDF::loadView('pages.pdf.employee-physical-examination-report', [
                'report' => $report->report_details,
            ]);
            $pdf->setPaper('a4', 'portrait');
            $path = public_path('patient_report/');
            $fileName =  'employee-physical-examination-report-'.$report->id.'.pdf';
            $pdf->save($path . '/' . $fileName);
        
            $patientReport = new PatientReport();
            $patientReport->file_name = 'employee-physical-examination-report-'.$report->id.'.pdf';
            $patientReport->original_file_name = 'employee-physical-examination-report-'.$report->id.'.pdf';
            $patientReport->user_id = $report->patient_id;
            $patientReport->lab_report_type_id = '15';
            $patientReport->save();

            User::where('id', $report->patient_id)->update(['status' => 5]);

            return $pdf->stream('employee-physical-examination-report-'.$report->id.'.pdf')->header('Content-Type','application/pdf');
            /* end enable code block*/
        } catch(Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
