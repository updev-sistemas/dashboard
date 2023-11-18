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
    <form id="relizaLogin" action="{{ route('login') }}" method="post">
        @csrf

        <div class="form-group">
            <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Seu E-mail" name="email" value="{{ old('email') }}" required autofocus />
        </div>
        <div class="form-group">
            <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Sua senha" required name="password" />
        </div>
        <div class="form-group d-flex justify-content-between">    
        </div>
        <button id="btLogar" class="btn btn-primary btn-block" >
            <span id="carregar" ></span>
            Iniciar sessão
        </button>

        <hr>
        <p class="text-muted">Esqueceu a senha?</p>
        <a href="{{ route('password.request') }}" class="btn btn-outline-light btn-sm">Recuperar senha</a>
    </form>

@endsection
