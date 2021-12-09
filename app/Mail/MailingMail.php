<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

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
    public function __construct(string $title,string $message)
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
        return $this->view('emails.mailing')->with([
            "message"=>$this->message,
            "title"=>$this->title,
        ]);
    }
}
