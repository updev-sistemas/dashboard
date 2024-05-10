<?php

namespace App\ValueObjects;
use JsonSerializable;

class Vendas implements JsonSerializable {
    public Calendario $canceladas;
    public Calendario $concluidas;

    protected function __construct($canceladas, $concluidas) {
        $this->canceladas = $canceladas;
        $this->concluidas = $concluidas;
    }

    public static function create($canceladas, $concluidas) {
        return new Vendas($canceladas, $concluidas);
    }

    public function jsonSerialize()
    {
        return [
            "canceladas" => $this->canceladas,
            "concluidas" => $this->concluidas
        ];
    }
}
