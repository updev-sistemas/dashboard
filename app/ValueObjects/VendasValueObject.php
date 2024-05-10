<?php

namespace App\ValueObjects;

final class VendasValueObject
{
    public CanceladasValueObject $canceladas;

    public ConcluidasValueObject $concluidas;

    public function __construct(CanceladasValueObject $canceladas, ConcluidasValueObject $concluidas)
    {
        $this->canceladas = $canceladas;
        $this->concluidas = $concluidas;
    }

    public function getCanceladas(): CanceladasValueObject
    {
        return $this->canceladas;
    }

    public function getConcluidas(): ConcluidasValueObject
    {
        return $this->concluidas;
    }

    public function setCanceladas(CanceladasValueObject $canceladas): self
    {
        $this->canceladas = $canceladas;
        return $this;
    }

    public function setConcluidas(ConcluidasValueObject $concluidas): self
    {
        $this->concluidas = $concluidas;
        return $this;
    }
}
