<?php

namespace App\ValueObjects;

use App\Utils\Commons\FormatDataUtil;

final class ContasPagarValueObject
{
    public PagasValueObject $pagas;

    public PendendentesValueObject $pendendentes;

    public float $vencidasAtual;

    public float $pendentesAtual;

    public float $pagasAtual;

    public function __construct(
        PagasValueObject        $pagas,
        PendendentesValueObject $pendendentes,
        float                     $vencidasAtual,
        float                     $pendentesAtual,
        float                     $pagasAtual
    )
    {
        $this->pagas = $pagas;
        $this->pendendentes = $pendendentes;
        $this->vencidasAtual = FormatDataUtil::FormatNumber($vencidasAtual);
        $this->pendentesAtual = FormatDataUtil::FormatNumber($pendentesAtual);
        $this->pagasAtual = FormatDataUtil::FormatNumber($pagasAtual);
    }

    public function getPagas(): PagasValueObject
    {
        return $this->pagas;
    }

    public function getPendendentes(): PendendentesValueObject
    {
        return $this->pendendentes;
    }

    public function getVencidasAtual(): float
    {
        return $this->vencidasAtual;
    }

    public function getPendentesAtual(): float
    {
        return $this->pendentesAtual;
    }

    public function getPagasAtual(): float
    {
        return $this->pagasAtual;
    }

    public function setPagas(PagasValueObject $pagas): self
    {
        $this->pagas = $pagas;
        return $this;
    }

    public function setPendendentes(PendendentesValueObject $pendendentes): self
    {
        $this->pendendentes = $pendendentes;
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
