<?php

namespace App\Mail;

use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class NewMessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {

        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $sender = User::find($this->message->sender_id);

        return $this->view('emails.new-message')
            ->with([
                'id' => $this->message->id ?? "",
                'listing_id' => $this->message->listing_id ?? "",
                'sender'=>$sender,
                'sender_id' => $this->message->sender_id ?? "",
                'recipient_id' => $this->message->recipient_id ?? "",
                'text' => $this->message->message ?? "",
                'created_at' => $this->message->created_at ?? Carbon::now(),
            ]);
    }
}
