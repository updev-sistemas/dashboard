<?php

namespace App\ValueObjects;

final class CadastrosValueObject
{
    public string $produtos;

    public string $clientes;

    public string $usuarios;

    public string $fornecedores;

    public function __construct(
        string $produtos,
        string $clientes,
        string $usuarios,
        string $fornecedores
    )
    {
        $this->produtos = $produtos;
        $this->clientes = $clientes;
        $this->usuarios = $usuarios;
        $this->fornecedores = $fornecedores;
    }

    public function getProdutos(): string
    {
        return $this->produtos;
    }

    public function getClientes(): string
    {
        return $this->clientes;
    }

    public function getUsuarios(): string
    {
        return $this->usuarios;
    }

    public function getFornecedores(): string
    {
        return $this->fornecedores;
    }

    public function setProdutos(string $produtos): self
    {
        $this->produtos = $produtos;
        return $this;
    }

    public function setClientes(string $clientes): self
    {
        $this->clientes = $clientes;
        return $this;
    }

    public function setUsuarios(string $usuarios): self
    {
        $this->usuarios = $usuarios;
        return $this;
    }

    public function setFornecedores(string $fornecedores): self
    {
        $this->fornecedores = $fornecedores;
        return $this;
    }
}
