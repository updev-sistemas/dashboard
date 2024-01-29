<?php

namespace App\ValueObjects;

class DashbordPageValueObject
{
    private NotasFiscais $notasFiscais;
    private Caixa $caixa;
    private GrupoPagamentos $grupoPagamentos;
    private GrupoVendedor $grupoVendedor;
    private GrupoProduto $grupoProduto;
    private TopProdutos $topProdutos;
    private LucrosPresumidos $lucrosPresumidos;
    private Cadastros $cadastros;


    private Vendas $vendas;
    private ContasPagar $contasPagar;
    private ContasReceber $contasReceber;
    private CaixasAbertos $caixasAbertos;
}
