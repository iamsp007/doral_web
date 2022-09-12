<?php
namespace App\Services;

use App\BaseClient;

class AdminService
{
    protected $client;

    public function __construct()
    {
        $this->client = new BaseClient(env('API_URL'), env('API_URL'));
    }

    /** Not used function comment code by manisha*/
    // public function getCompanyReferral($type){
    //     try {

    //         $response = $this->client->request(
    //             'GET',
    //             '/auth/company/'.$type
    //         );


    //         $response = $response->getBody()->getContents();
    //         $data = json_decode($response,true);
    //         return $data;
    //     }catch (\Exception $exception){
    //         \Log::info($exception);
    //         throw new \Exception($exception->getMessage());
    //     }
    // }

    /** Not used function comment code by manisha*/
    // public function storeCompany($data){
    //     try {

    //         $response = $this->client->request(
    //             'POST',
    //             '/auth/company/store'
    //         );


    //         $response = $response->getBody()->getContents();

    //         $data = json_decode($response,true);
    //         return $data;
    //     }catch (\Exception $exception){
    //         \Log::info($exception);
    //         throw new \Exception($exception->getMessage());
    //     }
    // }

    /** Not used function comment code by manisha*/
    // public function updatestatus($data) {
    //     try {

    //         $response = $this->client->request(
    //             'POST',
    //             '/auth/company/updatestatus',
    //             [
    //                 'json'=>$data
    //             ]
    //         );


    //         $response = $response->getBody()->getContents();
    //         $data = json_decode($response,true);
    //         return $data;
    //     }catch (\Exception $exception){
    //         \Log::info($exception);
    //         throw new \Exception($exception->getMessage());
    //     }
    // }

    /** Not used function comment code by manisha*/
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
            \Log::info($exception);
            throw new \Exception($exception->getMessage());
        }
    }

    public function updateProfile($data){
        try {

            // $response = $this->client->request(
            //     'POST',
            //     '/auth/company/update/'.$id
            // );
             $response = $this->client->request(
                'POST',
                '/auth/company_referral/update',
                [
                    'json'=>$data
                    //'id'=>$id
                ]
            );
            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){
            \Log::info($exception);
            throw new \Exception($exception->getMessage());
        }
    }

    /** Not used function comment code by manisha*/
    // public function getAppointment(){
    //     try {

    //         $response = $this->client->request(
    //             'GET',
    //             '/auth/appointment'
    //         );


    //         $response = $response->getBody()->getContents();

    //         $data = json_decode($response,true);
    //         return $data;
    //     }catch (\Exception $exception){
    //         \Log::info($exception);
    //         throw new \Exception($exception->getMessage());
    //     }
    // }
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
            \Log::info($exception);
            throw new \Exception($exception->getMessage());
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
            \Log::info($exception);
            throw new \Exception($exception->getMessage());
        }
    }
    public function patientMedicineList($patient_id){
        try {

            $response = $this->client->request(
                'GET',
                '/patient-medicine-list/'.$patient_id
            );


            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){
            \Log::info($exception);
            throw new \Exception($exception->getMessage());
        }
    }

    public function getClinicianList($status_id)
    {
        try {
            $response = $this->client->request(
                'GET',
                '/auth/get-clinician-list/'.$status_id
            );
            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        } catch (\Exception $exception) {
            \Log::info($exception);
        }
    }

    // public function getClinicianData($data)
    // {
    //     try {
    //         $response = $this->client->request(
    //             'POST',
    //             '/auth/get-clinician-data',
    //             [
    //                 'json'=>$data
    //             ]
    //         );


    //         $response = $response->getBody()->getContents();
    //         $data = json_decode($response);
    //         return $data;
    //     }catch (\Exception $exception){
    //         \Log::info($exception);
    //         throw new \Exception($exception->getMessage());
    //     }
    // }

    public function saveToken($data){
        try {

            $response = $this->client->request(
                'POST',
                '/auth/save-token',
                [
                    'json'=>$data
                ]
            );


            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){
            \Log::info($exception);
            throw new \Exception($exception->getMessage());
        }
    }
    public function addInsurance($data){
        try {

            $response = $this->client->request(
                'POST',
                '/add-insurance',
                [
                    'json'=>$data
                ]
            );


            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){
            \Log::info($exception);
            throw new \Exception($exception->getMessage());
        }
    }
    public function addMedicine($data){
        try {

            $response = $this->client->request(
                'POST',
                '/add-medicine',
                [
                    'json'=>$data
                ]
            );


            $response = $response->getBody()->getContents();
            $data = json_decode($response);
            return $data;
        }catch (\Exception $exception){
            \Log::info($exception);
            throw new \Exception($exception->getMessage());
        }
    }

    public function insertUpdateServicePayment($data) {
        try {

             $response = $this->client->request(
                'POST',
                '/auth/company/insert-update-service-payment',
                [
                    'json'=>$data
                    ]
                );
                $response = $response->getBody()->getContents();
                $data = json_decode($response);
                return $data;
            } catch (\Exception $exception) {

            \Log::info($exception);
            throw new \Exception($exception->getMessage());
        }
    }
}
