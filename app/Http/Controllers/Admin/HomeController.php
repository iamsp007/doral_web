<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

class HomeController extends Controller
{
    public function index() {
        return view('pages.admin.dashboard');
    }
    
    /**
     * Login Admin
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $status = 0;
        $message = "";
        try {
            if(empty($request->email)) {
                throw new Exception("Please Enter Username");
            }
            $data = array(
                    'email' => $request->email,
                    'password' => $request->password
            );

            $headerValue = array(
                'Content-Type: application/json',
                'X-Requested-With: XMLHttpRequest',
                'Access-Control-Allow-Origin: http://localhost'
            );

            $Data = json_encode($data);
            $url = 'http://127.0.0.1:8001/api/auth/login';
            $ch = curl_init($url);
            curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_POSTFIELDS => $Data,
            CURLOPT_TIMEOUT => 40,
            CURLOPT_HTTPHEADER => $headerValue
            ));
            
            $curlResponse = curl_exec($ch);
            
            curl_close($ch);
            
            $responseArray = json_decode($curlResponse, true);
            //dd($responseArray);
            if($responseArray['message'] == 'Login Successfully!') {
                $status = 1;
                session(['token' => $responseArray['data']['access_token']]);
            }
            $message = $responseArray['message'];

        } catch(Exception $e) {
            $status = 0;
            $message = $e->getMessage();
        }

        $response = [
            'status' => $status,
            'message' => $message
        ];

        return response()->json($response, 201);
    }

    public function logout() {

        session(['token' => null]);
        //dd(session('token'));
        return redirect('/admin');

    }

    
}
