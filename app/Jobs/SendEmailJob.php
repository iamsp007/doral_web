<?php

namespace App\Jobs;

use App\Mail\WelcomeEmail;
use App\Mail\AcceptedMail;
use App\Mail\SendPatientImpotNotification;
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
      
        Log::info('detail');
        if ($this->mailType === 'AcceptedMail') {
            if(isset($this->detail['type']) && $this->detail['type'] === 'Employee') {
               
                Log::info('msg start');
                $this->sendsmsToMe($this->detail['message'], $this->detail['phone']);
                Log::info('msg end');
            }
            Mail::to($this->email)->send(new AcceptedMail($this->detail));
        } elseif ($this->mailType === 'WelcomeEmail') {
            Mail::to($this->email)->send(new WelcomeEmail($this->detail));
        } elseif ($this->mailType === 'SendPatientImpotNotification') {
            Mail::to($this->email)->send(new SendPatientImpotNotification($this->detail));
        }
    }

    public function sendsmsToMe($message, $phone) {	
        $from = "12089104598";	
        $api_key = "bb78dfeb";	
        $to = $phone;	
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
        curl_setopt($res, CURLOPT_RETURNTRANSFER, TRUE); // don't echo	
        curl_setopt($res, CURLOPT_SSL_VERIFYPEER, FALSE);	
        curl_setopt($res, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);	
        curl_setopt($res, CURLOPT_POSTFIELDS, $fields);	
        $result = curl_exec($res);	
        curl_close($res);	
    }
}
