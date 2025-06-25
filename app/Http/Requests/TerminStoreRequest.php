<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TerminStoreRequest extends FormRequest
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
            'datum' =>['required', 'date', 'after_or_equal:today'],
            'vreme' =>['required', 'date_format:H:i:s'],
            'frizer_id' =>['required', 'exists:users,id'],
            'usluge' =>['required', 'array', 'min:1'],
            'usluge.*' =>['exists:uslugas,id'],
        ];
       
    }
    public function messages()
    {
        return[
            'datum.required' => 'Datum je obavezno polje!',
            'datum.after_or_equal' => 'Datum ne može biti u prošlosti!',
            'vreme.required' => 'Vreme je obavezno polje!',
            'vreme.date_format' => 'Vreme mora biti u formatu HH:MM!',
            'frizer_id.required' => 'Frizer je obavezno polje!',
            'frizer_id.exists' => 'Frizer ne postoji!',
            'usluge.required' => 'Usluge su obavezno polje!',
            'usluge.*.exists' => 'Usluga ne postoji!',
        ];
    }
}
