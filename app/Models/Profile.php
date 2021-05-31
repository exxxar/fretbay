<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        "company_name",
        "type",
        "first_name",
        "second_name",
        "telephone_number_1",
        "telephone_number_2",
        "country",
        "city",
        "region",
        "postal",
        "areas_of_expertise",
    ];
}
