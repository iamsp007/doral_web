<?php

namespace App\Http\Controllers\Designation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Database\QueryException;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.designation.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList(Request $request)
    {
        $designation = Auth::user();
       
        $role_id = implode(',',$designation->roles->pluck('id')->toArray());
        $input = $request->all();

        $designationList = Designation::where([['user_id', '=', $designation->id],['role_id', '=', $role_id]])
        ->when($input['name'], function ($query) use($input){
            $query->where('name', $input['name']);
        })->get();
      
        return DataTables::of($designationList)
            ->addColumn('action', function($row){
                $action = '';
                if ($row->status === 'active') {
                    $action .= '<a class="user_status change_status btn m-btn--pill m-btn--air btn-success btn-sm mr-2" data-id="Deactive" id="' . $row->id . '" title="Active">Active</a>';
                } else {
                    $action .= '<a class="user_status change_status btn m-btn--pill m-btn--air btn-warning btn-sm mr-2" data-id="Active" id="' . $row->id . '" title="Deactive">Deactive</a>';
                }
               
                if ($row->name != "Field Visitor") {
                    $action .= '<a href="designation/' . $row->id . '/edit" class="btn btn-warning btn-view shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="Edit Designation" data-original-title="Edit Designation Chart"><i class="las la-edit"></i></a>';
                    $action .= '<a id="' . $row->id . '" class="btn btn-danger btn-view shadow-sm btn--sm mr-2 deleting" data-toggle="tooltip" data-placement="left" title="Delete Designation" data-original-title="Delete Designation Chart"><i class="la la-remove"></i></a>';
                }
              
                return $action;
            })
            ->rawColumns(['action','role_name','status'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.designation.create_update');
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
      
        $rules = array(
            'name'=>'required|unique:designations',
		);
        
        $messages = array(
            'name.required' => 'Please enter name.',
            'name.unique' => 'The name must be unique.',
        );

        $validator = Validator::make($input, $rules, $messages);

        if($validator->fails()){
            $arr = array('status' => 400 , 'message' =>$validator->errors()->first() , 'result' =>array());
        } else {
            begin();
            try {
                if (isset($input["id_for_update"])) {
                    $designation = Designation::find($input['id_for_update']);
                    $message = 'Designation updated successfully.';
                } else {
                    $designation = new Designation();
                    $message = 'Designation added successfully!';
                }
                $user = Auth::user();
       
                $role_id = implode(',',$user->roles->pluck('id')->toArray());
                
                $input['user_id'] = $user->id;
                $input['role_id'] = $role_id;
                $designation->fill($input)->save();

                commit();
                $arr = array('status' => 200 , 'message' => $message , 'result' => $designation);
            } catch (QueryException $ex) {
                $message = $ex->getMessage();
                if (isset($ex->errorInfo[2])) {
                    $message = $ex->errorInfo[2];
                }
                rollback();
                $arr = array("status" => 400, "message" => $message, "result" => array());
            } catch (Exception $ex) {
                rollback();
                $arr = array("status" => 400, "message" => "error", "result" => array());
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
        $designation = Designation::find($id);
        
        if(isset($designation)) {
            return view('admin.designation.create_update',compact('designation'));
        } 
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
        $designation = Designation::find($id);

        if($designation) {
          
            $designation->delete();
            $arr = array('status' => 200 , 'message' =>'Designation successfully deleted.' , 'result' => array());
        } else {
            $arr = array('status' => 400 , 'message' =>'Designation not found.' , 'result' => array());
        }
        return \Response::json($arr);
    }

    /**Change admin status */
    public function updateStatus($id) 
    {
        $designation = Designation::find($id);
        $designation_message = '';
        if ($designation->status === 'active') {
            $designation_message = 'Designation deactive successfully.';
            $designation->update(['status' => 'inactive']);
        } else {
            $designation_message = 'Designation active successfully.';
            $designation->update(['status' => 'active']);
        }
        $responce = array('status' => 200, 'message' => $designation_message, 'result' => array());
        return \Response::json($responce);
    }
}
