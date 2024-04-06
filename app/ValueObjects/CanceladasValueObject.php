<?php

namespace App\ValueObjects;

class CanceladasValueObject
{
    public int $valorVendas;

    public int $lurosPerdidos;

    public int $quantidadeProdutosPerdidos;

    public int $quantidadeVendasPerdidas;

    public function __construct(
        int $valorVendas,
        int $lurosPerdidos,
        int $quantidadeProdutosPerdidos,
        int $quantidadeVendasPerdidas
    )
    {
        $this->valorVendas = $valorVendas;
        $this->lurosPerdidos = $lurosPerdidos;
        $this->quantidadeProdutosPerdidos = $quantidadeProdutosPerdidos;
        $this->quantidadeVendasPerdidas = $quantidadeVendasPerdidas;
    }

    public function getValorVendas(): int
    {
        return $this->valorVendas;
    }

    public function getLurosPerdidos(): int
    {
        return $this->lurosPerdidos;
    }

    public function getQuantidadeProdutosPerdidos(): int
    {
        return $this->quantidadeProdutosPerdidos;
    }

    public function getQuantidadeVendasPerdidas(): int
    {
        return $this->quantidadeVendasPerdidas;
    }

    public function setValorVendas(int $valorVendas): self
    {
        $this->valorVendas = $valorVendas;
        return $this;
    }

    public function setLurosPerdidos(int $lurosPerdidos): self
    {
        $this->lurosPerdidos = $lurosPerdidos;
        return $this;
    }

    public function setQuantidadeProdutosPerdidos(int $quantidadeProdutosPerdidos): self
    {
        $this->quantidadeProdutosPerdidos = $quantidadeProdutosPerdidos;
        return $this;
    }

    public function setQuantidadeVendasPerdidas(int $quantidadeVendasPerdidas): self
    {
        $this->quantidadeVendasPerdidas = $quantidadeVendasPerdidas;
        return $this;
    }
}
