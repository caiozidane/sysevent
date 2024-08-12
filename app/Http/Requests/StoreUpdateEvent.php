<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEvent extends FormRequest
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
            'title' => 'required|min:2|max:200',
            'country_address' => 'required|min:5|max:160',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O título do evento é obrigatório',
            'title.min' => 'O título deve possuir mais de 2 caracteres',
            'title.max' => 'O título deve possuir menos de 200 caracteres',
            'country_address.required' => 'O endereço do evento é obrigatório',
            'country_address.min' => 'O endereço deve possuir mais de 5 caracteres',
            'country_address.max' => 'O endereço deve possuir menos de 160 caracteres',
        ];
    }
}
