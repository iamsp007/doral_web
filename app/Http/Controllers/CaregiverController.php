<?php

namespace App\Http\Controllers;

use App\Jobs\HHAApiCaregiver;
use App\Models\CaregiverInfo;
use App\Models\Demographic;
use App\Models\User;
use App\Services\ClinicianService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class CaregiverController extends Controller
{

    public function index($status)
    {
        return view('pages.patient_detail.new_patient', compact('status'));
    }

    public function getCaregiverDetail(Request $request)
    {
        if ($request['status'] == 'pending') {
            $status = '0';
        } else if($request['status'] == 'active') {
            $status = '1';
        } 
       
        $patientList = User::with('caregiverInfo', 'demographic','roles')
        ->whereHas('roles',function ($q){
            $q->where('name','=','patient');
        })->where('status', $status)->whereNotNull('first_name');

        return DataTables::of($patientList)
            ->addColumn('id', function($q){
                return '<label><input type="checkbox" /><span></span></label>';
            })
            ->addColumn('full_name', function($q){
                return '<a href="' . route('patient.details', ['patient_id' => $q->id]) . '" class="" data-toggle="tooltip" data-placement="left" title="View Patient" data-original-title="View Patient Chart">' . $q->full_name . '</a>';
            })
            ->addColumn('ssn', function($q) {
                $ssn = '';
                if ($q->demographic) {
                    $ssn =  $q->demographic->ssn;
                }
                return $ssn;
            })
            ->addColumn('home_phone', function($q){
                $home_phone = '';
                if ($q->demographic) {
                    $home_phone_json =  json_decode($q->demographic->address);
                    if ($home_phone_json[0]) {
                        $home_phone = $home_phone_json[0]->HomePhone;
                    }
                }
                return $home_phone;
            })
            ->addColumn('patient_type', function($q) {
                $type = '';
                if ($q->demographic) {
                    $type =  $q->demographic->type;
                }
                return $type;
            })
            ->addColumn('patient_id', function($q){
                $patient_id = '';
                if ($q->caregiverInfo) {
                    $patient_id =  $q->caregiverInfo->caregiver_id;
                }
                return $patient_id;
            })
            ->addColumn('city_state', function($q){
                $city_state = '';
                if ($q->demographic) {
                    $city_state_json =  json_decode($q->demographic->address);

                    if ($city_state_json[0] || $city_state_json[0]) {
                        $city_state = $city_state_json[0]->City . ' - ' . $city_state_json[0]->State;
                    }
                }
                return $city_state;
            })
            ->addColumn('action', function($row){
                $btn = '';
                if ($row->status === '0'){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-sm update-status" style="background: #006c76; color: #fff" data-status="1" patient-name="' . $row->full_name . '">Accept</a>';

                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm update-status" style="background: #eaeaea; color: #000" data-status="3">Reject</a>';
                }
                return $btn;
            })
            ->rawColumns(['full_name', 'action', 'id'])
            ->make(true);
    }

    public function updatePatientStatus(Request $request)
    {
        $clinicianService = new ClinicianService();
        $response = $clinicianService->updatePatientStatus($request->all());

        if ($response->status === true){
            return response()->json($response,200);
        }
        return response()->json($response,422);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchCaregivers()
    {
        $searchCaregiverIds = $this->searchCaregiverDetails();
        $caregiverArray = $searchCaregiverIds['soapBody']['SearchCaregiversResponse']['SearchCaregiversResult']['Caregivers']['CaregiverID'];
        //dump(count($caregiverArray));
        // whereIn($caregiverArray)
        $data = HHAApiCaregiver::dispatch($caregiverArray);

        return 'Update successfully';
        // dump($counter);
       
    }

   
}
