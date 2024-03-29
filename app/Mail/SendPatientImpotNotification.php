<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPatientImpotNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->details['type'] . ' import successfully.';
        if(isset($this->details['action']) && $this->details['action'] === 'CurrentCaregiverCheck') {
            $subject = 'Get current caregiver successfully.';
        }
        return $this->subject($subject)
            ->view('emails.patient_import');
    }
}
