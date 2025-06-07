<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserDetailsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'phone_number' => ['nullable', 'string', 'max:20'],
            'birth_date' => ['nullable', 'date', 'before:today'],
            'gender' => ['nullable', 'string', 'in:Mężczyzna,Kobieta,Inne'],
            'bio' => ['nullable', 'string', 'max:500'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nazwa jest wymagana.',
            'name.max' => 'Nazwa nie może być dłuższa niż 255 znaków.',
            'email.required' => 'Email jest wymagany.',
            'email.email' => 'Podaj prawidłowy adres email.',
            'email.unique' => 'Ten adres email jest już używany.',
            'phone_number.max' => 'Numer telefonu nie może być dłuższy niż 20 znaków.',
            'birth_date.date' => 'Podaj prawidłową datę urodzenia.',
            'birth_date.before' => 'Data urodzenia musi być wcześniejsza niż dzisiaj.',
            'gender.in' => 'Wybierz prawidłową płeć.',
            'bio.max' => 'Bio nie może być dłuższe niż 500 znaków.',
        ];
    }
}