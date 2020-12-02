<?php

namespace App\Models\CurlModel;
use Illuminate\Http\Request;
class CurlFunction 
{
    public static function getURL() {

        if(strpos(request()->getHost(), '127.0.0.1') !== false) {
        return 'http://127.0.0.1:8001';
        } else if( strpos(request()->getHost(), 'doralhealthconnect.com') !== false) {
        return 'http://api.doralhealthconnect.com';
        } else {
        return 'http://127.0.0.1:8001';
        }
        //return 'http://api.doralhealthconnect.com';

    }
    public static function withOutToken($url, $data) {
		$headerValue = array(
            'Content-Type: application/json',
            'X-Requested-With: XMLHttpRequest',
            'Access-Control-Allow-Origin: http://localhost'
        );

        $Data = json_encode($data);
        $ch = curl_init($url);
        curl_setopt_array($ch, array(
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_POSTFIELDS => $Data,
        CURLOPT_TIMEOUT => 40,
        CURLOPT_HTTPHEADER => $headerValue
        ));
        
        $curlResponse = curl_exec($ch);
        curl_close($ch);

        return $curlResponse;
	}

	public static function withTokenGet($url, $token) {
		$headerValue = array(
            'Content-Type: application/json',
            'X-Requested-With: XMLHttpRequest',
            'Access-Control-Allow-Origin: http://localhost',
            'Authorization: Bearer '.$token
        );

        $url = 'http://127.0.0.1:8001/api/auth/company';
        //$url = 'http://api.doralhealthconnect.com/api/auth/company'; 
        $ch = curl_init($url);
        curl_setopt_array($ch, array(
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_TIMEOUT => 40,
        CURLOPT_HTTPHEADER => $headerValue
        ));
        
        $curlResponse = curl_exec($ch);
        curl_close($ch); 

        return $curlResponse;
	}

	public static function withTokenPost($url, $data, $token) {
		$headerValue = array(
            'Content-Type: application/json',
            'X-Requested-With: XMLHttpRequest',
            'Access-Control-Allow-Origin: http://localhost',
            'Authorization: Bearer '.$token
        );

        $Data = json_encode($data);
        $ch = curl_init($url);
        curl_setopt_array($ch, array(
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_POSTFIELDS => $Data,
        CURLOPT_TIMEOUT => 40,
        CURLOPT_HTTPHEADER => $headerValue
        ));
        
        $curlResponse = curl_exec($ch);
        curl_close($ch);

        return $curlResponse;
	}
}
