<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|string|exists:users',
            'password' => 'required'
        ];

    }

    public function messages()
    {
        return [
            'email.required' => 'Поле email должно быть заполненым!',
            'email.email' => 'Поле email должно быть корректным!',
            'email.string' => 'Поле email должно содержать только строковые символы!',
            'email.exists' => 'Такого пользователя не существует!',
            'password.required' => 'Поле пароль должно быть заполненым!',
        ];
    }
}
