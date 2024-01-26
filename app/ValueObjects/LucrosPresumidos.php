<?php

namespace App\ValueObjects;

use JsonSerializable;

class LucrosPresumidos implements JsonSerializable
{
    private Calendario $ganhos;
    private Calendario $perdidos;
    private RelatorioVendas $relatorioVendas;

    /**
     * @param Calendario $ganhos
     * @param Calendario $perdidos
     * @param RelatorioVendas $relatorioVendas
     */
    public function __construct(Calendario $ganhos, Calendario $perdidos, RelatorioVendas $relatorioVendas)
    {
        $this->ganhos = $ganhos ?? Calendario::default();
        $this->perdidos = $perdidos ?? Calendario::default();
        $this->relatorioVendas = $relatorioVendas ?? RelatorioVendas::create(
            RelatorioVendasComponentConcluidas::create(0,0,0,0,0,0,0),
            RelatorioVendasComponentCanceladas::create(0, 0, 0, 0),
            []
        );
    }

    public function getGanhos(): Calendario
    {
        return $this->ganhos;
    }

    public function getPerdidos(): Calendario
    {
        return $this->perdidos;
    }

    public function getRelatorioVendas(): RelatorioVendas
    {
        return $this->relatorioVendas;
    }

    public static function create(Calendario $ganhos, Calendario $perdidos, RelatorioVendas $relatorioVendas) : LucrosPresumidos
    {
        return new LucrosPresumidos($ganhos, $perdidos, $relatorioVendas);
    }

    public function jsonSerialize()
    {
        return [
            "ganhos" => $this->ganhos,
            "perdidos" => $this->perdidos,
            "relatorioVendas" => $this->relatorioVendas
        ];
    }
}
