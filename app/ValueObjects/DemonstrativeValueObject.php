<?php

namespace App\ValueObjects;

final class DemonstrativeValueObject
{
    public NotasFiscaisValueObject $notasFiscais;

    public VendasValueObject $vendas;

    public FPagamentosValueObject $fPagamentos;

    public CaixaValueObject $caixa;

    public CadastrosValueObject $cadastros;

    public ContasReceberValueObject $contasReceber;

    public ContasPagarValueObject $contasPagar;

    /** @var CaixasAbertosValueObject[] */
    public array $caixasAbertos;

    public array $topProdutos;

    public LucrosPresumidosValueObject $lucrosPresumidos;

    /**
     * @param CaixasAbertosValueObject[] $caixasAbertos
     */
    public function __construct(
        NotasFiscaisValueObject     $notasFiscais,
        VendasValueObject           $vendas,
        FPagamentosValueObject      $fPagamentos,
        CaixaValueObject            $caixa,
        CadastrosValueObject        $cadastros,
        ContasReceberValueObject    $contasReceber,
        ContasPagarValueObject      $contasPagar,
        array                       $caixasAbertos,
        array                       $topProdutos,
        LucrosPresumidosValueObject $lucrosPresumidos
    )
    {
        $this->notasFiscais = $notasFiscais;
        $this->vendas = $vendas;
        $this->fPagamentos = $fPagamentos;
        $this->caixa = $caixa;
        $this->cadastros = $cadastros;
        $this->contasReceber = $contasReceber;
        $this->contasPagar = $contasPagar;
        $this->caixasAbertos = $caixasAbertos;
        $this->topProdutos = $topProdutos;
        $this->lucrosPresumidos = $lucrosPresumidos;
    }

    public function getNotasFiscais(): NotasFiscaisValueObject
    {
        return $this->notasFiscais;
    }

    public function getVendas(): VendasValueObject
    {
        return $this->vendas;
    }

    public function getFPagamentos(): FPagamentosValueObject
    {
        return $this->fPagamentos;
    }

    public function getCaixa(): CaixaValueObject
    {
        return $this->caixa;
    }

    public function getCadastros(): CadastrosValueObject
    {
        return $this->cadastros;
    }

    public function getContasReceber(): ContasReceberValueObject
    {
        return $this->contasReceber;
    }

    public function getContasPagar(): ContasPagarValueObject
    {
        return $this->contasPagar;
    }

    /**
     * @return CaixasAbertosValueObject[]
     */
    public function getCaixasAbertos(): array
    {
        return $this->caixasAbertos;
    }

    public function getTopProdutos(): array
    {
        return $this->topProdutos;
    }

    public function getLucrosPresumidos(): LucrosPresumidosValueObject
    {
        return $this->lucrosPresumidos;
    }

    public function setNotasFiscais(NotasFiscaisValueObject $notasFiscais): self
    {
        $this->notasFiscais = $notasFiscais;
        return $this;
    }

    public function setVendas(VendasValueObject $vendas): self
    {
        $this->vendas = $vendas;
        return $this;
    }

    public function setFPagamentos(FPagamentosValueObject $fPagamentos): self
    {
        $this->fPagamentos = $fPagamentos;
        return $this;
    }

    public function setCaixa(CaixaValueObject $caixa): self
    {
        $this->caixa = $caixa;
        return $this;
    }

    public function setCadastros(CadastrosValueObject $cadastros): self
    {
        $this->cadastros = $cadastros;
        return $this;
    }

    public function setContasReceber(ContasReceberValueObject $contasReceber): self
    {
        $this->contasReceber = $contasReceber;
        return $this;
    }

    public function setContasPagar(ContasPagarValueObject $contasPagar): self
    {
        $this->contasPagar = $contasPagar;
        return $this;
    }

    /**
     * @param CaixasAbertosValueObject[] $caixasAbertos
     */
    public function setCaixasAbertos(array $caixasAbertos): self
    {
        $this->caixasAbertos = $caixasAbertos;
        return $this;
    }

    public function setTopProdutos(array $topProdutos): self
    {
        $this->topProdutos = $topProdutos;
        return $this;
    }

    public function setLucrosPresumidos(LucrosPresumidosValueObject $lucrosPresumidos): self
    {
        $this->lucrosPresumidos = $lucrosPresumidos;
        return $this;
    }
}
