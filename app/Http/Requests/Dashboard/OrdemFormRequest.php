<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class OrdemFormRequest extends FormRequest
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
            'code' => 'unique:ordens',
            'admin_id' => 'required',
            'clinic_id' => 'required',
            'problema' => 'required|min:10|max:300',
            'solucao' => 'required|min:10|max:300',
            'avaliacao' => 'required|min:10|max:300',
            'feedback' => 'required|min:10|max:300',
            'type' => 'required|min:3|max:10'
        ];
    }

    public function messages()
    {
        return  [
            'code.unique' => 'Codigo já existente',
            'admin_id.required' => 'Campo obrigatório!',
            'clinic_id.required' => 'Campo obrigatório!',
            'problema.required' => 'Campo obrigatório',
            'problema.min' => 'Deve conter mais de 3 caracteres',
            'problema.max' => 'Deve conter mais de 300 caracteres',
            'solucao.required' => 'Campo obrigatório',
            'solucao.min' => 'Deve conter mais de 3 caracteres',
            'solucao.max' => 'Deve conter mais de 300 caracteres',
            'type.required' => 'Campo obrigatório',
            'type.min' => 'Deve conter mais de 3 caracteres',
            'type.max' => 'Deve conter menos de 10 caracteres'
        ];
    }
}
