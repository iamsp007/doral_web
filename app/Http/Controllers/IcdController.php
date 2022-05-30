<?php

namespace App\Http\Controllers;

use App\Models\Icd;
use App\Models\IcdCode;
use App\Models\PatientRequest;
use App\Models\UserDevice;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class IcdController extends Controller
{

    public function getAll(Request $request)
    {
        $patientList = Icd::where('patient_id',$request['patient_id'])->with('icdCode','patient','diagnosis')
        ->when($request['icdCode'], function ($query) use($request){
            $query->whereHas('icdCode',function ($query) use($request) {
                $query->where('id', $request['icdCode']);
            });
        })
       ->orderBy('id','desc');
    
        $datatble = DataTables::of($patientList->get())
            ->addIndexColumn()
        
            ->addColumn('icdCode', function($q) {
                $icdCode = '';
                if ($q->icdCode) {
                    $icdCode = $q->icdCode->ICD10Code;
                }
                return $icdCode;
            })
            ->addColumn('description', function($q) {
                $icdCode = '';
                if ($q->icdCode) {
                    $icdCode = $q->icdCode->codeDescription;
                }
                return $icdCode;
            })
            ->addColumn('date', function($q) {
                return viewDateFormat($q->date);
            })
            ->addColumn('historical_date', function($q) {
                return viewDateFormat($q->historical_date);
            })
            ->addColumn('device_id', function($q) {
                $device = [];
                foreach ($q->diagnosis as $key => $value) {
                    $device[] = $value->user_id;
                } 
                return implode(" ",$device);
            })
            ->addColumn('device', function($q) {
                $device = [];
                foreach ($q->diagnosis as $key => $value) {
                    $device[] = $value->view_device_type;
                } 
                return implode(" ",$device);
            })
            ->addColumn('primary', function($q) {
                $btn = '<label><input class="careteam_check" type="checkbox" name="active" data-id="' . $q->id . '" data-action="icd-checked" data-field="active" data-url="' . route('icd.store') . '" data-patientId="' . $q->patient_id . '"';
                if ($q->primary === 'on') {
                    $btn.= 'checked';
                }
                $btn.= '><span style="font-size:12px; padding-left: 25px;"></span></label> ';

                return $btn;
            })
            ->addColumn('action', function($q) {
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $q->patient_id . '" id="' . $q->id . '" data-original-title="CDOC Detail" class="btn btn-danger text-capitalize btn--sm cdoc_model" style="background: #006c76; color: #fff">Add Device</a></div>';
                return $btn;               
            })
            ->rawColumns(['action', 'primary', 'device']);
            return $datatble->make(true);
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
      
        $rules = $messages = [];
        if ($input['section'] === 'icd-add') {
            $rules = [
                'icd_code' => 'required',
            ];

            $messages = [
                'icd_code.required' => 'Please select icd.',
            ];
        }
          
        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            $arr = array('status' => 400, 'message' => $validator->getMessageBag()->toArray(), 'resultdata' => array());
        } else {
            try {
                if ($input['section'] === 'icd-checked') {
                    $icd = self::updateData($input);

                    $arr = array("status" => 200, "message" => 'Patient Diagnosis Info added successfully', "resultdata" => $icd);
                } else {

                    $icd = new Icd();     
                    $icd->patient_id = $input['patient_id'];
                    $icd->icd_code_id = $input['icd_code'];
                    $icd->date = $input['date'];
                    $icd->date_type = isset($input['date_type']) ? $input['date_type'] : '';
                    $icd->historical_date = $input['historical_date'];
                    $icd->identified_during =  isset($input['identified_during']) ? $input['identified_during'] : '';
                    $icd->primary = $input['primary'];
                    $icd->fill($input)->save();
                    
		     $input['care_team_id'] = $icd->id;
                    self::updateData($input);
			
                    $arr = array("status" => 200, "message" => 'Patient Diagnosis Info added successfully', "resultdata" => $icd);
                }
            } catch (\Illuminate\Database\QueryException $ex) {
                $message = $ex->getMessage();
                if (isset($ex->errorInfo[2])) {
                    $message = $ex->errorInfo[2];
                }
                
                $arr = array("status" => 400, "message" => $message, "resultdata" => array());
            } catch (Exception $ex) {
                $message = $ex->getMessage();
                if (isset($ex->errorInfo[2])) {
                    $message = $ex->errorInfo[2];
                }
                $arr = array("status" => 400, "message" => $message, "resultdata" => array());
            }
        }
        return \Response::json($arr);
    }

    public static function updateData($input)
    {
        $icd = Icd::where('patient_id',$input['patient_id'])->update([
            'primary' => ''
        ]);

        Icd::where('id', $input['care_team_id'])->update([
            'primary' => 'on'
        ]);
        
        return $icd;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $icd = Icd::find($id)->update(['primary' => 'on']);
        
        if(isset($icd)) {
            return view('admin.designation.create_update',compact('designation'));
        } 
    }

    public function viewIcd($id)
    {   
        $icdCodes = IcdCode::get();
        return view('pages.patient_detail.icd_popup', compact('id', 'icdCodes'));
    }
    
    public function viewCdoc(Request $request)
    {   
        $input = $request->all();
        $userDevice = UserDevice::where([['diagnosis_id', '=', $input['diagnosis_id']],['patient_id', '=', $input['patient_id']]])->first();

        return view('pages.patient_detail.cdoc_popup', compact('input','userDevice'));
    }

    public function addCdoc(Request $request)
    {   
        $input = $request->all();
       
        $rules = [
            'device_type' => 'required',
        ];

        $messages = [
            'device_type.required' => 'Please select device type.',
        ];
          
        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            $arr = array('status' => 400, 'message' => $validator->getMessageBag()->toArray(), 'resultdata' => array());
        } else {
            try {

                $userDevice = UserDevice::updateOrCreate([
                    'user_id' => $input['user_id'],
                    'device_type' => $input['device_type'],
                    'patient_id' =>  $input['patient_id'],
                    'diagnosis_id' =>  $input['diagnosis_id']
                ]);
              
                $arr = array("status" => 200, "message" => 'Device added successfully', "resultdata" => $userDevice);
               
            } catch (\Illuminate\Database\QueryException $ex) {
                $message = $ex->getMessage();
                if (isset($ex->errorInfo[2])) {
                    $message = $ex->errorInfo[2];
                }
                
                $arr = array("status" => 400, "message" => $message, "resultdata" => array());
            } catch (Exception $ex) {
                $message = $ex->getMessage();
                if (isset($ex->errorInfo[2])) {
                    $message = $ex->errorInfo[2];
                }
                $arr = array("status" => 400, "message" => $message, "resultdata" => array());
            }
        }
        return \Response::json($arr);
    }    

    public function getDescription($id)
    {
        $icdCodes = IcdCode::where('id',$id)->first();
        $icdCodes = $icdCodes->codeDescription;
        $arr = array("status" => 200, "msg" => "Success", "result" => $icdCodes);
       
        return \Response::json($arr);
    }
}
