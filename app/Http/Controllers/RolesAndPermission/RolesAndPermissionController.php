<?php

namespace App\Http\Controllers\RolesAndPermission;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Services\AdminService;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\RoleModuleAssign;
use App\Models\RoleModuleName;
use App\Models\RolePermission;
use View;
use Auth;

class RolesAndPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $roles = Role::select('id','name', 'guard_name')->whereIn('id',[1,4,6])->get()->toArray();
        return view('pages.admin.roles-permissions')->with('roles',$roles);
    }

    /**
     * Save permission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $data = $request->all();
        $status = 0;

        $services = new AdminService();
        $response = $services->saveRolesAndPermission($data);

        $data = array();
        if ($response != null && $response['status'] === true) {
            /*$data = [
                'data' => $response->data
            ];*/
            return response()->json($response, 200);
        }

        return response()->json($data, 422);
    }

    /**
     * Get Role Permission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getRolePermission(Request $request) {


        $data = $request->all();
        $status = 0;
        $services = new AdminService();
        $response = $services->getRolePermission($data);
        
        $selectedRoles = $data['role_ids'];
        $selectedUsers = [];
        if(isset($data['user_ids'])) {
            foreach ($data['user_ids'] as $key => $value) {
                array_push($selectedUsers, $data['user_ids'][$key]['id'].'-'.$data['user_ids'][$key]['tabel']);
            }

           
            
        }

        $roles = Role::select('id','name', 'guard_name')->whereIn('id',[1,4,6])->get()->toArray();

        echo json_encode(View::make("pages.admin.roles-permissions-module")->with('data',$response['data'])->with('roles',$roles)->with('selectedRoles',$selectedRoles)->with('selectedUsers',$selectedUsers)->render(),true);
    }

}
