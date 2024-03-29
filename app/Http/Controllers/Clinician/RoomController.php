<?php

namespace App\Http\Controllers\Clinician;

use App\Http\Controllers\Controller;
use App\Models\VirtualRoom;
use App\Models\VonageRoom;
use App\Services\ClinicianService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use OpenTok\OpenTok;
use OpenTok\OutputMode;

class RoomController extends Controller
{
    protected $view_path='pages.voice.';

    public function __construct(){

    }

    public function index(){
        return view('pages.Zoom.index');
    }

    public function showClassRoom(Request $request, $id)
    {
        // Get the currently authenticated user

        // Find the virtual class associated by provided id
        $user = Auth::user();
        $virtualClass = VonageRoom::where(['user_id'=>$id])->first();

        // Gets the session ID
        $sessionId = $virtualClass->session_id;
        // Instantiates new OpenTok object
        $opentok = new OpenTok(env('VONAGE_API_KEY'), env('VONAGE_API_SECRET'));
        // Generates token for client as a publisher that lasts for one week
        $token = $opentok->generateToken($sessionId, ['expireTime' => time() + (7 * 24 * 60 * 60)]);

        // Open the classroom with all needed info for clients to connect
        return view($this->view_path.'create',compact('token', 'user', 'sessionId'));
    }

    public function startArchive(Request $request){
        $sessionId = $request->sessionId;

        $opentok = new OpenTok(env('VONAGE_API_KEY'), env('VONAGE_API_SECRET'));
        $archive = $opentok->startArchive($sessionId,array(
            'name' => "PHP Archiving Sample App",
            'hasAudio' =>true,
            'hasVideo' => true,
            'outputMode' => OutputMode::COMPOSED
        ));
        $opentok->response->headers->set('Content-Type', 'application/json');
        return $archive->toJson();
    }

    public function zoomGenerateSignature(Request $request){
        $api_key = env('ZOOM_API_KEY');
        $api_secret = env('ZOOM_API_SECRET');
        $meeting_number = $request->meetingNumber;
        $role = $request->role;
        $time = time() * 1000;//time in milliseconds (or close enough)

        $data = base64_encode($api_key . $meeting_number . $time . $role);

        $hash = hash_hmac('sha256', $data, $api_secret, true);

        $_sig = $api_key . "." . $meeting_number . "." . $time . "." . $role . "." . base64_encode($hash);

        //return signature, url safe base64 encoded
        return response()->json([
            'signature'=>rtrim(strtr(base64_encode($_sig), '+/', '-_'), '='),
            'meetingNumber'=>$meeting_number,
            'api_key'=>$api_key,
            'apiSecret'=>$api_secret,
            'role'=>$role,
        ],200);
    }

    public function sendVideoMeetingNotification(Request $request){
        $appointment_id = $request->appointment_id;
        $clinicianService = new ClinicianService();
        $response = $clinicianService->sendVideoMeetingNotification($appointment_id);
        $data=[];
        if ($response->status===true){
            $url='';
            if ($response->data->meeting){
                return response()->json(['status'=>true,'message'=>$response->message,'data'=>$response->data],200);
            }
            return response()->json(['status'=>false,'message'=>'No Meeting Exists','data'=>$response->data],422);
        }
        return response()->json(['status'=>false,'message'=>$response->message,'data'=>$response->data],422);
    }

    public function leaveVideoMetting(Request $request,$appointment_id){
        $clinicianService = new ClinicianService();
        $response = $clinicianService->leaveVideoMetting($appointment_id);
        $data=[];
        if ($response->status===true){
            $url='';
            return redirect()->route('clinician.scheduleAppoimentList')->with('success','Your Meeting End Successfully!');
        }
        return redirect()->back();
    }

    public function startVideoMeetingNotification(Request $request,$patient_request_id){
        $clinicianService = new ClinicianService();
        $response = $clinicianService->startVideoMeetingNotification($patient_request_id);
        $data=[];
        if ($response->status===true){
            $url='';
            if ($response->data->meeting){
                $url=$response->data->meeting->start_url;
                $meeting_number = $response->data->meeting->meeting_id;
                return view('pages.Zoom.index',compact('meeting_number'));
                return redirect()->to($url);
            }
            return redirect()->back()->with('error','No Meeting Exists');
        }
        return redirect()->back()->with('error',$response->message);
    }
}
