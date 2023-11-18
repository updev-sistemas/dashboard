@extends('layouts.auth')

@section('content')

    <!-- logo -->
    <div id="logo">
        <img class="logo" src="{{ url('assets/media/image/logo.png') }}" alt="image">
        <img class="logo-dark" src="{{ url('assets/media/image/logo-dark.png') }}" alt="image">
    </div>
    <!-- ./ logo -->

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <br>
    <br>

    <!-- form -->
    <form id="alteraDadosDeAcesso" action="{{ route('password.email') }}" method="post">
        @csrf

        <div class="form-group">
            <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email para recuperar senha" name="email" value="{{ old('email') }}" required autofocus />
        
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif  
        </div>
        
        <button id="btLogar" class="btn btn-primary btn-block" >
            <span id="carregar" ></span>
            Recuperar senha
        </button>

        <hr>
        <p class="text-muted">Esqueceu a senha?</p>
        <a href="{{ route('password.request') }}" class="btn btn-outline-light btn-sm">Recuperar senha</a>
    </form>

@endsection