<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class PasswordChangeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'current_password' => ['required', 'string', function ($attribute, $value, $fail) {
                if (!Hash::check($value, $this->user()->password)) {
                    $fail('Podane hasło jest nieprawidłowe.');
                }
            }],
            'password' => ['required', 'string', 'min:6', 'max:255', 'confirmed'],
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Stare hasło jest wymagane.',
            'password.required' => 'Nowe hasło jest wymagane.',
            'password.min' => 'Nowe hasło musi mieć co najmniej 8 znaków.',
            'password.confirmed' => 'Hasła nie są identyczne!',
        ];
    }
}