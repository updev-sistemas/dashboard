<?php

namespace App\ValueObjects;

final class RelatorioVendasValueObject
{
    public ConcluidasValueObject $concluidas;

    public CanceladasValueObject $canceladas;

    public array $vendasUsuarios;

    public function __construct(
        ConcluidasValueObject $concluidas,
        CanceladasValueObject $canceladas,
        array                 $vendasUsuarios
    )
    {
        $this->concluidas = $concluidas;
        $this->canceladas = $canceladas;
        $this->vendasUsuarios = $vendasUsuarios;
    }

    public function getConcluidas(): ConcluidasValueObject
    {
        return $this->concluidas;
    }

    public function getCanceladas(): CanceladasValueObject
    {
        return $this->canceladas;
    }

    public function getVendasUsuarios(): array
    {
        return $this->vendasUsuarios;
    }

    public function setConcluidas(ConcluidasValueObject $concluidas): self
    {
        $this->concluidas = $concluidas;
        return $this;
    }

    public function setCanceladas(CanceladasValueObject $canceladas): self
    {
        $this->canceladas = $canceladas;
        return $this;
    }

    public function setVendasUsuarios(array $vendasUsuarios): self
    {
        $this->vendasUsuarios = $vendasUsuarios;
        return $this;
    }
}
