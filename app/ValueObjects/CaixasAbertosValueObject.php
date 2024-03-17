<?php

namespace App\ValueObjects;

final class CaixasAbertosValueObject
{
    public string $usuario;

    public string $horaAbertura;

    public string $dataAbertura;

    public int $saldoInicial;

    public int $saldoAtual;

    public int $entradas;

    public int $saidas;

    public int $dinheiro;

    public int $credito;

    public int $debito;

    public int $cheque;

    public int $convenio;

    public int $vRefeicao;

    public int $vCombustivel;

    public function __construct(
        string $usuario,
        string $horaAbertura,
        string $dataAbertura,
        int    $saldoInicial,
        int    $saldoAtual,
        int    $entradas,
        int    $saidas,
        int    $dinheiro,
        int    $credito,
        int    $debito,
        int    $cheque,
        int    $convenio,
        int    $vRefeicao,
        int    $vCombustivel
    )
    {
        $this->usuario = $usuario;
        $this->horaAbertura = $horaAbertura;
        $this->dataAbertura = $dataAbertura;
        $this->saldoInicial = $saldoInicial;
        $this->saldoAtual = $saldoAtual;
        $this->entradas = $entradas;
        $this->saidas = $saidas;
        $this->dinheiro = $dinheiro;
        $this->credito = $credito;
        $this->debito = $debito;
        $this->cheque = $cheque;
        $this->convenio = $convenio;
        $this->vRefeicao = $vRefeicao;
        $this->vCombustivel = $vCombustivel;
    }

    public function getUsuario(): string
    {
        return $this->usuario;
    }

    public function getHoraAbertura(): string
    {
        return $this->horaAbertura;
    }

    public function getDataAbertura(): string
    {
        return $this->dataAbertura;
    }

    public function getSaldoInicial(): int
    {
        return $this->saldoInicial;
    }

    public function getSaldoAtual(): int
    {
        return $this->saldoAtual;
    }

    public function getEntradas(): int
    {
        return $this->entradas;
    }

    public function getSaidas(): int
    {
        return $this->saidas;
    }

    public function getDinheiro(): int
    {
        return $this->dinheiro;
    }

    public function getCredito(): int
    {
        return $this->credito;
    }

    public function getDebito(): int
    {
        return $this->debito;
    }

    public function getCheque(): int
    {
        return $this->cheque;
    }

    public function getConvenio(): int
    {
        return $this->convenio;
    }

    public function getVRefeicao(): int
    {
        return $this->vRefeicao;
    }

    public function getVCombustivel(): int
    {
        return $this->vCombustivel;
    }

    public function setUsuario(string $usuario): self
    {
        $this->usuario = $usuario;
        return $this;
    }

    public function setHoraAbertura(string $horaAbertura): self
    {
        $this->horaAbertura = $horaAbertura;
        return $this;
    }

    public function setDataAbertura(string $dataAbertura): self
    {
        $this->dataAbertura = $dataAbertura;
        return $this;
    }

    public function setSaldoInicial(int $saldoInicial): self
    {
        $this->saldoInicial = $saldoInicial;
        return $this;
    }

    public function setSaldoAtual(int $saldoAtual): self
    {
        $this->saldoAtual = $saldoAtual;
        return $this;
    }

    public function setEntradas(int $entradas): self
    {
        $this->entradas = $entradas;
        return $this;
    }

    public function setSaidas(int $saidas): self
    {
        $this->saidas = $saidas;
        return $this;
    }

    public function setDinheiro(int $dinheiro): self
    {
        $this->dinheiro = $dinheiro;
        return $this;
    }

    public function setCredito(int $credito): self
    {
        $this->credito = $credito;
        return $this;
    }

    public function setDebito(int $debito): self
    {
        $this->debito = $debito;
        return $this;
    }

    public function setCheque(int $cheque): self
    {
        $this->cheque = $cheque;
        return $this;
    }

    public function setConvenio(int $convenio): self
    {
        $this->convenio = $convenio;
        return $this;
    }

    public function setVRefeicao(int $vRefeicao): self
    {
        $this->vRefeicao = $vRefeicao;
        return $this;
    }

    public function setVCombustivel(int $vCombustivel): self
    {
        $this->vCombustivel = $vCombustivel;
        return $this;
    }
}
