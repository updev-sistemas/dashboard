@extends('layouts.app')
@section('head')
@endsection

@section('pageTitle')
    Novo Cliente
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8"><h5 class="card-title">Formulário de Cadastro</h5></div>
                <div class="col-lg-4 text-right"><a class="btn btn-primary" href="{{ route('clientes.index') }}">Retornar</a></div>
            </div>
            <hr />
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('clientes.store') }}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" value="{{ old('name','') }}" class="form-control" name="name" placeholder="Nome" />
                                @if ($errors->has('name'))
                                    <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" value="{{ old('email','') }}"  class="form-control" name="email" placeholder="Email" />
                                @if ($errors->has('email'))
                                <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
