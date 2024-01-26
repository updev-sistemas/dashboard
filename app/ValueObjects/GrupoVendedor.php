<?php

namespace App\ValueObjects;
use JsonSerializable;

class GrupoVendedor  implements JsonSerializable{
    private array $vendedorDia;
    private array $vendedorMes;
    private array $vendedorSemana;

    protected function __construct(array $vendedorDia, array $vendedorMes, array $vendedorSemana) {
        $this->vendedorDia = $vendedorDia ?? [];
        $this->vendedorMes = $vendedorMes ?? [];
        $this->vendedorSemana = $vendedorSemana ?? [];
    }

    public function getVendedorDia(): array
    {
        return $this->vendedorDia;
    }

    public function getVendedorMes(): array
    {
        return $this->vendedorMes;
    }

    public function getVendedorSemana(): array
    {
        return $this->vendedorSemana;
    }

    public static function create(array $vendedorDia, array $vendedorMes, array $vendedorSemana) {
        return new GrupoVendedor($vendedorDia, $vendedorMes, $vendedorSemana);
    }

    public function jsonSerialize()
    {
        $data = [];

        $grupoProdutosDia = [];
        foreach ($this->vendedorDia as $key => $value) {
            $arr = [
                'descricao' => $value->getDescricao(),
                'value' => $value->getValor(),
            ];

            array_push($grupoProdutosDia, $arr);
        }
        $data['vendedorDia'] = $grupoProdutosDia;

        $grupoProdutosMes = [];
        foreach ($this->vendedorMes as $key => $value) {
            $arr = [
                'descricao' => $value->getDescricao(),
                'value' => $value->getValor(),
            ];

            array_push($grupoProdutosMes, $arr);
        }
        $data['vendedorMes'] = $grupoProdutosMes;

        $grupoProdutosSemana = [];
        foreach ($this->vendedorSemana as $key => $value) {
            $arr = [
                'descricao' => $value->getDescricao(),
                'value' => $value->getValor(),
            ];

            array_push($grupoProdutosSemana, $arr);
        }
        $data['vendedorSemana'] = $grupoProdutosSemana;

        return $data;
    }
}
