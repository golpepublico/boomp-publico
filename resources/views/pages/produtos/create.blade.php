@extends('layouts.layout')

@section('title-page', 'Produtos')

@section('store')
    {{ Auth::user()->name }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::to('assets/pages/css/cadastro_produtos.css') }}">
@endsection

@section('content')
<!--
    <div class="secundary-nav">
        <a href="{{ route('categorias.create') }}"> <button> Cadastrar Categorias </button> </a>
    </div> -->

    <div class="titulo" id="divTitle">
        <h2> Cadastrar Produto </h2>
        <i class="fa-solid fa-x"></i>
    </div>

    @include('layouts.alerts')

    <form method="post" action="{{ route('produtos.store') }}" enctype="multipart/form-data">
        @csrf
        @include('pages.produtos._form')

    </form>

@endsection
