<?php

namespace App\Validators;

class CaixasAbertosValidator
{
    public static function rules()
    {
        return [
            "cartao" => "required|numeric",
            "cashback" => "required|numeric",
            "cheque" => "required|numeric",
            "credito" => "required|numeric",
            "dataabertura" => "required",
            "digital" => "required|numeric",
            "dinheiro" => "required|numeric",
            "dinheiro1" => "required|numeric",
            "fechamento" => "required|numeric",
            "horaabertura" => "required",
            "id" => "required|numeric",
            "pix" => "required|numeric",
            "saldoatual" => "required|numeric",
            "saldoinicial" => "required|numeric",
            "usuario" => "required",
        ];
    }

    public static function messages()
    {
        return [
            "cartao.required" => "cartao não foi informado.",
            "cashback.required" => "cashback não foi informado.",
            "cheque.required" => "cheque não foi informado.",
            "credito.required" => "credito não foi informado.",
            "dataabertura.required" => "dataabertura não foi informado.",
            "digital.required" => "digital não foi informado.",
            "dinheiro.required" => "dinheiro não foi informado.",
            "dinheiro1.required" => "dinheiro1 não foi informado.",
            "fechamento.required" => "fechamento não foi informado.",
            "id.required" => "id não foi informado.",
            "pix.required" => "pix não foi informado.",
            "saldoatual.required" => "saldoatual não foi informado.",
            "saldoinicial.required" => "saldoinicial não foi informado.",
            "usuario.required" => "usuario não foi informado.",
            "horaabertura.required" => "horaabertura não foi informado.",
            "cartao.numeric" => "cartao não foi informado.",
            "cashback.numeric" => "cashback estava com formato inválido.",
            "cheque.numeric" => "cheque estava com formato inválido.",
            "credito.numeric" => "credito estava com formato inválido.",
            "dataabertura.numeric" => "dataabertura estava com formato inválido.",
            "digital.numeric" => "digital estava com formato inválido.",
            "dinheiro.numeric" => "dinheiro estava com formato inválido.",
            "dinheiro1.numeric" => "dinheiro1 estava com formato inválido.",
            "fechamento.numeric" => "fechamento estava com formato inválido.",
            "horaabertura.numeric" => "horaabertura estava com formato inválido.",
            "id.numeric" => "id estava com formato inválido.",
            "pix.numeric" => "pix estava com formato inválido.",
            "saldoatual.numeric" => "saldoatual estava com formato inválido.",
            "saldoinicial.numeric" => "saldoinicial estava com formato inválido.",
        ];
    }
}
