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
            'path'  => 'required|min:50|max:180',
            'hour_backup'  => 'required',
            'clinic_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo obrigatório',
            'name.min' => 'Deve conter mais de 3 caracteres',
            'name.max' => 'Deve conter menos de 300 caracteres',

            'size.required' => 'Campo obrigatório',
            'size.min' => 'Deve conter mais de 3 caracters',
            'size.max' => 'Deve conter menos de 100 caracateres',

            'path.required' => 'Campo obrigatório',
            'path.min' => 'Deve conter mais de 50 caracteres',
            'path.max' => 'Deve conter menos de 180 caracteres',

            'hour_backup.required' => 'Campo obrigatório',
            'clinic_id.required' => 'Campo obrigatório',
        ];
    }
}
