<?php

namespace App\Http\Controllers\call;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Twilio\Rest\Client;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VoiceGrant;
use Twilio\TwiML\VoiceResponse;
use Twilio\Jwt\ClientToken;

class CallController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
	{
    	return view("admin.call.call_new");
    }

    public function token(Request $request)
	{
    	$data = $request->all();

    	$twilioAccountSid = 'AC2181cacea57e0de4a91a904ed9d9d145'; //env("TWILIO_ACCOUNT_SID");
		$twilioApiKey = 'SK2d078dcfe8cc893745e0e5cc31dbce6e'; //env("TWILIO_API_KEY");
		$twilioApiSecret = 'lFm8gOzLopTzBXKjYxzRUGD2Hqul6f7b'; //env("TWILIO_API_SECRET");

		// Required for Voice grant
		$outgoingApplicationSid = 'APd6e6a083f0e9dadd34268e84bef6eeb8'; //env("TWILIO_SID");
		// An identifier for your app - can be anything you'd like
		$identity = $data["identity"]; // Jack // Client name

		// Create access token, which we will serialize and send to the client
		$token = new AccessToken(
		    $twilioAccountSid,
		    $twilioApiKey,
		    $twilioApiSecret,
		    3600,
		    $identity
		);		
		
		// Create Voice grant
		$voiceGrant = new VoiceGrant();
		$voiceGrant->setOutgoingApplicationSid($outgoingApplicationSid);

		// Optional: add to allow incoming calls
		$voiceGrant->setIncomingAllow(true);

		// Add grant to token
		$token->addGrant($voiceGrant);

		return response()->json([
			"identity" => $data['identity'],
			"token" => $token->toJWT() 
		]);
    }

    public function voice(Request $request)
	{
    	$data = $request->all();
    	$response = new VoiceResponse();

    	// make sure you passing caller id from client side. 
    	// Twilio.Device.connect(params); <----- in param object
		$dial = $response->dial('', ['callerId' => $data["outgoing_caller_id"]]);
		$client = $dial->client($request->To);

		// Sending custom parameters, We will use in client side 
		$client->parameter([
            "name" => "outgoing_caller_id",
            "value" => $data["outgoing_caller_id"],
        ]);

		return $response;
    }
}
