<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>['required', 'string', 'min:2', 'max:256'],
            'min_price'=>['required', 'integer'],
            'image'=>['required', 'mimes:png,jpg', 'max:5120', 'dimensions:min_width=150,min_height=150'],
          'position'=>['required', 'string', 'min:2', 'max:256'],
           'is_active'=>['required','boolean']

        ];
    }
}
