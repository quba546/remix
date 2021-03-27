<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LastMatchRequest extends FormRequest
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
            'host' => ['required', 'max:100'],
            'guest' => ['required', 'max:100'],
            'score' => ['required', 'max:10'],
            'match_type_id' => ['required', 'integer', 'min:1'],
            'date' => ['required', 'date'],
            'round' => ['nullable']
        ];
    }

    public function messages(): array
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

    public function attributes(): array
    {
        return [
            'host' => 'gospodarz',
            'guest' => 'gość',
            'score' => 'wynik',
            'match_type_id' => 'rodzaj meczu',
            'date' => 'data',
            'round' => 'runda'
        ];
    }
}
