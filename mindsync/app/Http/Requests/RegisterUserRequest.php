<?php
    
    namespace App\Http\Requests;
    
    use Illuminate\Foundation\Http\FormRequest;
    
    class RegisterUserRequest extends FormRequest
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
                'name' => ['required', 'string', 'min:6', 'max:255', 'regex:/^[A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]+ [A-ZĄĆĘŁŃÓŚŹŻ][a-ząćęłńóśźż]+$/'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', 'string', 'min:6', 'max:255'],
                'accepted_terms' => ['required'],
            ];
        }
    
        /**
         * Get custom messages for validator errors.
         *
         * @return array<string, string>
         */
        public function messages(): array
        {
            return [
                'name.required' => 'Pole login jest wymagane.',
                'name.min' => 'Login musi zawierać co najmniej :min znaków.',
                'name.max' => 'Login nie może przekraczać :max znaków.',
                'name.regex' => 'Login musi składać się z imienia i nazwiska, zaczynających się wielką literą.',
                'email.required' => 'Adres e-mail jest wymagany.',
                'email.email' => 'Podaj poprawny adres e-mail.',
                'email.max' => 'Adres e-mail nie może przekraczać :max znaków.',
                'email.unique' => 'Ten adres e-mail jest już zajęty.',
                'password.required' => 'Hasło jest wymagane.',
                'password.min' => 'Hasło musi zawierać co najmniej :min znaków.',
                'password.max' => 'Hasło nie może przekraczać :max znaków.',
                'password.confirmed' => 'Hasła nie pasują do siebie.',
                'accepted_terms.required' => 'Musisz zaakceptować regulamin.',
            ];
        }
}
