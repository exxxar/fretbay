<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "title",//Название заказа
        "description",//Описание заказа
        "price",//Сумма заказа
        "status",

        "listing_id",

        "user_id",

        "transporter_id",
    ];

    protected $casts = [
        "price" => "double"
    ];


    public function review(){
        return $this->hasOne(Review::class, "order_id","id");
    }

    public function user()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function listing()
    {
        return $this->hasOne(Listing::class, "id", "listing_id");
    }

    public function transporter()
    {
        return $this->hasOne(User::class, "id", "transporter_id");
    }
}
