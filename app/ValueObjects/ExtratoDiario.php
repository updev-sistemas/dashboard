<?php

namespace App\ValueObjects;

use App\Utils\Commons\FormatDataUtil;
use JsonSerializable;

class ExtratoDiario implements JsonSerializable
{
    private int $dia;
    private string $mes;
    private float $totalAcumulado;

    /**
     * @param int $dia
     * @param string $mes
     * @param float $totalAcumulado
     */
    private function __construct(int $dia, string $mes, float $totalAcumulado)
    {
        $this->dia = $dia;
        $this->mes = $mes;
        $this->totalAcumulado = FormatDataUtil::FormatNumber($totalAcumulado);
    }

    public function getDia(): int
    {
        return $this->dia;
    }

    public function getMes(): string
    {
        return $this->mes;
    }

    public function getTotalAcumulado(): float
    {
        return $this->totalAcumulado;
    }

    public static function create(int $dia, string $mes, float $totalAcumulado) : ExtratoDiario
    {
        return new ExtratoDiario($dia, $mes, $totalAcumulado);
    }

    public function jsonSerialize()
    {
        return [
            "dia" => $this->dia,
            "mes" => $this->mes,
            "totalAcumulado" => $this->totalAcumulado
        ];
    }
}
