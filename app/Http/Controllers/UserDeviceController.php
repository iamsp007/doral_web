<?php

namespace App\Http\Controllers;

use App\Models\UserDeviceLog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserDeviceController extends Controller
{
    public function index($serviceStatus = null,$initial = null)
    {
        return view('admin.clinician.user_device_logs', compact('serviceStatus', 'initial'));
    }

    public function getAll(Request $request)
    {
        $patientList = UserDeviceLog::with('userDevice','userDevice.user')
        ->whereIn('level',['1','2'])
        ->when($request['user_name'], function ($query) use($request){
            $query->whereHas('userDevice.user',function ($query) use($request) {
                $query->where('id', $request['user_name']);
            });
        })
        ->when($request['level'], function ($query) use($request){
            $query->where('level', $request['level']);
        })
        ->when($request['device_type'], function ($query) use($request){
            $query->whereHas('userDevice',function ($query) use($request) {
                $query->where('device_type', $request['device_type']);
            });
        });
            
        $datatble = DataTables::of($patientList->get())
            ->addIndexColumn()
            ->addColumn('full_name', function($q) use($request) {
                $full_name = '';
                if ($q->userDevice && $q->userDevice->user) {
                    $full_name = $q->userDevice->user->full_name;
                }

                return '<a href="' . route('patient.details', ['patient_id' => $q->id]) . '" class="" data-toggle="tooltip" data-placement="left" title="View Patient" data-original-title="View Patient Chart">' . $full_name . '</a>';
            })
            ->addColumn('level', function($q) use($request) {
                return 'Level ' . $q->level;
            })
            ->addColumn('device_type', function($q) use($request) {
                $device_type = '';
                if ($q->userDevice) {
                    $device_type = $q->userDevice->view_device_type;
                }

                return $device_type;
            })
            ->addColumn('reading_time', function($q) use($request) {
                return date('m-d-Y', strtotime($q->reading_time));
            })
            ->rawColumns(['full_name', 'device_type']);
            return $datatble->make(true);
    }
}
