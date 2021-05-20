<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Mail\AcceptedMail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

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
                    $action .='<a class="btn btn-primary btn-green shadow-sm btn--sm mr-2 user_status change_status" data-value="1" data-id="Accept" id="' . $row->id . '" title="Accept">Accept</a>';
                    $action .='<a class="btn btn-danger shadow-sm btn--sm mr-2 user_status change_status" data-value="3" data-id="Reject" id="' . $row->id . '" title="Reject">Reject</a>';
    
                } else if ($row->status === '1') {
                    $action .='<a class="btn btn-danger shadow-sm btn--sm mr-2 user_status change_status" data-value="3" data-id="Reject" id="' . $row->id . '" title="Reject">Reject</a>';
                } else if ($row->status === '3') {
                    $action .='<a class="btn btn-primary btn-green shadow-sm btn--sm mr-2 user_status change_status" data-value="1" data-id="Accept" id="' . $row->id . '" title="Accept">Accept</a>';
                }
                $action .='<a href="' . route('partner.profile', ['id' => $row->id]) . '" class="btn btn-info shadow-sm btn--sm mr-2" data-toggle="tooltip" data-placement="left" title="View Profile">View Profile</a>';

                return $action;
            })
            ->rawColumns(['action','role_name','status'])
            ->make(true);
    }
    
    public function getUserData(Request $request)
    {
        
        $data = [];

        if($request->has('q')){
            $search = $request->q;
           
            $data =User::whereHas('roles',function ($q){
                    // $q->whereIn('name',['LAB', 'Radiology', 'CHHA', 'Home Oxygen', 'Home Influsion', 'Wound Care', 'DME']);
                    $q->where('guard_name','partner');
                })->whereIn('status', ['1', '2', '3', '5'])->select("id","first_name", 'last_name')
                ->where('first_name','LIKE',"%$search%")->orWhere('last_name', 'LIKE', "%$search%")
                ->get();
        }
       
        return response()->json($data);
    }

    /**Accepted and rejected by admin admin status */
    public function updateStatus(Request $request) 
    {
        $input = $request->all();
     
        $user = User::find($input['id']);
        $user->update(['status' => $input['data_value']]);
    
        if ($user->status === '1') {
            $details = [
                'name' => $user->first_name,
                'password' => env('REFERRAL_PASSWORD'),
                'href' => url('user/verify/'.$user->id),
                'email' => $user->email,
                'login_url' => route('login'),
            ];
            Mail::to($user->email)->send(new AcceptedMail($details));
        } 

        $user_message = 'Partner' . $input['status_name'] . 'successfully.';
     
        $responce = array('status' => 200, 'message' => $user_message, 'result' => array());
        return \Response::json($responce);
    }
}
