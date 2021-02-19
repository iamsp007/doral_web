<?php

namespace App\Http\Controllers\Clinician;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Services\AdminService;
use Illuminate\Http\Request;

class ClinicianController extends Controller
{
    public function clinician()
    {
        $services = new AdminService();
        $response = $services->getClinicianList();

        $data = array();
        if ($response != null && $response->status === true) {
            $data = $response->data;
        }

        return view('pages.admin.clinician')->with('record',$data);
    }

    public function getClinicianList()
    {
        $services = new AdminService();
        $response = $services->getClinicianList();

        $data = array();
        if ($response != null && $response->status === true) {
            $data = [
                'data' => $response->data
            ];
            return response()->json($data, 200);
        }

        return response()->json($data, 422);
    }

    public function getClinicianDetail($id)
    {
        $services = new AdminService();
        $response = $services->getClinicianDetail($id);

        $data = array();
        if ($response != null && $response->status === true) {
            $data = $response->data;
            return view('pages.admin.clinician-view', compact('data'));
        }

        return redirect()->back();
    }
}
