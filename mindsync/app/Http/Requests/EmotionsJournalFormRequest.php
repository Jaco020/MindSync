<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmotionsJournalFormRequest extends FormRequest
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
            'dateIn' => 'required|date|before_or_equal:today',
            'moodIn' => 'required|integer|between:1,5',
            'journalText' => 'required|string|max:5000',
        ];
    }

    public function messages(): array
    {
        return [
            'dateIn.required' => 'Data jest wymagana.',
            'dateIn.date' => 'Data musi być poprawnym formatem daty.',
            'dateIn.before_or_equal' => 'Data nie może być w przyszłości.',
            'moodIn.required' => 'Poziom nastroju jest wymagany.',
            'moodIn.integer' => 'Poziom nastroju musi być liczbą całkowitą.',
            'moodIn.between' => 'Poziom nastroju musi być w zakresie od 1 do 5.',
            'journalText.required' => 'Treść wpsiu jest wymagana.',
            'journalText.string' => 'Treść wpisu musi być tekstem.',
            'journalText.max' => 'Treść wpisu nie może przekraczać 5000 znaków.',
        ];
    }
}
