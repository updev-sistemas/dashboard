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
            "totaldescontosdia" => "required|numeric",
            "totalvendames" => "required|numeric",
            "qtdvendames" => "required|numeric",
            "tikectmediomes" => "required|numeric",
            "qtddeprodutosvendidos" => "required|numeric",
            "qtdmediadeitensporcupom" => "required|numeric",
            "valordevendascanceladas" => "required|numeric",
            "qtddevendascanceladas" => "required|numeric",
            "totaldescontomes" => "required|numeric",
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
            "totaldescontosdia.required" => "totaldescontosdia não foi informado.",
            "totalvendames.required" => "totalvendames não foi informado.",
            "qtdvendames.required" => "qtdvendames não foi informado.",
            "tikectmediomes.required" => "tikectmediomes não foi informado.",
            "qtddeprodutosvendidos.required" => "qtddeprodutosvendidos não foi informado.",
            "qtdmediadeitensporcupom.required" => "qtdmediadeitensporcupom não foi informado.",
            "valordevendascanceladas.required" => "valordevendascanceladas não foi informado.",
            "qtddevendascanceladas.required" => "qtddevendascanceladas não foi informado.",
            "totaldescontomes.required" => "totaldescontomes não foi informado.",
            "totaldescontosdia.numeric" => "totaldescontosdia não estava com formato correto.",
            "totalvendames.numeric" => "totalvendames não estava com formato correto.",
            "qtdvendames.numeric" => "qtdvendames não estava com formato correto.",
            "tikectmediomes.numeric" => "tikectmediomes não estava com formato correto.",
            "qtddeprodutosvendidos.numeric" => "qtddeprodutosvendidos não estava com formato correto.",
            "qtdmediadeitensporcupom.numeric" => "qtdmediadeitensporcupom não estava com formato correto.",
            "valordevendascanceladas.numeric" => "valordevendascanceladas não estava com formato correto.",
            "qtddevendascanceladas.numeric" => "qtddevendascanceladas não estava com formato correto.",
            "totaldescontomes.numeric" => "totaldescontomes não estava com formato correto.",
        ];
    }
}
