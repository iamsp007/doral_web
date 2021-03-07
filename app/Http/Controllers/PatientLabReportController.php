<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientLabReportRequest;
use App\Models\LabReportType;
use App\Models\PatientLabReport;
use App\Services\ReferralService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientLabReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
    
        $rules = [
            'lab_report_type_id' => 'required',
            'lab_due_date' => 'required',
            'result' => 'required'
        ];

        $messages = [
            'lab_report_type_id.required' => 'Please select report type.',
            'lab_due_date.required' => 'Please select date.',
            'result.required' => 'Please select result.',
        ];

        $validator = Validator::make($input, $rules, $messages);
       
        if ($validator->fails()) {
            $arr = array('status' => 400, 'message' => $validator->errors()->all(), 'result' => array());
        } else {
            try {
                $patientLabReport = new PatientLabReport();
                $message = 'Patient Lab Report added successfully..!';

                $patientLabReport->lab_report_type_id = $input['lab_report_type_id'];
                $patientLabReport->patient_referral_id = $input['patient_referral_id'];
                if (isset($input['lab_perform_date'])) {
                    $patientLabReport->perform_date = date('Y-m-d', strtotime($input['lab_perform_date']));
                }
                if (isset($input['titer'])) {
                    $patientLabReport->titer = $input['titer'];
                }

                if (isset($input['lab_expiry_date']) && !empty($input['lab_expiry_date'])) {
                    $patientLabReport->expiry_date = date('Y-m-d', strtotime($input['lab_expiry_date']));
                } else {
                    $patientLabReport->expiry_date = date('Y-m-d', strtotime($input['lab_due_date']));
                }
                
                $patientLabReport->due_date = date('Y-m-d', strtotime($input['lab_due_date']));
                
                $patientLabReport->result = $input['result'];

                $patientLabReport->save();
             
                $result = PatientLabReport::where('id', $patientLabReport->id)->with('labReportType')->first();
                $patientLabReportModel = PatientLabReport::with('labReportType')->where('patient_referral_id', $input['patient_referral_id']);
                $labReportTypeModel = LabReportType::doesntHave('patientLabReport')->where('status','1');
                if (in_array($result->lab_report_type_id, ['2','3','4','5','6'])) {
                    $tbpatientLabReports = $patientLabReportModel->whereIn('lab_report_type_id', ['2','3','4','5','6'])->get();
                    $tbLabReportTypes = $labReportTypeModel->where('parent_id', 1)->orderBy('sequence', 'asc')->get();

                    $count = $tbpatientLabReports->count();
                    $newCount = $tbpatientLabReports->count() + 1;
                    $type = 'tb';
                } elseif (in_array($result->lab_report_type_id, ['8','9','10','11'])) {
                    $immunizationLabReports = $patientLabReportModel->whereIn('lab_report_type_id', ['8','9','10','11'])->get();

                    $tbLabReportTypes = $labReportTypeModel->where('parent_id', 2)->orderBy('sequence', 'asc')->get();
                    $count = $immunizationLabReports->count();
                    $newCount = $immunizationLabReports->count() + 1;
                    $type = 'emmune';
                } elseif (in_array($result->lab_report_type_id, ['13','14'])) {
                    $drugLabReports = $patientLabReportModel->whereIn('lab_report_type_id', ['13','14'])->get();
                    $tbLabReportTypes = $labReportTypeModel->where('parent_id', 3)->orderBy('sequence', 'asc')->get();
                    $count = $drugLabReports->count();
                    $newCount = $drugLabReports->count() + 1;
                    $type = 'drug';
                }
                
                $arr = array('status' => 200, 'message' => 'success', 'result' => $result, 'tbLabReportTypes' => $tbLabReportTypes, 'count' => $count, 'newCount' => $newCount, 'type' => $type);
            } catch (\Illuminate\Database\QueryException $ex) {
                $message = $ex->getMessage();
                if (isset($ex->errorInfo[2])) {
                    $message = $ex->errorInfo[2];
                }
                $arr = array("status" => 400, "message" => $message, "result" => array());
            } catch (Exception $ex) {
                $message = $ex->getMessage();
                if (isset($ex->errorInfo[2])) {
                    $message = $ex->errorInfo[2];
                }
                $arr = array("status" => 400, "message" => $message, "result" => array());
            }
        } 
        return \Response::json($arr);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $patientLabReport = PatientLabReport::find($request->id);
        if ($patientLabReport) {
            $result = PatientLabReport::where('id', $request->id)->with('labReportType')->first();
            $patientLabReportModel = PatientLabReport::with('labReportType')->where('patient_referral_id', $request->patient_referral_id);
            $labReportTypeModel = LabReportType::doesntHave('patientLabReport')->where('status','1');
            if (in_array($result->lab_report_type_id, ['2','3','4','5','6'])) {
                $tbpatientLabReports = $patientLabReportModel->whereIn('lab_report_type_id', ['2','3','4','5','6'])->get();
                $tbLabReportTypes = $labReportTypeModel->where('parent_id', 1)->orderBy('sequence', 'asc')->get();

                $count = $tbpatientLabReports->count();
                $newCount = $tbpatientLabReports->count() + 1;
            } elseif (in_array($result->lab_report_type_id, ['8','9','10','11'])) {
                $immunizationLabReports = $patientLabReportModel->whereIn('lab_report_type_id', ['8','9','10','11'])->get();
                $tbLabReportTypes = $labReportTypeModel->where('parent_id', 2)->orderBy('sequence', 'asc')->get();
                $count = $immunizationLabReports->count();
                $newCount = $immunizationLabReports->count() + 1;
               
            } elseif (in_array($result->lab_report_type_id, ['13','14'])) {
                $drugLabReports = $patientLabReportModel->whereIn('lab_report_type_id', ['13','14'])->get();
                $tbLabReportTypes = $labReportTypeModel->where('parent_id', 3)->orderBy('sequence', 'asc')->get();
                $count = $drugLabReports->count();
                $newCount = $drugLabReports->count() + 1;
            }
            
            $patientLabReport->delete();
            $arr = array('status' => 200, 'message' => 'Patient Lab Report successfully deleted..!', 'result' => array(), 'tbLabReportTypes' => $tbLabReportTypes, 'count' => $count, 'newCount' => $newCount);
        } else {
            $arr = array('status' => 400, 'message' => 'Patient Lab Report not found..!', 'result' => array());
        }
        return \Response::json($arr); 
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addNote(Request $request)
    {
        $input = $request->all();
       
        try {
            $updateRecord = PatientLabReport::where('id', $input['patient_lab_report_id'])->update(['note' => $input['note']]);
          
            $data = ['patient_lab_report_id' => $updateRecord];
            $arr = array('status' => 200, 'message' => 'Note added successfully.', 'result' => $data);
        } catch (\Illuminate\Database\QueryException $ex) {
            $message = $ex->getMessage();
            if (isset($ex->errorInfo[2])) {
                $message = $ex->errorInfo[2];
            }
            $arr = array("status" => 400, "message" => $message, "result" => array());
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            if (isset($ex->errorInfo[2])) {
                $message = $ex->errorInfo[2];
            }
            $arr = array("status" => 400, "message" => $message, "result" => array());
        }
    
        return \Response::json($arr);
    }
    
}
