@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{ url('vendors/dataTable/datatables.min.css') }}" type="text/css">
@endsection

@section('pageTitle')
    Minhas Vendas de {{ $enterprise->fantasia }}
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
                                    <h2 id="totalVendas" class="font-weight-bold">{{ App\Utils\Commons\FormatDataUtil::FormatMoney($payload->lucrosPresumidos->relatorioVendas->concluidas->valorVendas ?? 0) }}</h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/money_bag.png') }}" alt="Uma imagem impressionante">
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
                                    <p class="text-muted">Qtd de vendas Hoje</p>
                                    <h2 id="quantidadeVendas" class="font-weight-bold">{{ $payload->lucrosPresumidos->relatorioVendas->concluidas->quantidadeVendas ?? 0 }}</h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/quanVendas.png') }}">
                                    </figure>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center">
                                <span class="text-danger d-inline-flex align-items-center mr-2">
                                <p id="mesAnoQuantidadeVendas" class="text-muted"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Tempo Medio de Atendimento</p>
                                    <h2 id="medioAtendimentos" class="font-weight-bold">{{ $payload->lucrosPresumidos->relatorioVendas->concluidas->TempoMedioAtendimento ?? 0 }}</h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/tempo.png') }}">
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
                                    <p class="text-muted">Total Venda Mês</p>
                                    <h2 id="quantidadeProdutosCancelados"  class="font-weight-bold">{{App\Utils\Commons\FormatDataUtil::FormatMoney( $payload->lucrosPresumidos->relatorioVendas->canceladas->QuantidadeProdutosPerdidos ?? 0 ) }}</h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/produtosCancelados.png') }}">
                                    </figure>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center">
                                <span class="text-danger d-inline-flex align-items-center mr-2">
                                <p id="updateTopProdutos2" class="text-muted"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Ticket médio Mês</p>
                                    <h2 id="ticketmedio" class="font-weight-bold">{{App\Utils\Commons\FormatDataUtil::FormatMoney( $payload->lucrosPresumidos->relatorioVendas->concluidas->TicketMedio ?? 0 )}}</h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/ticket.png') }}">
                                    </figure>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center">
                                <span class="text-danger d-inline-flex align-items-center mr-2">
                                <p id="saldosUpdate" class="text-muted"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Total em descontos Mês</p>
                                    <h2  id="totalDescontos" class="font-weight-bold">{{ App\Utils\Commons\FormatDataUtil::FormatMoney($payload->lucrosPresumidos->relatorioVendas->concluidas->totalDescontos ?? 0) }}</h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/descontos.png') }}">
                                    </figure>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center">
                                <span class="text-success d-inline-flex align-items-center mr-2">
                                <p id="lucrosUpdate" class="text-muted"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Quantidade de produtos vendidos Mês</p>
                                    <h2 id="produtosVendidos" class="font-weight-bold">{{ $payload->lucrosPresumidos->relatorioVendas->concluidas->QuantidadeProdutosVendidos ?? 0 }}</h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/produtosVendidos.png') }}">
                                    </figure>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center">
                                <span class="text-danger d-inline-flex align-items-center mr-2">
                                <p  id="updateTopProdutos" class="text-muted"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Valor total vendas de vendas canceladas Mês</p>
                                    <h2 id="totalVendasCanceladas" class="font-weight-bold">{{ App\Utils\Commons\FormatDataUtil::FormatMoney($payload->lucrosPresumidos->relatorioVendas->canceladas->valorVendas ?? 0) }}</h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/vendasCanceladas.png') }}">
                                    </figure>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center">
                                <span class="text-danger d-inline-flex align-items-center mr-2">
                                <p id="saldosUpdate2" class="text-muted"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Quantidade de vendas canceladas Mês</p>
                                    <h2  id="quantidadeVendasCanceladas" class="font-weight-bold">{{ $payload->lucrosPresumidos->relatorioVendas->canceladas->QuantidadeVendasPerdidas ?? 0 }}</h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/quantidadeCanceladas.png') }}">
                                    </figure>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center">
                                <span class="text-danger d-inline-flex align-items-center mr-2">
                                <p id="updateFormasPagamento2" class="text-muted"></p>
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
                        <h6 class="card-title">Meu histórico de lucros</h6>
                    </div>
                    <div id="graficoLucros"></div>
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

            function graficoLucrosMountGraph()
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
                        name: 'Ganhos',
                        data: [
                            {{ $payload->lucrosPresumidos->ganhos->janeiro ?? 0 }},
                            {{ $payload->lucrosPresumidos->ganhos->feveiro ?? 0 }},
                            {{ $payload->lucrosPresumidos->ganhos->marco ?? 0 }},
                            {{ $payload->lucrosPresumidos->ganhos->abril ?? 0 }},
                            {{ $payload->lucrosPresumidos->ganhos->maio ?? 0 }},
                            {{ $payload->lucrosPresumidos->ganhos->junho ?? 0 }},
                            {{ $payload->lucrosPresumidos->ganhos->julho ?? 0 }},
                            {{ $payload->lucrosPresumidos->ganhos->agosto ?? 0 }},
                            {{ $payload->lucrosPresumidos->ganhos->setembro ?? 0 }},
                            {{ $payload->lucrosPresumidos->ganhos->outubro ?? 0 }},
                            {{ $payload->lucrosPresumidos->ganhos->novembro ?? 0 }},
                            {{ $payload->lucrosPresumidos->ganhos->dezembro ?? 0 }}
                        ]
                    }, {
                        name: 'Perdidos',
                        data: [
                            {{ $payload->lucrosPresumidos->perdidos->janeiro ?? 0 }},
                            {{ $payload->lucrosPresumidos->perdidos->feveiro ?? 0 }},
                            {{ $payload->lucrosPresumidos->perdidos->marco ?? 0 }},
                            {{ $payload->lucrosPresumidos->perdidos->abril ?? 0 }},
                            {{ $payload->lucrosPresumidos->perdidos->maio ?? 0 }},
                            {{ $payload->lucrosPresumidos->perdidos->junho ?? 0 }},
                            {{ $payload->lucrosPresumidos->perdidos->julho ?? 0 }},
                            {{ $payload->lucrosPresumidos->perdidos->agosto ?? 0 }},
                            {{ $payload->lucrosPresumidos->perdidos->setembro ?? 0 }},
                            {{ $payload->lucrosPresumidos->perdidos->outubro ?? 0 }},
                            {{ $payload->lucrosPresumidos->perdidos->novembro ?? 0 }},
                            {{ $payload->lucrosPresumidos->perdidos->dezembro ?? 0 }}
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
                    document.querySelector("#graficoLucros"),
                    options
                );

                chart.render();
            }

            graficoLucrosMountGraph()

        });
    </script>
@endsection
