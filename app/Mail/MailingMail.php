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

    public $text;
    public $title;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $text)
    {
        $this->text = $text;
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
            "send_message"=>$this->text,
            "send_title"=>$this->title,
        ];


        return $this->view('emails.mailing')->with($tmp);
    }
}
