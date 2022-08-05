<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Contents extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
          'name' => 'required',
          'kana' => ['required', 'regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',]

        ];
    }
}
