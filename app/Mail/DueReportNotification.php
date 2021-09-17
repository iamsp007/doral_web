<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DueReportNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $detail = '';
    public $full_name = '';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($detail, $full_name)
    {
        $this->detail = $detail;
        $this->full_name = $full_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Patient Due Report Details')->view('emails.due_report_notification');
    }
}
