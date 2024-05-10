<?php

namespace App\ValueObjects;

use App\Utils\Commons\FormatDataUtil;

final class ConcluidasValueObject
{
    public float $valorVendas;

    public float $quantidadeVendas;

    public float $totalDescontos;

    public float $totalLucros;

    public float $ticketMedio;

    public string $tempoMedioAtendimento;

    public int $quantidadeProdutosVendidos;

    public function __construct(
        float    $valorVendas,
        float    $quantidadeVendas,
        float    $totalDescontos,
        float    $totalLucros,
        float  $ticketMedio,
        string $tempoMedioAtendimento,
        int    $quantidadeProdutosVendidos
    )
    {
        $this->valorVendas = FormatDataUtil::FormatNumber($valorVendas);
        $this->quantidadeVendas = FormatDataUtil::FormatNumber($quantidadeVendas);
        $this->totalDescontos = FormatDataUtil::FormatNumber($totalDescontos);
        $this->totalLucros = FormatDataUtil::FormatNumber($totalLucros);
        $this->ticketMedio = FormatDataUtil::FormatNumber($ticketMedio);
        $this->tempoMedioAtendimento = $tempoMedioAtendimento;
        $this->quantidadeProdutosVendidos = $quantidadeProdutosVendidos;
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

    public function getTempoMedioAtendimento(): string
    {
        return $this->tempoMedioAtendimento;
    }

    public function getQuantidadeProdutosVendidos(): int
    {
        return $this->quantidadeProdutosVendidos;
    }

    public function setValorVendas(int $valorVendas): self
    {
        $this->valorVendas = $valorVendas;
        return $this;
    }

    public function setQuantidadeVendas(int $quantidadeVendas): self
    {
        $this->quantidadeVendas = $quantidadeVendas;
        return $this;
    }

    public function setTotalDescontos(int $totalDescontos): self
    {
        $this->totalDescontos = $totalDescontos;
        return $this;
    }

    public function setTotalLucros(int $totalLucros): self
    {
        $this->totalLucros = $totalLucros;
        return $this;
    }

    public function setTicketMedio(float $ticketMedio): self
    {
        $this->ticketMedio = $ticketMedio;
        return $this;
    }

    public function setTempoMedioAtendimento(string $tempoMedioAtendimento): self
    {
        $this->tempoMedioAtendimento = $tempoMedioAtendimento;
        return $this;
    }

    public function setQuantidadeProdutosVendidos(int $quantidadeProdutosVendidos): self
    {
        $this->quantidadeProdutosVendidos = $quantidadeProdutosVendidos;
        return $this;
    }
}
