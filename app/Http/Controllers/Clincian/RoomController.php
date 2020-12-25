<?php

namespace App\Http\Controllers\Clincian;

use App\Http\Controllers\Controller;
use App\Models\VirtualRoom;
use App\Services\ClinicianService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use OpenTok\OpenTok;

class RoomController extends Controller
{
    protected $view_path='pages.clincian.';

    public function __construct(){

    }
    public function showClassRoom(Request $request, $id)
    {
        // Get the currently authenticated user

        // Find the virtual class associated by provided id
        $user = Auth::user();
        $virtualClass = VirtualRoom::where(['user_id'=>Auth::user()->id])->first();

        // Gets the session ID
        $sessionId = $virtualClass->session_id;
        // Instantiates new OpenTok object
        $opentok = new OpenTok(env('VONAGE_API_KEY'), env('VONAGE_API_SECRET'));
        // Generates token for client as a publisher that lasts for one week
        $token = $opentok->generateToken($sessionId, ['expireTime' => time() + (7 * 24 * 60 * 60)]);

        // Open the classroom with all needed info for clients to connect
        return view($this->view_path.'room',compact('token', 'user', 'sessionId'));
    }

    public function sendVideoMeetingNotification(Request $request,$appointment_id){
        $clinicianService = new ClinicianService();
        $response = $clinicianService->sendVideoMeetingNotification($appointment_id);
        $data=[];
        if ($response->status===true){
            $url='';
            if ($response->data->meeting){
                if ($response->data->provider1_details->id===Auth::user()->id){
                    $url=$response->data->meeting->start_url;
                }else{
                    $url=$response->data->meeting->join_url;
                }
                return redirect()->to($url);
            }
            return redirect()->back()->with('error','No Meeting Exists');
        }
        return redirect()->back()->with('error',$response->message);
    }
}
