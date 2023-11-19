@extends('layouts.app')
@section('head')
@endsection

@section('pageTitle')
    Editar Empresa
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
                    <form action="{{ route('empresas.update',['id' => $enterprise->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="cnpj">Documento</label>
                            <input type="text" value="{{ old('cnpj',$enterprise->cnpj) }}" class="form-control" name="cnpj" placeholder="Documento" />
                            @if ($errors->has('cnpj'))
                                <small class="form-text text-danger">{{ $errors->first('cnpj') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="fantasia">Nome Fantasia</label>
                            <input type="text" value="{{ old('fantasia',$enterprise->fantasia) }}"  class="form-control" name="fantasia" placeholder="Nome Fantasia" />
                            @if ($errors->has('fantasia'))
                                <small class="form-text text-danger">{{ $errors->first('fantasia') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="razao_social">Razão Social</label>
                            <input type="text" value="{{ old('razao_social',$enterprise->razao_social) }}"  class="form-control" name="razao_social" placeholder="Razão social" />
                            @if ($errors->has('razao_social'))
                                <small class="form-text text-danger">{{ $errors->first('razao_social') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="{{ old('email',$enterprise->email) }}"  class="form-control" name="email" placeholder="Email" />
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
