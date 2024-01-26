<?php

namespace App\ValueObjects;

use JsonSerializable;

class TopProdutos implements JsonSerializable
{
    private array $data;

    /**
     * @param array $data
     */
    protected function __construct(array $data)
    {
        $this->data = $data ?? [];
    }

    public function getData(): array
    {
        return $this->data;
    }

    public static function create(array $data) : TopProdutos
    {
        return new TopProdutos($data);
    }

    public function jsonSerialize()
    {
        $data = [];

        foreach ($this->getData() as $key => $value) {
            $arr = [
                'descricao' => $value->getDescricao(),
                'quantidade' => $value->getValor(),
            ];

            array_push($data, $arr);
        }

        return $data;
    }
}
