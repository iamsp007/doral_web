<?php

namespace App\Http\Controllers;

use App\Models\EmployeePhysicalExaminationReport;
use App\Models\LabReportType;
use App\Services\AdminService;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Exception, PDF, Storage;

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
        $apiResponse = $this->adminServices->getPatientDetail($id);

        $patient = $apiResponse->data;

        $labReportTypes = LabReportType::pluck('name', 'id');

        // $reportExist = EmployeePhysicalExaminationReport::where('patient_id', $id)->first();

        // if(isset($reportExist->report_details) && !empty($reportExist->report_details)) {
        //     $patient = $reportExist->report_details;
        //     dd($patient);
        //     return view('pages.autofill-employee-physical-examination-report', compact(['patient', 'labReportTypes']));
        // }else {
            return view('pages.employee-physical-examination-report', compact(['patient', 'labReportTypes']));
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
            return $this->pdfEmployeePhysicalExaminationReport(9);
            
            /* start enable code block and remove above 1 line of code */

            // $lookup = $request->all();
            // unset($lookup['_token']);

            // $report = new EmployeePhysicalExaminationReport();
            // $report->patient_id = $id;
            // $report->report_details = $lookup;

            // if ($report->save()) {
            //     $this->pdfEmployeePhysicalExaminationReport($report->report_details);
            //     return redirect()->route('patient.details', $id);
            // }

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
        $report = EmployeePhysicalExaminationReport::find($report);

        $pdf = PDF::loadView('pages.pdf.employee-physical-examination-report', [
            'report' => $report->report_details
        ]);

        return $pdf->stream('employee-physical-examination-report-'.$report->id.'.pdf');

        /* start enable code block and remove above 3 line of code*/

        // $pdf = PDF::loadView('pages.pdf.employee-physical-examination-report', $report);

        // Storage::put('public/pdf/employee-physical-examination-report-'.$report->id.'.pdf', $pdf->output());

        // return $pdf->download('employee-physical-examination-report-'.$report->id.'.pdf');

        /* end enable code block*/
    }
}
