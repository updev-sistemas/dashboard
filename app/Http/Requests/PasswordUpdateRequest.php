<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PasswordUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required',
            'new_password' => 'required|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Informe sua senha atual.',
            'new_password.required' => 'Informe a nova senha.',
            'new_password.confirmed' => 'Confirmação de senha inválida.'
        ];
    }
}
