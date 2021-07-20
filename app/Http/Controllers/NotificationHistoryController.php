<?php

namespace App\Http\Controllers;

use App\Models\NotificationHistory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NotificationHistoryController extends Controller
{
    public function index()
    {
            return view('admin.notification.index');
    }

    public function getNotification(Request $request)
    {
        $notificationHistory = NotificationHistory::with('sender','receiver','request')
        // ->when($request['user_name'], function ($query) use($request){
        //     $query->where('id', $request['user_name']);
        // })
        // ->when($request['disease_id'], function ($query) use($request){
        //     $query->where('id', $request['disease_id']);
        // })
        // ->when($request['test_name'], function ($query) use($request){
        //     $query->where('id', $request['test_name']);
        // })
        // ->when($request['symptom_id'], function ($query) use($request){
        //     $query->where('id', $request['symptom_id']);
        // })
        ->get();

        return DataTables::of($notificationHistory)
            ->addColumn('checkbox_id', function($q) use($request) {
                return '<div class="checkbox"><label><input class="innerallchk" onclick="chkmain();" type="checkbox" name="allchk[]" value="' . $q->id . '" /><span></span></label></div>';
            })
            ->addIndexColumn()
            ->addColumn('patient_name', function($q){
                $patient_name = '';
                if ($q->sender) {
                    $patient_name = $q->sender->first_name . ' ' . $q->sender->last_name;
                }

                return $patient_name;
            })
            ->addColumn('disease', function($q){
                $disease = '';
                if ($q->request) {
                    $disease = $q->request->disease;
                }

                return $disease;
            })
            ->addColumn('test_name', function($q){
                $test_name = '';
                if ($q->request) {
                    $test_name = $q->request->test_name;
                }

                return $test_name;
            })
            ->addColumn('symptoms', function($q){
                $symptoms = '';
                if ($q->request) {
                    $symptoms = $q->request->symptoms;
                }

                return $symptoms;
            })
            ->addColumn('distance', function($q){
                $distance = '';
                if ($q->request) {
                    $distance = $q->request->distance;
                }

                return $distance;
            })
            ->addColumn('travel_time', function($q){
                $travel_time = '';
                if ($q->request) {
                    $travel_time = $q->request->travel_time;
                }

                return $travel_time;
            })
            ->addColumn('action', function($row) use($request){
                $btn = '';
                if ($row->is_read == "0") {
                    $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Accept" class="btn btn-primary btn-green shadow-sm btn--sm mr-2 update-status" data-status="1">Read</a>';
                } else {
                    $btn .= ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Reject" class="btn btn-danger shadow-sm btn--sm mr-2 update-status" data-status="0">Unread</a>';
                }

                return $btn;
            })
            ->setRowClass(function ($q) {
                $html = '';
                $html = ($q->is_read == "0" ? 'unread' : 'read');
                
                return $html;
            })
            ->rawColumns(['checkbox_id', 'action'])->make(true);
    }

    /**Change admin status */
    public function updateStatus(Request $request) 
    {
           $input = $request->all();
           
           $users = NotificationHistory::whereIn('id',$input['id']);
           $users->update(['is_read' => $input['is_read']]);
          
           $user_message = 'Message read successfully.';
     
           $responce = array('status' => 200, 'message' => $user_message, 'result' => array());
           return \Response::json($responce);
       }
}
