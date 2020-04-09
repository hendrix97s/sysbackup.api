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
            'user_id' => 'required',
            'problema' => 'required|min:10|max:300',
            'solucao' => 'required|min:10|max:300',
            'type' => 'required|min:3|max:10'
        ];
    }

    public function messages()
    {
        return  [
            'user_id.reqired' => 'Preenchimento obrigatório!',
            'user_id.min' => 'Deve conter mais de 3 caracteres',
            'user_id.max' => 'Deve conter mais de 300 caracteres',
            'problema.required' => 'preenchimento obrigatório',
            'problema.min' => 'Deve conter mais de 3 caracteres',
            'problema.max' => 'Deve conter mais de 300 caracteres',
            'solucao.required' => 'Preenchimento obrigatório',
            'solucao.min' => 'Deve conter mais de 3 caracteres',
            'solucao.max' => 'Deve conter mais de 300 caracteres',
            'type.required' => 'Preenchimento obrigatório',
            'type.min' => 'Deve conter mais de 3 caracteres',
            'type.max' => 'Deve conter mais de 10 caracteres'
        ];
    }
}
