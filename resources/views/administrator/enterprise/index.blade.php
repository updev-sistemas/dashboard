@extends('layouts.app')
@section('head')
@endsection

@section('pageTitle')
    Lista de Empresas Atendidas
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8"><h5 class="card-title">Empresas Atendidas</h5></div>
                <div class="col-lg-4 text-right"><a class="btn btn-primary" href="{{ route('empresas.create') }}">Nova empresa</a></div>
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
                            <td><a class="btn btn-sm btn-block btn-success" href="{{ route('view_enterprise', ['id' => $obj->id]) }}"><i class="fa fa-money"></i></a></td>
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
