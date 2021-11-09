<?php

namespace App\Mail;

use App\Models\Listing;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderStartMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(object $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $listing = is_null($this->order->listing) ?
            Listing::find($this->order->listing_id) :
            $this->order->listing;

        return $this->view('emails.order-start')
            ->with([
                'order' => $this->order,

                "title" => $this->order->title,
                "description" => $this->order->description,
                "price" => $this->order->price,
                "status" => $this->order->status,

                "listing_id" => $this->order->listing_id,

                "user_id" => $this->order->user_id,

                "transporter_id" => $this->order->transporter_id,

                'articles' => $listing->articles ?? [],
                'place_of_loading' => $listing->place_of_loading,
                'place_of_delivery' => $listing->place_of_delivery,
                'shipping_date_from' => $listing->shipping_date_from,
                'shipping_date_to' => $listing->shipping_date_to,
                'unshipping_date_from' => $listing->unshipping_date_from,
                'unshipping_date_to' => $listing->unshipping_date_to,
                'additional_info' => $listing->additional_info,
                'images' => $listing->images ?? [],
                'expiration_date' => $listing->expiration_date,

                'category_id' => $listing->category_id,
                'subcategory_id' => $listing->subcategory_id,
                'thing_id' => $listing->thing_id,
                'summary_volume' => $listing->summary_volume,
                'moving_package' => $listing->moving_package,
                'distance' => $listing->moving_package,

            ]);
    }
}
