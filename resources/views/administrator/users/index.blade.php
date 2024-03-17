@extends('layouts.app')
@section('head')
@endsection

@section('pageTitle')
    Lista de Clientes Atendidos
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
                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8"><h5 class="card-title">Clientes Atendidos</h5></div>
                <div class="col-lg-4 text-right"><a class="btn btn-primary" href="{{ route('clientes.create') }}">Novo Cliente</a></div>
            </div>
            <hr />
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-lg-4 text-center" scope="col">Nome</th>
                            <th class="col-lg-1 text-center" scope="col">Lojas</th>
                            <th class="col-lg-3 text-center" scope="col">Email</th>
                            <th class="col-lg-2 text-center" scope="col">Ultimo Acesso</th>
                            <th class="col-lg-2 text-center" scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collection as $key => $obj)
                        <tr title="Cliente {{ \App\Utils\Enumerables\UserStatusEnum::getStatus($obj->id_status) }}">
                            <td>
                                <i class="fa fa-circle text-{{ \App\Utils\Enumerables\UserStatusEnum::getStatusLabel($obj->id_status) }}"></i>
                                {{ $obj->name }}
                            </td>
                            <td class="text-center">{{ $obj->enterprises()->count() }}</td>
                            <td>{{ $obj->email }}</td>
                            <td>
                                @if (is_null( $obj->last_access_date))
                                    Sem Registro
                                @else
                                    {{ $obj->last_access_date->format('d/M/y H:i:s') }}
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-sm btn btn-primary" href="{{ route('view_list_enterprise',['id' => $obj->id]) }}"><i class="fa fa-eye"></i>&nbsp; Visualizar Lojas</a>
                                <a class="btn btn-sm btn btn-warning" href="{{ route('clientes.edit',['id' => $obj->id]) }}"><i class="fa fa-pencil"></i>&nbsp; Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">{!! $collection->links() !!}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>


@endsection

@section('script')
@endsection
