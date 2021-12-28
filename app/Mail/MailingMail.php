<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MailingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $title;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $message)
    {
        $this->message = $message;
        $this->title  = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $tmp = [
            "message"=>"test",
            "title"=>"test",
        ];


        return $this->view('emails.mailing')->with($tmp);
    }
}
