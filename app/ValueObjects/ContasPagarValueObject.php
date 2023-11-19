<?php

namespace App\ValueObjects;

final class ContasPagarValueObject
{
    public PagasValueObject $pagas;

    public PendendentesValueObject $pendendentes;

    public int $vencidasAtual;

    public int $pendentesAtual;

    public int $pagasAtual;

    public function __construct(
        PagasValueObject        $pagas,
        PendendentesValueObject $pendendentes,
        int                     $vencidasAtual,
        int                     $pendentesAtual,
        int                     $pagasAtual
    )
    {
        $this->pagas = $pagas;
        $this->pendendentes = $pendendentes;
        $this->vencidasAtual = $vencidasAtual;
        $this->pendentesAtual = $pendentesAtual;
        $this->pagasAtual = $pagasAtual;
    }

    public function getPagas(): PagasValueObject
    {
        return $this->pagas;
    }

    public function getPendendentes(): PendendentesValueObject
    {
        return $this->pendendentes;
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
