<?php

namespace App\Http\Controllers\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập password'
        ];
    }
}
