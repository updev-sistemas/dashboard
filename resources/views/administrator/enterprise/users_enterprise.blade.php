@extends('layouts.app')
@section('head')
@endsection

@section('pageTitle')
    Lista de Usuários
@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8"><h5 class="card-title">{{ $enterprise->fantasia }}</h5></div>
                <div class="col-lg-4 text-right">
                    <a class="btn btn-success" href="{{ route('empresas.criar_usuario',['id' => $enterprise->id]) }}">Adicionar</a>
                    <a class="btn btn-primary" href="{{ route('empresas.index') }}">Retornar</a>
                </div>
            </div>
            <hr />
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="col-lg-4 text-center" scope="col">Nome</th>
                        <th class="col-lg-3 text-center" scope="col">Email</th>
                        <th class="col-lg-3 text-center" scope="col">Último Acesso</th>
                        <th class="col-lg-2 text-center" scope="col">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($collection as $key => $obj)
                        <tr>
                            <td>{{ $obj->name }}</td>
                            <td>{{ $obj->email }}</td>
                            <td>{{ $obj->last_access_date }}</td>
                            <td><a class="btn btn-sm btn-block btn-primary" href="{{ route('empresas.criar_usuario',['id' => $obj->id]) }}"><i class="fa fa-users"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection

@section('script')
@endsection
