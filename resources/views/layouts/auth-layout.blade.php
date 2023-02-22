<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title-page') </title>

    @include('layouts.app-head')
    <link rel="stylesheet" href="{{ asset('assets/pages/css/login.css') }}">
</head>

<div class="lado-esquerdo">
    <div class="logo">
        <a href="{{ URL::to('/') }}">
            <img src="{{ asset('assets/pages/img/logo-recortada.png') }}" alt="logo">
        </a>
    </div>

    <div class="content">
        <div class="titulo">
            @yield('title')
        </div>

        @yield('content')
    </div>

    <div class="link-registro">
        @yield('link')
    </div>
</div>

<div class="lado-direito">
    <img src="{{ asset('assets/pages/img/login-direito.svg') }}" alt="background">
</div>

@yield('scripts')

</html>
