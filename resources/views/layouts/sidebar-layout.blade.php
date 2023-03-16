
<div class="nav nav-hidden">
    <div class="container-itens">
        <div class="item-nav item-nav-logo"><img src="{{ URL::to('assets/pages/img/logo-recortada.png') }}" alt=""></div>
        <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">house</span><a class="item-nav-text" href="{{ route('home.index') }}">Inicio</a></div>
        <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">dashboard</span><a class="item-nav-text" href="{{ route('dashboard.index') }}">Dashboard</a></div>
        <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">manage_accounts</span><a class="item-nav-text" href="{{ route('wallet.index') }}">Conta Digital <img src="{{ URL::to('assets/pages/img/simple-arrow.svg') }}" alt=""></a></div>
        <div class="sub-category sub-category-3">
            <a href="{{ route('wallet.index') }}">Extrato</a>
            <a href="{{ route('wallet.payment') }}">Pagamento</a>
        </div>
        <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">store</span><a class="item-nav-text" href="{{ route('store.edit') }}">Sua Loja <img src="{{ URL::to('assets/pages/img/simple-arrow.svg') }}" alt=""></a></div>
        <div class="sub-category sub-category-4">
            <a href="{{ route('store.edit') }}">Dados</a>
            <a href="#">Checkout</a>
            <a href="#">Frete</a>
            <a href="#">Domínio</a>
        </div>
        <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">local_mall</span><a class="item-nav-text" href="{{ route('produtos.index') }}">Produtos <img src="{{ URL::to('assets/pages/img/simple-arrow.svg') }}" alt=""></a></div>
        <div class="sub-category sub-category-5">
            <a href="{{ route('produtos.index') }}">Seus Produtos</a>
            <a href="{{ route('produtos.create') }}">Cadastrar Produto</a>
            <a href="#">Order Bumps</a>
            <a href="#">Upsell</a> 
        </div>
        <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">receipt_long</span><a class="item-nav-text" href="{{ route('pedidos.index') }}">Pedidos <img src="{{ URL::to('assets/pages/img/simple-arrow.svg') }}" alt=""></a></div>
        <div class="sub-category sub-category-6">
            <a href="{{ route('pedidos.index') }}">Pedidos</a>
            <a href="{{ route('pedidos.precart') }}">Carrinhos abandonados</a>
        </div>
        <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">campaign</span><a class="item-nav-text" href="{{ route('pixel.index') }}">Marketing <img src="{{ URL::to('assets/pages/img/simple-arrow.svg') }}" alt=""></a></div>
        <div class="sub-category sub-category-7">
            <a href="#">Pixel</a>
            <a href="#">SMS</a>
            <a href="#">Email</a>
        </div>
        <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">trending_up</span><a class="item-nav-text" href="{{ route('growth_cov.index') }}">Growth</a></div>
        <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">settings_input_component</span><a class="item-nav-text" href="{{ route('integrations.index') }}">Integrações</a></div>

        <div class="item-nav"><span class="material-icons-outlined" id="icon-menu">tune</span><a class="item-nav-text" href="{{ route('configuracao.edit') }}">Configurações</a></div>
        <div class="item-nav arrow-back"><span class="material-icons-outlined" id="icon-menu">arrow_back</span><a class="item-nav-text">Fechar</a></div>
    </div>
</div>

<div class="nav-container nav-hidden"></div>

<script src="{{ URL::to('assets/pages/js/nav.js') }}"></script>
