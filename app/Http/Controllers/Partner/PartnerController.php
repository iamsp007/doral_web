<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Log;

class PartnerController extends Controller
{
    /**
     * View file path prefix
     */
    protected $view_path='pages.partner.';

    /**
     * Dashboard section
     */
    public function index()
    {
        return view($this->view_path.'dashboard');
    }

    /**
     * Add employee form
     */
    public function addEmployee()
    {
        return view($this->view_path.'add-employee');
    }

    /**
     * List of employee section
     */
    public function employees()
    {
        return view($this->view_path.'employees');
    }

    /**
     * Ajax feature for all employees list
     */
    public function employeesByAjax(){
        $employeeList = User::whereHas('roles',function ($q){
                    $q->whereIn('role_id',['4', '6']);
                })->get();

        return DataTables::of($employeeList)
            ->editColumn('dob', function ($row) {
                return $row->dob ? date('m-d-Y', strtotime($row->dob)) : '--';
            })
            ->editColumn('email', function ($row) {
                return $row->email ?? '--';
            })
            ->editColumn('phone', function ($row) {
                return $row->phone ?? '--';
            })
            ->editColumn('employeeID', function ($row) {
                return $row->employeeID ?? '--';
            })
            ->editColumn('dlNumber', function ($row) {
                return $row->dlNumber ?? '--';
            })
            ->addColumn('action', function($row){
                $action = '';
                $action .= '<a href="' . route('partner.viewEmployee', ['id' => $row->id]) . '" class="btn btn-primary btn-view shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="View Employee" data-original-title="View Employee Chart"><i class="las la-search"></i></a>';
                $action .= '<a href="' . route('partner.editEmployee', ['id' => $row->id]) . '" class="btn btn-warning btn-view shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="Edit Employee" data-original-title="Edit Employee Chart"><i class="las la-edit"></i></a>';
                $action .= '<a href="' . route('partner.deleteEmployee', ['id' => $row->id]) . '" class="btn btn-danger btn-view shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="Delete Employee" data-original-title="Delete Employee Chart"><i class="la la-remove"></i></a>';
                return $action;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Store employee method
     */
    public function saveEmployee(Request $request)
    {
        try {
            $user = new User();
            $user->first_name = $request->firstName;
            $user->last_name = $request->lastName;
            $user->email = $request->emailID;
            $user->phone = $request->phoneNumber;
            $user->employeeID = $request->employeeID;
            $user->dlNumber = $request->dlNumber;
            $user->deviceType = $request->linkType ?? "IOS";
            $user->email_verified_at = now();
            $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->status = '1';
            $user->assignRole($request->role_id)->syncPermissions(Permission::all());
            if ($user->save()) {
                return redirect()->route('employees.list');
            } else {
                return redirect()->back();
            }

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Edit employee form
     */
    public function editEmployee($id)
    {
        $employee = User::find($id);

        return view($this->view_path.'edit-employee', compact('employee'));
    }

    /**
     * Update employee method
     */
    public function updateEmployee(Request $request, $id)
    {
        try {

            $linkType = 'IOS';
            if($request->linkType == 1) {
                $linkType = 'Android';
            }
            $user = User::find($id);
            $user->first_name = $request->firstName;
            $user->last_name = $request->lastName;
            $user->email = $request->emailID;
            $user->phone = $request->phoneNumber;
            $user->employeeID = $request->employeeID;
            $user->dlNumber = $request->dlNumber;
            $user->deviceType = $linkType;
            $user->email_verified_at = now();
            $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->status = '1';
            $user->assignRole('clinician','LAB')->syncPermissions(Permission::all());
            if ($user->save()) {
                return redirect()->route('employees.list');
            } else {
                return redirect()->back();
            }

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back();
        }
    }

    /**
     * View employee page
     */
    public function viewEmployee($id)
    {
        $employee = User::find($id);

        return view($this->view_path.'view-employee', compact('employee'));
    }

    /**
     * Remove employee from the platform
     */
    public function deleteEmployee($id)
    {
        $user = User::find($id);

        if ($user->delete()) {
            return redirect()->route('employees.list');
        } else {
            return redirect()->back();
        }
    }
}
