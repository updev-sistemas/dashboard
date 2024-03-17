<?php

namespace App\ValueObjects;

use JsonSerializable;

class Extrato implements JsonSerializable
{
    private array $resumoDiarioMesAnterior;
    private array $resumoDiarioMesAtual;

    /**
     * @param array $resumoDiarioMesAnterior
     * @param array $resumoDiarioMesAtual
     */
    private function __construct(array $resumoDiarioMesAnterior, array $resumoDiarioMesAtual)
    {
        $this->resumoDiarioMesAnterior = $resumoDiarioMesAnterior;
        $this->resumoDiarioMesAtual = $resumoDiarioMesAtual;
    }

    public function getResumoDiarioMesAnterior(): array
    {
        return $this->resumoDiarioMesAnterior;
    }

    public function getResumoDiarioMesAtual(): array
    {
        return $this->resumoDiarioMesAtual;
    }

    public static function create(array $resumoDiarioMesAnterior, array $resumoDiarioMesAtual) : Extrato
    {
        return new Extrato($resumoDiarioMesAnterior, $resumoDiarioMesAtual);
    }

    public function jsonSerialize()
    {
        return [
            "resumoDiarioMesAnterior" => $this->resumoDiarioMesAnterior,
            "resumoDiarioMesAtual" => $this->resumoDiarioMesAtual,
        ];
    }
}
