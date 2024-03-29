@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{ url('vendors/range-slider/css/ion.rangeSlider.min.css') }}" type="text/css">
@endsection

@section('pageTitle')
    Contas a Receber de {{ $enterprise->fantasia }}
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
                <li class="breadcrumb-item active" aria-current="page">Contas a Receber</li>
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
                                    <p class="text-muted">Hoje</p>
                                    <h2 id="receberPagas" class="font-weight-bold"><span id="ContasReceberPagasAtual"></span></h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/pagarPaga.png') }}">
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
                                    <p class="text-muted">Próximos 7 Dias</p>
                                    <h2 id="receberPendentes" class="font-weight-bold"><span id="ContasReceberPendentesAtual"></span></h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/pagarPendente.png') }}">
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
                                    <h2 id="receberVencidos" class="font-weight-bold"><span id="ContasReceberVencidasAtual"></span></h2>
                                </div>
                                <div>
                                    <figure class="avatar">
                                        <img src="{{ url('assets/media/image/user/pagarVencida.png') }}">
                                    </figure>
                                </div>
                            </div>
                            <div class="d-inline-flex align-items-center">
                                <span class="text-success d-inline-flex align-items-center mr-2">
                                <p  id="updateTopProdutos" class="text-muted"></p>
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
                    <div id="graficoContaReceber"></div>
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

            const ordemMeses = ['janeiro', 'fevereiro', 'marco', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'];

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

            function fillBadges(data)  {
                const pa = ConvertToMoney(data.pagasAtual ?? 0);
                $("#ContasReceberPagasAtual").html(pa);

                const pda = ConvertToMoney(data.pendentesAtual ?? 0);
                $("#ContasReceberPendentesAtual").html(pda);

                const pv = ConvertToMoney(data.vencidasAtual ?? 0);
                $("#ContasReceberVencidasAtual").html(pv);
            }

            function historicoContasMountGraph(data)
            {
                const contasPagar_Receber = [];
                ordemMeses.forEach(mes => {
                    if (data.receber.hasOwnProperty(mes)) {
                        contasPagar_Receber.push(parseFloat(data.receber[mes]));
                    }
                });

                const contasPagar_Recebidas = [];
                ordemMeses.forEach(mes => {
                    if (data.recebidas.hasOwnProperty(mes)) {
                        contasPagar_Recebidas.push(parseFloat(data.recebidas[mes]));
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
                        name: 'À Receber',
                        data: contasPagar_Receber
                    }, {
                        name: 'Recebidas',
                        data: contasPagar_Recebidas
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
                    document.querySelector("#graficoContaReceber"),
                    options
                );

                chart.render();
            }

            function fillCadastros(data)
            {
                $("#CadastroNumeroClientes").html(data.clientes ?? 0);
                $("#CadastroNumeroProdutos").html(data.produtos ?? 0);
                $("#CadastroNumeroFornecedores").html(data.fornecedores ?? 0);
                $("#CadastroNumeroUsuarios").html(data.usuarios ?? 0);
            }

            function Run(payload)
            {
                fillCadastros(payload.cadastros);
                fillBadges(payload.contasReceber);

                historicoContasMountGraph(payload.contasReceber);
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
