<?php

namespace App\Http\Controllers\Coordinator;

use App\Http\Controllers\Controller;
// use App\Services\AdminService;
use App\Models\PatientReferral;
use Yajra\DataTables\DataTables;

class CoordinatorController extends Controller
{
    protected $view_path = 'pages.coordinator.';

    public function __construct()
    {
    }

    public function index()
    {
        return view($this->view_path . 'dashboard');
    }

    public function patientListShow()
    {
        return view($this->view_path . 'patient');
    }
    public function newPatientListShow()
    {
        return view($this->view_path . 'new_patient_list');
    }

    /** Not used function comment code by manisha*/
    // public function getPatientList()
    // {
    //     $adminServices = new AdminService();
    //     $response = $adminServices->getAppointment();

    //     $data = array();
    //     if ($response != null && $response['status'] === true) {
    //         $data = $response['data'];
    //         return response()->json($data, 200);
    //     }

    //     return response()->json($data, 422);
    // }

    public function getNewPatientList()
    {
        $data = PatientReferral::getAccepted();
        return DataTables::of($data)->editColumn('gender', function ($contact){
                return $contact->gender_format;
            })->editColumn('ssn', function ($contact){
                return $contact->ssn_format;
            })->editColumn('dob', function ($contact){
                return $contact->dob_format;
            })->make(true);
    }
}
