<?php

namespace App\Http\Controllers\ApiRequest;

use App\Http\Controllers\Controller;
use App\Models\Software;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $softwares = Software::getSoftware();
        return view('pages.admin.api_request.software.index',compact('softwares'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        $software = Software::
            when($request['status'], function ($query) use($request) {
                $query->where('status', $request['status']);
            })
            ->when($request['software_id'], function ($query) use($request) {
                $query->where('id', $request['software_id']);
            });

        return DataTables::of($software->get())
            ->addIndexColumn()
            ->addColumn('status', function($row) use($request){
                return $row->status_view;
            })
            ->addColumn('action', function($row) use($request){
                return  '<a href="software/'.$row->id.'/edit" class="btn btn-add shadow-sm btn--sm mr-2"
                data-toggle="tooltip" data-placement="left" title="Edit Software"><i
                    class="las la-user-edit"></i></a>'. '   ' .'<a href="javascript:void(0)" class="delsing" id="'.$row->id.'"  title="Delete"><i class="las la-trash la-2x pl-4"></i></a>';
            })
            ->rawColumns(['action'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.api_request.software.create_update');
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
            'name' => 'required'
        ];

        $messages = [
            'name.required' => 'Please enter name.'
        ];

        $validator = Validator::make($input, $rules, $messages);
       
        if ($validator->fails()) {
            $arr = array('status' => 400, 'message' => $validator->errors()->all(), 'result' => array());
        } else {
            try {
                if (isset($input['id_for_update']) && !empty($input['id_for_update'])) {
                    $software = Software::find($input['id_for_update']);
                    $message = "Software updated successfully.";
                } else {
                    $software = new Software();
                    $message = "Software added successfully.";
                }

                $input['authentication_field'] = [
                    'label' => $input['authentication_field'],
                    'name' => str_replace(" ","_",$input['authentication_field'])
                ];
                
                $software->fill($input)->save();
                $arr = array('status' => 200, 'message' => $message, 'data' => $software);
            } catch (QueryException $ex) {
                $message = $ex->getMessage();
                if (isset($ex->errorInfo[2])) {
                    $message = $ex->errorInfo[2];
                }
                $arr = array("status" => 400, "message" => $message, "data" => array());
            } catch (Exception $ex) {
                $message = $ex->getMessage();
                if (isset($ex->errorInfo[2])) {
                    $message = $ex->errorInfo[2];
                }
                $arr = array("status" => 400, "message" => $message, "data" => array());
            }
        } 
        return \Response::json($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $software = Software::find($id);
        return view('pages.admin.api_request.software.create_update',compact('software'));
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
        $request->request->add(['id_for_update' => $id]);
        return $this->store($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $software = Software::find($id);
        if ($software) {
            $software->delete();

            $arr = array('status' => 200, 'message' => 'Software deleted successfully.', 'data' => []);
        } else {
            $arr = array("status" => 400, "message" => "Software not found.", "data" => array());
        } 

        return \Response::json($arr);
    }
}
