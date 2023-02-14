@extends('layouts.auth-layout')
@section('title-page', 'Registre-se')
@section('title')
    <div>
        Criar uma conta<br>
        grátis.
    </div>
@endsection
@section('content')
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <x-input id="name" type="text" name="name" placeholder="Nome Completo" :value="old('name')" required autofocus />
        <x-input id="email" type="text" name="email" placeholder="Email" :value="old('email')" required />
        <x-input id="password" type="password" name="password" placeholder="Senha" required autocomplete="new-password" />
        <x-input id="password_confirmation" type="password" placeholder="Confirme sua senha" name="password_confirmation"
            required />
        <x-input id="nomeloja" type="text" name="store" placeholder="Nome da Loja" :value="old('store')" required />
        <x-input id="urlloja" type="text" name="url" placeholder="URL da Loja" disabled />

        <input type="submit" value={{ __('Registrar-se') }} />
    </form>
@endsection

@section('link')
    Já é cadastrado?
    @if (Route::has('login'))
        <a href="{{ route('login') }}">Efetuar login.</a>
    @endif
@endsection

@section('scripts')
    <script src="{{  URL::to('assets/pages/js/registro.js') }}"></script>
@endsection
