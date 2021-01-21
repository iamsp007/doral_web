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

class AdminService
{

    protected $client;

    public function __construct()
    {
        $this->client = new BaseClient(env('API_URL'), env('API_URL'));
    }

    public function getCompanyReferral($type){
        try {

            $response = $this->client->request(
                'GET',
                '/auth/company/'.$type
            );


            $response = $response->getBody()->getContents();
            $data = json_decode($response,true);
            return $data;
        }catch (\Exception $exception){

        }
    }

    public function storeCompany($data){
        try {

            $response = $this->client->request(
                'POST',
                '/auth/company/store'
            );


            $response = $response->getBody()->getContents();

            $data = json_decode($response,true);
            return $data;
        }catch (\Exception $exception){

        }
    }

    public function updatestatus($data) {
        try {

            $response = $this->client->request(
                'POST',
                '/auth/company/updatestatus',
                [
                    'json'=>$data
                ]
            );


            $response = $response->getBody()->getContents();
            $data = json_decode($response,true);
            return $data;
        }catch (\Exception $exception){

        }
    }

    public function getProfile($type){
        try {

            $response = $this->client->request(
                'GET',
                '/auth/company/show/'.$type
            );
            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){

        }
    }

    public function getAppointment(){
        try {

            $response = $this->client->request(
                'GET',
                '/auth/appointment'
            );


            $response = $response->getBody()->getContents();

            $data = json_decode($response,true);
            return $data;
        }catch (\Exception $exception){

        }
    }
    public function getNewPatientList(){
        try {

            $response = $this->client->request(
                'GET',
                '/getNewPatientListForAppointment'
            );


            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){

        }
    }
    public function getPatientDetail($patient_id){
        try {

            $response = $this->client->request(
                'GET',
                '/auth/get-patient-detail/'.$patient_id
            );


            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){

        }
    }

    public function getClinicianList()
    {
        try {
            $response = $this->client->request(
                'GET',
                '/auth/get-clinician-list'
            );
            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function getClinicianDetail($clinician_id)
    {
        try {
            $response = $this->client->request(
                'GET',
                '/auth/get-clinician-detail/'.$clinician_id
            );
            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
