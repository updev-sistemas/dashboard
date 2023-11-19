<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserCreateRequest extends FormRequest
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
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Informe o nome do usuário',
            'name.max' => 'Nome deve ter no máximo 50 caracteres',
            'email.required' => 'Informe o Email',
            'email.email' => 'Email inválido',
            'email.unique' => 'Esse email já está em uso no sistema.'
        ];
    }
}
