<?php

namespace App\ValueObjects;

use App\Utils\Commons\FormatDataUtil;
use JsonSerializable;

class ContasPagar implements JsonSerializable
{
    private float $pagasAtual;
    private float $vencidasAtual;
    private float $pendentesAtual;
    private Calendario $receber;
    private Calendario $recebidas;

    /**
     * @param Calendario $receber
     * @param Calendario $recebidas
     */
    protected function __construct(Calendario $receber, Calendario $recebidas, float $pagasAtual, float  $vencidasAtual, float  $pendentesAtual)
    {
        $this->receber = $pagas ?? Calendario::default();
        $this->recebidas = $recebidas ?? Calendario::default();
        $this->pagasAtual = FormatDataUtil::FormatNumber($pagasAtual ?? $this->getTotalPagas() ?? 0);
        $this->vencidasAtual = FormatDataUtil::FormatNumber($vencidasAtual ?? $this->getTotalVencidas() ?? 0);
        $this->pendentesAtual = FormatDataUtil::FormatNumber($pendentesAtual ?? 0);
    }

    public function getPagasAtual(): float
    {
        return $this->pagasAtual;
    }

    public function getVencidasAtual(): float
    {
        return $this->vencidasAtual;
    }

    public function getPendentesAtual(): float
    {
        return $this->pendentesAtual;
    }

    public function getReceber(): Calendario
    {
        return $this->receber;
    }

    public function getRecebidas(): Calendario
    {
        return $this->recebidas;
    }

    public static function create(Calendario $pagas, Calendario $vencidas, float $pagasAtual, float $vencidasAtual,float  $pendentesAtual)
    {
        return new ContasPagar($pagas, $vencidas, $pagasAtual, $vencidasAtual, $pendentesAtual);
    }

    public function jsonSerialize()
    {
        return [
            "receber" => $this->receber,
            "recebidas" => $this->recebidas,
            "pagasAtual" => $this->pagasAtual,
            "vencidasAtual" => $this->vencidasAtual,
            "pendentesAtual" => $this->pendentesAtual,
        ];
    }
}
