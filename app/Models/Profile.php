<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        "payment_methods",
        "spoken_languages",
        "email_notify",
        "newsletter_notify",
        "push_notify"
    ];

    protected $appends = [
        "address",
//        'legal_documents'
    ];

    protected $casts = [
        "transport_specialities" => "array",
        "number_of_drivers" => "integer",
        "cargo_insurance_amount" => "integer",
        "is_approved" => "boolean",
        "is_first_activation" => "boolean",
        "payment_methods" => "array",
        "spoken_languages" => "array",
    ];

    public function getAddressAttribute()
    {
        return $this->country . ", " . $this->region . ", " . $this->city;
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, "profile_id", "id");
    }

    public function verifications()
    {
        return $this->hasMany(VerificationApplication::class, "profile_id", "id");
    }

    public function documents()
    {
        return $this->hasMany(LegalDocument::class, "profile_id", "id");
    }
//    public function getLegalDocumentsAttribute()
//    {
//        $legal_documents = LegalDocument::where('profile_id', Auth::id())->get();
//        $documents = [];
//        foreach ($legal_documents as $document) {
//            if($document->type == 1) {
//                $documents['legal_document']=$document->document;
//            }
//            if($document->type == 2) {
//                $documents['manager_card']=$document->document;
//            }
//            if($document->type == 3) {
//                $documents['transport_license']=$document->document;
//            }
//            if($document->type == 4) {
//                $documents['certificate_insurance']=$document->document;
//            }
//        }
//        return $documents;
//    }
}
