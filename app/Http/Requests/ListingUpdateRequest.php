<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ListingUpdateRequest extends FormRequest
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
            'title'=>"required|string|max:255",
            'articles'=>"required",
            'place_of_loading'=>"required",
            'place_of_delivery'=>"required",
            'shipping_date_from'=>"required",
            'shipping_date_to'=>"required",
            'unshipping_date_from'=>"required",
            'unshipping_date_to'=>"required",
            'messages'=>"nullable",
            'additional_info'=>"nullable",
            'images'=>"nullable",
            'status'=>"nullable",
            'summary_volume'=>"nullable"
        ];
    }
}
