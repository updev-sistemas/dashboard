@extends('layouts.app')

@section('head')
@endsection

@section('pageTitle')
@endsection

@section('content')

    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Inicio</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Perfil</li>
                <li class="breadcrumb-item active" aria-current="page">Alterar Senha</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <h4>Atualização de Senha</h4>
            <br />
            <form action="{{ route('password_change') }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Senha Atual</label>
                    <input type="password" class="form-control" name="password" placeholder="Senha atual" />
                    @if ($errors->has('password'))
                        <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Nova Senha</label>
                    <input type="password" class="form-control" name="new_password" placeholder="Nova Senha" />
                    @if ($errors->has('new_password'))
                        <small class="form-text text-danger">{{ $errors->first('new_password') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Confirmar Senha</label>
                    <input type="password" class="form-control" name="new_password_confirmation" placeholder="Confirmar Senha" />
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>
        </div>
    </div>

@endsection

@section('script')
@endsection
