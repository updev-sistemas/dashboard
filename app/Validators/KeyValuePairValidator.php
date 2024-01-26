<?php

namespace App\Validators;

class KeyValuePairValidator
{
    public static function rules()
    {
        return [
            "descricao" => "required",
            "valor" => "required|numeric",
        ];
    }

    public static function messages()
    {
        return [
            "descricao.required" => "Descrição foi omitida.",
            "valor.required" => "Valor foi omitido.",
            "valor.numeric" => "Valor não tinha um valor válido.",
        ];
    }
}
