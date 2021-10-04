<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'required|email|string|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле имя должно быть заполненым!',
            'name.min' => 'Поле имя должно содержать не меньше :min символов!',
            'email.required' => 'Поле email должно быть заполненым!',
            'email.email' => 'Поле email должно быть корректным!',
            'email.string' => 'Поле email должно содержать только строковые символы!',
            'email.unique' => 'Пользователь с таким email адресом уже зарегестрирован!',
            'password.required' => 'Поле пароль должно быть заполненым!',
            'password.confirmed' => 'Пароли не совпадают!',
            'password_confirmation.required' => 'Поле должно быть заполненым!',

        ];
    }
}
