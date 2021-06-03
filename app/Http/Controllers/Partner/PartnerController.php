<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($partnerstatus)
    {
        $roles = Role::where('guard_name','partner')->get();
        return view('admin.partner.index',compact('partnerstatus','roles'));
    }

       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList(Request $request)
    {
        $input = $request->all();
     
        $employeeList = User::where('designation_id',0)->whereHas('roles',function ($q){
                $q->where('guard_name','partner');
            })
            ->when($request['partnerstatus'] ,function ($query) use($request) {
                if ($request['partnerstatus'] == 'pending') {
                    $query->where('status', '0');
                } else if ($request['partnerstatus'] == 'active') {
                    $query->where('status', '1');
                } else if ($request['partnerstatus'] == 'rejected') {
                    $query->where('status', '3');
                }
            })
            ->when($input['role'], function ($query) use($input){
                $query->whereHas('roles',function ($q) use($input){
                    $q->where('id',$input['role']);
                });
            })
            ->when($input['user_name'], function ($query) use($input){
                $query->where('id', $input['user_name']);
            })
            ->when($input['email'], function ($query) use($input){
                $query->where('email', $input['email']);
            })
        ->get();
      
        return DataTables::of($employeeList)
            ->addColumn('checkbox_id', function($q) use($request) {
                return '<div class="checkbox"><label><input class="innerallchk" onclick="chkmain();" type="checkbox" name="allchk[]" value="' . $q->id . '" /><span></span></label></div>';
            })
            ->addColumn('partner_type', function ($row) {
                $role = '';
                if ($row->roles) {
                    $role = implode(',',$row->roles->pluck('name')->toArray());
                    
                }
                return $role;
            })
            ->addColumn('full_name', function ($row) {
                return $row->full_name;
            })
            ->addColumn('action', function($row){
                $action = '';

                if ($row->status === '0') {
                    $action .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Accept" class="btn btn-primary btn-green shadow-sm btn--sm mr-2 update-status" data-status="1">Accept</a>';
                    $action .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Reject" class="btn btn-danger shadow-sm btn--sm mr-2 update-status" data-status="3">Reject</a>';
                } else if ($row->status === '1') {
                    $action .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Reject" class="btn btn-danger shadow-sm btn--sm mr-2 update-status" data-status="3">Reject</a>';
                } else if ($row->status === '3') {
                    $action .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Accept" class="btn btn-primary btn-green shadow-sm btn--sm mr-2 update-status" data-status="1">Accept</a>';
                }

                $action .='<a href="' . route('partner.profile', ['id' => $row->id]) . '" class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="View Profile">View Profile</a>';

                return $action;
            })
            ->rawColumns(['action', 'status', 'checkbox_id'])
            ->make(true);
    }
    
    
    public function profile($id)
    {
        $user = User::find($id);

        return view('admin.partner.profile',compact('user'));
    }

    public function getUserData(Request $request)
    {
        
        $data = [];

        if($request->has('q')){
            $search = $request->q;
           
            $data =User::whereHas('roles',function ($q){
                    $q->where('guard_name','partner');
                })->whereIn('status', ['1', '2', '3', '5'])->select("id","first_name", 'last_name')
                ->where('first_name','LIKE',"%$search%")->orWhere('last_name', 'LIKE', "%$search%")
                ->get();
        }
       
        return response()->json($data);
    }

    /**Change admin status */
    public function updateStatus(Request $request) 
    {
        $input = $request->all();
        
        $users = User::whereIn('id',$input['id']);
        $users->update(['status' => $input['status']]);
    
        $user_message = 'Partner status change successfully.';
   
        if ($input['status'] === '1') {
          
            foreach ($users->get() as $user) {
            
                $password = Str::random(8);
                $user->update(['password' => setPassword($password)]);
                $details = [
                    'name' => $user->first_name,
                    'password' => $password,
                    'email' => $user->email,
                    'login_url' => route('login'),
                ];
                SendEmailJob::dispatch($user->email,$details,'AcceptedMail');
            }
        }
       
        $responce = array('status' => 200, 'message' => $user_message, 'result' => array());
        return \Response::json($responce);
    }
}
