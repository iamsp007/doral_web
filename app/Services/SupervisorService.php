<?php

namespace App\Services;

use App\BaseClient;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class SupervisorService
{

    protected $supervisor;

    public function __construct()
    {
        $this->supervisor = new BaseClient(env('API_URL'), env('API_URL'));
    }

    public function getPatientList($data){
        try {

            $response = $this->supervisor->request(
                'GET',
                '/auth/getNewPatientList',
                [
                    'json'=>$data
                ]
            );

            $response = $response->getBody()->getContents();
            
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){
            dump($exception->getMessage());
        }
    }
}
