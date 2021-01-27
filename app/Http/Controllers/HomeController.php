<?php

namespace App\Http\Controllers;

use App\Models\PatientReferral;
use App\Models\User;
use App\Services\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $response = $this->adminService->saveToken($request->all());
        if ($response->status===true){
            return response()->json($response,200);
        }
        return response()->json($response,422);
    }
}
