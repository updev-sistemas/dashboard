@extends('layouts.app')
@section('head')
@endsection

@section('pageTitle')
    Empresa Registrada
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8"><h5 class="card-title">{{ $enterprise->fantasia }}</h5></div>
                <div class="col-lg-4 text-right"><a class="btn btn-primary" href="{{ route('empresas.index') }}">Retornar</a></div>
            </div>
            <hr />
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="cnpj">Documento</label>
                        <input type="text" value="{{ $enterprise->cnpj }}" class="form-control" readonly />
                    </div>
                    <div class="form-group">
                        <label for="fantasia">Nome Fantasia</label>
                        <input type="text" value="{{ $enterprise->fantasia }}"  class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <label for="razao_social">Razão Social</label>
                        <input type="text" value="{{ $enterprise->razao_social }}"  class="form-control"  readonly />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="{{ $enterprise->email }}"  class="form-control" readonly />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
