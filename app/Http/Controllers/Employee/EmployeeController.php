<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\Partner;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    /**
     * View file path prefix
     */
    protected $view_path='employee.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations = Designation::where('role_id',18)->get();
        return view('admin.employee.index',compact('designations'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList(Request $request)
    {
        $user = Auth::user();
       
        $role_id = implode(',',$user->roles->pluck('id')->toArray());
        $input = $request->all();

        $employeeList = User::whereHas('designation',function($q) use($role_id) {
            $q->where('role_id', $role_id);
        })
        ->with('employee')
        ->when($input['designation_id'], function ($query) use($input){
            $query->where('designation_id', $input['designation_id']);
        })
        ->when($input['date_of_birth'], function ($query) use($input){
            $query->where('dob', dateFormat($input['date_of_birth']));
        })
        ->when($input['email'], function ($query) use($input){
            $query->where('email', $input['email']);
        })
        ->when($input['status'], function ($query) use($input){
            $query->where('status', $input['status']);
        })->get();
      
        return DataTables::of($employeeList)
        // <a href="/partner/view-employee/'+row.id+'">' + row.first_name +' '+ row.last_name + '</a>
            ->addColumn('full_name', function ($row) {
                // return '<a href="' . route('patient.details', ['patient_id' => $row->id]) . '" class="" data-toggle="tooltip" data-placement="left" title="View Patient" data-original-title="View Patient Chart">' . $row->full_name . '</a>';
                return $row->full_name;
            })
            ->addColumn('designation_id', function ($row) {
                $designation = '';
                if ($row->designation) {
                    $designation = $row->designation->name;
                }
                return $designation;
            })
            ->addColumn('employee_ID', function ($row) {
                $employee_ID = '';
                if ($row->employee) {
                    $employee_ID = $row->employee->employee_ID;
                }
                return $employee_ID;
            })
            ->addColumn('dob', function ($row) {
                return viewDateFormat($row->dob);
            })
            ->addColumn('driving_license', function ($row) {
                $driving_license = '';
                if ($row->employee) {
                    $driving_license = $row->employee->driving_license;
                }
                return $driving_license;
            })
            ->addColumn('action', function($row){
                $action = '';
                if ($row->status === config('constant.active')) {
                    $action .= '<a class="user_status change_status btn m-btn--pill m-btn--air btn-success btn-sm mr-2" data-id="Deactive" id="' . $row->id . '" title="Active">Active</a>';
                } else {
                    $action .= '<a class="user_status change_status btn m-btn--pill m-btn--air btn-warning btn-sm mr-2" data-id="Active" id="' . $row->id . '" title="Deactive">Deactive</a>';
                }
                $action .= '<a href="employee/' . $row->id . '" class="btn btn-primary btn-view shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="View Employee" data-original-title="View Employee Chart"><i class="las la-search"></i></a>';
                $action .= '<a href="employee/' . $row->id . '/edit" class="btn btn-warning btn-view shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="Edit Employee" data-original-title="Edit Employee Chart"><i class="las la-edit"></i></a>';
                $action .= '<a id="' . $row->id . '" class="btn btn-danger btn-view shadow-sm btn--sm mr-2 deleting" data-toggle="tooltip" data-placement="left" title="Delete Employee" data-original-title="Delete Employee Chart"><i class="la la-remove"></i></a>';

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
        $roles = Role::where('guard_name','=','partner')->get();
        $designations = Designation::where('role_id',18)->get();

        return view('admin.employee.create_update', compact('roles', 'designations'));
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
            'employee_ID'=>'required',
            'designation_id'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email|unique:users,email',
            'phone'=>'required|unique:users,phone',
            'driving_license'=>'required',
            'dateofbirth'=>'required',
		);
        
        $messages = array(
            'employee_ID.required' => 'Please enter employee ID.',
            'designation_id.required' => 'Please select designation.',
            'first_name.required' => 'Please enter first name.',
            'last_name.required' => 'Please enter last name.',
            'email.required' => 'Please enter email.',
            'phone.required' => 'Please enter phone.',
            'driving_license.required' => 'Please enter driving license.',
            'dateofbirth.required' => 'Please select date of birth.',
        );

        if (isset($input["id_for_update"])) {
            $rules['email'] = 'required|email|unique:users,email,' . $input['id_for_update'];
        }

        $validator = Validator::make($input, $rules, $messages);

        if($validator->fails()){
            $arr = array('status' => 400 , 'message' =>$validator->errors()->first() , 'result' =>array());
        } else {
            begin();
            try {
                if (isset($input["id_for_update"])) {
                    // if ($input['field_role_id']) {
                    //     $user = User::find($input['id_for_update']);
                    // }else{
                    //     $user = Partner::find($input['id_for_update']);
                    // }
                    $user = Partner::find($input['id_for_update']);
                    $message = 'Employee updated successfully.';
                } else {
                    // if ($input['field_role_id']) {
                    //     $user = new User();
                    // }else{
                    //     $user = new Partner();
                    // }
                    $user = new Partner();
                    $message = 'Employee added successfully!';
                }
              
                $password = Str::random(8);
                $userInput['first_name'] = $input['first_name'];
                $userInput['last_name'] = $input['last_name'];
                $userInput['email'] = $input['email'];
                $userInput['phone'] =setPhone($input['phone']);
                $userInput['password'] = setPassword($password);
                $userInput['dob'] = dateFormat($input['dateofbirth']);
                $userInput['status'] = config('constant.active');
                $userInput['designation_id'] = $input['designation_id'];
                
                $user->fill($userInput)->save();

                // if ($input['field_role_id']){
                //     $roles = Role::whereIn('id',explode(',',$input['field_role_id']))->pluck('name');
                //     $roles = $roles->toArray();
                // }else{
                //     $roles = $input['role_id'];
                // }
                // $user->assignRole($roles);

                Employee::updateOrCreate(['user_id' => $user->id], [
                    'employee_ID' => $input['employee_ID'],
                    'driving_license' => $input['driving_license'],
                ]);
               
                commit();
                $arr = array('status' => 200 , 'message' => $message , 'result' => $user);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('employee')->find($id);
        // dd($employee);
        return view('admin.employee.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('employee')->find($id);
        $designations = Designation::where('role_id',18)->get();
        if(isset($user)) {
            return view('admin.employee.create_update',compact('user', 'designations'));
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
        $user = User::with('employee')->find($id);

        if($user) {
            if ($user->employee) {
                $user->employee->delete();
            }
            $user->delete();
            $arr = array('status' => 200 , 'message' =>'Employee successfully deleted.' , 'result' => array());
        } else {
            $arr = array('status' => 400 , 'message' =>'Employee not found.' , 'result' => array());
        }
        return \Response::json($arr);
    }

    /**Change admin status */
    public function updateStatus($id) 
    {
        $user = User::find($id);
        $user_message = '';
        if ($user->status === config('constant.active')) {
            $user_message = 'Employee deactive successfully.';
            $user->update(['status' => config('constant.inactive')]);
        } else {
            $user_message = 'Employee active successfully.';
            $user->update(['status' => config('constant.active')]);
        }
        $responce = array('status' => 200, 'message' => $user_message, 'result' => array());
        return \Response::json($responce);
    }
}
