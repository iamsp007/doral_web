<?php

namespace App\Http\Controllers;

use App\Models\PatientReferral;
use App\Models\User;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    protected $view_path='pages.';
    protected $adminService;

    public function __construct(AdminService $adminService){
        $this->adminService = $adminService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function getPatientDetail(Request $request,$patient_id){

        $details = User::with('patientDetail')->find($patient_id);
        return view($this->view_path.'patient-detail',compact('details'));
    }

    public function saveToken(Request $request){
        if (Auth::check()){
            $user = User::find(Auth::user()->id);
            if ($user){
                $user->web_token = $request->device_token;
                $user->save();
                return response()->json([
                    'status'=>true,
                    'message'=>'Device Token update successfully'
                ],200);
            }
        }
        return response()->json([
            'status'=>false,
            'message'=>'Device Token Not update'
        ],422);
    }

    public function allPatientList(Request $request){

        $patientList = User::with('patientDetail','roles')
            ->whereHas('roles',function ($q){
                $q->where('name','=','patient');
            });
        return DataTables::of($patientList)
            ->editColumn('dob', function ($contact){
                if($contact->dob!='')
                    return date('m-d-Y', strtotime($contact->dob));
                else
                    return '--';
            })->editColumn('patient_detail.city', function ($contact){
                if($contact->city!='')
                    return $contact->city;
                else
                    return '--';
            })->editColumn('patient_detail.state', function ($contact){
                if($contact->state!='')
                    return $contact->state;
                else
                    return '--';
            })->editColumn('patient_detail.address_1', function ($contact){
                if($contact->address_1!='')
                    return $contact->address_1;
                else
                    return '--';
            })->editColumn('patient_detail.service.name', function ($contact){
                if($contact->service!='')
                    return $contact->service->name;
                else
                    return '--';
            })->editColumn('patient_detail.gender', function ($contact){
                if($contact->gender!='')
                    return $contact->gender;
                else
                    return 'Other';
            })
            ->make(true);
    }
}
