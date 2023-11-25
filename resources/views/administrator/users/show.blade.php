@extends('layouts.app')
@section('head')
@endsection

@section('pageTitle')
    Cliente Registrada
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8"><h5 class="card-title">{{ $customer->name }}</h5></div>
                <div class="col-lg-4 text-right"><a class="btn btn-primary" href="{{ route('clientes.index') }}">Retornar</a></div>
            </div>
            <hr />
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="fantasia">Nome</label>
                        <input type="text" value="{{ $customer->name }}"  class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="{{ $customer->email }}"  class="form-control" readonly />
                    </div>
                    <div class="form-group">
                        <label for="last_access_date">Ultimo Acesso</label>
                        @if (is_null( $customer->last_access_date))
                        <input type="text" value="Sem Registro" class="form-control" readonly />
                        @else
                        <input type="text" value="{{ $customer->last_access_date->format('d/M/y H:i:s') }}" class="form-control" readonly />
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
