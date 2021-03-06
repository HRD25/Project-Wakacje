<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
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
            'panstwo' => 'required|max:50',
            'miasto' => 'required|max:50',
            'cena' => 'required|max:6',
            'osoby' => 'required',
            'od' => 'required',
            'do' => 'required',
            'opis' => 'required|min:1',
            'zdjecie' => 'nullable',
        ];
    }
}
