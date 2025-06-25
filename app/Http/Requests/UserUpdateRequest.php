<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'ime' =>['required','string', 'max:255'],
            'prezime' =>['required','string', 'max:255'],
            'broj_telefona' =>['required','string', 'size:10', 'regex:/^\d+$/', Rule::unique('users')->ignore($this->user->id)],
            'username' =>['required','string', 'max:255', Rule::unique('users')->ignore($this->user->id)],
            'password' => ['nullable','string', 'min:8', 'confirmed'],
            'old_password' =>['nullable','string'],
        ];
    }
    public function messages()
    {
        return[
                'ime.required' => 'Ime je obavezno polje',
                'prezime.required' => 'Prezime je obavezno polje',
                'username.required' => 'Username je obavezno polje',
                'broj_telefona.required' => 'Broj telefona je obavezno polje',
                'username.unique' => 'Username je zauzet',
                'password.min' => 'Lozinka mora imati minimun 8 karaktera',
                'password.confirmed' => 'Lozinke se ne poklapaju',
                'broj_telefona.size' => 'Broj telefona mora imati tačno 10 cifara',
                'broj_telefona.unique' => 'Broj telefona vec postoji',
                'broj_telefona.regex' => 'Broj telefona mora imati samo cifre',
        ];
    }
}
