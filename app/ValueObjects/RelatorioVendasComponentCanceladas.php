<?php

namespace App\ValueObjects;

use App\Utils\Commons\FormatDataUtil;
use JsonSerializable;

class RelatorioVendasComponentCanceladas implements JsonSerializable
{
    private float $valorVendas;
    private float $lurosPerdidos;
    private float $quantidadeProdutosPerdidos;
    private float $quantidadeVendasPerdidas;

    /**
     * @param float $valorVendas
     * @param float $lurosPerdidos
     * @param float $quantidadeProdutosPerdidos
     * @param float $quantidadeVendasPerdidas
     */
    protected function __construct(float $valorVendas, float $lurosPerdidos, float $quantidadeProdutosPerdidos, float $quantidadeVendasPerdidas)
    {
        $this->valorVendas = FormatDataUtil::FormatNumber($valorVendas ?? 0);
        $this->lurosPerdidos = FormatDataUtil::FormatNumber($lurosPerdidos ?? 0);
        $this->quantidadeProdutosPerdidos = FormatDataUtil::FormatNumber($quantidadeProdutosPerdidos ?? 0);
        $this->quantidadeVendasPerdidas = FormatDataUtil::FormatNumber($quantidadeVendasPerdidas ?? 0);
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

    public static function create(float $valorVendas, float $lurosPerdidos, float $quantidadeProdutosPerdidos, float $quantidadeVendasPerdidas) : RelatorioVendasComponentCanceladas
    {
        return new RelatorioVendasComponentCanceladas($valorVendas, $lurosPerdidos, $quantidadeProdutosPerdidos, $quantidadeVendasPerdidas);
    }

    public function jsonSerialize()
    {
         return [
             "valorVendas" => $this->valorVendas,
             "lucrosPerdidos" => $this->lurosPerdidos,
             "QuantidadeProdutosPerdidos" => $this->quantidadeProdutosPerdidos,
             "QuantidadeVendasPerdidas" => $this->quantidadeVendasPerdidas
         ];
    }
}
