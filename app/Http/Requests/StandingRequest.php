<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StandingRequest extends FormRequest
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
            'url' => ['required', 'url', 'active_url', 'max:200']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Pole :attribute jest wymagane',
            'url' => 'Pole :attribute musi być adresem URL',
            'active_url' => 'Pole :attribute musi być aktywnym adresem URL',
            'max' => 'Pole :attribute może zawierać maksymalnie :max znaków'
        ];
    }

    public function attributes()
    {
        return ['url' => 'URL'];
    }
}
