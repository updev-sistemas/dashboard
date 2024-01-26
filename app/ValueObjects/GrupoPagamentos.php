<?php

namespace App\ValueObjects;
use JsonSerializable;

class GrupoPagamentos  implements JsonSerializable{
    private array $pagamentosDia;
    private array $pagamentosMes;
    private array $pagamentosSemana;

    protected function __construct(array $pagamentosDia, array $pagamentosMes, array $pagamentosSemana) {
        $this->pagamentosDia = $pagamentosDia ?? [];
        $this->pagamentosMes = $pagamentosMes ?? [];
        $this->pagamentosSemana = $pagamentosSemana ?? [];
    }

    public function getPagamentosDia(): array
    {
        return $this->pagamentosDia;
    }

    public function getPagamentosMes(): array
    {
        return $this->pagamentosMes;
    }

    public function getPagamentosSemana(): array
    {
        return $this->pagamentosSemana;
    }

    public static function create(array $pagamentosDia, array $pagamentosMes,array  $pagamentosSemana) {
        return new GrupoPagamentos($pagamentosDia, $pagamentosMes, $pagamentosSemana);
    }

    public function jsonSerialize()
    {
        $data = [];

        $grupoProdutosDia = [];
        foreach ($this->pagamentosDia as $key => $value) {
            $arr = [
                'descricao' => $value->getDescricao(),
                'value' => $value->getValor(),
            ];

            array_push($grupoProdutosDia, $arr);
        }
        $data['pagamentosDia'] = $grupoProdutosDia;

        $grupoProdutosMes = [];
        foreach ($this->pagamentosMes as $key => $value) {
            $arr = [
                'descricao' => $value->getDescricao(),
                'value' => $value->getValor(),
            ];

            array_push($grupoProdutosMes, $arr);
        }
        $data['pagamentosMes'] = $grupoProdutosMes;

        $grupoProdutosSemana = [];
        foreach ($this->pagamentosSemana as $key => $value) {
            $arr = [
                'descricao' => $value->getDescricao(),
                'value' => $value->getValor(),
            ];

            array_push($grupoProdutosSemana, $arr);
        }
        $data['pagamentosSemana'] = $grupoProdutosSemana;

        return $data;
    }
}
