<?php

namespace App\ValueObjects;

use App\Utils\Commons\FormatDataUtil;
use JsonSerializable;

class ContasReceber implements JsonSerializable
{
    private Calendario  $receber;
    private Calendario  $recebidas;
    private float $pagasAtual;
    private float $pendentesAtual;
    private float $vencidasAtual;

    /**
     * @param Calendario $receber
     * @param Calendario $recebidas
     */
    protected function __construct(Calendario $receber, Calendario $recebidas, float $pagasAtual, float $pendentesAtual, float $vencidasAtual)
    {
        $this->receber = $receber ?? Calendario::default();
        $this->recebidas = $recebidas ?? Calendario::default();
        $this->pagasAtual = FormatDataUtil::FormatNumber($pagasAtual ?? 0);
        $this->pendentesAtual = FormatDataUtil::FormatNumber($pendentesAtual ?? 0);
        $this->vencidasAtual = FormatDataUtil::FormatNumber($vencidasAtual ?? 0);
    }

    public function getReceber(): Calendario
    {
        return $this->receber;
    }

    public function getRecebidas(): Calendario
    {
        return $this->recebidas;
    }

    public function getTotalReceber(): float
    {
        return $this->receber->total();
    }

    public function getTotalRecebidas(): float
    {
        return $this->recebidas->total();
    }

    public function getPagasAtual(): float
    {
        return $this->pagasAtual;
    }

    public function getPendentesAtual(): float
    {
        return $this->pendentesAtual;
    }

    public function getVencidasAtual(): float
    {
        return $this->vencidasAtual;
    }



    public static function create(Calendario $receber, Calendario $recebidas, float $pagasAtual, float $pendentesAtual, float $vencidasAtual)
    {
        return new ContasReceber($receber, $recebidas, $pagasAtual, $pendentesAtual, $vencidasAtual);
    }

    public function jsonSerialize()
    {
        return [
            "receber" => $this->receber,
            "recebidas" => $this->recebidas,
            'pagasAtual' => $this->pagasAtual,
            'pendentesAtual' => $this->pendentesAtual,
            'vencidasAtual' => $this->vencidasAtual,
        ];
    }
}
