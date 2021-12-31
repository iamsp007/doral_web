<?php

namespace App\Http\Controllers;

use App\Models\Icd;
use App\Models\IcdCode;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class IcdController extends Controller
{

    public function getall(Request $request)
    {
        $patientList = Icd::where('patient_id',$request['patient_id'])->with('icdCode','patient')
        ->when($request['icdCode'], function ($query) use($request){
            $query->whereHas('icdCode',function ($query) use($request) {
                $query->where('id', $request['icdCode']);
            });
        })
       ->orderBy('id','desc');
    
        $datatble = DataTables::of($patientList->get())
            ->addIndexColumn()
        
            ->addColumn('icdCode', function($q) use($request) {
                $icdCode = '';
                if ($q->icdCode) {
                    $icdCode = $q->icdCode->ICD10Code;
                }
                return $icdCode;
            })
            ->addColumn('description', function($q) use($request) {
                $icdCode = '';
                if ($q->icdCode) {
                    $icdCode = $q->icdCode->codeDescription;
                }
                return $icdCode;
            })
            ->addColumn('date', function($q) use($request) {
                return viewDateFormat($q->date);
            })
            ->addColumn('historical_date', function($q) use($request) {
                return viewDateFormat($q->historical_date);
            })
            ->addColumn('action', function($q) use($request) {
                $btn = '<label><input class="careteam_check" type="checkbox" name="active" data-id="' . $q->id . '" data-action="icd-checked" data-field="active" data-url="' . route('icd.store') . '" data-patientId="' . $q->patient_id . '"';
                    if ($q->primary === '1') {
                        $btn.= 'checked';
                    }
                $btn.= '><span style="font-size:12px; padding-left: 25px;"></span></label>';
               
                return $btn;               
            })
            ->rawColumns(['action']);
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
                    $icd->date_type = $input['date_type'];
                    $icd->historical_date = $input['historical_date'];
                    $icd->identified_during = $input['identified_during'];
                    $icd->primary = $input['primary'];
                    $icd->fill($input)->save();

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
            'primary' => '0'
        ]);

        Icd::where('id', $input['care_team_id'])->update([
            'primary' => '1'
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
        $icd = Icd::find($id)->update(['primary' => '1']);
        
        if(isset($icd)) {
            return view('admin.designation.create_update',compact('designation'));
        } 
    }

    public function viewCdoc($id)
    {   
        $icdCodes = IcdCode::get();
        return view('pages.patient_detail.cdoc_popup', compact('id', 'icdCodes'));
    }

    public function getDescription($id)
    {
        $icdCodes = IcdCode::where('id',$id)->first();
        $icdCodes = $icdCodes->codeDescription;
        $arr = array("status" => 200, "msg" => "Success", "result" => $icdCodes);
       
        return \Response::json($arr);
    }
}
