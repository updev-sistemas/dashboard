<?php

namespace App\ValueObjects;

use App\Utils\Commons\FormatDataUtil;
use JsonSerializable;

class Caixa  implements JsonSerializable{
    private Calendario $entradas;
    private Calendario $saldo;
    private Calendario $saida;

    private float $entradaAtual;
    private float $saidaAtual;
    private float $saldoAtual;

    protected function __construct(Calendario $entradas, Calendario $saida, Calendario $saldo, float $entradaAtual, float $saidaAtual, float $saldoAtual) {
        $this->entradas = $entradas ?? Calendario::default();
        $this->saida = $saida ?? Calendario::default();
        $this->saldo = $saldo ?? Calendario::default();
        $this->entradaAtual = FormatDataUtil::FormatNumber($entradaAtual ?? $this->getEntradaAtual() ?? 0);
        $this->saidaAtual =  FormatDataUtil::FormatNumber($saidaAtual ?? $this->getSaidaAtual() ?? 0);
        $this->saldoAtual =  FormatDataUtil::FormatNumber($saldoAtual ?? $this->getSaldoAtual() ?? 0);
    }

    public function getEntradaAtual(): float
    {
        return $this->entradaAtual;
    }

    public function getSaidaAtual(): float
    {
        return $this->saidaAtual;
    }

    public function getSaldoAtual(): float
    {
        return $this->saldoAtual;
    }


    public function getEntradas(): Calendario
    {
        return $this->entradas;
    }

    public function getSaldo(): Calendario
    {
        return $this->saldo;
    }

    public function getSaida(): Calendario
    {
        return $this->saida;
    }


    public function getTotalEntradas(): float
    {
        return $this->entradas->total();
    }

    public function getTotalSaldo(): float
    {
        return $this->saldo->total();
    }

    public function getTotalSaida(): float
    {
        return $this->saida->total();
    }

    public static function create(Calendario $entradas, Calendario $saida, Calendario $saldo, float $entradaAtual, float $saidaAtual, float $saldoAtual) {

        return new Caixa($entradas, $saida, $saldo, $entradaAtual, $saidaAtual, $saldoAtual);
    }

    public function jsonSerialize()
    {
        return [
            "entradas" => $this->entradas,
            "saidas" => $this->saida,
            "saldo" => $this->saldo,
            "entradaAtual" => $this->entradaAtual,
            "saidaAtual" => $this->saidaAtual,
            "saldoAtual" => $this->saldoAtual
        ];
    }
}
