@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">
@endsection

@section('pageTitle')
    Contas a Pagar de {{ $enterprise->fantasia }}
@endsection

@section('content')

    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('env_ctm') }}">Inicio</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Contas a Pagar</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12">
            <meta name="_token" content="{{ csrf_token() }}">

            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Hoje</p>
                                    <h2 id="pagarPagas" class="font-weight-bold">{{ App\Utils\Commons\FormatDataUtil::FormatMoney($payload->contasPagar->pagasAtual ?? 0) }}</h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/contaReceber.png') }}">
                                    </figure>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center">
                                <span class="text-success d-inline-flex align-items-center mr-2">
                                <p id="mesAno" class="text-muted"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Próximos 7 dias</p>
                                    <h2 id="pagarPendentes" class="font-weight-bold">{{ App\Utils\Commons\FormatDataUtil::FormatMoney($payload->contasPagar->pendentesAtual ?? 0) }}</h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/contaPendente.png') }}">
                                    </figure>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center">
                                <span class="text-danger d-inline-flex align-items-center mr-2">
                                <p id="updateFormasPagamento" class="text-muted"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Mês</p>
                                    <h2 id="pagarVencidas" class="font-weight-bold">{{ App\Utils\Commons\FormatDataUtil::FormatMoney($payload->contasPagar->vencidasAtual ?? 0) }}</h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/contaVencida.png') }}">
                                    </figure>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center">
                                <span class="text-success d-inline-flex align-items-center mr-2">
                                <p id="updateTopProdutos" class="text-muted"></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex mb-2 mb-sm-0 justify-content-between">
                        <h6 class="card-title">Historico de contas</h6>
                    </div>
                    <div id="graficoContaPagar"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12">
            <div class="card">

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

            function graficoContaPagarMountGraph()
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
                        name: 'Pagas',
                        data: [
                            {{ $payload->contasPagar->pagas->janeiro ?? 0 }},
                            {{ $payload->contasPagar->pagas->feveiro ?? 0 }},
                            {{ $payload->contasPagar->pagas->marco ?? 0 }},
                            {{ $payload->contasPagar->pagas->abril ?? 0 }},
                            {{ $payload->contasPagar->pagas->maio ?? 0 }},
                            {{ $payload->contasPagar->pagas->junho ?? 0 }},
                            {{ $payload->contasPagar->pagas->julho ?? 0 }},
                            {{ $payload->contasPagar->pagas->agosto ?? 0 }},
                            {{ $payload->contasPagar->pagas->setembro ?? 0 }},
                            {{ $payload->contasPagar->pagas->outubro ?? 0 }},
                            {{ $payload->contasPagar->pagas->novembro ?? 0 }},
                            {{ $payload->contasPagar->pagas->dezembro ?? 0 }}
                        ]
                    }, {
                        name: 'Pendentes',
                        data: [
                            {{ $payload->contasPagar->pendendentes->janeiro ?? 0 }},
                            {{ $payload->contasPagar->pendendentes->feveiro ?? 0 }},
                            {{ $payload->contasPagar->pendendentes->marco ?? 0 }},
                            {{ $payload->contasPagar->pendendentes->abril ?? 0 }},
                            {{ $payload->contasPagar->pendendentes->maio ?? 0 }},
                            {{ $payload->contasPagar->pendendentes->junho ?? 0 }},
                            {{ $payload->contasPagar->pendendentes->julho ?? 0 }},
                            {{ $payload->contasPagar->pendendentes->agosto ?? 0 }},
                            {{ $payload->contasPagar->pendendentes->setembro ?? 0 }},
                            {{ $payload->contasPagar->pendendentes->outubro ?? 0 }},
                            {{ $payload->contasPagar->pendendentes->novembro ?? 0 }},
                            {{ $payload->contasPagar->pendendentes->dezembro ?? 0 }}
                        ]
                    }],
                    colors: [colors.secondary, colors.info],
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
                    document.querySelector("#graficoContaPagar"),
                    options
                );

                chart.render();
            }

            graficoContaPagarMountGraph();

        });
    </script>
@endsection
