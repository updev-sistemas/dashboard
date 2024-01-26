<?php

namespace App\ValueObjects;

use JsonSerializable;

class CaixasAbertosComponent implements JsonSerializable
{
    private int $cartao;
    private int $cashback;
    private int $cheque;
    private int $credito;
    private string $dataabertura;
    private int $digital;
    private int $dinheiro;
    private int $dinheiro1;
    private int $fechamento;
    private string $horaabertura;
    private int $id;
    private int $pix;
    private int $saldoatual;
    private int $saldoinicial;
    private string $usuario;

    /**
     * @param int $cartao
     * @param int $cashback
     * @param int $cheque
     * @param int $credito
     * @param string $dataabertura
     * @param int $digital
     * @param int $dinheiro
     * @param int $dinheiro1
     * @param int $fechamento
     * @param string $horaabertura
     * @param int $id
     * @param int $pix
     * @param int $saldoatual
     * @param int $saldoinicial
     * @param string $usuario
     */
    protected function __construct(int $cartao, int $cashback, int $cheque, int $credito, string $dataabertura, int $digital, int $dinheiro, int $dinheiro1, int $fechamento, string $horaabertura, int $id, int $pix, int $saldoatual, int $saldoinicial, string $usuario)
    {
        $this->cartao = $cartao;
        $this->cashback = $cashback;
        $this->cheque = $cheque;
        $this->credito = $credito;
        $this->dataabertura = $dataabertura;
        $this->digital = $digital;
        $this->dinheiro = $dinheiro;
        $this->dinheiro1 = $dinheiro1;
        $this->fechamento = $fechamento;
        $this->horaabertura = $horaabertura;
        $this->id = $id;
        $this->pix = $pix;
        $this->saldoatual = $saldoatual;
        $this->saldoinicial = $saldoinicial;
        $this->usuario = $usuario;
    }

    public function getCartao(): int
    {
        return $this->cartao;
    }

    public function getCashback(): int
    {
        return $this->cashback;
    }

    public function getCheque(): int
    {
        return $this->cheque;
    }

    public function getCredito(): int
    {
        return $this->credito;
    }

    public function getDataabertura(): string
    {
        return $this->dataabertura;
    }

    public function getDigital(): int
    {
        return $this->digital;
    }

    public function getDinheiro(): int
    {
        return $this->dinheiro;
    }

    public function getDinheiro1(): int
    {
        return $this->dinheiro1;
    }

    public function getFechamento(): int
    {
        return $this->fechamento;
    }

    public function getHoraabertura(): string
    {
        return $this->horaabertura;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPix(): int
    {
        return $this->pix;
    }

    public function getSaldoatual(): int
    {
        return $this->saldoatual;
    }

    public function getSaldoinicial(): int
    {
        return $this->saldoinicial;
    }

    public function getUsuario(): string
    {
        return $this->usuario;
    }

    public static function create(int $cartao, int $cashback, int $cheque, int $credito, string $dataabertura, int $digital, int $dinheiro, int $dinheiro1, int $fechamento, string $horaabertura, int $id, int $pix, int $saldoatual, int $saldoinicial, string $usuario): CaixasAbertosComponent
    {
        return new CaixasAbertosComponent( $cartao,  $cashback, $cheque, $credito, $dataabertura, $digital, $dinheiro, $dinheiro1, $fechamento, $horaabertura, $id, $pix, $saldoatual, $saldoinicial, $usuario);
    }

    public function jsonSerialize()
    {
        return [
            "cartao" => $this->cartao,
            "cashback" => $this->cashback,
            "cheque" => $this->cheque,
            "credito" => $this->credito,
            "dataabertura" => $this->dataabertura,
            "digital" => $this->digital,
            "dinheiro" => $this->dinheiro,
            "dinheiro1" => $this->dinheiro1 ,
            "fechamento" => $this->fechamento,
            "horaabertura" => $this->horaabertura,
            "id" => $this->id,
            "pix" => $this->pix,
            "saldoatual" => $this->saldoatual,
            "saldoinicial" => $this->saldoinicial,
            "usuario" => $this->usuario
        ];
    }
}
