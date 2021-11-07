<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    public $fillable = [
        "title",
        "description",
        "user_id",
        "listing_id",
        "order_id",
        "quote_id",
        "success",
        "amount",
        "tax_amount",
        "currency",
        "source",
        "type",
    ];

    public $casts = [
        "success"=>"boolean",
        "amount"=>"double",
        "tax_amount"=>"double",
    ];
}
