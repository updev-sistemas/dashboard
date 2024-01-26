<?php

namespace App\Validators;

class CadastrosValidator
{
    public static function rules()
    {
        return [
            "produtos" => "required|numeric",
            "clientes" => "required|numeric",
            "usuarios" => "required|numeric",
            "fornecedores" => "required|numeric",
        ];
    }

    public static function messages()
    {
        return [
            "produtos.required" => "Produtos foi omitido.",
            "clientes.required" => "Clientes foi omitido.",
            "usuarios.required" => "Usuáriosfoi omitido.",
            "fornecedores.required" => "Fornecedores foi omitido.",
            "produtos.numeric" => "Produtos não tinha um valor válido.",
            "clientes.numeric" => "Clientes não tinha um valor válido.",
            "usuarios.numeric" => "Usuários não tinha um valor válido.",
            "fornecedores.numeric" => "Fornecedores não tinha um valor válido.",
        ];
    }
}
