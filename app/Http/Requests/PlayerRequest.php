<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:50'],
            'last_name' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:50'],
            'position' => ['required', 'in:bramkarz,obrońca,pomocnik,napastnik'],
            'nr' => ['nullable', 'integer', 'min:1', 'max:99'],
            'played_matches' => ['integer', 'min:0'],
            'goals' => ['integer', 'min:0'],
            'assists' => ['integer', 'min:0'],
            'clean_sheets' => ['integer', 'min:0'],
            'yellow_cards' => ['integer', 'min:0'],
            'red_cards' => ['integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Pole :attribute jest wymagane',
            'regex' => 'Pole :attribute może zawierać tylko litery i spacje',
            'max' => 'Pole :attribute może zawierać maksymalnie :max liter',
            'position.in' => 'Pole :attribute może zawierać tylko podane pozycje',
            'integer' => 'Pole :attribute może zawierać tylko liczby całkowite',
            'min' => 'Minimalna liczba to :min',
            'nr.max' => 'Maksymalna liczba to :max',
        ];
    }

    public function attributes(): array
    {
        return [
            'first_name' => 'imię',
            'last_name' => 'nazwisko',
            'position' => 'pozycja',
            'nr' => 'numer',
            'played_matches' => 'rozegrane mecze',
            'goals' => 'bramki',
            'assists' => 'asysty',
            'clean_sheets' => 'czyste konta',
            'yellow_cards' => 'żółte kartki',
            'red_cards' => 'czerwone kartki',
        ];
    }
}
