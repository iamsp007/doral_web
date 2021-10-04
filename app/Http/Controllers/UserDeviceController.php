<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDeviceLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;

class UserDeviceController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->all();
        $full_name = '';
        if ($input) {
            $user = User::where('id',$input['patient_id'])->select('id','first_name', 'last_name')->first();
            $full_name = $user->first_name . ' ' . $user->last_name;
        }

        return view('admin.clinician.user_device_logs', compact('input','full_name'));
    }

    public function getAll(Request $request)
    {
        $patientList = UserDeviceLog::with('userDevice','userDevice.user')
        ->when($request['user_name'], function ($query) use($request){
            $query->whereHas('userDevice.user',function ($query) use($request) {
                $query->where('id', $request['user_name']);
            });
        })
        ->when($request['patient_id'], function ($query) use($request){
            $query->whereHas('userDevice',function ($query) use($request) {
                $query->where('patient_id', $request['patient_id']);
            });
        })
        ->when($request['level'], function ($query) use($request){
            $query->where('level', $request['level']);
        })
        ->when($request['reading_time'], function ($query) use($request){
            $date = date('Y-m-d', strtotime($request['reading_time']));
           
            $query->whereDate('reading_time',$date);
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
                return $q->view_reading_date_time;
            })
            ->addColumn('created_at', function($q) use($request) {
                return $q->view_date;
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
                $recomdation = '<p class="t5"><b class="f-20">&bull;</b><div class="checkbox"><label><input class="noteappend" type="checkbox" name="note[]" value="Take medications as prescribed by your doctor&bull;" /><span></span></label></div> Take medications as prescribed by your doctor</p><p class="t5"><b class="f-20">&bull;</b><div class="checkbox"><label><input class="noteappend" type="checkbox" name="note[]" value="Drink an 8 oz glass of water&bull;" /><span></span></label></div> Drink an 8 oz glass of water</p><p class="t5"><b class="f-20">&bull;</b><div class="checkbox"><label><input class="noteappend" type="checkbox" name="note[]" value=" Sit quietly for 15 minutes&bull;" /><span></span></label></div> Sit quietly for 15 minutes</p><p class="t5"><b class="f-20">&bull;</b><div class="checkbox"><label><input class="noteappend" type="checkbox" name="note[]" value="Recheck your blood pressure in 20 minutes&bull;" /><span></span></label></div> Recheck your blood pressure in 20 minutes</p>';
            } else if($explodeValue[0] <= 100 || $explodeValue[1] <= 60) {
                $readingLevel = 3;
                $level_message = 'blood pressure is lower';
                $recomdation = '<p class="t5"><b class="f-20">&bull;</b><div class="checkbox"><label><input class="noteappend" type="checkbox" name="note[]" value="Get up slowly from a sitting position&bull;" /><span></span></label></div> Get up slowly from a sitting position</p><p class="t5"><b class="f-20">&bull;</b> <div class="checkbox"><label><input class="noteappend" type="checkbox" name="note[]" value="Drink an 8 oz glass of water&bull;" /><span></span></label></div> Drink an 8 oz glass of water</p><p class="t5"><b class="f-20">&bull;</b> <div class="checkbox"><label><input class="noteappend" type="checkbox" name="note[]" value="Eat some saltime crackers&bull;" /><span></span></label></div> Eat some saltime crackers</p><p class="t5"><b class="f-20">&bull;</b> <div class="checkbox"><label><input class="noteappend" type="checkbox" name="note[]" value="Recheck your blood pressure in 20 minutes&bull;" /><span></span></label></div> Recheck your blood pressure in 20 minutes</p>';
            }
        } else if ($userDeviceLog->userDevice->device_type == 2) {
            $readingLevel = 1;
            $level_message= $recomdation = '';
            if($userDeviceLog->value >= 300) {
                $readingLevel = 3;
                $level_message = 'blood sugar is higher';
                $recomdation = '<p class="t5"><b class="f-20">&bull;</b><div class="checkbox"><label><input class="noteappend" type="checkbox" name="note[]" value="Administer insulin or oral medications as prescribed by your doctor&bull;" /><span></span></label></div> Administer insulin or oral medications as prescribed by your doctor </p><p class="t5"><b class="f-20">&bull;</b><div class="checkbox"><label><input class="noteappend" type="checkbox" name="note[]" value="Drink an 8 oz glass of water&bull;" /><span></span></label></div> Drink an 8 oz glass of water</p><p class="t5"><b class="f-20">&bull;</b><div class="checkbox"><label><input class="noteappend" type="checkbox" name="note[]" value="Recheck your blood sugar level in 30 minutes&bull;" /><span></span></label></div> Recheck your blood sugar level in 30 minutes</p>';
            } else if($userDeviceLog->value <= 60) {
                $readingLevel = 3;
                $level_message = 'blood sugar is lower';
                $recomdation = '<p class="t5"><b class="f-20">&bull;</b> Drink an 4 oz fruit juice</p><p class="t5"><b class="f-20">&bull;</b><div class="checkbox"><label><input class="noteappend" type="checkbox" name="note[]" value="Eat a small snack(cookies, 1/2 sandwich)&bull;" /><span></span></label></div> Eat a small snack(cookies, 1/2 sandwich)</p><p class="t5"><b class="f-20">&bull;</b> <div class="checkbox"><label><input class="noteappend" type="checkbox" name="note[]" value="Do not tame any insulin or diabetic pills&bull;" /><span></span></label></div>Do not tame any insulin or diabetic pills</p><p class="t5"><b class="f-20">&bull;</b> <div class="checkbox"><label><input class="noteappend" type="checkbox" name="note[]" value="Recheck your blood sugar level in 20 minutes&bull;" /><span></span></label></div>Recheck your blood sugar level in 20 minutes</p>';
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
        $input['note'] = implode(".",$input['note']);

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