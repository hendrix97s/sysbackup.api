<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ClinicFormRequest extends FormRequest
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
            //
            'name' => 'required|max:100|min:3',
            'cnpj' => 'required|max:18|min:18',
            'expert' => 'required|min:5|max:100',
            'email' => 'unique:clinics|required|min:10|max:100',
            'status' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Campo obrigatório!',
            'name.min' => 'Deve conter mais de 3 caracteres',
            'name.max' => 'Deve conter menos de 100 caracteres',

            'cnpj.required' => 'Campo obrigatório!',
            'cpnj.min' => 'Deve conter no minimo 18 caracteres',
            'cpnj.max' => 'Deve conter no máximo 18 caracteres',

            'expert.required' => 'Campo obrigatório!',
            'expert.min' => 'Deve conter mais de 5 caracteres',
            'expert.max' => 'Deve conter menos de 100 caracteres',

            'email.required' => 'Campo obrigatório!',
            'email.unique' => 'Esse email já existe',
            'email.min' => 'Deve conter mais de 10 caracteres',
            'email.max' => 'Deve conter menos de 100 caracteres',
        ];
    }
}
