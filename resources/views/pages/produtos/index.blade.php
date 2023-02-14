@extends('layouts.layout')

@section('title-page', 'Produtos')

@section('store')
    {{ Auth::user()->name }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::to('assets/pages/css/produtos.css') }}">
@endsection

@section('content')

    <div class="secundary-nav">
        <a href="{{ route('produtos.create') }}"> <button> Cadastrar Produto </button> </a>
        <a href="order_bumps.php"> <button> Order Bumps </button> </a>
    </div>

    <div class="titulo">
        <h2> Produtos </h2>
    </div>

    <span class="text-config"> Encontre os produtos cadastrados na sua loja. </span>
    <div id="filtro-pedidos">
        <div class="filtro-pedido">
            @include('layouts.search')
        </div>
        <div class="filtro-atualizar">
            <span class="material-icons-outlined">refresh</span>
            <a href="{{ url()->current() }}">
                <p>Sincronizar produtos</p>
            </a>
        </div>
    </div>

    <div id="container-produtos" class="scroll-different">
        @if (count($products) > 0)
            @foreach ($products as $product)
                <div class="item-produto card">
                    <div class="item-produto-title">
                        <img src="{{ URL::to('storage/images/product/' . $product->image) }}">
                        <h6> {{ $product->name }} </h6>
                    </div>
                    <div>
                        <a href="{{ URL::to('/checkout/' . $product->store->slug . '/' . $product->slug) }}"
                            target="new" class="item-produto-link">
                            <span class="material-icons-outlined">link</span>
                            <p>
                                Link de compra
                            </p>
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="item-produto card">
                <p>Não há produtos cadastrados.</p>
            </div>
        @endif
    </div>
@endsection

@section('pagination')
    {{ $products->links('layouts.pagination') }}
@endsection
