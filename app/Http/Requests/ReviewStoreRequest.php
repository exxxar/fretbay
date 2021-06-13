<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => "required|string|max:255",
            'text' => "required|string|max:1000",
            'type' => "required",
            "is_visible" => "required",//флаг модерации
            'user_id' => "required|integer",
            'review_id' => "nullable",
        ];
    }
}
