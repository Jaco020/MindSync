<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MindfulnessFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'exerciseDate' => 'required|date',
            'moodSelect'   => 'required|integer|min:1|max:5',
            'notes'        => 'required|string|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'exerciseDate.required' => 'Data wykonania ćwiczenia jest wymagana.',
            'exerciseDate.date'     => 'Data wykonania ćwiczenia musi być poprawną datą.',
            'moodSelect.required'   => 'Wybór poziomu nastroju jest wymagany.',
            'moodSelect.integer'    => 'Wybór poziomu nastroju musi być liczbą całkowitą.',
            'moodSelect.min'        => 'Wybór poziomu nastroju musi być co najmniej 1.',
            'moodSelect.max'        => 'Wybór poziomu nastroju nie może przekraczać 5.',
            'notes.required'        => 'Przemyślenia są wymagane.',
            'notes.string'          => 'Przemyślenia muszą być tekstem.',
            'notes.max'             => 'Przemyślenia nie mogą przekraczać 1000 znaków.',
        ];
    }
}
