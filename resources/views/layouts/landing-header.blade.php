<header id="header">
    <a id="logo" href="#"><img src="{{asset('assets/landing/img/logo.png')}}" alt="logo"></a>
    <nav id="nav">
        <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
            <span id="hamburger"></span>
        </button>
        <ul id="menu" role="menu">
            <li><a href="#">Empresa</a></li>
            <li><a href="#">Tarifas</a></li>
            <li><a href="#">Ajuda</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="{{ route('register') }}" id="btnHeader" class="btn">Criar conta</a></li>
            <li id="btn2"><a href="{{ route('login') }}" id="btnHeader2">Login</a></li>
        </ul>
    </nav>
</header>
<div class="gradientBorder">border</div>
