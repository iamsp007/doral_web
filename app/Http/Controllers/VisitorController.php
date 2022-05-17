<?php

namespace App\Http\Controllers;

use App\Jobs\VisitorImport;
use App\Models\Visitor;
use Exception;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        try {
            // $company='';
            // if(Auth::guard('referral')) {
            //     $company = Auth::guard('referral')->user();
            // } 
            VisitorImport::dispatch();
            //->timezone('America/New_York')->everyFiveMinutes()

            $arr = array('status' => 200, 'message' => 'Please be patient, the import visitor process is taking place in the background. You will receive mail after the all visitor imported successfully.', 'data' => []);
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
