<?php

namespace App\Validators;

class UsuarioValidator{
    public static function rules()
    {
        return [
            'usuario' => 'required',
            'comissao' => 'required|numeric',
            'comissoes' => 'required|numeric',
            'quantidadeprodutos' => 'required|numeric',
            'quantidadevendas' => 'required|numeric',
            'totalvendas' => 'required|numeric',
            'vendascanceladas' => 'required|numeric',
        ];
    }

    public static function messages()
    {
        return [
            'usuario.required' => 'usuario foi omitido.',
            'comissao.required' => 'comissao foi omitido.',
            'comissoes.required' => 'comissoes foi omitido.',
            'quantidadeprodutos.required' => 'quantidadeprodutos foi omitido.',
            'quantidadevendas.required' => 'quantidadevendas foi omitido.',
            'totalvendas.required' => 'totalvendas foi omitido.',
            'vendascanceladas.required' => 'vendascanceladas foi omitido.',
            'comissao.numeric' => 'comissao estava com formato inválido para um numero.',
            'comissoes.numeric' => 'comissoes estava com formato inválido para um numero.',
            'quantidadeprodutos.numeric' => 'quantidadeprodutos estava com formato inválido para um numero.',
            'quantidadevendas.numeric' => 'quantidadevendas estava com formato inválido para um numero.',
            'totalvendas.numeric' => 'totalvendas estava com formato inválido para um numero.',
            'vendascanceladas.numeric' => 'vendascanceladas estava com formato inválido para um numero.',
        ];
    }
}
