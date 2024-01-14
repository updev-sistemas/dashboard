<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileUpdateRequest extends FormRequest
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
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:users,email,'.Auth::id()
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Informe seu nome',
            'name' => 'Seu nome deve ter no míniimo 2 caracteres',
            'name.max' => 'Seu nome deve ter no máximo 255 caracteres',
            'email.required' => 'Informe um email válido',
            'email.email' => 'E-Mail inválido',
            'email.unique' => 'E-Mail bloqueado'
        ];
    }
}
