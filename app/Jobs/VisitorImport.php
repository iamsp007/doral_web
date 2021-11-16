<?php

namespace App\Jobs;

use App\Mail\SendPatientImpotNotification;
use App\Models\Visitor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class VisitorImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $date = Carbon::now();// will get you the current date, time
        $today = $date->format("Y-m-d");
        $input['from_date'] = $today;
        $input['to_date'] = $today;
        $searchPatientIds = searchVisits($input);

        $visitIDs = $searchPatientIds['soapBody']['SearchVisitsResponse']['SearchVisitsResult']['Visits']['VisitID'];

        log::info('hha exchange search visitor detail start');
        log::info('total hha count'.count($visitIDs));

        //  $missing_visitor_id = [];
        //  $visitors = VisitorDetail::get();
        //  foreach ($visitors as $visitor) { 
        //      $missing_visitor_id[] = $visitor->visitor_id;
        //  }
        $data = [];
         $stored_visit_id = [];
         foreach ($visitIDs as $visitID) {
             $scheduleInfo = getVisitInfo($visitID);
             
             $getVisitorInfo = $scheduleInfo['soapBody']['GetVisitInfoResponse']['GetVisitInfoResult']['VisitInfo'];

             $data[] = $visitID;
             $visit_id = self::storeVisitor($getVisitorInfo);

             $stored_visit_id[] = $visit_id;
         }
         log::info('stored visit id'.count($stored_visit_id));
         log::info('missing visit count'.count($data));
         log::info('hha exchange search visit detail end');

         try {
             $visitor = [
                 'name' => 'HCBS',
                 'total' => count($stored_visit_id),
             ];
             //Mail::to('shashikant@hcbspro.com')->send(new SendPatientImpotNotification($visitor));
         }catch (\Exception $exception){
             Log::info($exception->getMessage());
         }
    }

    public static function storeVisitor($getVisitorInfo)
    { 
        $visitorDetail = new Visitor();

        $visitorDetail->visitor_id = ($getVisitorInfo['ID']) ? $getVisitorInfo['ID'] : '';
        $visitorDetail->visit_date =  ($getVisitorInfo['VisitDate']) ? $getVisitorInfo['VisitDate'] : '';
        $visitorDetail->patient_id = ($getVisitorInfo['Patient']['ID']) ? $getVisitorInfo['Patient']['ID'] : '';
        $visitorDetail->patient_admission_number = ($getVisitorInfo['Patient']['AdmissionNumber']) ? $getVisitorInfo['Patient']['AdmissionNumber'] : '';
        $visitorDetail->caregiver_id = ($getVisitorInfo['Caregiver']['ID']) ? $getVisitorInfo['Caregiver']['ID'] : '';
        $visitorDetail->caregiver_code = ($getVisitorInfo['Caregiver']['CaregiverCode']) ? $getVisitorInfo['Caregiver']['CaregiverCode'] : '';

     
        $visitorDetail->save();
    }
}