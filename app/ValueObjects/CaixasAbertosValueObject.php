<?php

namespace App\ValueObjects;

use App\Utils\Commons\FormatDataUtil;

final class CaixasAbertosValueObject
{
    public string $usuario;

    public string $horaAbertura;

    public string $dataAbertura;

    public float $saldoInicial;

    public float $saldoAtual;

    public float $entradas;

    public float $saidas;

    public float $dinheiro;

    public float $credito;

    public float $debito;

    public float $cheque;

    public float $convenio;

    public float $vRefeicao;

    public float $vCombustivel;

    public function __construct(
        string $usuario,
        string $horaAbertura,
        string $dataAbertura,
        float    $saldoInicial,
        float    $saldoAtual,
        float    $entradas,
        float    $saidas,
        float    $dinheiro,
        float    $credito,
        float    $debito,
        float    $cheque,
        float    $convenio,
        float    $vRefeicao,
        float    $vCombustivel
    )
    {
        $this->usuario = $usuario;
        $this->horaAbertura = $horaAbertura;
        $this->dataAbertura = $dataAbertura;
        $this->saldoInicial =  FormatDataUtil::FormatNumber($saldoInicial);
        $this->saldoAtual = FormatDataUtil::FormatNumber($saldoAtual);
        $this->entradas = FormatDataUtil::FormatNumber($entradas);
        $this->saidas = FormatDataUtil::FormatNumber($saidas);
        $this->dinheiro = FormatDataUtil::FormatNumber($dinheiro);
        $this->credito = FormatDataUtil::FormatNumber($credito);
        $this->debito = FormatDataUtil::FormatNumber($debito);
        $this->cheque = FormatDataUtil::FormatNumber($cheque);
        $this->convenio = FormatDataUtil::FormatNumber($convenio);
        $this->vRefeicao = FormatDataUtil::FormatNumber($vRefeicao);
        $this->vCombustivel = FormatDataUtil::FormatNumber($vCombustivel);
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

    public function getSaldoInicial(): float
    {
        return $this->saldoInicial;
    }

    public function getSaldoAtual(): float
    {
        return $this->saldoAtual;
    }

    public function getEntradas(): float
    {
        return $this->entradas;
    }

    public function getSaidas(): float
    {
        return $this->saidas;
    }

    public function getDinheiro(): float
    {
        return $this->dinheiro;
    }

    public function getCredito(): float
    {
        return $this->credito;
    }

    public function getDebito(): float
    {
        return $this->debito;
    }

    public function getCheque(): float
    {
        return $this->cheque;
    }

    public function getConvenio(): float
    {
        return $this->convenio;
    }

    public function getVRefeicao(): float
    {
        return $this->vRefeicao;
    }

    public function getVCombustivel(): float
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

    public function setSaldoInicial(float $saldoInicial): self
    {
        $this->saldoInicial = $saldoInicial;
        return $this;
    }

    public function setSaldoAtual(float $saldoAtual): self
    {
        $this->saldoAtual = $saldoAtual;
        return $this;
    }

    public function setEntradas(float $entradas): self
    {
        $this->entradas = $entradas;
        return $this;
    }

    public function setSaidas(float $saidas): self
    {
        $this->saidas = $saidas;
        return $this;
    }

    public function setDinheiro(float $dinheiro): self
    {
        $this->dinheiro = $dinheiro;
        return $this;
    }

    public function setCredito(float $credito): self
    {
        $this->credito = $credito;
        return $this;
    }

    public function setDebito(float $debito): self
    {
        $this->debito = $debito;
        return $this;
    }

    public function setCheque(float $cheque): self
    {
        $this->cheque = $cheque;
        return $this;
    }

    public function setConvenio(float $convenio): self
    {
        $this->convenio = $convenio;
        return $this;
    }

    public function setVRefeicao(float $vRefeicao): self
    {
        $this->vRefeicao = $vRefeicao;
        return $this;
    }

    public function setVCombustivel(float $vCombustivel): self
    {
        $this->vCombustivel = $vCombustivel;
        return $this;
    }
}
