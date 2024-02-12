<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {
        // Initialization code here if needed
    }

    public function build()
    {
        return $this->from('kikamarinkovska@zohomail.eu') // Set the sender address
            ->subject('Test Email from Laravel') // Set the email subject
            ->view('emails.send'); // Set the email content using a view
    }
}