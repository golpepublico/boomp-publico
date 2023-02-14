<div class="nav nav-hidden">
    <div class="item-nav arrow-back"><span class="material-icons-outlined" id="icon-menu">arrow_back</span><a class="item-nav-text">Fechar</a></div>
    <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">home</span><a class="item-nav-text" href="{{ route('home.index') }}">Inicio</a></div>
    <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">grid_view</span><a class="item-nav-text" href="{{ route('dashboard.index') }}">Dashboard</a></div>
    <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">settings</span><a class="item-nav-text" href="{{ route('wallet.index') }}">Conta Digital</a></div>
    <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">star_outline</span><a class="item-nav-text" href="{{ route('store.edit') }}">Sua Loja</a></div>
    <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">sell</span><a class="item-nav-text" href="{{ route('produtos.index') }}">Produtos</a></div>
    <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">check_box</span><a class="item-nav-text" href="{{ route('pedidos.index') }}">Pedidos</a></div>
    <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">campaign</span><a class="item-nav-text" href="{{ route('pixel.index') }}">Marketing</a></div>
    <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">analytics</span><a class="item-nav-text" href="{{ route('growth_cov.index') }}">Growth</a></div>
    <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">settings_input_component</span><a class="item-nav-text" href="{{ route('integrations.index') }}">Integrações</a></div>

    <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">tune</span><a class="item-nav-text" href="{{ route('configuracao.edit') }}">Configurações</a></div>
</div>

<div class="nav-container nav-hidden"></div>

<script src="{{ URL::to('assets/pages/js/nav.js') }}"></script>
