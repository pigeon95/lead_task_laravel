<?php

namespace Products\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:10|max:1000',
            'prices' => 'required|regex:/((([0-9]{1,5}[.])?[0-9]{1,5}[,])*([0-9]{1,5}[.])?[0-9]{1,5})/'
        ];

        return $rules;
    }
}
