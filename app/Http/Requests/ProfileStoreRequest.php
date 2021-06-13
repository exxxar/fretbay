<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasRole("admin");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "type"=>"string|max:255",
            "image"=>"string|max:1000",
            "company_name"=>"string",
            "first_name"=>"string",
            "second_name"=>"string",
            "telephone_number_1"=>"string",
            "telephone_number_2"=>"string",
            "country"=>"string",
            "city"=>"string",
            "region"=>"string",
            "postal"=>"string",
            "areas_of_expertise"=>"string",

            "transport_specialities" => "nullable",
            "number_of_drivers" => "integer",
            "cargo_insurance_amount" => "integer",
            "is_approved" => "boolean",
            "is_first_activation" => "boolean"
        ];


    }
}
