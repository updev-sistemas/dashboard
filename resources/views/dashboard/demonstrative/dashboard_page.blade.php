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
                    @if(!request()->segment(0) || strtolower(request()->segment(0)) == 'administrativo')
                        <a href="{{ route('env_adm') }}">Inicio</a>
                    @elseif(!request()->segment(0) || strtolower(request()->segment(0)) == 'dashboard')
                        <a href="{{ route('env_ctm') }}">Inicio</a>
                    @else
                        <a href="#">Inicio</a>
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
                                    <p class="text-muted">lucros Hoje</p>
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
                    <div id="graficoFormasPagamento"></div>
                    <div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item pl-0 pr-0">
                                <i class="fa fa-circle mr-1 text-warning"></i>Pix
                            </li>
                            <li class="list-group-item pl-0 pr-0">
                                <i class="fa fa-circle mr-1 text-info"></i>Dinheiro
                            </li>
                            <li class="list-group-item pl-0 pr-0">
                                <i class="fa fa-circle mr-1 text-secondary"></i>Crédito
                            </li>
                            <li class="list-group-item pl-0 pr-0">
                                <i class="fa fa-circle mr-1 text-success"></i>Débito
                            </li>
                            <li class="list-group-item pl-0 pr-0">
                                <i class="fa fa-circle mr-1 text-danger"></i>á Prazo
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-12">
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
                        @foreach($payload->topProdutos as $key=>$value)
                        <tr>
                            <td>
                                <a><?= $value->produto; ?></a>
                            </td>
                            <td><?= $value->quantidade; ?></td>
                        </tr>
                        @endforeach
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


            function graficoFormasPagamentoMountGraph()
            {
                var options = {
                    series: [
                        {{ $payload->f_pagamentos->dinheiro ?? 0 }},
                        {{ $payload->f_pagamentos->credito ?? 0 }},
                        {{ $payload->f_pagamentos->debito ?? 0 }},
                        {{ $payload->f_pagamentos->pix ?? 0 }},
                        {{ $payload->f_pagamentos->prazo ?? 0 }}
                    ],
                    chart: {
                        type: 'donut',
                        fontFamily: "Inter",
                        offsetY: 30,
                        height: 250,
                    },
                    colors: [colors.primary, colors.secondary, colors.success, colors.warning, colors.danger],
                    labels: ['Dinheiro R$', 'Credito R$', 'Debito R$', 'Pix R$', 'A prazo R$'],
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

                var chart = new ApexCharts(document.querySelector("#graficoFormasPagamento"), options);
                chart.render();
            }

            function graficoCaixaMountGraph()
            {
                var data = [
                    {
                        name: "Entradas R$",
                        data: [
                            {{ $payload->caixa->entradas->janeiro ?? 0 }},
                            {{ $payload->caixa->entradas->feveiro ?? 0 }},
                            {{ $payload->caixa->entradas->marco ?? 0 }},
                            {{ $payload->caixa->entradas->abril ?? 0 }},
                            {{ $payload->caixa->entradas->maio ?? 0 }},
                            {{ $payload->caixa->entradas->junho ?? 0 }},
                            {{ $payload->caixa->entradas->julho ?? 0 }},
                            {{ $payload->caixa->entradas->agosto ?? 0 }},
                            {{ $payload->caixa->entradas->setembro ?? 0 }},
                            {{ $payload->caixa->entradas->outubro ?? 0 }},
                            {{ $payload->caixa->entradas->novembro ?? 0 }},
                            {{ $payload->caixa->entradas->dezembro ?? 0 }}
                        ]
                    },
                    {
                        name: "Saidas R$",
                        data:  [
                            {{ $payload->caixa->saidas->janeiro ?? 0 }},
                            {{ $payload->caixa->saidas->feveiro ?? 0 }},
                            {{ $payload->caixa->saidas->marco ?? 0 }},
                            {{ $payload->caixa->saidas->abril ?? 0 }},
                            {{ $payload->caixa->saidas->maio ?? 0 }},
                            {{ $payload->caixa->saidas->junho ?? 0 }},
                            {{ $payload->caixa->saidas->julho ?? 0 }},
                            {{ $payload->caixa->saidas->agosto ?? 0 }},
                            {{ $payload->caixa->saidas->setembro ?? 0 }},
                            {{ $payload->caixa->saidas->outubro ?? 0 }},
                            {{ $payload->caixa->saidas->novembro ?? 0 }},
                            {{ $payload->caixa->saidas->dezembro ?? 0 }}
                        ]
                    },
                    {
                        name: "Saldo R$",
                        data: [
                            {{ $payload->caixa->saldo->janeiro ?? 0 }},
                            {{ $payload->caixa->saldo->feveiro ?? 0 }},
                            {{ $payload->caixa->saldo->marco ?? 0 }},
                            {{ $payload->caixa->saldo->abril ?? 0 }},
                            {{ $payload->caixa->saldo->maio ?? 0 }},
                            {{ $payload->caixa->saldo->junho ?? 0 }},
                            {{ $payload->caixa->saldo->julho ?? 0 }},
                            {{ $payload->caixa->saldo->agosto ?? 0 }},
                            {{ $payload->caixa->saldo->setembro ?? 0 }},
                            {{ $payload->caixa->saldo->outubro ?? 0 }},
                            {{ $payload->caixa->saldo->novembro ?? 0 }},
                            {{ $payload->caixa->saldo->dezembro ?? 0 }}
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
                            {{ $payload->notasFiscais->TotalEnviadas->janeiro ?? 0 }},
                            {{ $payload->notasFiscais->TotalEnviadas->feveiro ?? 0 }},
                            {{ $payload->notasFiscais->TotalEnviadas->marco ?? 0 }},
                            {{ $payload->notasFiscais->TotalEnviadas->abril ?? 0 }},
                            {{ $payload->notasFiscais->TotalEnviadas->maio ?? 0 }},
                            {{ $payload->notasFiscais->TotalEnviadas->junho ?? 0 }},
                            {{ $payload->notasFiscais->TotalEnviadas->julho ?? 0 }},
                            {{ $payload->notasFiscais->TotalEnviadas->agosto ?? 0 }},
                            {{ $payload->notasFiscais->TotalEnviadas->setembro ?? 0 }},
                            {{ $payload->notasFiscais->TotalEnviadas->outubro ?? 0 }},
                            {{ $payload->notasFiscais->TotalEnviadas->novembro ?? 0 }},
                            {{ $payload->notasFiscais->TotalEnviadas->dezembro ?? 0 }}
                        ]
                        }, {
                        name: 'Canceladas',
                        data: [
                            {{ $payload->notasFiscais->TotalCanceladas->janeiro ?? 0 }},
                            {{ $payload->notasFiscais->TotalCanceladas->feveiro ?? 0 }},
                            {{ $payload->notasFiscais->TotalCanceladas->marco ?? 0 }},
                            {{ $payload->notasFiscais->TotalCanceladas->abril ?? 0 }},
                            {{ $payload->notasFiscais->TotalCanceladas->maio ?? 0 }},
                            {{ $payload->notasFiscais->TotalCanceladas->junho ?? 0 }},
                            {{ $payload->notasFiscais->TotalCanceladas->julho ?? 0 }},
                            {{ $payload->notasFiscais->TotalCanceladas->agosto ?? 0 }},
                            {{ $payload->notasFiscais->TotalCanceladas->setembro ?? 0 }},
                            {{ $payload->notasFiscais->TotalCanceladas->outubro ?? 0 }},
                            {{ $payload->notasFiscais->TotalCanceladas->novembro ?? 0 }},
                            {{ $payload->notasFiscais->TotalCanceladas->dezembro ?? 0 }}
                        ]
                    },
                        {
                            name: 'Contigencia',
                            data: [
                                {{ $payload->notasFiscais->TotalContigencia->janeiro ?? 0 }},
                                {{ $payload->notasFiscais->TotalContigencia->feveiro ?? 0 }},
                                {{ $payload->notasFiscais->TotalContigencia->marco ?? 0 }},
                                {{ $payload->notasFiscais->TotalContigencia->abril ?? 0 }},
                                {{ $payload->notasFiscais->TotalContigencia->maio ?? 0 }},
                                {{ $payload->notasFiscais->TotalContigencia->junho ?? 0 }},
                                {{ $payload->notasFiscais->TotalContigencia->julho ?? 0 }},
                                {{ $payload->notasFiscais->TotalContigencia->agosto ?? 0 }},
                                {{ $payload->notasFiscais->TotalContigencia->setembro ?? 0 }},
                                {{ $payload->notasFiscais->TotalContigencia->outubro ?? 0 }},
                                {{ $payload->notasFiscais->TotalContigencia->novembro ?? 0 }},
                                {{ $payload->notasFiscais->TotalContigencia->dezembro ?? 0 }}
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


            graficoFormasPagamentoMountGraph();
            graficoCaixaMountGraph();
            graficoNotasFiscaisMountGraph();
        });
    </script>
@endsection
