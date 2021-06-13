<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{


    protected $fillable = [
        "brand",
        "model",
        "plate_number",
        "total_laden_weight",
        "cubing",
        "profile_id"
    ];

    protected $casts = [
        "total_laden_weight" => "integer",
        "cubing" => "integer",
    ];
}
