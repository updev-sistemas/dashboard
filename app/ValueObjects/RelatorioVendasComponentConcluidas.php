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
    private float $totaldescontosdia;
    private float $totalvendames;
    private float $qtdvendames;
    private float $tikectmediomes;
    private float $qtddeprodutosvendidos;
    private float $qtdmediadeitensporcupom;
    private float $valordevendascanceladas;
    private float $qtddevendascanceladas;
    private float $totaldescontomes;

    /**
     * @param float $valorVendas
     * @param float $quantidadeVendas
     * @param float $totalDescontos
     * @param float $totalLucros
     * @param float $ticketMedio
     * @param float $tempoMedioAtendimento
     * @param float $quantidadeProdutosVendidos
     * @param float $totaldescontosdia
     * @param float $totalvendames
     * @param float $qtdvendames
     * @param float $tikectmediomes
     * @param float $qtddeprodutosvendidos
     * @param float $qtdmediadeitensporcupom
     * @param float $valordevendascanceladas
     * @param float $qtddevendascanceladas
     * @param float $totaldescontomes
     */
    public function __construct(float $valorVendas, float $quantidadeVendas, float $totalDescontos, float $totalLucros, float $ticketMedio, float $tempoMedioAtendimento, float $quantidadeProdutosVendidos, float $totaldescontosdia, float $totalvendames, float $qtdvendames, float $tikectmediomes, float $qtddeprodutosvendidos, float $qtdmediadeitensporcupom, float $valordevendascanceladas, float $qtddevendascanceladas, float $totaldescontomes)
    {
        $this->valorVendas = $valorVendas;
        $this->quantidadeVendas = $quantidadeVendas;
        $this->totalDescontos = $totalDescontos;
        $this->totalLucros = $totalLucros;
        $this->ticketMedio = $ticketMedio;
        $this->tempoMedioAtendimento = $tempoMedioAtendimento;
        $this->quantidadeProdutosVendidos = $quantidadeProdutosVendidos;
        $this->totaldescontosdia = $totaldescontosdia;
        $this->totalvendames = $totalvendames;
        $this->qtdvendames = $qtdvendames;
        $this->tikectmediomes = $tikectmediomes;
        $this->qtddeprodutosvendidos = $qtddeprodutosvendidos;
        $this->qtdmediadeitensporcupom = $qtdmediadeitensporcupom;
        $this->valordevendascanceladas = $valordevendascanceladas;
        $this->qtddevendascanceladas = $qtddevendascanceladas;
        $this->totaldescontomes = $totaldescontomes;
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

    public function getTotaldescontosdia(): float
    {
        return $this->totaldescontosdia;
    }

    public function getTotalvendames(): float
    {
        return $this->totalvendames;
    }

    public function getQtdvendames(): float
    {
        return $this->qtdvendames;
    }

    public function getTikectmediomes(): float
    {
        return $this->tikectmediomes;
    }

    public function getQtddeprodutosvendidos(): float
    {
        return $this->qtddeprodutosvendidos;
    }

    public function getQtdmediadeitensporcupom(): float
    {
        return $this->qtdmediadeitensporcupom;
    }

    public function getValordevendascanceladas(): float
    {
        return $this->valordevendascanceladas;
    }

    public function getQtddevendascanceladas(): float
    {
        return $this->qtddevendascanceladas;
    }

    public function getTotaldescontomes(): float
    {
        return $this->totaldescontomes;
    }

    public static function create(float $valorVendas, float $quantidadeVendas, float $totalDescontos, float $totalLucros, float $ticketMedio, float $tempoMedioAtendimento, float $quantidadeProdutosVendidos, float $totaldescontosdia, float $totalvendames, float $qtdvendames, float $tikectmediomes, float $qtddeprodutosvendidos, float $qtdmediadeitensporcupom, float $valordevendascanceladas, float $qtddevendascanceladas, float $totaldescontomes) : RelatorioVendasComponentConcluidas
    {
        return new RelatorioVendasComponentConcluidas($valorVendas, $quantidadeVendas, $totalDescontos, $totalLucros, $ticketMedio, $tempoMedioAtendimento, $quantidadeProdutosVendidos, $totaldescontosdia, $totalvendames, $qtdvendames, $tikectmediomes, $qtddeprodutosvendidos, $qtdmediadeitensporcupom, $valordevendascanceladas, $qtddevendascanceladas, $totaldescontomes);
    }

    public function jsonSerialize()
    {
        return [
            'valorVendas' => $this->valorVendas,
            'quantidadeVendas' => $this->quantidadeVendas,
            'totalDescontos' => $this->totalDescontos,
            'totalLucros' => $this->totalLucros,
            'ticketMedio' => $this->ticketMedio,
            'tempoMedioAtendimento' => $this->tempoMedioAtendimento,
            'quantidadeProdutosVendidos' => $this->quantidadeProdutosVendidos,
            'totaldescontosdia' => $this->totaldescontosdia,
            'totalvendames' => $this->totalvendames,
            'qtdvendames' => $this->qtdvendames,
            'tikectmediomes' => $this->tikectmediomes,
            'qtddeprodutosvendidos' => $this->qtddeprodutosvendidos,
            'qtdmediadeitensporcupom' => $this->qtdmediadeitensporcupom,
            'valordevendascanceladas' => $this->valordevendascanceladas,
            'qtddevendascanceladas' => $this->qtddevendascanceladas,
            'totaldescontomes' => $this->totaldescontomes,
        ];
    }
}
