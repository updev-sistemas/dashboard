<?php

namespace App\Validators;

class TopProdutosValidator
{
    public static function rules()
    {
        return [
            "descricao" => "required",
            "quantidade" => "required|numeric",
        ];
    }

    public static function messages()
    {
        return [
            "descricao.required" => "Produtos foi omitido.",
            "quantidade.required" => "Quantidade foi omitida.",
            "quantidade.numeric" => "Quantidade não tinha um valor válido.",
        ];
    }
}
