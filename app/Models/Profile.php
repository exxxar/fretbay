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
        "image",
        "telephone_number_1",
        "telephone_number_2",
        "country",
        "city",
        "region",
        "postal",
        "areas_of_expertise",
        "transport_specialities",
        "number_of_drivers",
        "cargo_insurance_amount",
        "about_company",
        "additional_service",
        "insurance_company",
        "is_approved",
        "is_first_activation",
    ];

    protected $appends = [
        "address"
    ];

    protected $casts = [
        "transport_specialities" => "array",
        "number_of_drivers" => "integer",
        "cargo_insurance_amount" => "integer",
        "is_approved" => "boolean",
        "is_first_activation" => "boolean"
    ];

    public function getAddressAttribute()
    {
        return $this->country . ", " . $this->city . ", " . $this->region;
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, "profile_id", "id");
    }

    public function verifications()
    {
        return $this->hasMany(VerificationApplication::class, "profile_id", "id");
    }
}
