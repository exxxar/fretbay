<?php

namespace App\Models;

use App\Models\Listing;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //

    protected $fillable = [
      'listing_id',
      'user_id',
    ];

    public function listing(){
        return $this->hasOne(Listing::class,"id","listing_id");
    }

    public function user(){
        return $this->hasOne(User::class,"id","user_id");
    }
}
