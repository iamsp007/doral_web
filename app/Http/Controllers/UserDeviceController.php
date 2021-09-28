<?php

namespace App\Http\Controllers;

use App\Models\UserDeviceLog;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class UserDeviceController extends Controller
{
    public function index($serviceStatus = null,$initial = null)
    {
        return view('admin.clinician.user_device_logs', compact('serviceStatus', 'initial'));
    }

    public function getAll(Request $request)
    {
        $patientList = UserDeviceLog::with('userDevice','userDevice.user')
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
        })->orderBy('id','desc');
            
        $datatble = DataTables::of($patientList->get())
            ->addIndexColumn()
            ->addColumn('full_name', function($q) use($request) {
                $full_name = '';
                $id = '';
                if ($q->userDevice && $q->userDevice->user) {
                    $full_name = $q->userDevice->user->full_name;
                    $id = $q->userDevice->patient_id;
                }

                return '<a href="' . route('patient.details', ['patient_id' => $id]) . '" class="" data-toggle="tooltip" data-placement="left" title="View Patient" data-original-title="View Patient Chart">' . $full_name . '</a>';
            })
            ->addColumn('level', function($q) use($request) {
                return $q->view_level;
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
            ->addColumn('action', function($q) use($request) {
                $btn = '';
                if ($q->level == '3' && !is_null($q->note)) {
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" id="' . $q->id . '" data-original-title="Due Report" class="btn btn-sm viewNote" style="background: #006c76; color: #fff">View Note</a>';
                }

                return $btn;
               
            })
            ->rawColumns(['full_name', 'device_type','action','level']);
            return $datatble->make(true);
    }

    public function edit($id)
    {
        $userDeviceLog = UserDeviceLog::where('id',$id)->with('userDevice','userDevice.user')->first();

        if ($userDeviceLog->userDevice->device_type == 1) {
            $readingLevel = 1;
	$level_message= $recomdation = '';
            if (Str::contains($userDeviceLog->value, ['/'])) {
                $explodeValue = explode("/",$userDeviceLog->value);
            } else if (Str::contains($userDeviceLog->value, [':'])) {
                $explodeValue = explode(":",$userDeviceLog->value);
            }
            if($explodeValue[0] >= 140 || $explodeValue[1] >= 90) {
                $readingLevel = 3;
                $level_message = 'blood pressure is higher';
                $recomdation = '<p class="t5"><b class="f-20">&bull;</b> Take medications as prescribed by your doctor</p><p class="t5"><b class="f-20">&bull;</b> Drink an 8 oz glass of water</p><p class="t5"><b class="f-20">&bull;</b> Sit quietly for 15 minutes</p><p class="t5"><b class="f-20">&bull;</b> Recheck your blood pressure in 20 minutes</p>';
            } else if($explodeValue[0] <= 100 || $explodeValue[1] <= 60) {
                $readingLevel = 3;
                $level_message = 'blood pressure is lower';
                $recomdation = '<p class="t5"><b class="f-20">&bull;</b> Get up slowly from a sitting position</p><p class="t5"><b class="f-20">&bull;</b> Drink an 8 oz glass of water</p><p class="t5"><b class="f-20">&bull;</b> Eat some saltime crackers</p><p class="t5"><b class="f-20">&bull;</b> Recheck your blood pressure in 20 minutes</p>';
            }
        } else if ($userDeviceLog->userDevice->device_type == 2) {
            $readingLevel = 1;
            
            if($userDeviceLog->value >= 300) {
                $readingLevel = 3;
                $level_message = 'blood sugar is higher';
                $recomdation = '<p class="t5"><b class="f-20">&bull;</b> Administer insulin or oral medications as prescribed by your doctor </p><p class="t5"><b class="f-20">&bull;</b> Drink an 8 oz glass of water</p><p class="t5"><b class="f-20">&bull;</b> Recheck your blood sugar level in 30 minutes</p>';
            } else if($userDeviceLog->value <= 60) {
                $readingLevel = 3;
                $level_message = 'blood sugar is lower';
                $recomdation = '<p class="t5"><b class="f-20">&bull;</b> Drink an 4 oz fruit juice</p><p class="t5"><b class="f-20">&bull;</b> Eat a small snack(cookies, 1/2 sandwich)</p><p class="t5"><b class="f-20">&bull;</b> Do not tame any insulin or diabetic pills</p><p class="t5"><b class="f-20">&bull;</b> Recheck your blood sugar level in 20 minutes</p>';
            }
        } 

        if ($userDeviceLog->userDevice && $userDeviceLog->userDevice->user) {
            $patient_name = $userDeviceLog->userDevice->user->full_name;
        }

        $message = 'Doral Health Connect | Your patient ' . $patient_name . ' ' . $level_message . ' than regular. Need immediate attention.';

        return view('pages.caregiver',compact('userDeviceLog','patient_name', 'message', 'recomdation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input =  $request->all();
        UserDeviceLog::find($id)->update([
            'note' => $input['note']
        ]);
        
        $message = 'Patient condition update successfully!!';

        $response = ["status" => 200, "message"=> $message];

        return \Response::json($response);
    }

    public function show($id)
    {   
        if (isset($id)) {
            $userDeviceLog = UserDeviceLog::where('id',$id)->first();
            return view('admin.clinician.view_note', compact('userDeviceLog'));
        }
    }
}