@extends('layouts.app')
@section('head')
@endsection

@section('pageTitle')
    Lista de Empresas Atendidas
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
                <li class="breadcrumb-item" aria-current="page">
                    <a href="{{ route('clientes.index') }}">Clientes</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Lojas</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8"><h5 class="card-title">Empresas Atendidas</h5></div>
            </div>
            <hr />
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-lg-2 text-center" scope="col">Cliente</th>
                            <th class="col-lg-1 text-center" scope="col">Documento</th>
                            <th class="col-lg-2 text-center" scope="col">Fantasia</th>
                            <th class="col-lg-3 text-center" scope="col">Razão Social</th>
                            <th class="col-lg-2 text-center" scope="col">Email</th>
                            <th class="col-lg-1 text-center" scope="col">Demonstrativo</th>
                            <th class="col-lg-1 text-center" scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collection as $key => $obj)
                        <tr>
                            <td>{{ $obj->user->name }}</td>
                            <td>{{ $obj->cnpj }}</td>
                            <td>{{ $obj->fantasia }}</td>
                            <td>{{ $obj->razao_social }}</td>
                            <td>{{ $obj->email }}</td>
                            <td><a class="btn btn-sm btn-block btn-success" href="{{ route('adm_view_enterprise', ['id' => $obj->id]) }}"><i class="fa fa-money"></i></a></td>
                            <td><a class="btn btn-sm btn-block btn-warning" href="{{ route('empresas.edit',['id' => $obj->id]) }}">Editar</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">{!! $collection->links() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


@endsection

@section('script')
@endsection
