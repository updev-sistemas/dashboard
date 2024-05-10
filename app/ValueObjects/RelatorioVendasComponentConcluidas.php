<?php

namespace App\ValueObjects;

use App\Utils\Commons\FormatDataUtil;
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
        $this->valorVendas = FormatDataUtil::FormatNumber($valorVendas ?? 0);
        $this->quantidadeVendas = FormatDataUtil::FormatNumber($quantidadeVendas ?? 0);
        $this->totalDescontos = FormatDataUtil::FormatNumber($totalDescontos ?? 0);
        $this->totalLucros = FormatDataUtil::FormatNumber($totalLucros ?? 0);
        $this->ticketMedio = FormatDataUtil::FormatNumber($ticketMedio ?? 0);
        $this->tempoMedioAtendimento = FormatDataUtil::FormatNumber($tempoMedioAtendimento ?? 0);
        $this->quantidadeProdutosVendidos = FormatDataUtil::FormatNumber($quantidadeProdutosVendidos ?? 0);
        $this->totaldescontosdia = FormatDataUtil::FormatNumber($totaldescontosdia ?? 0);
        $this->totalvendames = FormatDataUtil::FormatNumber($totalvendames ?? 0);
        $this->qtdvendames = FormatDataUtil::FormatNumber($qtdvendames ?? 0);
        $this->tikectmediomes = FormatDataUtil::FormatNumber($tikectmediomes ?? 0);
        $this->qtddeprodutosvendidos = FormatDataUtil::FormatNumber($qtddeprodutosvendidos ?? 0);
        $this->qtdmediadeitensporcupom = FormatDataUtil::FormatNumber($qtdmediadeitensporcupom ?? 0);
        $this->valordevendascanceladas = FormatDataUtil::FormatNumber($valordevendascanceladas ?? 0);
        $this->qtddevendascanceladas = FormatDataUtil::FormatNumber($qtddevendascanceladas ?? 0);
        $this->totaldescontomes = FormatDataUtil::FormatNumber($totaldescontomes ?? 0);
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
