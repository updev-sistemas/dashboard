<?php

namespace App\ValueObjects;

final class CaixaValueObject
{
    public SaldoValueObject $saldo;

    public EntradasValueObject $entradas;

    public SaidasValueObject $saidas;

    public int $saldoAtual;

    public int $entradaAtual;

    public int $saidaAtual;

    public function __construct(
        SaldoValueObject    $saldo,
        EntradasValueObject $entradas,
        SaidasValueObject   $saidas,
        int                 $saldoAtual,
        int                 $entradaAtual,
        int                 $saidaAtual
    )
    {
        $this->saldo = $saldo;
        $this->entradas = $entradas;
        $this->saidas = $saidas;
        $this->saldoAtual = $saldoAtual;
        $this->entradaAtual = $entradaAtual;
        $this->saidaAtual = $saidaAtual;
    }

    public function getSaldo(): SaldoValueObject
    {
        return $this->saldo;
    }

    public function getEntradas(): EntradasValueObject
    {
        return $this->entradas;
    }

    public function getSaidas(): SaidasValueObject
    {
        return $this->saidas;
    }

    public function getSaldoAtual(): int
    {
        return $this->saldoAtual;
    }

    public function getEntradaAtual(): int
    {
        return $this->entradaAtual;
    }

    public function getSaidaAtual(): int
    {
        return $this->saidaAtual;
    }

    public function setSaldo(SaldoValueObject $saldo): self
    {
        $this->saldo = $saldo;
        return $this;
    }

    public function setEntradas(EntradasValueObject $entradas): self
    {
        $this->entradas = $entradas;
        return $this;
    }

    public function setSaidas(SaidasValueObject $saidas): self
    {
        $this->saidas = $saidas;
        return $this;
    }

    public function setSaldoAtual(int $saldoAtual): self
    {
        $this->saldoAtual = $saldoAtual;
        return $this;
    }

    public function setEntradaAtual(int $entradaAtual): self
    {
        $this->entradaAtual = $entradaAtual;
        return $this;
    }

    public function setSaidaAtual(int $saidaAtual): self
    {
        $this->saidaAtual = $saidaAtual;
        return $this;
    }
}
