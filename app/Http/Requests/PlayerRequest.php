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
            'firstName' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:50'],
            'lastName' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:50'],
            'position' => ['required', 'in:bramkarz,obrońca,pomocnik,napastnik'],
            'number' => ['nullable', 'integer', 'min:1', 'max:99'],
            'playedMatches' => ['integer', 'min:0'],
            'goals' => ['integer', 'min:0'],
            'assists' => ['integer', 'min:0'],
            'cleanSheets' => ['integer', 'min:0'],
            'yellowCards' => ['integer', 'min:0'],
            'redCards' => ['integer', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:4096', function ($attribute, $value, $fails) {
                $size = getimagesize($value->path());
                $width = $size[0];
                $height = $size[1];

                if ($width > $height) {
                    $fails('Zdjęcie musi być w trybie portretowym (wysokość zdjęcia musi być większa bądź równa szerokości)');
                }
            }]
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
            'number.max' => 'Maksymalna liczba to :max',
            'image' => 'Dozwolone formaty: jpg, jpeg, png, bmp, gif, svg lub webp',
            'mimes' => 'Wymagane formaty obrazu to jpeg, png, jpg, gif, svg',
            'image.max' => 'Maksymalny rozmiar obrazu to :max kB'
        ];
    }

    public function attributes(): array
    {
        return [
            'firstName' => 'imię',
            'lastName' => 'nazwisko',
            'position' => 'pozycja',
            'number' => 'numer',
            'playedMatches' => 'rozegrane mecze',
            'goals' => 'bramki',
            'assists' => 'asysty',
            'cleanSheets' => 'czyste konta',
            'yellowCards' => 'żółte kartki',
            'redCards' => 'czerwone kartki',
            'image' => 'zdjęcie'
        ];
    }
}
