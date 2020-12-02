<?php

namespace App\Http\Controllers\Clincian;

use App\Http\Controllers\Controller;
use App\Models\PatientReferral;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PatientController extends Controller
{
    //
    protected $view_path='pages.clincian.';

    public function __construct(){

    }

    public function index(){

        return view($this->view_path.'patient');
    }

    public function getPatientList(){

        $patientList = PatientReferral::with('detail')->get();
        return DataTables::of($patientList)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
