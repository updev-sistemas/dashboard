<?php

namespace App\ValueObjects;

use JsonSerializable;

class RelatorioVendasComponentConcluidas implements JsonSerializable
{
    private float $valorVendas;
    private float $quantidadeVendas;
    private float $totalDescontos;
    private float $totalLucros;
    private float $ticketMedio;
    private float $tempoMedioAtendimento;
    private float $quantidadeProdutosVendidos;

    /**
     * @param float $valorVendas
     * @param float $quantidadeVendas
     * @param float $totalDescontos
     * @param float $totalLucros
     * @param float $ticketMedio
     * @param float $tempoMedioAtendimento
     * @param float $quantidadeProdutosVendidos
     */
    protected function __construct(float $valorVendas, float $quantidadeVendas, float $totalDescontos, float $totalLucros, float $ticketMedio, float $tempoMedioAtendimento, float $quantidadeProdutosVendidos)
    {
        $this->valorVendas = $valorVendas ?? 0;
        $this->quantidadeVendas = $quantidadeVendas ?? 0;
        $this->totalDescontos = $totalDescontos ?? 0;
        $this->totalLucros = $totalLucros ?? 0;
        $this->ticketMedio = $ticketMedio ?? 0;
        $this->tempoMedioAtendimento = $tempoMedioAtendimento ?? 0;
        $this->quantidadeProdutosVendidos = $quantidadeProdutosVendidos ?? 0;
    }

    public function getValorVendas(): float
    {
        return $this->valorVendas;
    }

    public function getQuantidadeVendas(): float
    {
        return $this->quantidadeVendas;
    }

    public function getTotalDescontos(): float
    {
        return $this->totalDescontos;
    }

    public function getTotalLucros(): float
    {
        return $this->totalLucros;
    }

    public function getTicketMedio(): float
    {
        return $this->ticketMedio;
    }

    public function getTempoMedioAtendimento(): float
    {
        return $this->tempoMedioAtendimento;
    }

    public function getQuantidadeProdutosVendidos(): float
    {
        return $this->quantidadeProdutosVendidos;
    }

    public static function create(float $valorVendas, float $quantidadeVendas, float $totalDescontos, float $totalLucros, float $ticketMedio, float $tempoMedioAtendimento, float $quantidadeProdutosVendidos) : RelatorioVendasComponentConcluidas
    {
        return new RelatorioVendasComponentConcluidas($valorVendas, $quantidadeVendas, $totalDescontos, $totalLucros, $ticketMedio, $tempoMedioAtendimento, $quantidadeProdutosVendidos);
    }

    public function jsonSerialize()
    {
        return [
            "valorVendas" => $this->valorVendas,
            "quantidadeVendas" => $this->quantidadeVendas,
            "totalDescontos" => $this->totalDescontos ,
            "totalLucros" => $this->totalLucros,
            "ticketMedio" => $this->ticketMedio,
            "tempoMedioAtendimento" => $this->tempoMedioAtendimento,
            "quantidadeProdutosVendidos" => $this->quantidadeProdutosVendidos
        ];
    }
}
