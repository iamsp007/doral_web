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
        return view('pages.admin.clinician');
    }

    public function getClinicianList($status_id = 0)
    {
        $services = new AdminService();
        $response = $services->getClinicianList($status_id);
        
        $data = array();
        if ($response != null && $response->status === true) {
            $data = [
                'data' => $response->data
            ];

            return  DataTables::of($data['data'])
                ->editColumn('dob', function ($user){
                    if($user->dob!='')
                    return date('m-d-Y', strtotime($user->dob));
                    else
                    return '--';
                })
                ->make(true);
        }
        
        return DataTables::of($data)
            ->make(true);
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

    public function getClinicianData(Request $request)
    {
        $requestData = $request->all();
        $data = [];
        if (isset($requestData['searchTerm']) && $requestData['searchTerm']) {
            $services = new AdminService();
            $response = $services->getClinicianData($requestData);
            // print_r($response);die();
            if ($response != null && $response->status === true) {
                $data['data'] = $response->data;
            }
        }
        return $data;
    }

}
