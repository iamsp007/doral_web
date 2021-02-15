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
                    $q->where('role_id','=','11');
                })->get();

        return DataTables::of($employeeList)
        ->editColumn('dob', function ($contact){
                if($contact->dob!='')
                return date('m-d-Y', strtotime($contact->dob));
                else
                return '--';
            })->make(true);
    }
    
    public function saveEmployee(Request $request){
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
        $user->dob = Carbon::now($request->dob);
        $user->status = '1';
        $user->assignRole('clinician','LAB')->syncPermissions(Permission::all());
        $user->save();
    }
}
