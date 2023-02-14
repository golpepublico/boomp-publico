@extends('layouts.layout')

@section('title-page', 'Categorias de Produtos')

@section('store')
{{ Auth::user()->name }}
@endsection

@section('css')
<link rel="stylesheet" href="{{ URL::to('assets/pages/css/categorias.css') }}">
<link rel="stylesheet" href="{{ URL::to('assets/pages/css/pedidos.css') }}">
@endsection

@section('content')
<div id="config">
    <div class="secundary-nav">
        <a href="{{ route('produtos.create') }}"> <button> Cadastrar Produto </button> </a>
        <!-- <a href="order_bumps.php"> <button> Order Bumps </button> </a> -->
    </div>
    <div class="titulo">
        <span class="material-icons" id="icon-config">category</span>
        <h2 class="text-title">Categoria de Produtos</h2>
    </div>
    <span class="text-config">Aqui você pode Cadastrar as categorias de seus produtos.</span>

    <div class="card">
        @include('layouts.alerts')
        <form method="post" action="{{ route('categorias.store') }}" enctype="multipart/form-data">
            @csrf
            @include('pages.categorias._form')
            <div class="submit-row">
                <button type="submit"> Salvar </button>
            </div>
        </form>
    </div>
</div>

<div id="config">
    <div class="titulo">
        <span class="material-icons" id="icon-config">category</span>
        <h2 class="text-title">Categorias Cadastradas</h2>
    </div>

    <span class="text-config">Aqui você pode visualizar as categorias cadastradas.</span>
    <div class="card">
        <div id="container-pedidos" class="scroll-different">
            @if (count($categories) > 0)
            @foreach ($categories as $category)
            <div class="pedido-item card">
                <div class="titulo-pedido">
                    <div class="valor-pedido">
                        <div class="valor-status">
                            <p class="valor">{{ $category->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="item-produto card">
                <p>Não há categorias cadastradas.</p>
            </div>
            @endif
        </div>
        <br />
    </div>
</div>
@endsection

@section('pagination')
{{ $categories->links('layouts.pagination') }}
@endsection
