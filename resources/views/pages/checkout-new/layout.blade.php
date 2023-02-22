<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Checkout</title>
    <link rel="stylesheet" href="{{ URL::to('assets/pages/css/checkout.css') }}">

    <script src="https://kit.fontawesome.com/9aa4c0757e.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    @yield('css')
</head>

<body>
    <div>
        @yield('content')
    </div>

    <footer>
        <section class="sectionFooter">
            <div id="containerEmail" class="container1">
                <i class="fa-solid fa-address-card"></i>
                <div>
                    <p>E-MAIL DE SUPORTE:</p>
                    <p>contato@boomp.com.br</p>
                </div>
            </div>
        </section>

        <section class="sectionFooter" style="color: #8a8a8a;">
            <p>* Taxa de 2,99% a.m.<br>
                ** Os descontos ofertados não são cumulativos. Prevalecerá o maior de desconto ofertado.<br>
                Ao continuar nesta compra, você concorda com os <a href="#" class="link">Termos de Compra</a> e <a href="#" class="link">Termos de Privacidade</a>.</p>
            <div id="containerReclameAqui">
                <button onclick="reclameAqui()" id="reclameAqui"><img src="{{ URL::to('assets/pages/img/img-checkout/reclameAqui.png') }}" alt="reclameAqui"></button>
            </div>
        </section>

        <!-- <section class="sectionFooter">
            <div  class="center"><p>© 2022 BOOMP GESTÃO DIGITAL</p></div>
        </section> -->
    </footer>

    <script src="{{ URL::to('assets/pages/js/jquery.js') }}"></script>
    <script src="{{ URL::to('assets/pages/js/checkout.js') }}"></script>

    <script src="{{ URL::to('assets/pages/js/cep.js') }}"></script>
    <script src="{{ URL::to('assets/pages/js/jquery.mask.js') }}"></script>
    <script src="{{ URL::to('assets/pages/js/mask-utils.js') }}"></script>
    <script src="{{ URL::to('https://assets.moip.com.br/v2/moip.min.js') }}"></script>
    <script src="{{ URL::to('assets/pages/js/cc-moip.js') }}"></script>
    <script src="{{ URL::to('assets/pages/js/card.js') }}"></script>
    @yield('js')
</body>

</html>
