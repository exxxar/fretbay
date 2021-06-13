<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CategoryUpdateRequest extends FormRequest
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
            'title'=>"required|string",
            'min_price'=>"required|double",
            'image'=>"required|string",
            'position'=>"required|integer",
            'is_active'=>"required",
            'additional_menu_title'=>"nullable",
            'mode'=>"required|string",
        ];
    }
}
