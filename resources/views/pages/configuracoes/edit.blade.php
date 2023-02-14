@extends('layouts.layout')

@section('title-page', 'Configurações')

@section('css')
<link rel="stylesheet" href="{{ URL::to('assets/pages/css/configuracao.css') }}">
@endsection

@section('content')
<div id="config">
    <div class="titulo">
        <span class="material-icons" id="icon-config">person</span>
        <h2 class="text-title">Minha Conta</h2>
    </div>
    <span class="text-config">Aqui você pode alterar as configurações do seu perfil.</span>

    <div class="card">
        @if(Session::has('userUpdate'))
        @include('layouts.alerts')
        @endif
        <form method="post" action="{{ route('configuracao.updateUser') }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-row">
                <label for="name">Nome *</label>
                <input name="name" type="text" value="{{ $user->name }}">
            </div>
            <div class="form-row">
                <label for="cpfcnpj">CPF/CNPJ *</label>
                <input type="text" name="cpfCnpj" id="cpfCnpj" value="{{ $user->cpfCnpj }}">
            </div>
            <div class="form-row">
                <label for="email">Email *</label>
                <input type="email" name="email" value="{{ $user->email }}">
            </div>
            <div class="form-row">
                <label for="telefone">TELEFONE *</label>
                <input type="text" name="mobilePhone" id="mobilePhone" value="{{ $user->mobilePhone }}">
            </div>
            <div class="form-row">
                <label for="nome">Avatar</label>

                <input type="file" name="avatar"/>
                <b class="shopify-fatura-descricao">Tamanho recomendado: 40px por 40px.</b>
            </div>
            <div class="submit-row">
                <button type="submit"> Salvar </button>
            </div>
        </form>
    </div>
    <div class="titulo">
        <span class="material-icons" id="icon-config">home</span>
        <h2 class="text-title">Endereço</h2>
    </div>
    <span class="text-config"> Edite suas informações de endereço </span>

    <div class="card">
        @if(Session::has('enderecoUpdate'))
        @include('layouts.alerts')
        @endif
        <form method="post" action="{{ route('configuracao.updateAddress') }}">
            @csrf
            @method('put')
            <div class="form-double">
                <div>
                    <label for="cep">CEP *</label>
                    <input name="cep" type="text" value="{{ $endereco->cep ?? old('cep') }}" onblur="searchCEP(this.value)">
                </div>
                @include('pages.common.uf')
            </div>
            <div class="form-double">
                <div>
                    <label>Cidade *</label>
                    <input name="cidade" id="cidade" type="text" value="{{ $endereco->cidade ?? old('cidade') }}">
                </div>
                <div>
                    <label for="bairro"> Bairro * </label>
                    <input name="bairro" id="bairro" type="text" value="{{ $endereco->bairro ?? old('bairro') }}">
                </div>
            </div>
            <div class="form-row">
                <label for="endereco">Rua *</label>
                <input name="endereco" id="endereco" type="text" value="{{ $endereco->endereco ?? old('endereco') }}">
            </div>
            <div class="form-double">
                <div>
                    <label for="numero"> Número * </label>
                    <input name="numero" type="text" value="{{ $endereco->numero ?? old('numero') }}">
                </div>
                <div>
                    <label for="complemento"> Complemento </label>
                    <input name="complemento" type="text" value="{{ $endereco->complemento ?? old('complemento') }}">
                </div>
            </div>
            <div class="submit-row">
                <button type="submit"> Salvar </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::to('assets/pages/js/cep.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ URL::to('assets/pages/js/jquery.mask.js') }}"></script>
<script>
    $("#mobilePhone").mask("(99) 99999-9999");
    $("#cep").mask("00000-000");
    $("#cpfCnpj").mask("999.999.999-99");
</script>
@endsection
