@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{ url('vendors/range-slider/css/ion.rangeSlider.min.css') }}" type="text/css">
@endsection

@section('pageTitle')
    Caixas Abertos de {{ $enterprise->fantasia }}
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
    <div class="container-fluid">
        <div class="row">
            @if (isset($payload->caixasAbertos))
                @foreach($payload->caixasAbertos as $key => $caixa)

                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="d-flex">
                                    <div>
                                        <figure class="avatar mr-3">
                                            <span ></span>
                                            <img src="{{ url('assets/media/image/user/usuario.png') }}">
                                        </figure>
                                    </div>
                                    <div>
                                        <a>{{ $caixa->usuario }}</a>
                                        <p class="text-muted">Usuário</p>
                                    </div>
                                </div>

                                <div class="card border shadow-none">
                                    <div class="card-body pt-2 pb-2 text-muted">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Data abertura:</span>
                                                <span>{{ $caixa->dataabertura ?? '' }}</span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Hora abertura:</span>
                                                <span>{{ $caixa->horaabertura ?? '' }}</span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Saldo inicial:</span>
                                                <span>{{ App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->saldoinicial ?? 0) }}</span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Saldo atual:</span>
                                                <span>{{ App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->saldoatual ?? 0) }}</span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>PIX:</span>
                                                <span>{{ App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->pix ?? 0) }}</span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>fechamento:</span>
                                                <span>{{ App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->fechamento ?? 0) }}</span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Dinheiro 1:</span>
                                                <span>{{ App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->dinheiro1 ?? 0) }}</span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Digital:</span>
                                                <span>{{ App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->digital ?? 0) }}</span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Crédito:</span>
                                                <span>{{ App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->credito ?? 0) }}</span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Cheque:</span>
                                                <span>{{ App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->cheque ?? 0) }}</span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Cashback:</span>
                                                <span>{{ App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->cashback ?? 0) }}</span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Cartão:</span>
                                                <span>{{ App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->cartao ?? 0) }}</span>
                                            </li>

                                            <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                                <span>Saldo atual:</span>
                                                <span>{{ App\Utils\Commons\FormatDataUtil::FormatMoney($caixa->saldoatual ?? 0) }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

               @endforeach
           @else
            <h3>Aguardando dados.</h3>
           @endif
        </div>
    </div>

@endsection

@section('script')
<script>
    $(function(){

        function fillCadastros()
        {
            const clientes = '{!! $payload->cadastros->clientes ?? 0 !!}';
            const produtos = '{!! $payload->cadastros->produtos ?? 0 !!}';
            const fornecedores = '{!! $payload->cadastros->fornecedores ?? 0 !!}';
            const usuarios = '{!! $payload->cadastros->usuarios ?? 0 !!}';


            $("#CadastroNumeroClientes").html(clientes);
            $("#CadastroNumeroProdutos").html(produtos);
            $("#CadastroNumeroFornecedores").html(fornecedores);
            $("#CadastroNumeroUsuarios").html(usuarios);
        }

        fillCadastros();
    });
</script>
@endsection
