<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoRequest extends FormRequest
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
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:4096'],
            'description' => ['nullable', 'max:1000']
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Pole :attribute jest wymagane',
            'image' => 'Dozwolone formaty: jpg, jpeg, png, bmp, gif, svg lub webp',
            'mimes' => 'Wymagane formaty obrazu to jpeg, png, jpg, gif, svg',
            'image.max' => 'Maksymalny rozmiar obrazu to :max kB',
            'description.max' => 'Pole :attribute może zmieścić maksymalnie :max znaków'
        ];
    }

    public function attributes(): array
    {
        return [
            'image' => 'zdjęcie',
            'description' => 'opis'
        ];
    }
}
