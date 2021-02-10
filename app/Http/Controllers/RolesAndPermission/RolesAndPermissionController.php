<?php

namespace App\Http\Controllers\RolesAndPermission;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Services\AdminService;
use Illuminate\Http\Request;

class RolesAndPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        return view('pages.admin.roles-permissions');
    }

    /**
     * Save permission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        /*$services = new AdminService();
        $response = $services->saveRolesAndPermission();

        $data = array();
        if ($response != null && $response->status === true) {
            $data = [
                'data' => $response->data
            ];
            return response()->json($data, 200);
        }

        return response()->json($data, 422);*/
    }
}
