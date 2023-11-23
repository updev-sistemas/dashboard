@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{ url('vendors/range-slider/css/ion.rangeSlider.min.css') }}" type="text/css">
@endsection

@section('pageTitle')
    Vendas por usuários de {{ $enterprise->fantasia }}
@endsection

@section('content')

    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('env_ctm') }}">Inicio</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Vendas por usuários</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="container-fluid">
            @foreach($payload->lucrosPresumidos->relatorioVendas->vendasUsuarios as $key => $user)
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
                                <a>{{ $user->usuario }}</a>
                                <p class="text-muted">Usuário</p>
                            </div>
                        </div>
                        <div class="card border shadow-none">
                            <div class="card-body pt-2 pb-2 text-muted">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                        <span>Total em vendas:</span>
                                        <span>{{ App\Utils\Commons\FormatDataUtil::FormatMoney($user->totalVendas ?? 0) }}
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                        <span>Comissões:</span>
                                        <span>{{ App\Utils\Commons\FormatDataUtil::FormatMoney($user->comissoes ?? 0) }}
                                        </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                        <span>Quantidade de vendas:</span>
                                        <span>{{ $user->quantidadeVendas }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                        <span>Produtos vendidos:</span>
                                        <span>{{ $user->quantidadeProdutos }}</span>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                        <span>Tempo médio de atendimento:</span>
                                        <span>{{ $user->tempoAtendimento }}</span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection

@section('script')

@endsection
