<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */



    public  function  messages()
    {
        return [
            'email.exists' => 'El correo ingresado no existe en nuestro sistema.',
        ];
    }

    public function rules(): array
    {
        return [

            'email' => ['required', 'email','exists:users,email'],
            'password' => ['required', 'min:8'],

        ];
    }
}
