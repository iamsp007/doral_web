<?php
/**
 * Created by PhpStorm.
 * User: vikasroy
 * Date: 22/03/18
 * Time: 8:53 PM
 */

namespace App\Services;

use App\BaseClient;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class ReferralService
{

    protected $client;

    public function __construct()
    {
        $this->client = new BaseClient(env('API_URL'), env('API_URL'));
    }

    public function commonReferralService($type,$url) {
        try {

//            $response = $this->client->request(
//                'GET',
//                '.'.$url.'.'.$type,
//                [
//                    'headers' => [
//                        'Accept' => 'application/json',
//                        'Content-Type' => 'application/json',
//                        'X-Requested-With' => 'XMLHttpRequest',
//                        'Access-Control-Allow-Origin' => 'https://api.doralhealthconnect.com'
//                    ]
//                ]
//            );
            $response = $this->client->request(
                'POST',
                '.'.$url.'.'.$type
            );

            $response = $response->getBody()->getContents();
            dd($response);

            $data = json_decode($response,true);
            return $data;
        }catch (\Exception $exception){

        }
    }
    public function getPatient($type) {
        try {

            $response = $this->client->request(
                'GET',
                '/auth/patient-referral/'.$type,
                [
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                        'X-Requested-With' => 'XMLHttpRequest',
                        'Access-Control-Allow-Origin' => 'http://localhost'
                    ]
                ]
            );


            $response = $response->getBody()->getContents();
            dd($response);

            $data = json_decode($response,true);
            return $data;
        }catch (\Exception $exception){

        }
    }

    public function storeCompany($data){
        try {

            $response = $this->client->request(
                'POST',
                '/auth/company/store',
                [
                    'json'=>$data,
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                        'X-Requested-With' => 'XMLHttpRequest',
                        'Access-Control-Allow-Origin' => 'http://localhost'
                    ]
                ]
            );


            $response = $response->getBody()->getContents();

            $data = json_decode($response,true);
            return $data;
        }catch (\Exception $exception){

        }
    }

    public function updatestatus($data){
        try {

            $response = $this->client->request(
                'POST',
                '/auth/company/updatestatus',
                [
                    'json'=>$data,
                    'headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                        'X-Requested-With' => 'XMLHttpRequest',
                        'Access-Control-Allow-Origin' => 'http://localhost'
                    ]
                ]
            );


            $response = $response->getBody()->getContents();
            $data = json_decode($response,true);
            return $data;
        }catch (\Exception $exception){

        }
    }
}
