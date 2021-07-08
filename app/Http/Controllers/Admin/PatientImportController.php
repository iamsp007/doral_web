<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\CaregiverImport;
use App\Jobs\PatientImport;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientImportController extends Controller
{
    
    public function importPatient()
    {
        try {
            $company='';
            if(Auth::guard('referral')) {
                $company = Auth::guard('referral')->user();
            } 
            PatientImport::dispatch($company);

            $arr = array('status' => 200, 'message' => 'Please be patient, the import patient process is taking place in the background.', 'data' => []);
            //Please be patient, the import patient process is taking place in the background. You will receive mail after the all patient imported successfully.
        } catch (\Illuminate\Database\QueryException $ex) {
            $message = $ex->getMessage();
            if (isset($ex->errorInfo[2])) {
                $message = $ex->errorInfo[2];
            }
            $arr = array("status" => 400, "message" => $message, "resultdata" => array());
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            if (isset($ex->errorInfo[2])) {
                $message = $ex->errorInfo[2];
            }
            $arr = array("status" => 400, "message" => $message, "resultdata" => array());
        }

        return \Response::json($arr);
    }

    public function importCaregiver()
    {
        try {
            $company_id='';
            if(Auth::guard('referral')) {
                $company_id = Auth::guard('referral')->user();
            } 
            CaregiverImport::dispatch($company_id);

            $arr = array('status' => 200, 'message' => 'Please be patient, the import patient process is taking place in the background.', 'data' => []);
        } catch (\Illuminate\Database\QueryException $ex) {
            $message = $ex->getMessage();
            if (isset($ex->errorInfo[2])) {
                $message = $ex->errorInfo[2];
            }
            $arr = array("status" => 400, "message" => $message, "resultdata" => array());
        } catch (Exception $ex) {
            $message = $ex->getMessage();
            if (isset($ex->errorInfo[2])) {
                $message = $ex->errorInfo[2];
            }
            $arr = array("status" => 400, "message" => $message, "resultdata" => array());
        }

        return \Response::json($arr);
    }
}
