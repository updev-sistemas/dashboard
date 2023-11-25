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
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        @foreach ($collection->chunk(3) as $sublist)
        <div class="row">
            @foreach($sublist as $enterprise)
            <div class="card col-lg-4">
                <div class="card-body">
                    <div class="media">
                        <img src="{{ url('assets/media/image/user/women_avatar1.jpg') }}" class="mr-3" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $enterprise->fantasia }}</h5>
                            <p>
                                {{ $enterprise->razao_social }} / {{ $enterprise->cnpj }}
                                <br />
                                <a class="btn btn-sm btn-link" href="{{ route('view_enterprise',['id' => $enterprise->id]) }}"><i class="fa fa-link"></i> &nbsp; Acessar Financeiro</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>

@endsection

@section('script')
@endsection
