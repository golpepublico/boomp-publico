@extends('layouts.auth-layout')

@section('title-page', 'Login')

@section('title')
    <div>
        Efetue login em<br>
        sua conta.
    </div>
@endsection

@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <x-input id="email" type="email" name="email" placeholder="Email" :value="old('email')" required autofocus />
        <x-input id="password" type="password" name="password" placeholder="Senha" required />
        <div class="lembre-esqueceu">
            <div class="lembre">
                <input type="checkbox" id="lembreme" name="remember">
                <label for="lembreme">{{ __('Lembre me') }}</label>
            </div>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    <span>{{ __('Esqueceu sua senha?') }}</span>
                </a>
            @endif
        </div>
        <input type="submit" value={{ __('Login') }} />
    </form>
@endsection

@section('link')
    Ainda não possui cadastro?
    @if (Route::has('register'))
        <a href="{{ route('register') }}">Cadastre-se aqui.</a>
    @endif
@endsection
