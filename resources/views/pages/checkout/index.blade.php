@extends('layouts.checkout')
@section('content')
<style>
    .loader {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        left: 50%;
        margin-left: -4em;
        font-size: 10px;
        top: 50%;
        display: none;
    }
</style>
<img src="{{ URL::to('assets/pages/img/loader2.svg') }}" class="loader" alt="">
<section id="sectionPrin">
    <div class="module-border">border</div>
    <div id="containerSection">
        <p>
        <!-- <h1>Finalize o seu pedido</h1> -->
        <!-- <p id="description">Insira as suas informações de pagamento abaixo.<br>
            Qualquer dúvida, entre em contato conosco.</p>
            <p>contato@boomp.com.br</p>
        </p> -->
        <div class="img-info">
            <img src="{{ URL::to('assets/pages/img/img-checkout/infoboomp.png') }}" alt="">
        </div>
        <hr>
        <form method="post" action="{{ route('checkout.payment') }}" enctype="multipart/form-data">
            <div id="containerCheckout">
                <div class="mid-left">
                    <h3>Detalhes de Faturamento</h3>
                    @csrf
                    @include('layouts.alerts')
                    @include('pages.checkout._formcustomer')
                </div>
                <div id="containerProducts">
                    <h3>Seu pedido</h3>
                    <div id="listProd">
                        <div style="border:none;">
                            <b>Produto</b>
                            <b>Subtotal</b>
                        </div>
                        <div>
                            <img src="{{ URL::to('storage/images/product/' . $product->image) }}" alt="produto">
                            <p>{{ $product->name }}</p>
                            <p>x 1</p>
                            <p>R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                        </div>
                        <div>
                            <p>Subtotal</p>
                            <p>R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                        </div>
                        <div style="border:none;">
                            <p>Entrega</p>
                            <p>Frete Grátis Express</p>
                        </div>
                        <div>
                            <b>Total</b>
                            <b>R$ {{ number_format($product->price, 2, ',', '.') }}</b>
                        </div>
                    </div>
                    {{-- form coupon --}}
                    @include('pages.checkout._formcoupon')
                </div>

                <div id="conteinerPayment">
                    @include('pages.checkout._form')
                    <p style="font-size: 11px;color: #777;margin-top: 0;text-align: justify;">Os seus dados pessoais
                        serão utilizados para processar a sua compra,
                        apoiar a sua experiência em todo este site e para outros fins descritos
                        na nossa <span style="color: #084AF3;cursor: pointer;">política de privacidade</span></p>

                    <button id="btnSubmit" onclick="openLoad()">Concluir Pedido R$ {{ number_format($product->price, 2, ',', '.') }}</button>
                    <p id="people"><i class="fa-solid fa-eye"></i> Outras <span>45</span> pessoas estão finalizando a
                        compra nesse momento.</p>
                </div>
            </div>
        </form>
    </div>
</section>

<section id="sectionCom">
    <li style="border: none;">
        <img src="{{ URL::to('assets/pages/img/img-checkout/dinheiro.png') }}" alt="devolução">
        <div><b>Garantia de Devolução</b>
            <p>Você terá 7 dias para devolver seu produto em caso de arrependimento.</p>
        </div>
    </li>
    <li>
        <img src="{{ URL::to('assets/pages/img/img-checkout/medalha.png') }}" alt="segurança">
        <div><b>Pagamento 100% seguros</b>
            <p>Você está em um ambiente seguro.</p>
        </div>
    </li>
    <li>
        <img src="{{ URL::to('assets/pages/img/img-checkout/caminhao.png') }}" alt="envio">
        <div><b>Envio Seguro</b>
            <p>Entregamos para todas as regiões do Brasil.</p>
        </div>
    </li>
</section>
@endsection

@section('js')
<script src="{{ URL::to('assets/pages/js/cep.js') }}"></script>
<script src="{{ URL::to('assets/pages/js/jquery.mask.js') }}"></script>
<script src="{{ URL::to('assets/pages/js/mask-utils.js') }}"></script>
<script src="{{ URL::to('https://assets.moip.com.br/v2/moip.min.js') }}"></script>
<script src="{{ URL::to('assets/pages/js/cc-moip.js') }}"></script>

<script>
    //Radio
    document.querySelector('#credito').addEventListener('change', function () {

        $('#caso-credito').animate({
            height: "show"
        }, 500)
    });

    var notCredit = document.querySelectorAll('.not-credit');

    for (nC of notCredit) {
        nC.addEventListener('change', function () {
            $('#caso-credito').animate({
                height: "hide"
            }, 500)
        })
    }
</script>

@endsection
