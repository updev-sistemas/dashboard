<?php

namespace App\ValueObjects;

final class LucrosPresumidosValueObject
{
    public GanhosValueObject $ganhos;

    public PerdidosValueObject $perdidos;

    public RelatorioVendasValueObject $relatorioVendas;

    public function __construct(
        GanhosValueObject          $ganhos,
        PerdidosValueObject        $perdidos,
        RelatorioVendasValueObject $relatorioVendas
    )
    {
        $this->ganhos = $ganhos;
        $this->perdidos = $perdidos;
        $this->relatorioVendas = $relatorioVendas;
    }

    public function getGanhos(): GanhosValueObject
    {
        return $this->ganhos;
    }

    public function getPerdidos(): PerdidosValueObject
    {
        return $this->perdidos;
    }

    public function getRelatorioVendas(): RelatorioVendasValueObject
    {
        return $this->relatorioVendas;
    }

    public function setGanhos(GanhosValueObject $ganhos): self
    {
        $this->ganhos = $ganhos;
        return $this;
    }

    public function setPerdidos(PerdidosValueObject $perdidos): self
    {
        $this->perdidos = $perdidos;
        return $this;
    }

    public function setRelatorioVendas(RelatorioVendasValueObject $relatorioVendas): self
    {
        $this->relatorioVendas = $relatorioVendas;
        return $this;
    }
}
