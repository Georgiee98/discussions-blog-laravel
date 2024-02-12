<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $content; // Message or any data i want to include

    public function __construct($email, $content = null)
    {
        $this->email = $email;
        $this->content = $content;
    }

    public function build()
    {
        return $this->from('kikamarinkovska@zohomail.eu')
            ->subject('Thank you for contacting us!')
            ->view('emails.send')
            ->with([
                'content' => $this->content,
            ]);
    }
}