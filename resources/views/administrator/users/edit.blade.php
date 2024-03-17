@extends('layouts.app')
@section('head')
@endsection

@section('pageTitle')
    Editar Cliente
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8"><h5 class="card-title">Editar {{ $customer->name }}</h5></div>
                <div class="col-lg-4 text-right"><a class="btn btn-primary" href="{{ route('clientes.index') }}">Retornar</a></div>
            </div>
            <hr />
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('clientes.update',['id' => $customer->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" value="{{ old('name',$customer->name) }}" class="form-control" name="name" placeholder="Nome" />
                            @if ($errors->has('name'))
                                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="{{ old('email',$customer->email) }}"  class="form-control" name="email" placeholder="Email" />
                            @if ($errors->has('email'))
                                <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Habilitado</label>
                            <select name="id_status" class="form-control">
                                <optgroup label="Atual">
                                    <option value="{{ $customer->id_status }}">{{ \App\Utils\Enumerables\UserStatusEnum::getStatus($customer->id_status) }}</option>
                                </optgroup>
                                <optgroup label="Opções">
                                    <option value="1000">Habilitado</option>
                                    <option value="0">Desabilitado</option>
                                </optgroup>
                            </select>
                            @if ($errors->has('email'))
                                <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                            @endif
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
