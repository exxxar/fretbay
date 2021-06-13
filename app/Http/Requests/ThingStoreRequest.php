<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ThingStoreRequest extends FormRequest
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
            'title'=>'required|string|max:500',
            'volume'=>'required|string|max:500',
            'image'=>'required|string|max:500',
            'position'=>'required|integer',
            'is_active'=>'required',
            'category_id'=>'nullable',
            'subcategory_id'=>'nullable',
        ];
    }
}
