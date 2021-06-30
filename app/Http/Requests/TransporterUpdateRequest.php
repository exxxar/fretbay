<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransporterUpdateRequest extends FormRequest
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
            'username' => ['required', 'string', 'min:2', 'max:256'],
            'email' => 'required|unique:users|email|required_with:email_confirmation|same:email_confirmation',
            'email_confirmation' =>  ['required', 'email'],
            "telephone_number_1" => ['required'],
            "telephone_number_2" => ['required'],
            'company_name' => ['required', 'string', 'min:2', 'max:256'],
            'first_name' => ['required', 'string', 'min:2', 'max:256'],
            "second_name" => ['required', 'string', 'min:2', 'max:256'],
            'country' => ['required', 'string', 'min:2', 'max:256'],
            //'city' => ['required', 'string', 'min:2', 'max:256'],
            'region' => ['required', 'string', 'min:2', 'max:256'],
            'postal' => ['required'],
            'areas_of_expertise' => ['required', 'string', 'min:2', 'max:256'],
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',

        ];
    }
}
