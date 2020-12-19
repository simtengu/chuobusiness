<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Signup extends FormRequest
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
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'whatsapp_phone' => 'required|min:10|unique:users',
            'email' => 'required|email|unique:users',
            'university_id' => 'required',
            'password' => 'required|min:4'
        ];

    }
}
