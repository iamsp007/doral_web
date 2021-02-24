<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    protected $view_path='pages.partner.';

    public function __construct(){

    }

    public function index(){

        return view($this->view_path.'dashboard');
    }
    
    public function addEmployee(){
        return view($this->view_path.'add-employee');
    }
    
    public function employees(){

        return view($this->view_path.'employees');
    }
    
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
                return '<a href="' . route('partner.employee', ['id' => $row->id]) . '" class="btn btn-primary btn-view shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="View Employee" data-original-title="View Employee Chart"><i class="las la-binoculars"></i></a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    
    public function saveEmployee(Request $request)
    {
        try {
            
            $linkType = 'IOS';
            if($request->linkType == 1) {
                $linkType = 'Android';
            }
            $user = new User();
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
            \Log::error($ex->getMessage());
            return redirect()->back();
        }
    }

    public function employee($id)
    {
        $employee = User::whereHas('roles',function ($q){
            $q->whereIn('role_id',['4', '6']);
        })->where('id', $id)->first();

        return view($this->view_path.'edit-employee', compact('employee'));
    }
}
