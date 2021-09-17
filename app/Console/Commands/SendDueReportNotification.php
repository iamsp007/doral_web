<?php

namespace App\Console\Commands;

use App\Mail\DueReportNotification;
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
                } 
            }
        }

        Log::info('Send notification for due report of patients end');
    }
}
