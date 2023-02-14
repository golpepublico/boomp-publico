@extends('layouts.layout')

@section('title-page', 'Configurações')

@section('css')
<link rel="stylesheet" href="{{ URL::to('assets/pages/css/configuracao.css') }}">
<link rel="stylesheet" href="{{ URL::to('assets/pages/css/sua_loja.css') }}">
<link rel="stylesheet" href="{{ URL::to('assets/pages/css/switch.css') }}">
@endsection

@section('content')
<div id="config">
    @include('pages.store.navigation')
    <div class="titulo">
        <span class="material-icons" id="icon-config">store</span>
        <h2 class="text-title">Loja Shopify</h2>
    </div>
    <span class="text-config">Aqui você pode alterar suas informações da sua loja Shopify.</span>

    <form action="{{ route('store.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            @include('layouts.alerts')
            <div class="form-row">
                <label for="nome-loja">Nome da Loja *</label>
                <input id="nome-loja" name="store" type="text" value="{{ $store->store }}">
            </div>
            <div class="form-row">
                <label for="nome-fatura">Nome na fatura/boleto</label>
                <input type="text" name="nomefatura" id="nome-fatura" value="{{ $store->nomefatura }}">
                <b class="shopify-fatura-descricao">Escolha o nome que aparecerá na fatura e no boleto. O máximo de caracteres são 13.</b>
            </div>
            <div class="form-row">
                <label for="dominio-shopify">Domínio Shopify *</label>
                <input name="dominioshopify" id="dominio-shopify" type="text" value="{{ $store->dominioshopify }}">
            </div>
            <div class="form-row">
                <label for="api-key">API Key do App Privado *</label>
                <input name="apikeyapp" id="api-key" type="text" value="{{ $store->apikeyapp }}">
            </div>
            <div class="form-row">
                <label for="senha-app">Senha do App Privado *</label>
                <input name="passwordapp" id="senha-app" type="text" value="{{ $store->passwordapp }}">
            </div>
            <div class="form-row">
                <label for="nome">Ativar o checkout da Hopy na Shopify *</label>
                <label class="switch">
                    <input type="checkbox" name="checkoutshopify"  id="checkoutshopify" {{ $store->checkoutshopify ? 'checked' : '' }}>
                    <div class="slider round">
                        <span class="on">Sim</span>
                        <span class="off">Não</span>
                    </div>
                </label>
            </div>
            <div class="form-row">
                <label for="nome">Pular carrinho da Shopify *</label>
                <label class="switch">
                    <input type="checkbox" id="pular-carrinho" name="pulacarrinhoshopify" {{ $store->pulacarrinhoshopify ? 'checked' : '' }}>
                    <div class="slider round">
                        <span class="on">Sim</span>
                        <span class="off">Não</span>
                    </div>
                </label>
            </div>
        </div>

        <div class="titulo">
            <span class="material-icons" id="icon-config">email</span>
            <h2 class="text-title">E-mail da loja</h2>
        </div>
        <span class="text-config"> Selecione o endereço de e-mail que notificará os clientes sobre seus pedidos. </span>

        <div class="card">
            <div class="form-row">
                <label for="email">E-mail *</label>
                <input name="email" id="email" type="email" value="{{ $store->email }}">

                @if ($store->emailvalidado)
                <div class="loja-destaque">
                    <span class="material-icons">check_circle</span>
                    <p>Propriedade do e-mail validado.</p>
                </div>
                @endif

                @if ($store->permiteenvio)
                <div class="loja-destaque">
                    <span class="material-icons">check_circle</span>
                    <p>Permissão para envio de e-mails concedida à Hopy.</p>
                </div>
                @endif
            </div>
        </div>

        <div class="titulo">
            <span class="material-icons" id="icon-config">image</span>
            <h2 class="text-title">Logotipo</h2>
        </div>
        <span class="text-config"> Altere a imagem que aparecerá no checkout da sua loja. </span>

        <div class="card">
            <div class="form-row">
                <label for="nome">Logotipo</label>
                @if ($store->logo)
                    <img src="{{ url("storage/images/store/{$store->logo}") }}" class="loja-logo"/><br>
                @else
                    <img src="{{ URL::to('assets/pages/img/logo.png') }}" class="loja-logo" /><br>
                @endif
                <input type="file" name="logo"/>
                <b class="shopify-fatura-descricao">Recomendamos imagens na horizontal e no formato png.</b><br>
                <b class="shopify-fatura-descricao">Tamanho recomendado: 300px por 90px.</b>
            </div>
            <div class="form-row">
                <label for="nome">Mostrar logotipo no checkout</label>
                <label class="switch">
                    <input type="checkbox" name="mostralogocheckout" {{ $store->mostralogocheckout ? 'checked' : '' }}>
                    <div class="slider round">
                        <span class="on">Sim</span>
                        <span class="off">Não</span>
                    </div>
                </label>
            </div>
        </div>

        <!-- <div class="titulo">
            <span class="material-icons" id="icon-config">attach_money</span>
            <h2 class="text-title">Dados para recebimento</h2>
        </div>
        <span class="text-config"> Aqui você pode alterar suas informações de recebimento. </span>

        <div class="cards recebimento-cards">
            <div class="card-container">
                <div class="card card-recebimento">
                    <span class="material-icons-outlined">shopping_basket</span>
                    <h6>Gateway de Pagamentos</h6>
                    <p>Opções disponíveis: Hopy Pay e Mercado Pago.</p>
                </div>
                <div class="loja-destaque loja-destaque-edit">
                    <span class="material-icons">edit</span>
                    <p>Editar dados</p>
                </div>
            </div>
            <div class="card-container">
                <div class="card card-recebimento card-recebimento-selecionado">
                    <span class="material-icons-outlined">credit_card</span>
                    <h6>Hopy Pay</h6>
                    <p>Essa opção será desabilitada em breve. Migre para a plataforma da Hopy Pay.</p>
                </div>
                <div class="loja-destaque loja-destaque-edit">
                    <span class="material-icons">edit</span>
                    <p>Editar dados</p>
                </div>
            </div>
        </div> -->

        <div class="loja-final">
            <!-- <div class="filtro-atualizar">
                <span class="material-icons-outlined">refresh</span>
                <p>
                    Sincronizar produtos
                </p>
            </div> -->

            <div class="submit-row">
                <button type="submit"> Salvar </button>
            </div>
        </div>
    </form>
</div>
@endsection
