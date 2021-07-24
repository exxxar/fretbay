<?php

namespace App;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = [
        'listing_id',
        'sender_id',
        'message'
    ];

    public function listing(){
        return $this->hasOne(Listing::class,"id","listing_id");
    }

    public function sender(){
        return $this->hasOne(User::class,"id","sender_id");
    }

    public function getOwnerIdAttribute(){
        return $this->listing()->user_id;
    }

}
