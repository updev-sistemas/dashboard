<?php

namespace App\ValueObjects;

use JsonSerializable;

class Cadastros implements JsonSerializable
{
    private int $produtos;
    private int $clientes;
    private int $usuarios;
    private int $fornecedores;

    /**
     * @param $produtos
     * @param $clientes
     * @param $usuarios
     * @param $fornecedores
     */
    protected function __construct($produtos, $clientes, $usuarios, $fornecedores)
    {
        $this->produtos = $produtos ?? 0;
        $this->clientes = $clientes ?? 0;
        $this->usuarios = $usuarios ?? 0;
        $this->fornecedores = $fornecedores ?? 0;
    }

    /**
     * @return mixed
     */
    public function getProdutos() : int
    {
        return $this->produtos;
    }

    /**
     * @return mixed
     */
    public function getClientes() : int
    {
        return $this->clientes;
    }

    /**
     * @return mixed
     */
    public function getUsuarios() : int
    {
        return $this->usuarios;
    }

    /**
     * @return mixed
     */
    public function getFornecedores() : int
    {
        return $this->fornecedores;
    }

    public static function create($produtos, $clientes, $usuarios, $fornecedores)
    {
        return new Cadastros($produtos, $clientes, $usuarios, $fornecedores);
    }

    public function jsonSerialize()
    {
        return [
            "produtos" => $this->produtos,
            "clientes" => $this->clientes,
            "usuarios" => $this->usuarios,
            "fornecedores" => $this->fornecedores
        ];
    }
}
