<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimetableRequest extends FormRequest
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
            'round' => ['required', 'integer', 'min:1', 'max:50'],
            'date' => ['required', 'string', 'max:50'],
            'matches' => ['required', 'string', 'max:1000']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Pole :attribute jest wymagane',
            'integer' => 'Pole :attribute może zawierać tylko liczby całkowite',
            'string' => 'Pole :attribute musi być tekstem',
            'min' => 'Minimalna wartość to :min',
            'max' => 'Pole :attribute może zawierać maksymalnie :max znaków'
        ];
    }

    public function attributes()
    {
        return [
            'round' => 'kolejka',
            'date' => 'data',
            'matches' => 'mecze w kolejce'
        ];
    }
}
