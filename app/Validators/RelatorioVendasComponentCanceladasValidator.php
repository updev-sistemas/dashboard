<?php

namespace App\Validators;

class RelatorioVendasComponentCanceladasValidator{
    public static function rules()
    {
        return [
            "valorVendas" => 'required|numeric',
            "lucrosPerdidos" => 'required|numeric',
            "QuantidadeProdutosPerdidos" => 'required|numeric',
            "QuantidadeVendasPerdidas" => 'required|numeric',
        ];
    }

    public static function messages()
    {
        return [
            "valorVendas.required" => 'LurosPerdidos não foi preenchido.',
            "valorVendas.numeric" => 'LurosPerdidos não estava com formato válido.',
            "lucrosPerdidos.required" => 'LurosPerdidos não foi preenchido.',
            "lucrosPerdidos.numeric" => 'LurosPerdidos não estava com formato válido.',
            "QuantidadeProdutosPerdidos.required" => 'QuantidadeVendasPerdidas não foi preenchido.',
            "QuantidadeProdutosPerdidos.numeric" => 'QuantidadeVendasPerdidas não estava com formato válido.',
            "QuantidadeVendasPerdidas.required" => 'QuantidadeVendasPerdidas não foi preenchido.',
            "QuantidadeVendasPerdidas.numeric" => 'QuantidadeVendasPerdidas não estava com formato válido.',
        ];
    }
}
