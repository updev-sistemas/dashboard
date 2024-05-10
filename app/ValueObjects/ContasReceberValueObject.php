<?php

namespace App\ValueObjects;

final class ContasReceberValueObject
{
    public ReceberValueObject $receber;

    public RecebidasValueObject $recebidas;

    public int $vencidasAtual;

    public int $pendentesAtual;

    public int $pagasAtual;

    public function __construct(
        ReceberValueObject   $receber,
        RecebidasValueObject $recebidas,
        int                  $vencidasAtual,
        int                  $pendentesAtual,
        int                  $pagasAtual
    )
    {
        $this->receber = $receber;
        $this->recebidas = $recebidas;
        $this->vencidasAtual = $vencidasAtual;
        $this->pendentesAtual = $pendentesAtual;
        $this->pagasAtual = $pagasAtual;
    }

    public function getReceber(): ReceberValueObject
    {
        return $this->receber;
    }

    public function getRecebidas(): RecebidasValueObject
    {
        return $this->recebidas;
    }

    public function getVencidasAtual(): int
    {
        return $this->vencidasAtual;
    }

    public function getPendentesAtual(): int
    {
        return $this->pendentesAtual;
    }

    public function getPagasAtual(): int
    {
        return $this->pagasAtual;
    }

    public function setReceber(ReceberValueObject $receber): self
    {
        $this->receber = $receber;
        return $this;
    }

    public function setRecebidas(RecebidasValueObject $recebidas): self
    {
        $this->recebidas = $recebidas;
        return $this;
    }

    public function setVencidasAtual(int $vencidasAtual): self
    {
        $this->vencidasAtual = $vencidasAtual;
        return $this;
    }

    public function setPendentesAtual(int $pendentesAtual): self
    {
        $this->pendentesAtual = $pendentesAtual;
        return $this;
    }

    public function setPagasAtual(int $pagasAtual): self
    {
        $this->pagasAtual = $pagasAtual;
        return $this;
    }
}
