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

class ClinicianService
{

    protected $client;

    public function __construct()
    {
        $this->client = new BaseClient(env('API_URL'), env('API_URL'));
    }

    public function getPatientRequestList(){
        try {

            $response = $this->client->request(
                'POST',
                '/clinician-patient-request-list'
            );


            $response = $response->getBody()->getContents();

            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){

        }
    }

    public function getNearByClinicianList($patient_request_id){
        try {

            $response = $this->client->request(
                'GET',
                '/get-near-by-clinician-list/'.$patient_request_id
            );


            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){

        }
    }

    public function getRoadlProccessList($patient_request_id){
        try {

            $response = $this->client->request(
                'GET',
                '/get-roadl-proccess/'.$patient_request_id
            );


            $response = $response->getBody()->getContents();
            \Log::info($response);
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){
            \Log::info($exception->getMessage());
        }
    }

    public function getPatientList($data){
        try {

            $response = $this->client->request(
                'GET',
                '/get-patient-list',
                [
                    'json'=>$data
                ]
            );


            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){

        }
    }

    public function getNewPatientList($data){
        try {

            $response = $this->client->request(
                'GET',
                '/get-new-patient-list',
                [
                    'json'=>$data
                ]
            );


            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
    }

    public function scheduleAppoimentList($data){
        try {

            $response = $this->client->request(
                'GET',
                '/get-schedule-appoiment-list'
            );


            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
    }

    public function cancelAppoimentList($data){
        try {

            $response = $this->client->request(
                'GET',
                '/get-cancel-appoiment-list'
            );


            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
    }

    public function changePatientStatus($data){
        try {

            $response = $this->client->request(
                'POST',
                '/change-patient-status',
                [
                    'json'=>$data
                ]
            );


            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){

        }
    }

    public function cancelAppointmentStatus($data){
        try {

            $response = $this->client->request(
                'POST',
                '/appointment/cancel-appointment',
                [
                    'json'=>$data
                ]
            );


            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){

        }
    }

    public function sendVideoMeetingNotification($appointment_id){
        try {

            $response = $this->client->request(
                'POST',
                '/send-video-meeting-notification',
                [
                    'json'=>array('appointment_id'=>$appointment_id)
                ]
            );
            $response = $response->getBody()->getContents();
            \Log::info($response);
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){
            \Log::info($exception->getMessage());
        }
    }

    public function startVideoMeetingNotification($patient_request_id){
        try {

            $response = $this->client->request(
                'POST',
                '/start-video-meeting-notification',
                [
                    'json'=>array('patient_request_id'=>$patient_request_id)
                ]
            );
            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){

        }
    }

    public function leaveVideoMetting($appointment_id){
        try {

            $response = $this->client->request(
                'POST',
                '/leave-video-meeting',
                [
                    'json'=>array('appointment_id'=>$appointment_id)
                ]
            );
            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){

        }
    }

    public function patientRequest($data){
        try {

            $response = $this->client->request(
                'POST',
                '/patient-request',
                [
                    'json'=>$data
                ]
            );
            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){

        }
    }
}
