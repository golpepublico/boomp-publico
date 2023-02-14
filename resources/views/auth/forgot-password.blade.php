@extends('layouts.auth-layout')

@section('title-page', 'Recuperação de Senha')

@section('title')
    <div>
        Recupere a senha<br>
        da sua conta.
    </div>
@endsection

@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <x-input id="email" type="email" name="email" placeholder="Email" :value="old('email')" required autofocus />

        <input type="submit" value='Recuperar Senha' />
    </form>
@endsection

@section('link')
    Voltar ao login?
    @if (Route::has('login'))
        <a href="{{ route('login') }}">Acesse aqui.</a>
    @endif
@endsection
