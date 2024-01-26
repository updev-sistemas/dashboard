<?php

namespace App\ValueObjects;

use JsonSerializable;

class CaixasAbertos  implements JsonSerializable{
    private array $caixas;

    protected function __construct(array $data)
    {
        $this->caixas = $data ?? [];
    }

    public function getCaixas(): array
    {
        return $this->caixas;
    }

    public static function create(array $data) : CaixasAbertos
    {
        return new CaixasAbertos($data);
    }

    public function jsonSerialize()
    {
        return $this->caixas;
    }
}
