@extends('layouts.app')
@section('head')
@endsection

@section('pageTitle')
    Relatório de {{ $enterprise->fantasia }}
@endsection

@section('content')
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    @if (auth()->user()->isAdministratorUser())
                        <a href="{{ route('env_adm') }}">Inicio</a>
                    @else
                        <a href="{{ route('env_ctm') }}">Inicio</a>
                    @endif
                </li>
                <li class="breadcrumb-item active" aria-current="page">Caixas Abertos</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Vendas Hoje</p>
                                    <h2  id="totalVendas2" class="font-weight-bold">{{ App\Utils\Commons\FormatDataUtil::FormatMoney($payload->lucrosPresumidos->relatorioVendas->concluidas->valorVendas ?? 0) }}</h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/money_bag.png') }}" alt="Uma imagem impressionante">
                                    </figure>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center">
                                <span class="text-success d-inline-flex align-items-center mr-2">
                                <p  id="mesAno" class="text-muted">Mês atual</p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Qtd de vendas Hoje</p>
                                    <h2 id="quantidadeVendas2" class="font-weight-bold">{{ App\Utils\Commons\FormatDataUtil::FormatMoney($payload->lucrosPresumidos->relatorioVendas->concluidas->quantidadeVendas ?? 0) }}</h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/quanVendas.png') }}">
                                    </figure>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center">
                                <span class="text-danger d-inline-flex align-items-center mr-2">
                                <p  id="mesAnoQuantidadeVendas" class="text-muted">Mês atual</p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Ticket Médio</p>
                                    <h2 id="meusLucros2" class="font-weight-bold">{{ App\Utils\Commons\FormatDataUtil::FormatMoney($payload->lucrosPresumidos->relatorioVendas->concluidas->totalLucros ?? 0) }}</h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/lucros.png') }}">
                                    </figure>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center">
                                <span class="text-success d-inline-flex align-items-center mr-2">
                                <p id="lucrosUpdate"  class="text-muted"></p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">Formas de pagamento Hoje</h6>
                        <div>
                        </div>
                    </div>
                    @if ((isset($payload->f_pagamentosDia) && count($payload->f_pagamentosDia) > 0)
                      || (isset($payload->f_pagamentosSemana) && count($payload->f_pagamentosSemana) > 0)
                      || (isset($payload->f_pagamentosMes) && count($payload->f_pagamentosMes) > 0))
                    <div class="grhpag" id="graficoFormasPagament1o"></div>
                    <div>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @php $isFPagamentoDia = true; @endphp
                            @if (isset($payload->f_pagamentosDia) && count($payload->f_pagamentosDia) > 0)
                            <li class="nav-item" id="tabDia" role="presentation">
                                <button class="nav-link {{ $isFPagamentoDia ? 'active' : '' }}" id="pills-dia-tab" data-toggle="pill" data-target="#f_pagamentosDia" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Dia</button>
                                @php $isFPagamentoDia = false; @endphp
                            </li>
                            @endif
                            @if (isset($payload->f_pagamentosSemana) && count($payload->f_pagamentosSemana) > 0)
                            <li class="nav-item" id="tabSemana" role="presentation">
                                <button class="nav-link {{ $isFPagamentoDia ? 'active' : '' }}" id="pills-semana-tab" data-toggle="pill" data-target="#f_pagamentosSemana" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Semana</button>
                                @php $isFPagamentoDia = false; @endphp
                            </li>
                            @endif
                            @if (isset($payload->f_pagamentosMes) && count($payload->f_pagamentosMes) > 0)
                            <li class="nav-item" id="tabMes" role="presentation">
                                <button class="nav-link {{ $isFPagamentoDia ? 'active' : '' }}" id="pills-mes-tab" data-toggle="pill" data-target="#f_pagamentosMes" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Mês</button>
                                @php $isFPagamentoDia = false; @endphp
                            </li>
                            @endif
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            @php $isFPagamentoDiaDiv = true; @endphp
                            @if (isset($payload->f_pagamentosDia))
                            <div class="tab-pane fade {{ $isFPagamentoDiaDiv ? 'show active' : '' }}" id="f_pagamentosDia" role="tabpanel" aria-labelledby="pills-dia-tab">
                                <ul class="list-group list-group-flush">
                                    @foreach ($payload->f_pagamentosDia as $key => $obj)
                                    <li class="list-group-item pl-0 pr-0">
                                        <i class="fa fa-circle mr-1 text-warning"></i> {{ $obj->descricao }} ({{ App\Utils\Commons\FormatDataUtil::FormatMoney($obj->valor) }})
                                    </li>
                                    @endforeach
                                    <li>
                                        <p style="margin-top:20px;" class="text-center">
                                            <strong>Total</strong>: {{ App\Utils\Commons\FormatDataUtil::FormatMoney(str_replace(',','.', ''.collect($payload->f_pagamentosDia)->sum('valor'))) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            @php $isFPagamentoDiaDiv = false; @endphp
                            @endif
                            @if (isset($payload->f_pagamentosSemana))
                            <div class="tab-pane fade  {{ $isFPagamentoDiaDiv ? 'show active' : '' }}" id="f_pagamentosSemana" role="tabpanel" aria-labelledby="pills-semana-tab">
                                <ul class="list-group list-group-flush">
                                    @foreach ($payload->f_pagamentosSemana as $key => $obj)
                                    <li class="list-group-item pl-0 pr-0">
                                        <i class="fa fa-circle mr-1 text-warning"></i> {{ $obj->descricao }} ({{ App\Utils\Commons\FormatDataUtil::FormatMoney($obj->valor) }})
                                    </li>
                                    @endforeach
                                    <li>
                                        <p style="margin-top:20px;" class="text-center">
                                            <strong>Total</strong>: {{ App\Utils\Commons\FormatDataUtil::FormatMoney(str_replace(',','.', ''.collect($payload->f_pagamentosSemana)->sum('valor'))) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            @php $isFPagamentoDiaDiv = false; @endphp
                            @endif
                            @if (isset($payload->f_pagamentosMes))
                            <div class="tab-pane fade  {{ $isFPagamentoDiaDiv ? 'show active' : '' }}" id="f_pagamentosMes" role="tabpanel" aria-labelledby="pills-mes-tab">
                                <ul class="list-group list-group-flush">
                                    @foreach ($payload->f_pagamentosMes as $key => $obj)
                                    <li class="list-group-item pl-0 pr-0">
                                        <i class="fa fa-circle mr-1 text-warning"></i> {{ $obj->descricao }} ({{ App\Utils\Commons\FormatDataUtil::FormatMoney($obj->valor) }})
                                    </li>
                                    @endforeach
                                    <li>
                                        <p style="margin-top:20px;" class="text-center">
                                            <strong>Total</strong>: {{ App\Utils\Commons\FormatDataUtil::FormatMoney(str_replace(',','.', ''.collect($payload->f_pagamentosMes)->sum('valor'))) }}
                                        </p>
                                    </li>
                                </ul>
                            </div>
                            @php $isFPagamentoDiaDiv = false; @endphp
                            @endif
                        </div>
                    </div>
                    @else
                        <h4>Aguardando <dados class=""></dados></h4>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">Resumo vendas por vendedor</h6>
                        <div>
                        </div>
                    </div>
                    @if ((isset($payload->f_vendedorDia) && count($payload->f_vendedorDia) > 0)
                      || (isset($payload->f_vendedorSemana) && count($payload->f_vendedorSemana) > 0)
                      || (isset($payload->f_vendedorMes) && count($payload->f_vendedorMes) > 0))
                    <div class="grhpag"  id="graficoVendedo1r"></div>
                    <div>
                        @php $isFvendedorDia = true; @endphp
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @if (isset($payload->f_vendedorDia))
                                <li class="nav-item" id="tabVendedorDia" role="presentation">
                                    <button class="nav-link {{ $isFvendedorDia ? 'active' : '' }}" id="vendedor-dia-tab" data-toggle="pill" data-target="#f_vendedorDia" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Dia</button>
                                </li>
                                @php $isFvendedorDia = false; @endphp
                            @endif
                            @if (isset($payload->f_vendedorSemana))
                                <li class="nav-item" id="tabVendedorSemana" role="presentation">
                                    <button class="nav-link {{ $isFvendedorDia ? 'active' : '' }}" id="vendedor-semana-tab" data-toggle="pill" data-target="#f_vendedorSemana" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Semana</button>
                                </li>
                                    @php $isFvendedorDia = false; @endphp
                            @endif
                            @if (isset($payload->f_vendedorMes))
                                <li class="nav-item" id="tabVendedorMes" role="presentation">
                                    <button class="nav-link {{ $isFvendedorDia ? 'active' : '' }}" id="vendedor-mes-tab" data-toggle="pill" data-target="#f_vendedorMes" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Mês</button>
                                </li>
                                    @php $isFvendedorDia = false; @endphp
                            @endif
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            @php $isFvendedorDiaDiv = true; @endphp
                            @if (isset($payload->f_vendedorDia))
                                <div class="tab-pane fade {{ $isFvendedorDiaDiv ? 'show active' : '' }}" id="f_vendedorDia" role="tabpanel" aria-labelledby="vendedor-dia-tab">
                                    <ul class="list-group list-group-flush">
                                        @foreach ($payload->f_vendedorDia as $key => $obj)
                                            <li class="list-group-item pl-0 pr-0">
                                                <i class="fa fa-circle mr-1 text-warning"></i> {{ $obj->descricao }} ({{ App\Utils\Commons\FormatDataUtil::FormatMoney($obj->valor) }})
                                            </li>
                                        @endforeach
                                        <li>
                                            <p style="margin-top:20px;" class="text-center">
                                                <strong>Total</strong>: {{ App\Utils\Commons\FormatDataUtil::FormatMoney(str_replace(',','.', ''.collect($payload->f_vendedorDia)->sum('valor'))) }}
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                @php $isFvendedorDiaDiv = false; @endphp
                            @endif
                            @if (isset($payload->f_vendedorSemana))
                                <div class="tab-pane fade {{ $isFvendedorDiaDiv ? 'show active' : '' }}" id="f_vendedorSemana" role="tabpanel" aria-labelledby="vendedor-semana-tab">
                                    <ul class="list-group list-group-flush">
                                        @foreach ($payload->f_vendedorSemana as $key => $obj)
                                            <li class="list-group-item pl-0 pr-0">
                                                <i class="fa fa-circle mr-1 text-warning"></i> {{ $obj->descricao }} ({{ App\Utils\Commons\FormatDataUtil::FormatMoney($obj->valor) }})
                                            </li>
                                        @endforeach
                                        <li>
                                            <p style="margin-top:20px;" class="text-center">
                                                <strong>Total</strong>: {{ App\Utils\Commons\FormatDataUtil::FormatMoney(str_replace(',','.', ''.collect($payload->f_vendedorSemana)->sum('valor'))) }}
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                @php $isFvendedorDiaDiv = false; @endphp
                            @endif
                            @if (isset($payload->f_vendedorMes))
                                <div class="tab-pane fade {{ $isFvendedorDiaDiv ? 'show active' : '' }}" id="f_vendedorMes" role="tabpanel" aria-labelledby="vendedor-mes-tab">
                                    <ul class="list-group list-group-flush">
                                        @foreach ($payload->f_vendedorMes as $key => $obj)
                                            <li class="list-group-item pl-0 pr-0">
                                                <i class="fa fa-circle mr-1 text-warning"></i> {{ $obj->descricao }} ({{ App\Utils\Commons\FormatDataUtil::FormatMoney($obj->valor) }})
                                            </li>
                                        @endforeach
                                        <li>
                                            <p style="margin-top:20px;" class="text-center">
                                                <strong>Total</strong>: {{ App\Utils\Commons\FormatDataUtil::FormatMoney(str_replace(',','.', ''.collect($payload->f_vendedorMes)->sum('valor'))) }}
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                @php $isFvendedorDiaDiv = false; @endphp
                            @endif
                        </div>
                    </div>
                    @else
                        <h4>Aguardando dados.</h4>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">Grupos de produtos</h6>
                        <div>
                        </div>
                    </div>
                    @if ((isset($payload->f_grupoProdutosDia) && count($payload->f_grupoProdutosDia) > 0)
                      || (isset($payload->f_grupoProdutosSemana) && count($payload->f_grupoProdutosSemana) > 0)
                      || (isset($payload->f_grupoProdutosMes) && count($payload->f_grupoProdutosMes) > 0))
                    <div class="grhpag"  id="graficoProduto1s"></div>
                    <div>
                        @php $isFgrupoProdutosDia = true; @endphp
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @if (isset($payload->f_grupoProdutosDia) && (count($payload->f_grupoProdutosDia) > 0))
                                <li class="nav-item" id="tabProdutosDia" role="presentation">
                                    <button class="nav-link {{ $isFgrupoProdutosDia ? 'active' : '' }}" id="produtos-dia-tab" data-toggle="pill" data-target="#f_grupoProdutosDia" type="button" role="tab" aria-controls="produtos-dia-tab" aria-selected="true">Dia</button>
                                    @php $isFgrupoProdutosDia = false; @endphp
                                </li>
                            @endif
                            @if (isset($payload->f_grupoProdutosSemana) && (count($payload->f_grupoProdutosSemana) > 0))
                                <li class="nav-item" id="tabProdutosSemana" role="presentation">
                                    <button class="nav-link active" id="produtos-semana-tab" data-toggle="pill" data-target="#f_grupoProdutosSemana" type="button" role="tab" aria-controls="produtos-semana-tab" aria-selected="false">Semana</button>
                                    @php $isFgrupoProdutosDia = false; @endphp
                                </li>
                            @endif
                            @if (isset($payload->f_grupoProdutosMes) && (count($payload->f_grupoProdutosMes) > 0))
                                <li class="nav-item" id="tabProdutosMes" role="presentation">
                                    <button class="nav-link  {{ $isFgrupoProdutosDia ? 'active' : '' }}" id="produtos-mes-tab" data-toggle="pill" data-target="#f_grupoProdutosMes" type="button" role="tab" aria-controls="produtos-mes-tab" aria-selected="false">Mês</button>
                                    @php $isFgrupoProdutosDia = false; @endphp
                                </li>
                            @endif
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            @php $isFgrupoProdutosDiv = true; @endphp
                            @if (isset($payload->f_grupoProdutosDia) && (count($payload->f_grupoProdutosDia) > 0))
                                <div class="tab-pane fade {{ $isFgrupoProdutosDiv ? 'show active' : '' }}" id="f_grupoProdutosDia" role="tabpanel" aria-labelledby="produtos-dia-tab">
                                    <ul class="list-group list-group-flush">
                                        @foreach ($payload->f_grupoProdutosDia as $key => $obj)
                                            <li class="list-group-item pl-0 pr-0">
                                                <i class="fa fa-circle mr-1 text-warning"></i> {{ $obj->descricao }} ({{ App\Utils\Commons\FormatDataUtil::FormatMoney($obj->valor) }})
                                            </li>
                                        @endforeach
                                        <li>
                                            <p style="margin-top:20px;" class="text-center">
                                                <strong>Total</strong>: {{ App\Utils\Commons\FormatDataUtil::FormatMoney(str_replace(',','.', ''.collect($payload->f_grupoProdutosDia)->sum('valor'))) }}
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                @php $isFgrupoProdutosDiv = false; @endphp
                            @endif
                            @if (isset($payload->f_grupoProdutosSemana) && (count($payload->f_grupoProdutosSemana) > 0))
                                <div class="tab-pane  fade {{ $isFgrupoProdutosDiv ? 'show active' : '' }}" id="f_grupoProdutosSemana" role="tabpanel" aria-labelledby="produtos-semana-tab">
                                    <ul class="list-group list-group-flush">
                                            @foreach ($payload->f_grupoProdutosSemana as $key => $obj)
                                                <li class="list-group-item pl-0 pr-0">
                                                    <i class="fa fa-circle mr-1 text-warning"></i> {{ $obj->descricao }} ({{ App\Utils\Commons\FormatDataUtil::FormatMoney($obj->valor) }})

                                                    @php $total5 += App\Utils\Commons\FormatDataUtil::FormatNumber($obj->valor);  @endphp
                                                </li>
                                            @endforeach
                                        <li>
                                            <p style="margin-top:20px;" class="text-center">
                                                <strong>Total</strong>: {{ App\Utils\Commons\FormatDataUtil::FormatMoney(str_replace(',','.', ''.collect($payload->f_grupoProdutosSemana)->sum('valor'))) }}
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                @php $isFgrupoProdutosDiv = false; @endphp
                            @endif
                            @if (isset($payload->f_grupoProdutosMes) && count($payload->f_grupoProdutosMes) > 0)
                                <div class="tab-pane  fade {{ $isFgrupoProdutosDiv ? 'show active' : '' }}" id="f_grupoProdutosMes" role="tabpanel" aria-labelledby="produtos-mes-tab">
                                    <ul class="list-group list-group-flush">
                                            @foreach ($payload->f_grupoProdutosMes as $key => $obj)
                                                <li class="list-group-item pl-0 pr-0">
                                                    <i class="fa fa-circle mr-1 text-warning"></i> {{ $obj->descricao }} ({{ App\Utils\Commons\FormatDataUtil::FormatMoney($obj->valor) }})
                                                </li>
                                            @endforeach
                                        <li>
                                            <p style="margin-top:20px;" class="text-center">
                                                <strong>Total</strong>: {{ App\Utils\Commons\FormatDataUtil::FormatMoney(str_replace(',','.', ''.collect($payload->f_grupoProdutosMes)->sum('valor'))) }}
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                @php $isFgrupoProdutosDiv = false; @endphp
                            @endif
                        </div>
                    </div>
                    @else
                    <h4>Aguardando dados.</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">Fluxo do caixa Anual</h6>
                    </div>
                    <p  id="saldosUpdate" class="text-muted"></p>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="d-flex align-items-start">
                                <i class="fa fa-circle text-primary mr-2"></i>
                                <div>
                                    <h4 id="entradacaixaAtual" class="font-weight-bold line-height-18">{{ App\Utils\Commons\FormatDataUtil::FormatMoney($payload->caixa->EntradaAtual ?? 0) }}</h4>
                                    <div class="text-muted">Entradas</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="d-flex align-items-start">
                                <i class="fa fa-circle text-secondary mr-2"></i>
                                <div>
                                    <h4 id="saidacaixaAtual"  class="font-weight-bold line-height-18">{{ App\Utils\Commons\FormatDataUtil::FormatMoney($payload->caixa->SaidaAtual ?? 0) }}</h4>
                                    <div class="text-muted">Saídas</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="d-flex align-items-start">
                                <i class="fa fa-circle text-success mr-2"></i>
                                <div>
                                    <h4 id="saldocaixaAtual" class="font-weight-bold line-height-18">{{ App\Utils\Commons\FormatDataUtil::FormatMoney($payload->caixa->saldoAtual ?? 0) }}</h4>
                                    <div class="text-muted">Saldo</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="graficoCaixa"></div>
                </div>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex mb-2 mb-sm-0 justify-content-between">
                        <h6 class="card-title">Notas Fiscais Emitidas</h6>
                    </div>
                    <div id="graficoNotasFiscais"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h6 class="card-title mb-0">Top Produtos mais vendidos Hoje</h6>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="tabelaTopProdutos" class="table table-striped mb-0">

                        <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Total vendidos</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (isset($payload->topProdutos) && count($payload->topProdutos) > 0)
                            @foreach($payload->topProdutos as $key=>$value)
                            <tr>
                                <td>
                                    <a><?= $value->produto; ?></a>
                                </td>
                                <td><?= $value->quantidade; ?></td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="2"><h3>Aguardando dados</h3></td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script src="{{ url('/vendors/charts/apex/apexcharts.min.js') }}"></script>

    <!-- To use theme colors with Javascript -->
    <div class="colors">
        <div class="bg-primary"></div>
        <div class="bg-primary-bright"></div>
        <div class="bg-secondary"></div>
        <div class="bg-secondary-bright"></div>
        <div class="bg-info"></div>
        <div class="bg-info-bright"></div>
        <div class="bg-success"></div>
        <div class="bg-success-bright"></div>
        <div class="bg-danger"></div>
        <div class="bg-danger-bright"></div>
        <div class="bg-warning"></div>
        <div class="bg-warning-bright"></div>
    </div>

    <script src="{{ url('assets/js/defines.js') }}"></script>
    <script>
        $(function() {

            /*  Vendas  */
            @if (isset($payload->f_pagamentosDia))
                var seriePagamentosDia = [
                @foreach ($payload->f_pagamentosDia as $obj)
                {{ App\Utils\Commons\FormatDataUtil::FormatNumber($obj->valor ?? 0) }},
                @endforeach
                ];

                var labelPagamentosDia = [
                @foreach ($payload->f_pagamentosDia as $obj)
                    '{{ $obj->descricao }}',
                @endforeach
                ];
            @else
                var seriePagamentosDia = [];
                var labelPagamentosDia = [];
            @endif

            @if (isset($payload->f_pagamentosSemana))
                var seriePagamentosSemana = [
                @foreach ($payload->f_pagamentosSemana as $obj)
                    {{ App\Utils\Commons\FormatDataUtil::FormatNumber($obj->valor ?? 0) }},
                @endforeach
                ];

                var labelPagamentosSemana = [
                @foreach ($payload->f_pagamentosSemana as $obj)
                    '{{ $obj->descricao }}',
                @endforeach
                ];
            @else
                var seriePagamentosSemana = [];
                var labelPagamentosSemana = [];
            @endif

            @if (isset($payload->f_pagamentosMes))
                var seriePagamentosMes = [
                @foreach ($payload->f_pagamentosMes as $obj)
                    {{ App\Utils\Commons\FormatDataUtil::FormatNumber($obj->valor ?? 0) }},
                @endforeach
                ];

                var labelPagamentosMes = [
                @foreach ($payload->f_pagamentosMes as $obj)
                    '{{ $obj->descricao }}',
                @endforeach
                ];
            @else
                var seriePagamentosMes = [];
                var labelPagamentosMes = [];
            @endif

            /*  Final Vendas  */

            /*  Vendedores  */

            @if (isset($payload->f_vendedorDia))
            var serieVendedorDia = [
                @foreach ($payload->f_vendedorDia as $obj)
                    {{ App\Utils\Commons\FormatDataUtil::FormatNumber($obj->valor ?? 0) }},
                @endforeach
            ];

            var labelVendedorDia = [
                @foreach ($payload->f_vendedorDia as $obj)
                    '{{ $obj->descricao }}',
                @endforeach
            ];
            @else
            var serieVendedorDia = [];
            var labelVendedorDia = [];
            @endif

            @if (isset($payload->f_vendedorSemana))
            var serieVendedorSemana = [
                @foreach ($payload->f_vendedorSemana as $obj)
                    {{ App\Utils\Commons\FormatDataUtil::FormatNumber($obj->valor ?? 0) }},
                @endforeach
            ];

            var labelVendedorSemana = [
                @foreach ($payload->f_vendedorSemana as $obj)
                    '{{ $obj->descricao }}',
                @endforeach
            ];
            @else
            var serieVendedorSemana = [];
            var labelVendedorSemana = [];
            @endif

            @if (isset($payload->f_vendedorMes))
            var serieVendedorMes = [
                @foreach ($payload->f_vendedorMes as $obj)
                    {{ App\Utils\Commons\FormatDataUtil::FormatNumber($obj->valor ?? 0) }},
                @endforeach
            ];

            var labelVendedorMes = [
                @foreach ($payload->f_vendedorMes as $obj)
                    '{{ $obj->descricao }}',
                @endforeach
            ];
            @else
            var serieVendedorMes = [];
            var labelVendedorMes = [];
            @endif

            /*  Final Vendedores  */


            /*  Produtos  */
            @if (isset($payload->f_grupoProdutosDia))
            var serieProdutosDia = [
                @foreach ($payload->f_grupoProdutosDia as $obj)
                    {{ App\Utils\Commons\FormatDataUtil::FormatNumber($obj->valor ?? 0) }},
                @endforeach
            ];

            var labelProdutosDia = [
                @foreach ($payload->f_grupoProdutosDia as $obj)
                    '{{ $obj->descricao }}',
                @endforeach
            ];
            @else
            var serieProdutosDia = [];
            var labelProdutosDia = [];
            @endif

            @if (isset($payload->f_grupoProdutosSemana))
            var serieProdutosSemana = [
                @foreach ($payload->f_grupoProdutosSemana as $obj)
                    {{ App\Utils\Commons\FormatDataUtil::FormatNumber($obj->valor ?? 0) }},
                @endforeach
            ];

            var labelProdutosSemana = [
                @foreach ($payload->f_grupoProdutosSemana as $obj)
                    '{{ $obj->descricao }}',
                @endforeach
            ];
            @else
            var serieProdutosSemana = [];
            var labelProdutosSemana = [];
            @endif

            @if (isset($payload->f_grupoProdutosMes))
            var serieProdutosMes = [
                @foreach ($payload->f_grupoProdutosMes as $obj)
                    {{ App\Utils\Commons\FormatDataUtil::FormatNumber($obj->valor ?? 0) }},
                @endforeach
            ];

            var labelProdutosMes = [
                @foreach ($payload->f_grupoProdutosMes as $obj)
                    '{{ $obj->descricao }}',
                @endforeach
            ];
            @else
            var serieProdutosMes = [];
            var labelProdutosMes = [];
            @endif

            /*  final Produtos  */

            function graficoFormasPagamentoMountGraph(elem, label, series)
            {
                var options = {
                    series: series,
                    chart: {
                        type: 'donut',
                        fontFamily: "Inter",
                        offsetY: 30,
                        height: 250,
                    },
                    labels: label,
                    dataLabels: {
                        enabled: false,

                    },
                    stroke: {
                        colors: $('body').hasClass('dark') ? "#313852" : "#ffffff",
                    },
                    legend: {
                        show: false
                    }
                };

                var chart = new ApexCharts(document.querySelector(elem), options);
                chart.render();
            }

            function graficoCaixaMountGraph()
            {
                var data = [
                    {
                        name: "Entradas R$",
                        data: [
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->entradas->janeiro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->entradas->feveiro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->entradas->marco ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->entradas->abril ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->entradas->maio ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->entradas->junho ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->entradas->julho ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->entradas->agosto ?? 0 )}},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->entradas->setembro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->entradas->outubro ?? 0 )}},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->entradas->novembro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->entradas->dezembro ?? 0 )}}
                        ]
                    },
                    {
                        name: "Saidas R$",
                        data:  [
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saidas->janeiro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saidas->feveiro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saidas->marco ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saidas->abril ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saidas->maio ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saidas->junho ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saidas->julho ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saidas->agosto ?? 0 )}},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saidas->setembro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saidas->outubro ?? 0 )}},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saidas->novembro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saidas->dezembro ?? 0 )}}
                        ]
                    },
                    {
                        name: "Saldo R$",
                        data: [
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saldo->janeiro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saldo->feveiro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saldo->marco ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saldo->abril ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saldo->maio ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saldo->junho ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saldo->julho ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saldo->agosto ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saldo->setembro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saldo->outubro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saldo->novembro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->caixa->saldo->dezembro ?? 0) }}
                        ]
                    }
                ];

                var options = {
                    chart: {
                        type: 'area',
                        fontFamily: 'Inter',
                        height: 300,
                        offsetX: -18,
                        width: '103%',
                        stacked: true,
                        events: {
                            selection: function (chart, e) {

                            }
                        },
                        toolbar: {
                            show: false,
                        }

                    },
                    colors: [colors.primary, colors.secondary, colors.success],
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 1
                    },
                    series: data,
                    fill: {
                        type: 'gradient',
                        gradient: {
                            opacityFrom: .6,
                            opacityTo: 0,
                        }
                    },
                    legend: {
                        show: false
                    },
                    xaxis: {
                        categories: [
                            "Jan",
                            "Fev",
                            "Mar",
                            "Abr",
                            "Mai",
                            "Jun",
                            "Jul",
                            "Ago",
                            "Set",
                            "Out",
                            "Nov",
                            "Dez"
                        ]
                    }
                };

                var chart = new ApexCharts(
                    document.querySelector("#graficoCaixa"),
                    options
                );

                chart.render();
            }

            function graficoNotasFiscaisMountGraph()
            {
                var options = {
                    chart: {
                        type: 'bar',
                        fontFamily: "Inter",
                        offsetX: -18,
                        height: 312,
                        width: '103%',
                        toolbar: {
                            show: false
                        }
                    },
                    series: [{
                        name: 'Enviadas',
                        data: [
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalEnviadas->janeiro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalEnviadas->feveiro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalEnviadas->marco ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalEnviadas->abril ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalEnviadas->maio ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalEnviadas->junho ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalEnviadas->julho ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalEnviadas->agosto ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalEnviadas->setembro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalEnviadas->outubro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalEnviadas->novembro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalEnviadas->dezembro ?? 0) }}
                        ]
                        }, {
                        name: 'Canceladas',
                        data: [
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalCanceladas->janeiro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalCanceladas->feveiro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalCanceladas->marco ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalCanceladas->abril ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalCanceladas->maio ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalCanceladas->junho ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalCanceladas->julho ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalCanceladas->agosto ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalCanceladas->setembro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalCanceladas->outubro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalCanceladas->novembro ?? 0) }},
                            {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalCanceladas->dezembro ?? 0) }}
                        ]
                    },
                        {
                            name: 'Contigencia',
                            data: [
                                {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalContigencia->janeiro ?? 0) }},
                                {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalContigencia->feveiro ?? 0) }},
                                {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalContigencia->marco ?? 0) }},
                                {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalContigencia->abril ?? 0) }},
                                {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalContigencia->maio ?? 0) }},
                                {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalContigencia->junho ?? 0) }},
                                {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalContigencia->julho ?? 0) }},
                                {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalContigencia->agosto ?? 0) }},
                                {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalContigencia->setembro ?? 0) }},
                                {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalContigencia->outubro ?? 0) }},
                                {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalContigencia->novembro ?? 0) }},
                                {{ App\Utils\Commons\FormatDataUtil::FormatNumber($payload->notasFiscais->TotalContigencia->dezembro ?? 0) }}
                            ]
                        }]
                    ,
                    colors: [colors.secondary, colors.info, colors.warning],
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '50%',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 8,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set','Out','Nov','Dez'],
                    },
                    fill: {
                        opacity: 1
                    },
                    legend: {
                        position: "top",
                    }
                };

                var chart = new ApexCharts(
                    document.querySelector("#graficoNotasFiscais"),
                    options
                );

                chart.render();
            }

            // Vendas
            $('#pills-dia-tab').click(function(){
                console.log('#pills-dia-tab', labelPagamentosDia, seriePagamentosDia);
                graficoFormasPagamentoMountGraph('#graficoFormasPagamento', labelPagamentosDia, seriePagamentosDia);
            });

            $('#pills-semana-tab').click(function(){
                console.log('#pills-semana-tab', labelPagamentosSemana, seriePagamentosSemana);
                graficoFormasPagamentoMountGraph('#graficoFormasPagamento', labelPagamentosSemana, seriePagamentosSemana);
            });

            $('#pills-mes-tab').click(function(){
                console.log('#pills-mes-tab', labelPagamentosMes, seriePagamentosMes);
                graficoFormasPagamentoMountGraph('#graficoFormasPagamento', labelPagamentosMes, seriePagamentosMes);
            });
            // Final Vendas

            // Vendedores
            $('#vendedor-dia-tab').click(function(){
                console.log('#vendedor-dia-tab', labelVendedorDia, serieVendedorDia);
                graficoFormasPagamentoMountGraph('#graficoVendedor', labelVendedorDia, serieVendedorDia);
            });

            $('#vendedor-semana-tab').click(function(){
                console.log('#vendedor-semana-tab', labelVendedorSemana, serieVendedorSemana);
                graficoFormasPagamentoMountGraph('#graficoVendedor', labelVendedorSemana, serieVendedorSemana);
            });

            $('#vendedor-mes-tab').click(function(){
                console.log('#vendedor-mes-tab', labelVendedorMes, serieVendedorMes);
                graficoFormasPagamentoMountGraph('#graficoVendedor', labelVendedorMes, serieVendedorMes);
            });
            // Final Vendedores


            // Produtos
            $('#produtos-dia-tab').click(function(){
                console.log('#pills-dia-tab', labelProdutosDia, serieProdutosDia);
                graficoFormasPagamentoMountGraph('#graficoProdutos', labelProdutosDia, serieProdutosDia);
            });

            $('#produtos-semana-tab').click(function(){
                console.log('#pills-semana-tab', labelProdutosSemana, serieProdutosSemana);
                graficoFormasPagamentoMountGraph('#graficoProdutos', labelProdutosSemana, serieProdutosSemana);
            });

            $('#produtos-mes-tab').click(function(){
                console.log('#pills-mes-tab', labelProdutosMes, serieProdutosMes);
                graficoFormasPagamentoMountGraph('#graficoProdutos', labelProdutosMes, serieProdutosMes);
            });
            // Final Produtos

            // graficoFormasPagamentoMountGraph('#graficoFormasPagamento', labelPagamentosDia, seriePagamentosDia);
            // $('#graficoFormasPagamento').show();

            // graficoFormasPagamentoMountGraph('#graficoVendedor', labelVendedorDia, serieVendedorDia);
            // $('#graficoVendedor').show();

            //  graficoFormasPagamentoMountGraph('#graficoProdutos', labelProdutosDia, serieProdutosDia);
            // $('#graficoProdutos').show();


            graficoCaixaMountGraph();
            graficoNotasFiscaisMountGraph();
        });
    </script>
@endsection
