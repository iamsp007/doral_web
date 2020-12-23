<?php

namespace App\Http\Controllers\Coordinator;

use App\Http\Controllers\Controller;
use App\Services\AdminService;
use Illuminate\Http\Request;

class CoordinatorController extends Controller
{
    protected $view_path='pages.coordinator.';

    public function __construct(){

    }

    public function index(){
        return view($this->view_path.'dashboard');
    }

    public function patientListShow(){
        return view($this->view_path.'patient');
    }
    public function newPatientListShow(){
        return view($this->view_path.'new_patient_list');
    }

    public function getPatientList(){
        $adminServices = new AdminService();
        $response = $adminServices->getAppointment();

        $data=array();
        if ($response != null && $response['status']===true){
            $data=$response['data'];
            return response()->json($data,200);
        }

        return response()->json($data,422);
    }
    public function getNewPatientList(){
        /*$adminServices = new AdminService();
        $response = $adminServices->getNewPatientListForAppointment();
        $data=array();
        if ($response != null && $response['status']===true){
            $data=$response['data'];
            return response()->json($data,200);
        }*/

        
            
        $data= array(
            array(
                    `id` => 1, 
                    `first_name` => 'test 2' , 
                    `last_name` => 'test', 
                    `gender` => 'male', 
                    `address1` => '', 
                    `address2` => '' , 
                    `zip` => '' , 
                    `phone` => '1234567899', 
                    `email` => 'test@test.com' , 
                    `dob` =>  '2020-12-23', 
                    `ssn` => '', 
                    `place_of_examination`  => '', 
                    `date_of_examination`  => '', 
                    `condition_state`  => 'test', 
                    `cin_no` => 'test',
                    `service_key` => 'test',
                    `medicaid_number` => '',
                    `medicare_number` => '', 
                    `user_id` => 1,
                    `emg_first_name` => '',
                    `emg_last_name`=> '',
                    `emg_address1` => '',
                    `emg_address2` => '', 
                    `emg_zip` => '',
                    `emg_phone` => '',
                    `emg_email` => '',
                    `status` => 'active',
                    `created_at` => '', 
                    `updated_at`  => '',
                )
        );
        return response()->json($data,200);

        //return response()->json($data,422);
    }
}
