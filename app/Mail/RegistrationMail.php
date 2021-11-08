<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(object $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.registration')
            ->with([
                'name' => $this->user->name,
                'email' => $this->user->email??"-",
                'company_name' => $this->user->profile->company_name??"-",
                'first_name' => $this->user->profile->first_name??"-",
                'second_name' => $this->user->profile->second_name??"-",
                'type' => $this->user->profile->type??"-",
                'telephone_number_1' => $this->user->profile->telephone_number_1??"-",
                'telephone_number_2' => $this->user->profile->telephone_number_2??"-",
                'country' => $this->user->profile->country??"-",
                'city' => $this->user->profile->city??"-",
                'region' => $this->user->profile->region??"-",
                'postal' => $this->user->profile->postal??"-",
            ]);
    }
}
