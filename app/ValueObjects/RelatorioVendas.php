<?php

namespace App\ValueObjects;

use JsonSerializable;

class RelatorioVendas implements JsonSerializable
{
    private RelatorioVendasComponentConcluidas $concluidas;
    private RelatorioVendasComponentCanceladas $canceladas;
    private array $vendasUsuarios;

    /**
     * @param RelatorioVendasComponentConcluidas $concluidas
     * @param RelatorioVendasComponentCanceladas $canceladas
     * @param array $vendasUsuarios
     */
    public function __construct(RelatorioVendasComponentConcluidas $concluidas, RelatorioVendasComponentCanceladas $canceladas, array $vendasUsuarios)
    {
        $this->concluidas = $concluidas ?? RelatorioVendasComponentConcluidas::create(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
        $this->canceladas = $canceladas ?? RelatorioVendasComponentCanceladas::create(0, 0, 0, 0);
        $this->vendasUsuarios = $vendasUsuarios ?? [];
    }

    public function getConcluidas(): RelatorioVendasComponentConcluidas
    {
        return $this->concluidas;
    }

    public function getCanceladas(): RelatorioVendasComponentCanceladas
    {
        return $this->canceladas;
    }

    public function getVendasUsuarios(): array
    {
        return $this->vendasUsuarios;
    }
    public static function create(RelatorioVendasComponentConcluidas $concluidas, RelatorioVendasComponentCanceladas $canceladas, array $vendasUsuarios) : RelatorioVendas
    {
        return new RelatorioVendas($concluidas, $canceladas, $vendasUsuarios);
    }

    public function jsonSerialize()
    {
        return [
            "concluidas" => $this->concluidas,
            "canceladas" => $this->canceladas,
            "vendasUsuarios" => $this->vendasUsuarios
        ];
    }
}
