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

    protected $with = ["listing"];

    protected $appends = ["status"];

    public function getStatusAttribute(){
        $tmp = $this->listing()->first();

        if (is_null($tmp)){
            return false;
        }

        if ($tmp->status == "payed")
            return false;
        return true;
    }
    public function listing(){
        return $this->hasOne(Listing::class,"id","listing_id");
    }

    public function user(){
        return $this->hasOne(User::class,"id","user_id");
    }
}
