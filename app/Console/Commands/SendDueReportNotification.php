<?php

namespace App\Console\Commands;

use App\Mail\DueReportNotification;
use App\Mail\SendErrorEmail;
use App\Models\PatientLabReport;
use App\Models\User;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendDueReportNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:dueReportNotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification for due report of patients';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('Send notification for due report of patients starts');

        $dateBetween['today'] =  date('Y-m-d');
        
        $date = Carbon::createFromFormat('Y-m-d', $dateBetween['today'])->addMonth();
        $dateBetween['newDate'] = $date->format('Y-m-d');
       
        $patients = User::whereHas('patientLabReport',function ($q) use($dateBetween) {
            $q->where('due_date',$dateBetween['newDate']);
        })->get();
       
        $twomonthdate = Carbon::createFromFormat('Y-m-d', $dateBetween['today'])->addMonth(2);
        $dateBetween['twomonthdate'] = $twomonthdate->format('Y-m-d');
     
        foreach ($patients as $patient) {
           
            $patientList = PatientLabReport::whereBetween('due_date',[$dateBetween['today'],$dateBetween['twomonthdate']])->where('user_id', $patient->id)->with('labReportType')->orderBy('due_date', 'ASC')->get();
           
            if (!$patientList->isEmpty()) {
                if($patient->email) {
                    Mail::to($patient->email)->send(new DueReportNotification($patientList, $patient->full_name));
                } elseif ($patient->phone) {
                    foreach ($patientList as $key => $value) {
                        $labReportType = $value->labReportType->name . ',';
                        $dueDate = $value->due_date . ',';
                        $result = $value->result . ',';
                    }
                    $message = "The report shown below is getting expired. Please renew your medical reports.<br><b>Report Type:</b>" . $labReportType ." <b>Due Date:</b>" . $dueDate . "<b>Result:</b>" .$result;
                   
                    
                    $this->sendsmsToMe($message, setPhone($patient->phone));
                }
            }
        }

        Log::info('Send notification for due report of patients end');
    }

    public function sendsmsToMe($message, $phone) {	
        $to = $phone;
        $from = "12089104598";	
        $api_key = "bb78dfeb";
        $api_secret = "PoZ5ZWbnhEYzP9m4";	
        $uri = 'https://rest.nexmo.com/sms/json';	
        $text = $message;	
        $fields = '&from=' . urlencode($from) .	
                '&text=' . urlencode($text) .	
                '&to=+1' . urlencode($to) .	
                '&api_key=' . urlencode($api_key) .	
                '&api_secret=' . urlencode($api_secret);	
        $res = curl_init($uri);	
        curl_setopt($res, CURLOPT_POST, TRUE);	
        curl_setopt($res, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($res, CURLOPT_SSL_VERIFYPEER, FALSE);	
        curl_setopt($res, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);	
        curl_setopt($res, CURLOPT_POSTFIELDS, $fields);	
        curl_exec($res);

        if (curl_errno($res)) {
            $error_msg = curl_error($res);
        }
        curl_close($res);

        if (isset($error_msg)) {
            $details = [
               'message' => $error_msg,
            ];

            Mail::to('shashikant@hcbspro.com')->send(new SendErrorEmail($details));
        }	
    }
}
