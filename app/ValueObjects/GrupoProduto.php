<?php

namespace App\ValueObjects;

use JsonSerializable;

class GrupoProduto  implements JsonSerializable{
    private array $grupoProdutosDia;
    private array $grupoProdutosMes;
    private array $grupoProdutosSemana;

    protected function __construct(array $grupoProdutosDia, array $grupoProdutosMes, array $grupoProdutosSemana) {
        $this->grupoProdutosDia = $grupoProdutosDia ?? [];
        $this->grupoProdutosMes = $grupoProdutosMes ?? [];
        $this->grupoProdutosSemana = $grupoProdutosSemana ?? [];
    }

    public function getGrupoProdutosDia(): array
    {
        return $this->grupoProdutosDia;
    }

    public function getGrupoProdutosMes(): array
    {
        return $this->grupoProdutosMes;
    }

    public function getGrupoProdutosSemana(): array
    {
        return $this->grupoProdutosSemana;
    }



    public static function create(array $grupoProdutosDia, array $grupoProdutosMes, array $grupoProdutosSemana) {
        return new GrupoProduto($grupoProdutosDia, $grupoProdutosMes, $grupoProdutosSemana);
    }

    public function jsonSerialize()
    {
        $data = [];

        $grupoProdutosDia = [];
        foreach ($this->grupoProdutosDia as $key => $value) {
            $arr = [
                'descricao' => $value->getDescricao(),
                'total' => $value->getValor(),
            ];

            array_push($grupoProdutosDia, $arr);
        }
        $data['grupoProdutosDia'] = $grupoProdutosDia;

        $grupoProdutosMes = [];
        foreach ($this->grupoProdutosMes as $key => $value) {
            $arr = [
                'descricao' => $value->getDescricao(),
                'total' => $value->getValor(),
            ];

            array_push($grupoProdutosMes, $arr);
        }
        $data['grupoProdutosMes'] = $grupoProdutosMes;

        $grupoProdutosSemana = [];
        foreach ($this->grupoProdutosSemana as $key => $value) {
            $arr = [
                'descricao' => $value->getDescricao(),
                'total' => $value->getValor(),
            ];

            array_push($grupoProdutosSemana, $arr);
        }
        $data['grupoProdutosSemana'] = $grupoProdutosSemana;


        return $data;
    }
}
