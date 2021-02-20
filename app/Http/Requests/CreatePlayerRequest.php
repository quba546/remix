<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePlayerRequest extends FormRequest
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
            'firstName' => ['required', 'alpha', 'max:50'],
            'lastName' => ['required', 'alpha', 'max:50'],
            'position' => ['required', 'in:bramkarz,obrońca,pomocnik,napastnik'],
            'number'=> ['nullable', 'numeric', 'min:1', 'max:99']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Pole :attribute jest wymagane',
            'alpha' => 'Pole :attribute może zawierać tylko litery',
            'max' => 'Pole :attribute może zawierać maksymalnie :max liter',
            'position.in' => 'Pole :attribute może zawierać tylko podane pozycje',
            'number.numeric' => 'Pole :attribute może zawierać tylko liczby',
            'number.min' => 'Minimalny :attribute to :min',
            'number.max' => 'Maksymalny :attribute to :max'
        ];
    }

    public function attributes()
    {
        return [
            'firstName' => 'imię',
            'lastName' => 'nazwisko',
            'position' => 'pozycja',
            'number'=> 'numer'
        ];
    }
}
