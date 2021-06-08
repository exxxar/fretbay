<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
            'company_name' => ['required', 'string', 'min:2', 'max:256'],
            'name' => ['required', 'string', 'min:2', 'max:256'],
            'email' => 'required|unique:users|email|required_with:email_confirmation|same:email_confirmation',
            'email_confirmation' =>  ['required', 'email'],
            "telephone_number_1" => ['required','unique:users,phone'],
            "telephone_number_2" => ['required'],
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'type' => ['required']
        ];
    }
}
