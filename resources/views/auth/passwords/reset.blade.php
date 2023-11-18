@extends('layouts.auth')

@section('content')

    <!-- logo -->
    <div id="logo">
        <img class="logo" src="{{ url('assets/media/image/logo.png') }}" alt="image">
        <img class="logo-dark" src="{{ url('assets/media/image/logo-dark.png') }}" alt="image">
    </div>
    <!-- ./ logo -->
   <br>
   <br>

    <!-- form -->
    <form id="alteraSenha" action="{{ route('password.request') }}" method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Seu E-mail" name="email" value="{{ old('email') }}" required autofocus />
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group">
            <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Nova senha" required name="password" />
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
        
        <div class="form-group">
            <input id="password_confirmation" type="password" class="form-control" placeholder="Repita a senha" required name="password_confirmation" />
        </div>
        <div class="form-group d-flex justify-content-between">    
        </div>
        <button id="btLogar" class="btn btn-primary btn-block" >
        <span id="carregar" ></span>
          Alterar Senha
        </button>

        <hr>
        <p class="text-muted">Já tenho uma senha?</p>
        <a href="{{ url('login') }}" class="btn btn-outline-light btn-sm">Realizar Autenticação</a>
    </form>

@endsection

