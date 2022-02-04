<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        "is_documents_approved"
//        'legal_documents'
    ];

    protected $hidden = [
        'is_approved'
    ];

    protected $casts = [
        "transport_specialities" => "array",
        "areas_of_expertise" => "array",
        "number_of_drivers" => "integer",
        "cargo_insurance_amount" => "integer",
        "is_approved" => "boolean",
        "is_first_activation" => "boolean",
        "payment_methods" => "array",
        "spoken_languages" => "array",

    ];

    public function getIsDocumentsApprovedAttribute()
    {
        if ($this->is_approved)
            return true;

        $docs = $this->documents()->get();

        if (count($docs) <= 3)
            return false;

        $isApproval = true;

        foreach ($docs as $doc) {
            if (!is_null($doc->document)) {

                $tmp = ($doc->document);

                if (isset($tmp["creation_date"])) {

                    $end = Carbon::parse($tmp["creation_date"])->timestamp;

                    $current = Carbon::now()->timestamp;


                    if ($current > $end) {
                        $doc->is_approved = false;
                        $doc->save();
                    }
                    else {
                        $doc->is_approved = true;
                        $doc->save();
                    }
                }

                if (isset($tmp["expiry_date"])) {

                    $end = Carbon::parse($tmp["expiry_date"])->timestamp;

                    $current = Carbon::now()->timestamp;


                    if ($current > $end) {
                        $doc->is_approved = false;
                        $doc->save();
                    }
                    else {
                        $doc->is_approved = true;
                        $doc->save();
                    }
                }

                if (isset($tmp["end_date"])) {
                    $end = Carbon::parse($tmp["end_date"])->timestamp;

                    $current = Carbon::now()->timestamp;

                    if ($current > $end) {
                        $doc->is_approved = false;
                        $doc->save();
                    }
                    else {
                        $doc->is_approved = true;
                        $doc->save();
                    }
                }
            }

            $isApproval = $isApproval && (boolean)$doc->is_approved;

            $this->is_approved = $isApproval;
            $this->save();

        }


        return $isApproval;


    }

    public function getAddressAttribute()
    {
        try {
            return $this->country['title'] . ", " . $this->region['title'] . ", " . $this->city['title'];
        } catch (\Exception $e) {
            return '';
        }
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, "profile_id", "id");
    }

    public function verifications()
    {
        return $this->hasMany(VerificationApplication::class, "profile_id", "id");
    }

    public function user()
    {
        return $this->hasOne(User::class, "profile_id", "id");
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
