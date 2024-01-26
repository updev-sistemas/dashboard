<?php

namespace App\Validators;
use Illuminate\Support\Facades\Validator;

class CalendarioValidator
{
    public static function rules()
    {
        return [
            "janeiro" => "required|numeric",
            "fevereiro" => "required|numeric",
            "marco" => "required|numeric",
            "abril" => "required|numeric",
            "maio" => "required|numeric",
            "junho" => "required|numeric",
            "julho" => "required|numeric",
            "agosto" => "required|numeric",
            "setembro" => "required|numeric",
            "outubro" => "required|numeric",
            "novembro" => "required|numeric",
            "dezembro" => "required|numeric",
        ];
    }

    public static function messages()
    {
        return [
            "janeiro.required" => "Mês de janeiro foi omitido.",
            "fevereiro.required" => "Mês de fevereiro foi omitido.",
            "marco.required" => "Mês de marco foi omitido.",
            "abril.required" => "Mês de abril foi omitido.",
            "maio.required" => "Mês de maio foi omitido.",
            "junho.required" => "Mês de junho foi omitido.",
            "julho.required" => "Mês de julho foi omitido.",
            "agosto.required" => "Mês de agosto foi omitido.",
            "setembro.required" => "Mês de setembro foi omitido.",
            "outubro.required" => "Mês de outubro foi omitido.",
            "novembro.required" => "Mês de novembro foi omitido.",
            "dezembro.required" => "Mês de dezembro foi omitido.",
            "janeiro.numeric" => "Mës de janeiro não tinha um valor válido.",
            "fevereiro.numeric" => "Mës de fevereiro não tinha um valor válido.",
            "marco.numeric" => "Mës de marco não tinha um valor válido.",
            "abril.numeric" => "Mës de abril não tinha um valor válido.",
            "maio.numeric" => "Mës de maio não tinha um valor válido.",
            "junho.numeric" => "Mës de junho não tinha um valor válido.",
            "julho.numeric" => "Mës de julho não tinha um valor válido.",
            "agosto.numeric" => "Mës de agosto não tinha um valor válido.",
            "setembro.numeric" => "Mës de setembro não tinha um valor válido.",
            "outubro.numeric" => "Mës de outubro não tinha um valor válido.",
            "novembro.numeric" => "Mës de novembro não tinha um valor válido.",
            "dezembro.numeric" => "Mës de dezembro não tinha um valor válido.",
        ];
    }
}
