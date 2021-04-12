<?php

namespace App\Http\Controllers\ApiRequest;

use App\Http\Controllers\Controller;
use App\Models\Api;
use App\Models\Software;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ApiController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apis = Api::getApi();
        $softwares = Software::getSoftware();

        return view('pages.admin.api_request.api.index',compact('apis', 'softwares'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll(Request $request)
    {
        $api = Api::with('software')
            ->when($request['status'], function ($query) use($request) {
                $query->where('status', $request['status']);
            })
            ->when($request['software_id'], function ($query) use($request) {
                $query->where('id', $request['software_id']);
            })->when($request['api_id'], function ($query) use($request) {
                $query->where('id', $request['api_id']);
            });

        return DataTables::of($api->get())
            ->addIndexColumn()
            ->addColumn('status', function($row) use($request){
                return $row->status_view;
            })
            ->addColumn('software_id', function($row) {
                $software = '';
                if ($row->software) {
                    $software = $row->software->name;
                }

                return $software;
            }) 
            ->addColumn('action', function($row) use($request){
                return  '<a href="api/'.$row->id.'/edit" class="btn btn-add shadow-sm btn--sm mr-2"
                data-toggle="tooltip" data-placement="left" title="Edit Api"><i
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
        $softwares = Software::getSoftware();
        return view('pages.admin.api_request.api.create_update',compact('softwares'));
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
            'name' => 'required',
            'software_id' => 'required'
        ];

        $messages = [
            'name.required' => 'Please enter name.',
            'software_id.required' => 'Please select software.'
        ];

        $validator = Validator::make($input, $rules, $messages);
       
        if ($validator->fails()) {
            $arr = array('status' => 400, 'message' => $validator->errors()->all(), 'result' => array());
        } else {
            try {
                if (isset($input['id_for_update']) && !empty($input['id_for_update'])) {
                    $api = Api::find($input['id_for_update']);
                    $message = "Api updated successfully.";
                } else {
                    $api = new Api();
                    $message = "Api added successfully.";
                }
                $input['field'] = [
                    'label' => $input['field'],
                    'name' => str_replace(" ","_",$input['field'])
                ];
                $api->fill($input)->save();
                $arr = array('status' => 200, 'message' => $message, 'data' => $api);
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
        $api = Api::find($id);
        $softwares = Software::getSoftware();
        return view('pages.admin.api_request.api.create_update',compact('api', 'softwares'));
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
        $api = Api::find($id);
        if ($api) {
            $api->delete();

            $arr = array('status' => 200, 'message' => 'Api deleted successfully.', 'data' => []);
        } else {
            $arr = array("status" => 400, "message" => "Api not found.", "data" => array());
        } 

        return \Response::json($arr);
    }
}
