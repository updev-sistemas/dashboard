<?php

namespace App\ValueObjects;

class ConcluidasValueObject
{
    public int $valorVendas;

    public int $quantidadeVendas;

    public int $totalDescontos;

    public int $totalLucros;

    public float $ticketMedio;

    public string $tempoMedioAtendimento;

    public int $quantidadeProdutosVendidos;

    public function __construct(
        int    $valorVendas,
        int    $quantidadeVendas,
        int    $totalDescontos,
        int    $totalLucros,
        float  $ticketMedio,
        string $tempoMedioAtendimento,
        int    $quantidadeProdutosVendidos
    )
    {
        $this->valorVendas = $valorVendas;
        $this->quantidadeVendas = $quantidadeVendas;
        $this->totalDescontos = $totalDescontos;
        $this->totalLucros = $totalLucros;
        $this->ticketMedio = $ticketMedio;
        $this->tempoMedioAtendimento = $tempoMedioAtendimento;
        $this->quantidadeProdutosVendidos = $quantidadeProdutosVendidos;
    }

    public function getValorVendas(): int
    {
        return $this->valorVendas;
    }

    public function getQuantidadeVendas(): int
    {
        return $this->quantidadeVendas;
    }

    public function getTotalDescontos(): int
    {
        return $this->totalDescontos;
    }

    public function getTotalLucros(): int
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
