<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatchRequest extends FormRequest
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
            'host' => ['required', 'max:100'],
            'guest' => ['required', 'max:100'],
            'score' => ['required', 'max:10'],
            'matchType' => ['required', 'integer', 'min:1'],
            'date' => ['required', 'date'],
            'place' => ['required', 'alpha', 'max:50'],
            'round' => ['nullable', 'max:50']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Pole :attribute jest wymagane',
            'max' => 'Pole :attribute może zawierać maksymalnie :max znaków',
            'integer' => 'Pole :attribute może zawierać tylko liczby całkowite',
            'alpha' => 'Pole :attribute może zawierać tylko litery',
            'min' => 'Minimalna wartość to :min',
            'date' => 'Pole :attribute może zawierać tylko datę'
        ];
    }

    public function attributes()
    {
        return [
            'host' => 'gospodarz',
            'guest' => 'gość',
            'score' => 'wynik',
            'matchType' => 'rodzaj meczu',
            'date' => 'data',
            'place' => 'miejsce',
            'round' => 'runda'
        ];
    }
}