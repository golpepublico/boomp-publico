<header>
    <div class="header">
        <div class="icon">
            <!-- <img src="img/logo.png" alt="logo"> -->
            <img src="{{URL::to('assets/pages/img/logo.png')}}" alt="logo">
        </div>
        <span class="material-icons-outlined header-menu">menu</span>
        <div class="search">
            <div class="searchBorder">
                <i class="fas fa-search"></i>
                <input type="text" class="searchBar" placeholder=" Procurar por nome, email, pedido etc.">
            </div>
        </div>
        <div class="user">
            <!-- <div class="notifies">
                <i class="far fa-bell fa-lg"></i>
            </div>
            <div class="avatar">
                <i class="fas fa-user-alt fa-lg" id="img_circular"></i>
                <h4 class="name">Marino S.</h4>
            </div> -->
            <div id="user-awards">
                <p id="awards-money"> R$ 0.1k / R$ 10K </p>
                <div id="bar-awards">
                    <i class="fas fa-medal"></i>
                    <div id="bar">
                        <div id="bar-content"></div>
                    </div>
                </div>
            </div>
            <div id="user-info">
                 @if (Auth::user()->avatar)
                    <div id="profile-img" style="background-image: url({{ url("storage/images/avatar/") }}/{{Auth::user()->avatar}});">
                @else
                    <div id="profile-img" style="background-image: url({{URL::to('assets/pages/img/no-profile-photo.png')}});">
                @endif
                </div>
                <div id="name-profile">
                    <p> {{ Auth::user()->name }} </p>
                </div>
                <div id="profile-options">
                    <i class="fas fa-bell notifies" id="open-modal"></i>
                    <i class="fas fa-chevron-down options-down" id="open-modal2"></i>
                </div>

            </div>
        </div>
    </div>
</header>
<div id="fade" class="hide"></div>
<div id="fade2" class="hide"></div>
<div id="modal" class="hide">
    <div id="modalHeader">
        <div class="itensHeaderModal"><span>1620</span> não lidas</div>
        <span class="itensHeaderModal titleItensModal">Notificações</span>
        <button class="itensHeaderModal">Ver todas notificações</button>
    </div>
    <li class="notificacoes">
        <div>
            <p><span>Nova venda no PIX! Sua comissão: R$114,24! Venda de Libera Canais Vitalício.</span><button>Ver</button></p>
        </div>
        <p id="tempoNotificacao">Há 4 segundos</p>
    </li>
    <li class="notificacoes">
        <div>
            <p><span>Nova venda no PIX! Sua comissão: R$114,24! Venda de Libera Canais Vitalício.</span><button>Ver</button></p>
        </div>
        <p id="tempoNotificacao">Há 4 segundos</p>
    </li>
    <li class="notificacoes">
        <div>
            <p><span>Nova venda no PIX! Sua comissão: R$114,24! Venda de Libera Canais Vitalício.</span><button>Ver</button></p>
        </div>
        <p id="tempoNotificacao">Há 4 segundos</p>
    </li>
    <li class="notificacoes">
        <div>
            <p><span>Nova venda no PIX! Sua comissão: R$114,24! Venda de Libera Canais Vitalício.</span><button>Ver</button></p>
        </div>
        <p id="tempoNotificacao">Há 4 segundos</p>
    </li>
</div>
<div id="modal2" class="hide">
    <div id="modalHeader2">
        <span id="nomeModal"> {{ Auth::user()->name }}</span>
        <span id="emailModal"> {{ Auth::user()->email }}</span>
    </div>
    <div id="sectionModal2">
        <li><i class="fa-solid fa-gear"></i></i><a href="{{ route('configuracao.edit') }}">Configurações</a></li>
        <button id="modalLogoff">@include('auth.logout')</button>
    </div>

</div>
<script src="{{ URL::to('assets/pages/js/header.js') }}"></script>
