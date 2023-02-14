@extends('layouts.layout')

@section('title-page', 'Configurações')

@section('css')
<link rel="stylesheet" href="{{ URL::to('assets/pages/css/configuracao.css') }}">
<link rel="stylesheet" href="{{ URL::to('assets/pages/css/sua_loja.css') }}">
<link rel="stylesheet" href="{{ URL::to('assets/pages/css/switch.css') }}">
@endsection

@section('content')
<div id="config">
    <div class="secundary-nav">
        <a href="{{ route('pixel.index') }}"> <button> Pixels </button> </a>
    </div>

    <div class="titulo">
        <span class="material-icons" id="icon-config">store</span>
        <h2 class="text-title">Editar Integrações Pixels</h2>
    </div>
    <span class="text-config">Aqui você pode informar as chaves pixels.</span>

    <form action="{{ route('pixel.update', ['id' => $pixel->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="card">
            @include('layouts.alerts')
            <div class="form-row">
                <label for="nome-fatura">Descrição</label>
                <input type="text" name="descricao" id="descricao" value="{{ isset($pixel->descricao) ? $pixel->descricao : old('width') }}">
            </div>
            <div class="form-row">
                <label for="nome-loja">Código *</label>
                <input id="nome-loja" name="pixel_key" type="text" value="{{ isset($pixel->pixel_key) ? $pixel->pixel_key : old('width') }}">
            </div>

            <div class="form-row">
                <label for="nome">Ativar o pixel pagamento por cartão de crédito *</label>
                <label class="switch">
                    <input type="checkbox" name="fl_pixel_cred" id="fl_pixel_cred" {{ $pixel->fl_pixel_cred ? 'checked' : '' }}>
                    <div class="slider round">
                        <span class="on">Sim</span>
                        <span class="off">Não</span>
                    </div>
                </label>
            </div>
            <div class="form-row">
                <label for="nome">Ativar o pixel pagamento por PIX *</label>
                <label class="switch">
                    <input type="checkbox" name="fl_pixel_pix" id="fl_pixel_pix" {{ $pixel->fl_pixel_pix ? 'checked' : '' }}>
                    <div class="slider round">
                        <span class="on">Sim</span>
                        <span class="off">Não</span>
                    </div>
                </label>
            </div>
            <div class="form-row">
                <label for="nome">Ativar o pixel pagamento por boleto *</label>
                <label class="switch">
                    <input type="checkbox" name="fl_pixel_boleto" id="fl_pixel_boleto" {{ $pixel->fl_pixel_boleto ? 'checked' : '' }}>
                    <div class="slider round">
                        <span class="on">Sim</span>
                        <span class="off">Não</span>
                    </div>
                </label>
            </div>
        </div>

        <div class="loja-final">
            <div class="submit-row">
                <button type="submit"> Salvar </button>
            </div>
        </div>
    </form>
</div>
@endsection
