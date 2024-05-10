<?php

namespace App\ValueObjects;

use App\Utils\Commons\FormatDataUtil;
use JsonSerializable;

class CaixasAbertosComponent implements JsonSerializable
{
    private float $cartao;
    private float $cashback;
    private float $cheque;
    private float $credito;
    private string $dataabertura;
    private float $digital;
    private float $dinheiro;
    private float $dinheiro1;
    private float $fechamento;
    private string $horaabertura;
    private int $id;
    private float $pix;
    private float $saldoatual;
    private float $saldoinicial;
    private string $usuario;

    /**
     * @param float $cartao
     * @param float $cashback
     * @param float $cheque
     * @param float $credito
     * @param string $dataabertura
     * @param float $digital
     * @param float $dinheiro
     * @param float $dinheiro1
     * @param float $fechamento
     * @param string $horaabertura
     * @param int $id
     * @param float $pix
     * @param float $saldoatual
     * @param float $saldoinicial
     * @param string $usuario
     */
    protected function __construct(int $cartao, int $cashback, int $cheque, int $credito, string $dataabertura, int $digital, int $dinheiro, int $dinheiro1, int $fechamento, string $horaabertura, int $id, int $pix, int $saldoatual, int $saldoinicial, string $usuario)
    {
        $this->cartao =  FormatDataUtil::FormatNumber($cartao);
        $this->cashback =  FormatDataUtil::FormatNumber($cashback);
        $this->cheque =  FormatDataUtil::FormatNumber($cheque);
        $this->credito =  FormatDataUtil::FormatNumber($credito);
        $this->dataabertura =  FormatDataUtil::FormatNumber($dataabertura);
        $this->digital =  FormatDataUtil::FormatNumber($digital);
        $this->dinheiro =  FormatDataUtil::FormatNumber($dinheiro);
        $this->dinheiro1 =  FormatDataUtil::FormatNumber($dinheiro1);
        $this->fechamento =  FormatDataUtil::FormatNumber($fechamento);
        $this->horaabertura = $horaabertura;
        $this->id = $id;
        $this->pix =  FormatDataUtil::FormatNumber($pix);
        $this->saldoatual =  FormatDataUtil::FormatNumber($saldoatual);
        $this->saldoinicial =  FormatDataUtil::FormatNumber($saldoinicial);
        $this->usuario = $usuario;
    }

    public function getCartao(): float
    {
        return $this->cartao;
    }

    public function getCashback(): float
    {
        return $this->cashback;
    }

    public function getCheque(): float
    {
        return $this->cheque;
    }

    public function getCredito(): float
    {
        return $this->credito;
    }

    public function getDataabertura(): string
    {
        return $this->dataabertura;
    }

    public function getDigital(): float
    {
        return $this->digital;
    }

    public function getDinheiro(): float
    {
        return $this->dinheiro;
    }

    public function getDinheiro1(): float
    {
        return $this->dinheiro1;
    }

    public function getFechamento(): float
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

    public function getPix(): float
    {
        return $this->pix;
    }

    public function getSaldoatual(): float
    {
        return $this->saldoatual;
    }

    public function getSaldoinicial(): float
    {
        return $this->saldoinicial;
    }

    public function getUsuario(): string
    {
        return $this->usuario;
    }

    public static function create(float $cartao, float $cashback, float $cheque, float $credito, string $dataabertura, float $digital, float $dinheiro, float $dinheiro1, float $fechamento, string $horaabertura, int $id, float $pix, float $saldoatual, float $saldoinicial, string $usuario): CaixasAbertosComponent
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
