<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
       "email",
           "company_name",
           "first_name",
           "name",
           "telephone_number",
           "mobile_number",
           "country",
           "city",
           "region",
           "areas_of_expertise",
            "role_id"
    ];
}
