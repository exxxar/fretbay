<?php

namespace App\Mail;

use App\User;
use Carbon\Carbon;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateListingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $listing;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(object $listing)
    {
        $this->listing = $listing;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->view('emails.create-listing')
            ->with([
                'title'=>$this->listing->title??'',
                'articles'=>json_decode($this->listing->articles??[]),
                'place_of_loading'=>json_decode($this->listing->place_of_loading??[]),
                'place_of_delivery'=>json_decode($this->listing->place_of_delivery??[]),
                'shipping_date_from'=>$this->listing->shipping_date_from??'',
                'shipping_date_to'=>$this->listing->shipping_date_to??'',
                'volume_items'=>json_decode($this->listing->volume_items??[]),
                'unshipping_date_from'=>$this->listing->unshipping_date_from??'',
                'unshipping_date_to'=>$this->listing->unshipping_date_to??'',
                'additional_info'=>$this->listing->additional_info??'',
                'images'=>json_decode($this->listing->images??[]),
                'status'=>$this->listing->status??'',
                'expiration_date'=>$this->listing->expiration_date??'',
                'user_id'=>$this->listing->user_id??'',
                'category_id'=>$this->listing->category_id??'',
                'subcategory_id'=>$this->listing->thing_id??'',
                'thing_id'=>$this->listing->thing_id??'',
                'summary_volume'=>$this->listing->summary_volume??0,
                'moving_package'=>$this->listing->moving_package??'',
                'distance'=>$this->listing->distance??0,
                'is_active'=>$this->listing->is_active??true,
            ]);
    }
}
