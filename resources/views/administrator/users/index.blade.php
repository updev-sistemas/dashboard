@extends('layouts.app')
@section('head')
@endsection

@section('pageTitle')
    Lista de Clientes Atendidos
@endsection

@section('content')

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
                            <th class="col-lg-4 text-center" scope="col">Email</th>
                            <th class="col-lg-2 text-center" scope="col">Ultimo Acesso</th>
                            <th class="col-lg-2 text-center" scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($collection as $key => $obj)
                        <tr>
                            <td>{{ $obj->name }}</td>
                            <td>{{ $obj->email }}</td>
                            <td>
                                @if (is_null( $obj->last_access_date))
                                    Sem Registro
                                @else
                                    {{ $obj->last_access_date->format('d/M/y H:i:s') }}
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-sm btn btn-success" href="{{ route('clientes.edit',['id' => $obj->id]) }}">Visualizar Lojas</a>
                                <a class="btn btn-sm btn btn-warning" href="{{ route('clientes.edit',['id' => $obj->id]) }}">Editar</a>
                            </td>
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
