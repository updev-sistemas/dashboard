<?php

namespace App\ValueObjects;

use App\Utils\Commons\FormatDataUtil;
use JsonSerializable;

class KeyValuePair implements JsonSerializable
{
    private string $descricao;
    private float $valor;

    /**
     * @param string $descricao
     * @param float $valor
     */
    protected function __construct(string $descricao, float $valor)
    {
        $this->descricao = $descricao ?? "Não Especificado";
        $this->valor = FormatDataUtil::FormatNumber($valor ?? 0);
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public static function create(string $descricao, float $valor)
    {
        return new KeyValuePair($descricao, $valor);
    }

    public function jsonSerialize()
    {
        return [
            "descricao" => $this->descricao,
            "valor" => $this->valor
        ];
    }
}
