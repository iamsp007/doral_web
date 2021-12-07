<?php

namespace App\Jobs;

use App\Mail\WelcomeEmail;
use App\Mail\AcceptedMail;
use App\Mail\SendErrorEmail;
use App\Mail\SendPatientImpotNotification;
use App\Mail\SendReportEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $detail = null;
    public $email = null;
    public $mailType = null;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $detail, $mailType)
    {
        $this->email = $email;
        $this->detail = $detail;
        $this->mailType = $mailType;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->mailType === 'AcceptedMail') {
            if(isset($this->detail['type']) && $this->detail['type'] === 'sendsms') {
                sendsmsToMe($this->detail['message'], $this->detail['phone']);
            }
            Mail::to($this->email)->send(new AcceptedMail($this->detail));
        } elseif ($this->mailType === 'WelcomeEmail') {
            Mail::to($this->email)->send(new WelcomeEmail($this->detail));
        } elseif ($this->mailType === 'SendPatientImpotNotification') {
            Mail::to($this->email)->send(new SendPatientImpotNotification($this->detail));
        } elseif ($this->mailType === 'sendSms') { 
            sendsmsToMe($this->detail['message'], $this->detail['phone']);
        } elseif ($this->mailType === 'SendReportEmail') { 
            Mail::to($this->email)->send(new SendReportEmail($this->detail));
        }
    }
}
