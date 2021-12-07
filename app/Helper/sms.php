<?php

use App\Mail\SendErrorEmail;
use Illuminate\Support\Facades\Mail;

if (!function_exists('sendsmsToMe')) {

        function sendsmsToMe($message, $phone) {	
            $to = $phone;
            $from = "12089104598";	
            $api_key = "bb78dfeb";
            $api_secret = "PoZ5ZWbnhEYzP9m4";	
            $uri = 'https://rest.nexmo.com/sms/json';	
            $text = $message;	
            $fields = '&from=' . urlencode($from) .	
                    '&text=' . urlencode($text) .	
                    '&to=+1' . urlencode($to) .	
                    '&api_key=' . urlencode($api_key) .	
                    '&api_secret=' . urlencode($api_secret);	
            $res = curl_init($uri);	
            curl_setopt($res, CURLOPT_POST, TRUE);	
            curl_setopt($res, CURLOPT_RETURNTRANSFER, TRUE); // don't echo	
            curl_setopt($res, CURLOPT_SSL_VERIFYPEER, FALSE);	
            curl_setopt($res, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);	
            curl_setopt($res, CURLOPT_POSTFIELDS, $fields);	
            curl_exec($res);

            if (curl_errno($res)) {
                $error_msg = curl_error($res);
            }
            curl_close($res);

            if (isset($error_msg)) {
                $details = [
                'message' => $error_msg,
                ];

                Mail::to('shashikant@hcbspro.com')->send(new SendErrorEmail($details));
            }	
        }
    }