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
                    @if (auth()->user()->isAdministratorUser())
                        <a href="{{ route('env_adm') }}">Inicio</a>
                    @else
                        <a href="{{ route('env_ctm') }}">Inicio</a>
                    @endif
                </li>
                <li class="breadcrumb-item active" aria-current="page">Vendores</li>
            </ol>
        </nav>
    </div>
        <div class="container-fluid">
            @if (isset($payload->lucrosPresumidos->relatorioVendas->vendasUsuarios))
                <div class="row">
                @foreach(collect($payload->lucrosPresumidos->relatorioVendas->vendasUsuarios) as $key => $user)
                <div class="col-lg-3 col-md-3 col-sm-3">
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
                                    <a>{{ $user->usuario ?? 0 }}</a>
                                    <p class="text-muted">Usuário</p>
                                </div>
                            </div>
                            <div class="card border shadow-none">
                                <div class="card-body pt-2 pb-2 text-muted">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                            <span>Total em vendas:</span>
                                            <span>{{ App\Utils\Commons\FormatDataUtil::FormatMoney($user->totalvendas ?? 0) }}
                                                </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                            <span>Comissões:</span>
                                            <span>{{ App\Utils\Commons\FormatDataUtil::FormatMoney($user->comissoes ?? 0) }}
                                                </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                            <span>Quantidade de vendas:</span>
                                            <span>{{ $user->quantidadevendas ?? 0 }}</span>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                            <span>Vendas Canceladas:</span>
                                            <span>{{ $user->vendascanceladas  ?? 0 }}</span>
                                        </li>

                                        <li class="list-group-item d-flex justify-content-between pl-0 pr-0">
                                            <span>Produtos vendidos:</span>
                                            <span>{{ $user->quantidadeprodutos ?? 0 }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
            @else
            <h3>Aguardando dados.</h3>
            @endif
        </div>

@endsection

@section('script')
    <script type="text/javascript">
        function Run() {
            let payload = JSON.parse('{!! json_encode($payload)  !!}');
            console.log(payload);
        }

        Run();
    </script>
@endsection
