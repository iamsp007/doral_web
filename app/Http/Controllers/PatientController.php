<?php

namespace App\Http\Controllers;

use App\Services\AdminService;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    protected $adminServices;
    public function __construct(AdminService $adminServices)
    {
        $this->adminServices = $adminServices;
    }

    public function index(Request $request,$paient_id){
        $response = $this->adminServices->getPatientDetail($paient_id);
        if ($response->status===true){
            $details = $response->data;
            return view('pages.patient-detail',compact('details'));
        }
        return redirect()->back()->with('errors',$response->message);
    }
}
