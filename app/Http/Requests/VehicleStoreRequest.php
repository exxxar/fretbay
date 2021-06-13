<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class VehicleStoreRequest extends FormRequest
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
            "brand"=>"required|string|max:255",
            "model"=>"required|string|max:255",
            "plate_number"=>"required|string|max:255",
            "total_laden_weight"=>"required|integer|min:0",
            "cubing"=>"required|integer|min:0",
            "profile_id"=>"nullable"
        ];
    }
}
