<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnterpriseCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && auth()->user()->isAdministratorUser();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cnpj' => 'required|min:11|max:14|unique:enterprises,cnpj',
            'razao_social' => 'required|min:2|max:200',
            'fantasia' => 'required|min:2|max:200',
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'cnpj.required' => 'Informe o documento',
            'cnpj.min' => 'Documento deve ter no mínimo 11 caracteres',
            'cnpj.max' => 'Documento deve ter no máximo 14 caracteres',
            'cnpj.unique' => 'Esse documento já está registrado',
            'razao_social.required' => 'Informe a Razão Social',
            'razao_social.min' => 'Nome Razão Social deve ter no mínimo 2 caracteres',
            'razao_social.max' => 'Nome Fantasia deve ter no máximo 200 caracteres',
            'fantasia.required' => 'Informe o nome Fantasia',
            'fantasia.min' => 'Nome Fantasia deve ter no mínimo 2 caracteres',
            'fantasia.max' => 'Nome Fantasia deve ter no máximo 200 caracteres',
            'email.required' => 'Informe o email',
            'email.email' => 'Email inválido'
        ];
    }
}
