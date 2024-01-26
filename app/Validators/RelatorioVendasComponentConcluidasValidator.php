<?php

namespace App\Validators;

class RelatorioVendasComponentConcluidasValidator{
    public static function rules()
    {
        return [
            "valorVendas" => "required|numeric",
            "quantidadeVendas" => "required|numeric",
            "totalDescontos" => "required|numeric",
            "totalLucros" => "required|numeric",
            "ticketMedio" => "required|numeric",
            "tempoMedioAtendimento" => "required|numeric",
            "quantidadeProdutosVendidos" => "required|numeric",
        ];
    }


    public static function messages()
    {
        return [
            "valorVendas.required" => "valorVendas não foi informado.",
            "quantidadeVendas.required" => "quantidadeVendas não foi informado.",
            "totalDescontos.required" => "totalDescontos não foi informado.",
            "totalLucros.required" => "totalLucros não foi informado.",
            "ticketMedio.required" => "TicketMedio não foi informado.",
            "tempoMedioAtendimento.required" => "TempoMedioAtendimento não foi informado.",
            "quantidadeProdutosVendidos.required" => "QuantidadeProdutosVendidos não foi informado.",
            "valorVendas.numeric" => "valorVendas não estava com formato válido.",
            "quantidadeVendas.numeric" => "quantidadeVendas não estava com formato válido.",
            "totalDescontos.numeric" => "totalDescontos não estava com formato válido.",
            "totalLucros.numeric" => "totalLucros não estava com formato válido.",
            "ticketMedio.numeric" => "TicketMedio não estava com formato válido.",
            "tempoMedioAtendimento.numeric" => "TempoMedioAtendimento não estava com formato válido.",
            "quantidadeProdutosVendidos.numeric" => "QuantidadeProdutosVendidos não estava com formato válido.",
        ];
    }
}
