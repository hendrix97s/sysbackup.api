<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AdminFormRequest extends FormRequest
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
            'name' => 'required|max:3|min:100',
            'email' => 'unique:email|required|max:3|min:100'
        ];
    }

    public function messages()
    {
        return [
            'name.reqired' => 'Campo obrigatório!',
            'name.min' => 'Deve conter mais de 3 caracteres',
            'name.max' => 'Deve conter mais de 100 caracteres',

            'email.required' => 'Preenchimento obrigatório',
            'email.unique' => 'Esse e-mail já existe!',
            'email.min' => 'Deve conter mais de 3 caracteres',
            'email.max' => 'Deve conter menos de 100 caracteres'
        ];
    }
}
