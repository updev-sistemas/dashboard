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
                <li class="breadcrumb-item active" aria-current="page">Visão Geral</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <p class="text-muted">Vendas Hoje</p>
                                <h2  id="totalVendas2" class="font-weight-bold"><span id="lucrosPresumidosValorVendas">0</span></h2>
                            </div>
                            <div>
                                <figure class="avatar">
                                    <img src="{{ url('assets/media/image/user/money_bag.png') }}" alt="Valor de Vendas">
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
                                <h2 id="quantidadeVendas2" class="font-weight-bold"><span id="lucrosPresumidosQuantidadeVendas">0</span></h2>
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
                                <h2 id="meusLucros2" class="font-weight-bold"><span id="lucrosPresumidosTotalLucros">0</span></h2>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex mb-2 mb-sm-0 justify-content-between">
                            <h6 class="card-title">Pagamentos</h6>
                        </div>
                        <ul class="nav nav-tabs" id="pagamentos" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pagamentos-dia-tab" data-toggle="tab" data-target="#pagamentoDiaDiv" type="button" role="tab" aria-controls="pagamentoDiaDiv" aria-selected="true">Dia</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pagamentos-semana-tab" data-toggle="tab" data-target="#pagamentoSemanaDiv" type="button" role="tab" aria-controls="pagamentoSemanaDiv" aria-selected="false">Semana</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pagamentos-mes-tab" data-toggle="tab" data-target="#pagamentoMesDiv" type="button" role="tab" aria-controls="pagamentoMesDiv" aria-selected="false">Mes</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabPagamento">
                            <div class="tab-pane fade show active" id="pagamentoDiaDiv" role="tabpanel" aria-labelledby="pagamentos-dia-tab">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div id="pagamentoDiaTableGrafico"></div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Descrição</th>
                                                    <th>Valor</th>
                                                </tr>
                                                </thead>
                                                <tbody id="pagamentoDiaTableBody"></tbody>
                                            </table>
                                            <ul class="list-group list-group-flush">
                                                <li>
                                                    <p style="margin-top:20px;" class="text-center">
                                                        <strong>Total</strong>: <span id="pagamentoDiaTableTotal">0</span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pagamentoSemanaDiv" role="tabpanel" aria-labelledby="pagamentos-semana-tab">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div id="pagamentoSemanaTableGrafico"></div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Descrição</th>
                                                    <th>Valor</th>
                                                </tr>
                                                </thead>
                                                <tbody id="pagamentoSemanaTableBody"></tbody>
                                            </table>
                                            <ul class="list-group list-group-flush">
                                                <li>
                                                    <p style="margin-top:20px;" class="text-center">
                                                        <strong>Total</strong>: <span id="pagamentoSemanaTableTotal">0</span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pagamentoMesDiv" role="tabpanel" aria-labelledby="pagamentos-mes-tab">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div id="pagamentoMesTableGrafico"></div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Descrição</th>
                                                    <th>Valor</th>
                                                </tr>
                                                </thead>
                                                <tbody id="pagamentoMesTableBody"></tbody>
                                            </table>
                                            <ul class="list-group list-group-flush">
                                                <li>
                                                    <p style="margin-top:20px;" class="text-center">
                                                        <strong>Total</strong>: <span id="pagamentoMesTableTotal">0</span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex mb-2 mb-sm-0 justify-content-between">
                            <h6 class="card-title">Vendedores</h6>
                        </div>
                        <ul class="nav nav-tabs" id="vendedor" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="vendedor-dia-tab" data-toggle="tab" data-target="#vendedorDiaDiv" type="button" role="tab" aria-controls="vendedorDiaDiv" aria-selected="true">Dia</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="vendedor-semana-tab" data-toggle="tab" data-target="#vendedorSemanaDiv" type="button" role="tab" aria-controls="vendedorSemanaDiv" aria-selected="false">Semana</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="vendedor-mes-tab" data-toggle="tab" data-target="#vendedorMesDiv" type="button" role="tab" aria-controls="vendedorMesDiv" aria-selected="false">Mes</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabVendedor">
                            <div class="tab-pane fade show active" id="vendedorDiaDiv" role="tabpanel" aria-labelledby="vendedor-dia-tab">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div id="vendedorDiaTableGrafico"></div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Descrição</th>
                                                    <th>Valor</th>
                                                </tr>
                                                </thead>
                                                <tbody id="vendedorDiaTableBody"></tbody>
                                            </table>
                                            <ul class="list-group list-group-flush">
                                                <li>
                                                    <p style="margin-top:20px;" class="text-center">
                                                        <strong>Total</strong>: <span id="vendedorDiaTableTotal">0</span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="vendedorSemanaDiv" role="tabpanel" aria-labelledby="vendedor-semana-tab">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div id="vendedorSemanaTableGrafico"></div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table id="vendedorSemanaTable" class="table table-striped mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Descrição</th>
                                                    <th>Valor</th>
                                                </tr>
                                                </thead>
                                                <tbody id="vendedorSemanaTableBody"></tbody>
                                            </table>

                                            <ul class="list-group list-group-flush">
                                                <li>
                                                    <p style="margin-top:20px;" class="text-center">
                                                        <strong>Total</strong>: <span id="vendedorSemanaTableTotal">0</span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="vendedorMesDiv" role="tabpanel" aria-labelledby="vendedor-mes-tab">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div id="vendedorMesTableGrafico"></div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table id="vendedorMesTable" class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Descrição</th>
                                                        <th>Valor</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="vendedorMesTableBody"></tbody>
                                            </table>

                                            <ul class="list-group list-group-flush">
                                                <li>
                                                    <p style="margin-top:20px;" class="text-center">
                                                        <strong>Total</strong>: <span id="vendedorMesTableTotal">0</span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex mb-2 mb-sm-0 justify-content-between">
                            <h6 class="card-title">Grupos de Produtos</h6>
                        </div>
                        <ul class="nav nav-tabs" id="grupoProdutos" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="grupoProdutos-dia-tab" data-toggle="tab" data-target="#grupoProdutosDiaDiv" type="button" role="tab" aria-controls="grupoProdutosDiaDiv" aria-selected="true">Dia</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="grupoProdutos-semana-tab" data-toggle="tab" data-target="#grupoProdutosSemanaDiv" type="button" role="tab" aria-controls="grupoProdutosSemanaDiv" aria-selected="false">Semana</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="grupoProdutos-mes-tab" data-toggle="tab" data-target="#grupoProdutosMesDiv" type="button" role="tab" aria-controls="grupoProdutosMesDiv" aria-selected="false">Mes</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabGrupoProdutos">
                            <div class="tab-pane fade show active" id="grupoProdutosDiaDiv" role="tabpanel" aria-labelledby="grupoProdutos-dia-tab">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div id="grupoProdutosDiaTableGrafico"></div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table id="grupoProdutosDiaTable" class="table table-striped mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Descrição</th>
                                                    <th>Valor</th>
                                                </tr>
                                                </thead>
                                                <tbody id="grupoProdutosDiaTableBody"></tbody>
                                            </table>

                                            <ul class="list-group list-group-flush">
                                                <li>
                                                    <p style="margin-top:20px;" class="text-center">
                                                        <strong>Total</strong>: <span id="grupoProdutosDiaTableTotal">0</span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="grupoProdutosSemanaDiv" role="tabpanel" aria-labelledby="grupoProdutos-semana-tab">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div id="grupoProdutosSemanaTableGrafico"></div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table id="grupoProdutosSemanaTable" class="table table-striped mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Descrição</th>
                                                    <th>Valor</th>
                                                </tr>
                                                </thead>
                                                <tbody id="grupoProdutosSemanaTableBody"></tbody>
                                            </table>

                                            <ul class="list-group list-group-flush">
                                                <li>
                                                    <p style="margin-top:20px;" class="text-center">
                                                        <strong>Total</strong>: <span id="grupoProdutosSemanaTableTotal">0</span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="grupoProdutosMesDiv" role="tabpanel" aria-labelledby="grupoProdutos-mes-tab">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div id="grupoProdutosMesTableGrafico"></div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table id="grupoProdutosMesTable" class="table table-striped mb-0">
                                                <thead>
                                                <tr>
                                                    <th>Descrição</th>
                                                    <th>Valor</th>
                                                </tr>
                                                </thead>
                                                <tbody id="grupoProdutosMesTableBody"></tbody>
                                            </table>

                                            <ul class="list-group list-group-flush">
                                                <li>
                                                    <p style="margin-top:20px;" class="text-center">
                                                        <strong>Total</strong>: <span id="grupoProdutosMesTableTotal">0</span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
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
                            <tbody id="produtosMaisVendidosTableBody"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">Fluxo do caixa Anual</h6>
                        </div>
                        <p id="saldosUpdate" class="text-muted"></p>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="d-flex align-items-start">
                                    <i class="fa fa-circle text-primary mr-2"></i>
                                    <div>
                                        <h4 id="entradacaixaAtual" class="font-weight-bold line-height-18"><span id="caixaEntradaAtual"></span></h4>
                                        <div class="text-muted">Entradas</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="d-flex align-items-start">
                                    <i class="fa fa-circle text-secondary mr-2"></i>
                                    <div>
                                        <h4 id="saidacaixaAtual"  class="font-weight-bold line-height-18"><span id="caixaSaidaAtual"></span></h4>
                                        <div class="text-muted">Saídas</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="d-flex align-items-start">
                                    <i class="fa fa-circle text-success mr-2"></i>
                                    <div>
                                        <h4 id="saldocaixaAtual" class="font-weight-bold line-height-18"><span id="caixaSaldoAtual"></span></h4>
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
    </div>

    <div class="container-fluid" id="extratoDiario">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">Extrato Diário - Mês <span id="extratoDiarioMesAtual"></span></h6>
                        </div>
                        <p id="saldosUpdate" class="text-muted"></p>
                        <div id="graficoExtratoDiarioMesAtual"></div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">Extrato Diário - Mês <span id="extratoDiarioMesAnterior"></span></h6>
                        </div>
                        <p id="saldosUpdate" class="text-muted"></p>
                        <div id="graficoExtratoDiarioMesAnterior"></div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">Extrato Diário - Comparativo dos Meses <span id="extratoDiarioMesAtualCmp"></span> e  <span id="extratoDiarioMesAnteriorTmp"></span></h6>
                        </div>
                        <p id="saldosUpdate" class="text-muted"></p>
                        <div id="graficoExtratoDiarioCmp"></div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
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

            const ordemMeses = ['janeiro', 'fevereiro', 'marco', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'];


            function ConvertToMoney(data) {
                const result =  data.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                });

                return result;
            }

            function montaGraficoPizza(telem, tlabel, tseries)
            {
                const options = {
                    series: tseries,
                    chart: {
                        type: 'donut'
                    },
                    dataLabels: {
                        enabled: false
                    },
                    labels: tlabel,
                    legend: {
                        show: false
                    }
                };

                var chart = new ApexCharts(document.querySelector(telem), options);
                chart.render();
            }

            function graficoCaixaMountGraph(data)
            {
                const mesesOrdenadosEntrada = [];
                ordemMeses.forEach(mes => {
                    if (data.entradas.hasOwnProperty(mes)) {
                        mesesOrdenadosEntrada.push(data.entradas[mes]);
                    }
                });

                const mesesOrdenadosSaida = [];
                ordemMeses.forEach(mes => {
                    if (data.saidas.hasOwnProperty(mes)) {
                        mesesOrdenadosSaida.push(data.saidas[mes]);
                    }
                });

                const mesesOrdenadosSaldos = [];
                ordemMeses.forEach(mes => {
                    if (data.entradas.hasOwnProperty(mes)) {
                        mesesOrdenadosSaldos.push(data.saldo[mes]);
                    }
                });

                var data = [
                    {
                        name: "Entradas R$",
                        data: mesesOrdenadosEntrada
                    },
                    {
                        name: "Saidas R$",
                        data:  mesesOrdenadosSaida
                    },
                    {
                        name: "Saldo R$",
                        data: mesesOrdenadosSaldos
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
                        toolbar: {
                            show: false
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

            function up_range(inicio, fim) {
                const range = [];
                for (let i = inicio; i <= fim; i++) {
                    range.push(i);
                }
                return range;
            }

            function preencherComZeros(array, tamanho) {
                while (array.length < tamanho) {
                    array.push(0);
                }
                return array;
            }


            function graficoExtratoMensalMountGraph(data, mesAnteriorLabel, mesAtualLabel)
            {
                const mesAtuallabel = data.resumoDiarioMesAtual.map(x => x.dia);
                const mesAtualvalues = data.resumoDiarioMesAtual.map(x => x.totalAcumulado ?? 0);

                const mesAnteriorlabel = data.resumoDiarioMesAnterior.map(x => x.dia);
                const mesAnteriorvalues = data.resumoDiarioMesAnterior.map(x => x.totalAcumulado ?? 0);

                var options1 = {
                    series: [
                        {
                            name: mesAtualLabel,
                            data: mesAtualvalues
                        }
                    ],
                    chart: {
                        type: 'bar',
                        height: 350
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: mesAtuallabel,
                    },
                    yaxis: {
                        title: {
                            text: 'R$ (reais)'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                const _val_ = ConvertToMoney(val);
                                return `${_val_} Reais`;
                            }
                        }
                    }
                };

                var chart1 = new ApexCharts(document.querySelector("#graficoExtratoDiarioMesAtual"), options1);
                chart1.render();

                var options2 = {
                    series: [
                        {
                            name: mesAnteriorLabel,
                            data: mesAnteriorvalues
                        }
                    ],
                    chart: {
                        type: 'bar',
                        height: 350
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories:mesAnteriorlabel,
                    },
                    yaxis: {
                        title: {
                            text: 'R$ (reais)'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                const _val_ = ConvertToMoney(val);
                                return `${_val_} Reais`;
                            }
                        }
                    }
                };

                var chart2 = new ApexCharts(document.querySelector("#graficoExtratoDiarioMesAnterior"), options2);
                chart2.render();

                const mesAtualGeral    = preencherComZeros(mesAtualvalues, 31);
                const mesAnteriorGeral = preencherComZeros(mesAnteriorvalues, 31);
                const range = up_range(1, 31);

                var options3 = {
                    series: [
                        {
                            name: mesAtualLabel,
                            data: mesAtualGeral
                        },

                        {
                            name: mesAnteriorLabel,
                            data: mesAnteriorGeral
                        }
                    ],
                    chart: {
                        type: 'area',
                        height: 350
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories:range,
                    },
                    yaxis: {
                        title: {
                            text: 'R$ (reais)'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                const _val_ = ConvertToMoney(val);
                                return `${_val_} Reais`;
                            }
                        }
                    }
                };

                var chart3 = new ApexCharts(document.querySelector("#graficoExtratoDiarioCmp"), options3);
                chart3.render();

            }


            function graficoNotasFiscaisMountGraph(data)
            {
                const notasFiscaisTotalEnviadas = [];
                ordemMeses.forEach(mes => {
                    if (data.totalEnviadas.hasOwnProperty(mes)) {
                        notasFiscaisTotalEnviadas.push(data.totalEnviadas[mes]);
                    }
                });

                const notasFiscaisTotalCanceladas = [];
                ordemMeses.forEach(mes => {
                    if (data.totalCanceladas.hasOwnProperty(mes)) {
                        notasFiscaisTotalCanceladas.push(data.totalCanceladas[mes]);
                    }
                });

                const notasFiscaisTotalContigencia = [];
                ordemMeses.forEach(mes => {
                    if (data.totalContigencia.hasOwnProperty(mes)) {
                        notasFiscaisTotalContigencia.push(data.totalContigencia[mes]);
                    }
                });

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
                    series: [
                        {
                            name: 'Enviadas',
                            data: notasFiscaisTotalEnviadas
                        },
                        {
                            name: 'Canceladas',
                            data: notasFiscaisTotalCanceladas
                        },
                        {
                            name: 'Contigencia',
                            data: notasFiscaisTotalContigencia
                        }
                    ],
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

            function gerenciarGraficosPizzasPagamentos(payload)
            {
                const diaLabel = payload.pagamentosDia.map(objeto => objeto.descricao);
                const diaSeries = payload.pagamentosDia.map(objeto => parseInt(objeto.value));
                montaGraficoPizza('#areaGraficoPagamentoDia', diaLabel, diaSeries);

                const semanaLabel = payload.pagamentosSemana.map(objeto => objeto.descricao);
                const semanaSeries = payload.pagamentosSemana.map(objeto => parseInt(objeto.value));
                montaGraficoPizza('#areaGraficoPagamentoSemana', semanaLabel, semanaSeries);

                const mesLabel = payload.pagamentosMes.map(objeto => objeto.descricao);
                const mesSeries = payload.pagamentosMes.map(objeto => parseInt(objeto.value));
                montaGraficoPizza('#areaGraficoPagamentoMes', mesLabel, mesSeries);
            }

            function gerenciarGraficosPizzasGrupoProdutos(payload)
            {
                const diaLabel = payload.grupoProdutosDia.map(objeto => objeto.descricao);
                const diaSeries = payload.grupoProdutosDia.map(objeto => parseInt(objeto.total));
                montaGraficoPizza('#areaGraficoGrupoProdutosDia', diaLabel, diaSeries);

                const semanaLabel = payload.grupoProdutosSemana.map(objeto => objeto.descricao);
                const semanaSeries = payload.grupoProdutosSemana.map(objeto => parseInt(objeto.total));
                montaGraficoPizza('#areaGrupoProdutosSemana', semanaLabel, semanaSeries);

                const mesLabel = payload.grupoProdutosMes.map(objeto => objeto.descricao);
                const mesSeries = payload.grupoProdutosMes.map(objeto => parseInt(objeto.total));
                montaGraficoPizza('#areaGrupoProdutosMes', mesLabel, mesSeries);
            }

            function fillBadges(data)
            {
                const valorVendas = ConvertToMoney(data.valorVendas ?? 0);
                $("#lucrosPresumidosValorVendas").html(valorVendas);

                const totalLucros = (data.ticketMedio ?? 0).toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                });
                $("#lucrosPresumidosTotalLucros").html(totalLucros);

                const quantidadeVendas = (data.quantidadeVendas ?? 0);
                $("#lucrosPresumidosQuantidadeVendas").html(quantidadeVendas);
            }

            function fillCadastros(data)
            {
                $("#CadastroNumeroClientes").html(data.clientes ?? 0);
                $("#CadastroNumeroProdutos").html(data.produtos ?? 0);
                $("#CadastroNumeroFornecedores").html(data.fornecedores ?? 0);
                $("#CadastroNumeroUsuarios").html(data.usuarios ?? 0);
            }

            function fillGraphFluxoCaixas(data)
            {
                const entradaAtual = ConvertToMoney(data.entradaAtual ?? 0);
                $("#caixaEntradaAtual").html(entradaAtual);

                const saldoAtual = ConvertToMoney(data.saldoAtual ?? 0);
                $("#caixaSaldoAtual").html(saldoAtual);

                const saidaAtual = ConvertToMoney(data.saidaAtual ?? 0);
                $("#caixaSaidaAtual").html(saidaAtual);


                graficoCaixaMountGraph(data);
            }

            function fillProdutosMaisVendidos(data)
            {
                const tableBody = document.querySelector('#produtosMaisVendidosTableBody');

                if (data.length > 0) {
                    data.forEach(produto => {
                        const linha = tableBody.insertRow();
                        linha.innerHTML = `<td>${produto.descricao}</td><td>${ConvertToMoney(produto.quantidade ?? 0)}</td>`;
                    });
                } else {
                    const linha = tableBody.insertRow();
                    linha.innerHTML = `<td colspan=2 class="text-center"><h4>Aguardando Dados</h4></td>`;
                }
            }

            function fillPagamento(data)
            {
                const pagamentoDiaTable = document.querySelector('#pagamentoDiaTableBody');
                if (data.pagamentosDia.length > 0) {
                    let total = 0;

                    data.pagamentosDia.forEach(row => {
                        const linha = pagamentoDiaTable.insertRow();
                        linha.innerHTML = `<td><i class="fa fa-circle mr-1 text-warning"></i> ${row.descricao}</td><td>${ConvertToMoney(row.value ?? 0)}</td>`;
                        total += row.value;
                    });

                    const result =  (total ?? 0).toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                    });

                    $("#pagamentoDiaTableTotal").html(result);

                    const diaLabel = data.pagamentosDia.map(objeto => objeto.descricao);
                    const diaSeries = data.pagamentosDia.map(objeto => parseInt(objeto.value));
                    montaGraficoPizza('#pagamentoDiaTableGrafico', diaLabel, diaSeries);

                } else {
                    const linha = pagamentoDiaTable.insertRow();
                    linha.innerHTML = `<td colspan=2 class="text-center"><h4>Aguardando Dados</h4></td>`;
                    const result =  '0'.toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                    });
                    $("#pagamentoDiaTableTotal").html(result);
                }

                const pagamentoSemanaTable = document.querySelector('#pagamentoSemanaTableBody');
                if (data.pagamentosSemana.length > 0) {
                    let total = 0;

                    data.pagamentosSemana.forEach(row => {
                        const linha = pagamentoSemanaTable.insertRow();
                        linha.innerHTML = `<td><i class="fa fa-circle mr-1 text-warning"></i> ${row.descricao}</td><td>${ConvertToMoney(row.value ?? 0)}</td>`;
                        total += row.value;
                    });

                    const result =  (total ?? 0).toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                    });
                    $("#pagamentoSemanaTableTotal").html(result);


                    const diaLabel = data.pagamentosSemana.map(objeto => objeto.descricao);
                    const diaSeries = data.pagamentosSemana.map(objeto => parseInt(objeto.value));
                    montaGraficoPizza('#pagamentoSemanaTableGrafico', diaLabel, diaSeries);
                } else {
                    const linha = vendedorSemanaTable.insertRow();
                    linha.innerHTML = `<td colspan=2 class="text-center"><h4>Aguardando Dados</h4></td>`;
                    const result =  '0'.toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                    });
                    $("#pagamentoSemanaTableTotal").html(result);
                }

                const pagamentoMesTable = document.querySelector('#pagamentoMesTableBody');
                if (data.pagamentosMes.length > 0) {
                    let total = 0;

                    data.pagamentosMes.forEach(row => {
                        const linha = pagamentoMesTable.insertRow();
                        linha.innerHTML = `<td><i class="fa fa-circle mr-1 text-warning"></i> ${row.descricao}</td><td>${ConvertToMoney(row.value ?? 0)}</td>`;
                        total += row.value;
                    });

                    const result =  (total ?? 0).toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                    });
                    $("#pagamentoMesTableTotal").html(result);

                    const diaLabel = data.pagamentosMes.map(objeto => objeto.descricao);
                    const diaSeries = data.pagamentosMes.map(objeto => parseInt(objeto.value));
                    montaGraficoPizza('#pagamentoMesTableGrafico', diaLabel, diaSeries);
                } else {
                    const linha = vendedorMesTable.insertRow();
                    linha.innerHTML = `<td colspan=2 class="text-center"><h4>Aguardando Dados</h4></td>`;
                    const result =  '0'.toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                    });
                    $("#pagamentoMesTableTotal").html(result);
                }
            }

            function fillVendendor(data)
            {
                const vendedorDiaTable = document.querySelector('#vendedorDiaTableBody');
                if (data.vendedorDia.length > 0) {
                    let total = 0;

                    data.vendedorDia.forEach(row => {
                        const linha = vendedorDiaTable.insertRow();
                        linha.innerHTML = `<td><i class="fa fa-circle mr-1 text-warning"></i> ${row.descricao}</td><td>${ConvertToMoney(row.value ?? 0)}</td>`;
                        total += row.value;
                    });

                    const result =  ConvertToMoney(total ?? 0);

                    $("#vendedorDiaTableTotal").html(result);

                    const diaLabel = data.vendedorDia.map(objeto => objeto.descricao);
                    const diaSeries = data.vendedorDia.map(objeto => parseInt(objeto.value));
                    montaGraficoPizza('#vendedorDiaTableGrafico', diaLabel, diaSeries);

                } else {
                    const linha = vendedorDiaTable.insertRow();
                    linha.innerHTML = `<td colspan=2 class="text-center"><h4>Aguardando Dados</h4></td>`;
                    const result =  ConvertToMoney('0');
                    $("#vendedorDiaTableTotal").html(result);
                }

                const vendedorSemanaTable = document.querySelector('#vendedorSemanaTableBody');
                if (data.vendedorSemana.length > 0) {
                    let total = 0;

                    data.vendedorSemana.forEach(row => {
                        const linha = vendedorSemanaTable.insertRow();
                        linha.innerHTML = `<td><i class="fa fa-circle mr-1 text-warning"></i> ${row.descricao}</td><td>${ConvertToMoney(row.value ?? 0)}</td>`;
                        total += row.value;
                    });

                    const result =  ConvertToMoney(total ?? 0);
                    $("#vendedorSemanaTableTotal").html(result);


                    const diaLabel = data.vendedorSemana.map(objeto => objeto.descricao);
                    const diaSeries = data.vendedorSemana.map(objeto => parseInt(objeto.value));
                    montaGraficoPizza('#vendedorSemanaTableGrafico', diaLabel, diaSeries);
                } else {
                    const linha = vendedorSemanaTable.insertRow();
                    linha.innerHTML = `<td colspan=2 class="text-center"><h4>Aguardando Dados</h4></td>`;
                    const result =  ConvertToMoney(0);
                    $("#vendedorSemanaTableTotal").html(result);
                }

                const vendedorMesTable = document.querySelector('#vendedorMesTableBody');
                if (data.vendedorMes.length > 0) {
                    let total = 0;

                    data.vendedorMes.forEach(row => {
                        const linha = vendedorMesTable.insertRow();
                        linha.innerHTML = `<td><i class="fa fa-circle mr-1 text-warning"></i> ${row.descricao}</td><td>${ConvertToMoney(row.value ?? 0)}</td>`;
                        total += row.value;
                    });

                    const result =  ConvertToMoney(total ?? 0);
                    $("#vendedorMesTableTotal").html(result);

                    const diaLabel = data.vendedorMes.map(objeto => objeto.descricao);
                    const diaSeries = data.vendedorMes.map(objeto => parseInt(objeto.value));
                    montaGraficoPizza('#vendedorMesTableGrafico', diaLabel, diaSeries);
                } else {
                    const linha = vendedorMesTable.insertRow();
                    linha.innerHTML = `<td colspan=2 class="text-center"><h4>Aguardando Dados</h4></td>`;
                    const result =  ConvertToMoney(0);
                    $("#vendedorMesTableTotal").html(result);
                }
            }

            function fillGrupoProdutos(data)
            {
                const grupoProdutosDiaTable = document.querySelector('#grupoProdutosDiaTableBody');
                if (data.grupoProdutosDia.length > 0) {
                    let total = 0;

                    data.grupoProdutosDia.forEach(row => {
                        const linha = grupoProdutosDiaTable.insertRow();
                        linha.innerHTML = `<td><i class="fa fa-circle mr-1 text-warning"></i> ${row.descricao}</td><td>${ConvertToMoney(row.total ?? 0)}</td>`;
                        total += row.total;
                    });

                    const result =  ConvertToMoney(parseFloat(total ?? 0).toFixed(2));

                    $("#grupoProdutosDiaTableTotal").html(result);

                    const diaLabel = data.grupoProdutosDia.map(objeto => objeto.descricao);
                    const diaSeries = data.grupoProdutosDia.map(objeto => parseInt(objeto.total));
                    montaGraficoPizza('#grupoProdutosDiaTableGrafico', diaLabel, diaSeries);

                } else {
                    const linha = grupoProdutosDiaTable.insertRow();
                    linha.innerHTML = `<td colspan=2 class="text-center"><h4>Aguardando Dados</h4></td>`;
                    const result =  ConvertToMoney('0');
                    $("#grupoProdutosDiaTableTotal").html(result);
                }

                const grupoProdutosSemanaTable = document.querySelector('#grupoProdutosSemanaTableBody');
                if (data.grupoProdutosSemana.length > 0) {
                    let total = 0;

                    data.grupoProdutosSemana.forEach(row => {
                        const linha = grupoProdutosSemanaTable.insertRow();
                        linha.innerHTML = `<td><i class="fa fa-circle mr-1 text-warning"></i> ${row.descricao}</td><td>${ConvertToMoney(row.total ?? 0)}</td>`;
                        total += row.total;
                    });

                    const result =  ConvertToMoney(parseFloat(total ?? 0).toFixed(2));
                    $("#grupoProdutosSemanaTableTotal").html(result);


                    const diaLabel = data.grupoProdutosSemana.map(objeto => objeto.descricao);
                    const diaSeries = data.grupoProdutosSemana.map(objeto => parseInt(objeto.total));
                    montaGraficoPizza('#grupoProdutosSemanaTableGrafico', diaLabel, diaSeries);
                } else {
                    const linha = grupoProdutosSemanaTable.insertRow();
                    linha.innerHTML = `<td colspan=2 class="text-center"><h4>Aguardando Dados</h4></td>`;
                    const result =  ConvertToMoney(0);
                    $("#grupoProdutosSemanaTableTotal").html(result);
                }

                const grupoProdutosMesTable = document.querySelector('#grupoProdutosMesTableBody');
                if (data.grupoProdutosMes.length > 0) {
                    let total = 0;

                    data.grupoProdutosMes.forEach(row => {
                        const linha = grupoProdutosMesTable.insertRow();
                        linha.innerHTML = `<td><i class="fa fa-circle mr-1 text-warning"></i> ${row.descricao}</td><td>${ConvertToMoney(row.total ?? 0)}</td>`;
                        total += row.total;
                    });

                    const result =  ConvertToMoney(parseFloat(total ?? 0).toFixed(2));
                    $("#grupoProdutosMesTableTotal").html(result);

                    const diaLabel = data.grupoProdutosMes.map(objeto => objeto.descricao);
                    const diaSeries = data.grupoProdutosMes.map(objeto => parseInt(objeto.total));

                    montaGraficoPizza('#grupoProdutosMesTableGrafico', diaLabel, diaSeries);
                } else {
                    const linha = grupoProdutosMesTable.insertRow();
                    linha.innerHTML = `<td colspan=2 class="text-center"><h4>Aguardando Dados</h4></td>`;
                    const result =  ConvertToMoney(0);
                    $("#vendedorMesTableTotal").html(result);
                }
            }

            function fillExtrato(data) {
                const mesAnterior = data.resumoDiarioMesAnterior[0].mes ?? "n/d";
                const mesAtual = data.resumoDiarioMesAtual[0].mes ?? "n/d";

                const mesAnteriorLabel = mesAnterior.charAt(0).toUpperCase() + mesAnterior.slice(1);
                const mesAtualLabel = mesAtual.charAt(0).toUpperCase() + mesAtual.slice(1);

                $('#extratoDiarioMesAnterior, #extratoDiarioMesAnteriorTmp').html(mesAnteriorLabel);
                $('#extratoDiarioMesAtual, #extratoDiarioMesAtualCmp').html(mesAtualLabel);

                console.log(data, mesAnteriorLabel, mesAtualLabel);
                graficoExtratoMensalMountGraph(data, mesAnteriorLabel, mesAtualLabel);
            }


            function GetPayload()
            {
                return new Promise(function(action, err) {
                   $.ajax({
                       url : '{{ route('api.demonstrative.getDemonstrative', ['key' => encrypt($demonstrative->id)]) }}',
                       contentType: 'application/json',
                       type: 'get',
                       success: (res) => action(JSON.parse(res)),
                       error: (res) => err(res)
                   });
                });
            }

            function Run(payload)
            {
                fillCadastros(payload.cadastros);

                fillBadges(payload.lucrosPresumidos.relatorioVendas.concluidas);

                fillGraphFluxoCaixas(payload.caixa);

                graficoNotasFiscaisMountGraph(payload.notasFiscais);

                fillProdutosMaisVendidos(payload.produtosMaisVendidos)

                fillPagamento(payload.pagamentos);

                fillVendendor(payload.vendedor);

                fillGrupoProdutos(payload.grupoProdutos);

                if (payload.hasOwnProperty("extratoMensalVendas")) {
                    if (payload.extratoMensalVendas.hasOwnProperty("resumoDiarioMesAtual") && payload.extratoMensalVendas.hasOwnProperty("resumoDiarioMesAnterior")) {
                        if (payload.extratoMensalVendas.resumoDiarioMesAtual.length == 0 && payload.extratoMensalVendas.resumoDiarioMesAnterior.length == 0) {
                            $('#extratoDiario').hide();
                        } else {
                            $('#extratoDiario').show();
                            fillExtrato(payload.extratoMensalVendas);
                        }
                    }
                    else {
                        $('#extratoDiario').hide();
                    }
                }
                else {
                    $('#extratoDiario').hide();
                }
            }

            GetPayload()
                .then((res) => Run(res))
                .catch((res) => console.log(res));
        });
    </script>
@endsection
