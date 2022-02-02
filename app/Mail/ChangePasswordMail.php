<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChangePasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $new_password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( String $new_password)
    {

        $this->new_password = $new_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.change-password')
            ->with([
                'new_password' => $this->new_password,
            ]);
    }
}
