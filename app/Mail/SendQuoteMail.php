<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendQuoteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $quote;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(object $quote)
    {
        $this->quote = $quote;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.send-quote')
            ->with([
                'price' => $this->quote->price ?? "",
                'valid_until_date' => $this->quote->valid_until_date ?? Carbon::now(),
                'additional_info' => $this->quote->additional_info ?? "",
                'type_of_transport' => $this->quote->type_of_transport ?? 0,
                'quote_validity' => $this->quote->quote_validity ?? "",
                'formula' => $this->quote->formula ?? [],
                'status' => $this->quote->status ?? 0,
                'currency' => $this->quote->currency ?? "EUR",
                'listing_id' => $this->quote->listing_id ?? null,
                'user_id' => $this->quote->user_id ?? null
            ]);
    }
}
