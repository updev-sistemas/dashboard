<?php

namespace App\ValueObjects;

use JsonSerializable;

class Usuario implements JsonSerializable
{
    private int $comissao;
    private int $comissoes;
    private int $quantidadeprodutos;
    private int $quantidadevendas;
    private int $totalvendas;
    private string $usuario;
    private int $vendascanceladas;

    /**
     * @param int $comissao
     * @param int $comissoes
     * @param int $quantidadeprodutos
     * @param int $quantidadevendas
     * @param int $totalvendas
     * @param string $usuario
     * @param int $vendascanceladas
     */
    protected function __construct(int $comissao, int $comissoes, int $quantidadeprodutos, int $quantidadevendas, int $totalvendas, string $usuario, int $vendascanceladas)
    {
        $this->comissao = $comissao;
        $this->comissoes = $comissoes;
        $this->quantidadeprodutos = $quantidadeprodutos;
        $this->quantidadevendas = $quantidadevendas;
        $this->totalvendas = $totalvendas;
        $this->usuario = $usuario;
        $this->vendascanceladas = $vendascanceladas;
    }

    public function getComissao(): int
    {
        return $this->comissao;
    }

    public function getComissoes(): int
    {
        return $this->comissoes;
    }

    public function getQuantidadeprodutos(): int
    {
        return $this->quantidadeprodutos;
    }

    public function getQuantidadevendas(): int
    {
        return $this->quantidadevendas;
    }

    public function getTotalvendas(): int
    {
        return $this->totalvendas;
    }

    public function getUsuario(): string
    {
        return $this->usuario;
    }

    public function getVendascanceladas(): int
    {
        return $this->vendascanceladas;
    }

    public static function create(int $comissao, int $comissoes, int $quantidadeprodutos, int $quantidadevendas, int $totalvendas, string $usuario, int $vendascanceladas)
    {
        return new Usuario( $comissao, $comissoes, $quantidadeprodutos, $quantidadevendas, $totalvendas, $usuario, $vendascanceladas);
    }

    public function jsonSerialize()
    {
        return [
            "comissao" => $this->comissao,
            "comissoes" => $this->comissoes,
            "quantidadeprodutos" => $this->quantidadeprodutos,
            "quantidadevendas" => $this->quantidadevendas,
            "totalvendas" => $this->totalvendas,
            "usuario" => $this->usuario,
            "vendascanceladas" => $this->vendascanceladas,
        ];
    }
}
