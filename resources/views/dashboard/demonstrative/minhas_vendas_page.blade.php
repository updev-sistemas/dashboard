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
                    @if (auth()->user()->isAdministratorUser())
                        <a href="{{ route('env_adm') }}">Inicio</a>
                    @else
                        <a href="{{ route('env_ctm') }}">Inicio</a>
                    @endif
                </li>
                <li class="breadcrumb-item active" aria-current="page">Minhas Vendas</li>
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
                                    <p class="text-muted">Total vendas Mês</p>
                                    <h2 class="font-weight-bold"><span id="totalvendames"></span></h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/money_bag.png') }}" alt="Uma imagem impressionante">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Qtd de vendas Mês</p>
                                    <h2 class="font-weight-bold"><span id="qtdvendames"></span></h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/quanVendas.png') }}">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Total Desconto Dia</p>
                                    <h2 class="font-weight-bold"><span id="totaldescontosdia"></span></h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/tempo.png') }}">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Ticket Médio Mês</p>
                                    <h2 class="font-weight-bold"><span id="ticketmediomes"></span></h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/produtosCancelados.png') }}">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Quantidade Media de Itens por Cupom</p>
                                    <h2 class="font-weight-bold"><span id="qtdmediaitensporcupom"></span></h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/ticket.png') }}">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Quantidade de Produtos Vendidos</p>
                                    <h2 class="font-weight-bold"><span id="qtdprodutovendidos"></span></h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/descontos.png') }}">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Valor de Vendas Canceladas</p>
                                    <h2 class="font-weight-bold"><span id="valorvendascanceladas"></span></h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/produtosVendidos.png') }}">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Quantidade de Vendas Cancelados</p>
                                    <h2 class="font-weight-bold"><span id="qtdvendascanceladas"></span></h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/vendasCanceladas.png') }}">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <p class="text-muted">Total Desconto Mês</p>
                                    <h2 class="font-weight-bold"><span id="totaldescontomes"></span></h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/quantidadeCanceladas.png') }}">
                                    </figure>
                                </div>
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
    <script type="text/javascript">

        $(function() {

            function ConvertToMoney(data) {
                const result =  data.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                });

                return result;
            }

            function fillCadastros(data)
            {
                $("#CadastroNumeroClientes").html(data.clientes ?? 0);
                $("#CadastroNumeroProdutos").html(data.produtos ?? 0);
                $("#CadastroNumeroFornecedores").html(data.fornecedores ?? 0);
                $("#CadastroNumeroUsuarios").html(data.usuarios ?? 0);
            }

            function graficoLucrosMountGraph(data)
            {
                const lucrosPresumidos_ganhos = [];
                ordemMeses.forEach(mes => {
                    if (data.ganhos.hasOwnProperty(mes)) {
                        lucrosPresumidos_ganhos.push(data.ganhos[mes]);
                    }
                });

                const lucrosPresumidos_perdidos = [];
                ordemMeses.forEach(mes => {
                    if (data.perdidos.hasOwnProperty(mes)) {
                        lucrosPresumidos_perdidos.push(data.perdidos[mes]);
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
                    series: [{
                        name: 'Ganhos',
                        data: lucrosPresumidos_ganhos
                    }, {
                        name: 'Perdidos',
                        data: lucrosPresumidos_perdidos
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

            function fillCards(data)
            {
                $('#totalvendames').html(ConvertToMoney(data.totalvendames ?? 0));
                $('#qtdvendames').html(data.qtdvendames ?? 0);
                $('#totaldescontosdia').html(ConvertToMoney(data.totaldescontosdia ?? 0));
                $('#ticketmediomes').html(ConvertToMoney(data.tikectmediomes ?? 0));
                $('#qtdmediaitensporcupom').html(data.qtdmediadeitensporcupom ?? 0);
                $('#qtdprodutovendidos').html(data.qtddeprodutosvendidos ?? 0);
                $('#valorvendascanceladas').html(ConvertToMoney(data.valordevendascanceladas ?? 0));
                $('#qtdvendascanceladas').html(data.qtddevendascanceladas ?? 0);
                $('#totaldescontomes').html(ConvertToMoney(data.totaldescontomes ?? 0));
            }


            const ordemMeses = ['janeiro', 'fevereiro', 'marco', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'];

            function Run(payload) {

                fillCards(payload.lucrosPresumidos.relatorioVendas.concluidas);

                graficoLucrosMountGraph(payload.lucrosPresumidos);
                fillCadastros(payload.cadastros);
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

            GetPayload()
                .then((res) => Run(res))
                .catch((res) => console.log(res));
        });
    </script>
@endsection
