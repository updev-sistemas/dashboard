<?php

namespace App\ValueObjects;

use JsonSerializable;

class Payload implements JsonSerializable
{
    private NotasFiscais $notasFiscais;
    private Vendas $vendas;
    private GrupoPagamentos $grupoPagamentos;
    private GrupoVendedor $grupoVendedor;
    private GrupoProduto $grupoProduto;
    private Caixa $caixa;
    private Cadastros $cadastros;
    private ContasPagar $contasPagar;
    private ContasReceber $contasReceber;
    private CaixasAbertos $caixasAbertos;
    private TopProdutos $topProdutos;
    private LucrosPresumidos $lucrosPresumidos;

    /**
     * @param NotasFiscais $notasFiscais
     * @param Vendas $vendas
     * @param GrupoPagamentos $grupoPagamentos
     * @param GrupoVendedor $grupoVendedor
     * @param GrupoProduto $grupoProduto
     * @param Caixa $caixa
     * @param Cadastros $cadastros
     * @param ContasPagar $contasPagar
     * @param ContasReceber $contasReceber
     * @param CaixasAbertos $caixasAbertos
     * @param TopProdutos $topProdutos
     * @param LucrosPresumidos $lucrosPresumidos
     */
    protected function __construct(NotasFiscais $notasFiscais, Vendas $vendas, GrupoPagamentos $grupoPagamentos, GrupoVendedor $grupoVendedor, GrupoProduto $grupoProduto, Caixa $caixa, Cadastros $cadastros, ContasPagar $contasPagar, ContasReceber $contasReceber, CaixasAbertos $caixasAbertos, TopProdutos $topProdutos, LucrosPresumidos $lucrosPresumidos)
    {
        $this->notasFiscais = $notasFiscais;
        $this->vendas = $vendas;
        $this->grupoPagamentos = $grupoPagamentos;
        $this->grupoVendedor = $grupoVendedor;
        $this->grupoProduto = $grupoProduto;
        $this->caixa = $caixa;
        $this->cadastros = $cadastros;
        $this->contasPagar = $contasPagar;
        $this->contasReceber = $contasReceber;
        $this->caixasAbertos = $caixasAbertos;
        $this->topProdutos = $topProdutos;
        $this->lucrosPresumidos = $lucrosPresumidos;
    }

    public function getNotasFiscais(): NotasFiscais
    {
        return $this->notasFiscais;
    }

    public function getVendas(): Vendas
    {
        return $this->vendas;
    }

    public function getGrupoPagamentos(): GrupoPagamentos
    {
        return $this->grupoPagamentos;
    }

    public function getGrupoVendedor(): GrupoVendedor
    {
        return $this->grupoVendedor;
    }

    public function getGrupoProduto(): GrupoProduto
    {
        return $this->grupoProduto;
    }

    public function getCaixa(): Caixa
    {
        return $this->caixa;
    }

    public function getCadastros(): Cadastros
    {
        return $this->cadastros;
    }

    public function getContasPagar(): ContasPagar
    {
        return $this->contasPagar;
    }

    public function getContasReceber(): ContasReceber
    {
        return $this->contasReceber;
    }

    public function getCaixasAbertos(): CaixasAbertos
    {
        return $this->caixasAbertos;
    }

    public function getTopProdutos(): TopProdutos
    {
        return $this->topProdutos;
    }

    public function getLucrosPresumidos(): LucrosPresumidos
    {
        return $this->lucrosPresumidos;
    }

    public static function create(NotasFiscais $notasFiscais, Vendas $vendas, GrupoPagamentos $grupoPagamentos, GrupoVendedor $grupoVendedor, GrupoProduto $grupoProduto, Caixa $caixa, Cadastros $cadastros, ContasPagar $contasPagar, ContasReceber $contasReceber, CaixasAbertos $caixasAbertos, TopProdutos $topProdutos, LucrosPresumidos $lucrosPresumidos)
    {
        return new Payload($notasFiscais, $vendas, $grupoPagamentos, $grupoVendedor, $grupoProduto, $caixa, $cadastros, $contasPagar, $contasReceber, $caixasAbertos, $topProdutos, $lucrosPresumidos);
    }

    public function jsonSerialize()
    {
        return [
            "cadastros" => $this->cadastros,
            "caixa" => $this->caixa,
            "caixasAbertos" => $this->caixasAbertos,
            "contasPagar" => $this->contasPagar,
            "contasReceber" => $this->contasReceber,
            "grupoProdutos" => $this->grupoProduto,
            "lucrosPresumidos" => $this->lucrosPresumidos,
            "notasFiscais" => $this->notasFiscais,
            "pagamentos" => $this->grupoPagamentos,
            "produtosMaisVendidos" => $this->topProdutos,
            "vendas" => $this->vendas,
            "vendedor" => $this->grupoVendedor
        ];
    }
}
