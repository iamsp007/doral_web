<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\CaregiverImport;
use App\Jobs\PatientImport;
use Exception;
use Illuminate\Http\Request;

class PatientImportController extends Controller
{
    
    public function importPatient()
    {
        try {
            PatientImport::dispatch();

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

    public function importCaregiver()
    {
        try {
            CaregiverImport::dispatch();

            $arr = array('status' => 200, 'message' => 'Patient created successfully.', 'data' => []);
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
