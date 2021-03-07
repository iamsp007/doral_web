<?php

namespace App\Http\Controllers;

use App\Models\LabReportType;
use App\Services\AdminService;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Exception;

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

        return view('pages.employee-physical-examination-report', compact(['patient', 'labReportTypes']));
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

            $lookup = $request->all();
            unset($lookup['_token']);
            $responseArray = $this->employeeServices->storeReport($id, $lookup);

            if($responseArray->status) {
                $status = 1;
                $record = $responseArray->data->data;

                return view('pages.admin.employee-view')->with('record', $record);
            }

            $message = $responseArray->message;

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }

        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $record
        ];

        return redirect('/clinician');
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
}
