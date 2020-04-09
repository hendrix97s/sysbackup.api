<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class BackupFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'  => 'required|min:3|max:300',
            'size'  => 'required|min:3|max:100',
            'user_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é de preenchimento obrigatório',
            'name.min' => 'Quantidade minima de caracteres: 3',
            'name.max' => 'Quantidade maxima de caracteres: 300',
            'size.required' => 'O campo size deve ser preenchido',
            'size.min' => 'Quantidade minima de caracteres: 3',
            'size.max' => 'Quantidade maxima de caracteres: 100',
            'user_id.required' => 'o campo user_id deve ser preenchido'
        ];
    }
}
