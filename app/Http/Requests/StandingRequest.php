<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StandingRequest extends FormRequest
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
            'url' => ['required', 'url', 'active_url', 'max:200'],
            'numberOfPromotionTeams' => ['required', 'integer', 'min:1', 'max:10'],
            'numberOfRelegationTeams' => ['required', 'integer', 'min:0', 'max:10'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Pole :attribute jest wymagane',
            'url' => 'Pole :attribute musi być adresem URL',
            'active_url' => 'Pole :attribute musi być aktywnym adresem URL',
            'size' => 'Pole :attribute może zawierać maksymalnie :max znaków',
            'min' => 'Minimalna liczba to :min',
            'max' => 'Maksymalna liczba to :max',
            'integer' => 'Pole :attribute przyjmuje tylko liczby całkowite'
        ];
    }

    public function attributes(): array
    {
        return [
            'url' => 'URL',
            'numberOfPromotionTeams' => 'liczba drużyn, które awansują z ligi',
            'numberOfRelegationTeams' => 'liczba drużyn, które spadną z ligi'
        ];
    }
}
