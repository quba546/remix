<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SimplePlayerRequest extends FormRequest
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
            'playerId' => ['integer', 'min:0'],
            'playedMatches' => ['integer', 'min:0'],
        ];
    }

    public function messages()
    {
        return [
            'integer' => 'Pole :attribute może zawierać tylko liczby całkowite',
            'min' => 'Minimalna liczba to :min',
        ];
    }

    public function attributes()
    {
        return [
            'playerId' => 'ID zawodnika',
            'playedMatches' => 'rozegrane mecze',
        ];
    }
}
