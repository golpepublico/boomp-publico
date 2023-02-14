@extends('layouts.layout')

@section('title-page', 'Inicio')

@section('css')
<link rel="stylesheet" href="{{ URL::to('assets/pages/css/inicio.css') }}">
<link rel="stylesheet" href="{{ URL::to('assets/pages/css/pedidos.css') }}">
@endsection

@section('content')
<div class="titulo">
    <span class="material-icons-outlined" id="icon-home">home</span>
    <h2>Início</h2>
</div>
<span class="welcome">Bem-vindo à Boomp. Faça a configuração da sua loja e comece a utilizar o checkout transparente.</span>
<div class="cards">
    <div class="card">
        <span class="card-text">Faturamento de hoje</span>
        <h2 class="card-number">R$ {{ Number::formatToCurrency($indicators->total) }}</h2>
    </div>
    <div class="card">
        <span class="card-text">Pedidos totais de hoje</span>
        <h2 class="card-number">{{ $indicators->qtde }}</h2>
    </div>
</div>
<div>
    <div class="titulo">
        <h3> Carrinhos abandonados </h3>
    </div>
    <span class="text-config"> Acompanhe os checkouts que não foram concluídos </span>
    @include('pages.orders.table-precart')
</div>
@endsection
