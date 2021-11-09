<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuccessPayedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($payment)
    {
        $this->payment = $payment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.success-payed')
            ->with([

                "title" => $this->payment->title ?? "",
                "description" => $this->payment->description ?? "",
                "user_id" => $this->payment->user_id ?? null,
                "listing_id" => $this->payment->listing_id ?? null,
                "order_id" => $this->payment->order_id ?? null,
                "quote_id" => $this->payment->quote_id ?? null,
                "success" => $this->payment->success ?? false,
                "amount" => $this->payment->amount ?? 0,
                "tax_amount" => $this->payment->tax_amount ?? 0,
                "currency" => $this->payment->currency ?? "",
                "source" => $this->payment->source ?? "",
                "type" => $this->payment->type ?? "",
            ]);
    }
}
