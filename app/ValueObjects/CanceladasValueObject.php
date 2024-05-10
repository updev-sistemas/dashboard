<?php

namespace App\ValueObjects;

use App\Utils\Commons\FormatDataUtil;

final class CanceladasValueObject
{
    public float $valorVendas;

    public float $lurosPerdidos;

    public float $quantidadeProdutosPerdidos;

    public float $quantidadeVendasPerdidas;

    public function __construct(
        float $valorVendas,
        float $lurosPerdidos,
        float $quantidadeProdutosPerdidos,
        float $quantidadeVendasPerdidas
    )
    {
        $this->valorVendas = FormatDataUtil::FormatNumber($valorVendas);
        $this->lurosPerdidos = FormatDataUtil::FormatNumber($lurosPerdidos);
        $this->quantidadeProdutosPerdidos = FormatDataUtil::FormatNumber($quantidadeProdutosPerdidos);
        $this->quantidadeVendasPerdidas = FormatDataUtil::FormatNumber($quantidadeVendasPerdidas);
    }

    public function getValorVendas(): float
    {
        return $this->valorVendas;
    }

    public function getLurosPerdidos(): float
    {
        return $this->lurosPerdidos;
    }

    public function getQuantidadeProdutosPerdidos(): float
    {
        return $this->quantidadeProdutosPerdidos;
    }

    public function getQuantidadeVendasPerdidas(): float
    {
        return $this->quantidadeVendasPerdidas;
    }

    public function setValorVendas(float $valorVendas): self
    {
        $this->valorVendas = $valorVendas;
        return $this;
    }

    public function setLurosPerdidos(float $lurosPerdidos): self
    {
        $this->lurosPerdidos = $lurosPerdidos;
        return $this;
    }

    public function setQuantidadeProdutosPerdidos(float $quantidadeProdutosPerdidos): self
    {
        $this->quantidadeProdutosPerdidos = $quantidadeProdutosPerdidos;
        return $this;
    }

    public function setQuantidadeVendasPerdidas(float $quantidadeVendasPerdidas): self
    {
        $this->quantidadeVendasPerdidas = $quantidadeVendasPerdidas;
        return $this;
    }
}
