<?php

namespace App\ValueObjects;

use App\Utils\Commons\FormatDataUtil;

final class ContasReceberValueObject
{
    public ReceberValueObject $receber;

    public RecebidasValueObject $recebidas;

    public float $vencidasAtual;

    public float $pendentesAtual;

    public float $pagasAtual;

    public function __construct(
        ReceberValueObject   $receber,
        RecebidasValueObject $recebidas,
        float                  $vencidasAtual,
        float                  $pendentesAtual,
        float                  $pagasAtual
    )
    {
        $this->receber = $receber;
        $this->recebidas = $recebidas;
        $this->vencidasAtual = FormatDataUtil::FormatNumber($vencidasAtual);
        $this->pendentesAtual = FormatDataUtil::FormatNumber($pendentesAtual);
        $this->pagasAtual = FormatDataUtil::FormatNumber($pagasAtual);
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
