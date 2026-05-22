<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function messages(): array
    {
        return  [
            'name.required' => 'El Nombre es obligatorio',
            'email.required' => 'El Email es obligatorio ',
            'email.email' => 'El Email debe ser una dirección de correo electrónico válida',
            'email.unique' => 'El Email ya está registrado',
            'password.required' => 'La Contraseña es obligatoria',
            'password.confirmed' => 'Las Contraseñas no coinciden',
            'password.min' => 'La Contraseña debe tener al menos :min caracteres',
            'password.mixedCase' => 'La Contraseña debe contener al menos una letra mayúscula y una minúscula',
            'password.numbers' => 'La Contraseña debe contener al menos un número',
            'password.symbols' => 'La Contraseña debe contener al menos un símbolo (¡, @, #, $, etc.)',

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' =>  ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8)->mixedCase()
                    ->numbers()->symbols()->uncompromised()
            ],
        ];
    }
}
