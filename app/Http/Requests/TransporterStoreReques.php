<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransporterStoreReques extends FormRequest
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
            'name' => ['required', 'string', 'min:2', 'max:256'],
            'email' => ['required','unique:post', 'email'],
          'company_name'=>['required','string','min:2','max:256'],
          'first_name'=>['required','string','min:2', 'max:256'],
          'telephone_number'=> ['required','numeric','min:11'],
          'mobile_number'=>['required','unique:posts','min:11'],
          'country'=>['required','string','min:2','max:256'],
          'city'=>['required','string','min:2','max:256'],
          'region'=>['required','string','min:2','max:256'],
          'areas_of_expertise'=>['required','string','min:2','max:256'],

        ];
    }
}
