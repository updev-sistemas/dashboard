<?php

namespace App\ValueObjects;

use JsonSerializable;

class NotasFiscais  implements JsonSerializable{
    public Calendario $totalCanceladas;
    public Calendario $totalContigencia;
    public Calendario $totalEnviadas;

    protected function __construct($totalCanceladas, $totalContigencia, $totalEnviadas) {
        $this->totalCanceladas = $totalCanceladas ?? Calendario::default();
        $this->totalContigencia = $totalContigencia ?? Calendario::default();
        $this->totalEnviadas = $totalEnviadas ?? Calendario::default();
    }

    public function getTotalCanceladas(): Calendario
    {
        return $this->totalCanceladas;
    }

    public function getTotalContigencia(): Calendario
    {
        return $this->totalContigencia;
    }

    public function getTotalEnviadas(): Calendario
    {
        return $this->totalEnviadas;
    }

    public static function create($totalCanceladas, $totalContigencia, $totalEnviadas) {
        return new NotasFiscais($totalCanceladas, $totalContigencia, $totalEnviadas);
    }

    public function jsonSerialize()
    {
        return [
            "totalCanceladas" => $this->totalCanceladas,
            "totalContigencia" => $this->totalContigencia,
            "totalEnviadas" => $this->totalEnviadas
        ];
    }
}
