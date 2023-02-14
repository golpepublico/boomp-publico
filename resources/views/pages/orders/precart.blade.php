@extends('layouts.layout')

@section('title-page', 'Carrinhos abandonados')

@section('css')
<link rel="stylesheet" href="{{ URL::to('assets/pages/css/pedidos.css') }}">
@endsection

@section('content')
@include('pages.orders.navigation')
<div class="titulo">
    <h2> Carrinhos abandonados </h2>
</div>
<span class="text-config"> Recupere os checkouts que não foram concluídos. </span>

<div id="filtro-pedidos">
    <form class="flex" method="get" action="{{ url()->current() }}">
        <div class="filtro-pedido">
            <span class="material-icons-outlined">
                search
            </span>
            <input type="text" onchange="this.form.submit()" name="email" placeholder="Procure pelo e-mail do cliente" value="{{ request()->input('email', old('email')) }}">
        </div>
    </form>
</div>
@include('pages.orders.table-precart')
@endsection
