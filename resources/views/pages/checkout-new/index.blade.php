@extends('pages.checkout-new.layout')

@section('css')
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
@endsection

@section('content')
<img src="{{ URL::to('assets/pages/img/loader2.svg') }}" class="loader" alt="">

<div id="banner"><img src="{{ URL::to('assets/pages/img/img-checkout/infoboomp.png') }}" alt=""></div>

<div id="produto" class="container1">
    <i class="fa-sharp fa-solid fa-cart-shopping"></i>
    <div>
        <p>VOCÊ ESTÁ ADQUIRINDO:</p>
        <p class="productName">{{ $product->name }}</p>
    </div>
</div>

@if ($errors->any())
<div id="produto" class="container1">
    @include('layouts.alerts')
</div>
@endif

<form method="post" action="{{ route('checkout.payment') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
    <input type="hidden" name="store_id" id="store_id" value="{{ $product->store_id }}">
    <input type="hidden" name="payment_option" value="credit_card">

    @include('pages.checkout-new._formcustomer')
    @include('pages.checkout-new._form')

</form>
@endsection

@section('js')
<script>
    //Máscaras
    const inputName = document.querySelector("#name");

    inputName.addEventListener("keypress", function(e) {
        const keyCode = (e.keyCode ? e.keyCode : e.wich);
        if (keyCode > 47 && keyCode < 58) {
            e.preventDefault();
        }
    })

    const inputUF = document.querySelector("#uf");

    inputUF.addEventListener("keypress", function(e) {
        const keyCode = (e.keyCode ? e.keyCode : e.wich);
        if (keyCode > 47 && keyCode < 58) {
            e.preventDefault();
        }
    })

    $("#mobilePhone").mask("(99) 99999-9999");
    $("#cep").mask("00000-000");

    //Auto-complete CEP
    $("#cep").blur(function(){
        var cep = this.value.replace(/[^0-9]/, "");

        if(cep.length != 8){
            return false;
        }
        var url = "https://viacep.com.br/ws/"+cep+"/json/";

        $.getJSON(url, function(dadosRetorno){
            try{
                $("#address").val(dadosRetorno.logradouro);
                $("#bairro").val(dadosRetorno.bairro);
                $("#cidade").val(dadosRetorno.localidade);
                $("#uf").val(dadosRetorno.uf);
            }catch(ex){}
        });
    });

    //Cartão de Crédito
    var card = new Card({
        // a selector or DOM element for the form where users will
        // be entering their information
        form: '#formCartao', // *required*
        // a selector or DOM element for the container
        // where you want the card to appear
        container: '.card-wrapper', // *required*

        formSelectors: {
            numberInput: 'input#credit', // optional — default input[name="number"]
            expiryInput: 'input#validade', // optional — default input[name="expiry"]
            cvcInput: 'input#cvv', // optional — default input[name="cvc"]
            nameInput: 'input#name' // optional - defaults input[name="name"]
        },

        width: 300, // optional — default 350px
        formatting: true, // optional - default true

        // Strings for translation - optional
        messages: {
            validDate: 'data\nválida', // optional - default 'valid\nthru'
            monthYear: 'mm/yyyy', // optional - default 'month/year'
        },

        // Default placeholders for rendered fields - optional
        placeholders: {
            number: '•••• •••• •••• ••••',
            name: 'Nome Completo',
            expiry: '••/••',
            cvc: '•••'
        },

        masks: {
            cardNumber: '•' // optional - mask card number
        },

        // if true, will log helpful messages for setting up Card
        debug: false // optional - default false
    });

    //Form
    const btn1 = document.getElementById('btn1');
    const btn2 = document.getElementById('btn2');
    const btn3 = document.getElementById('btn3');
    const formCartao = document.getElementById('formCartao');
    const formPix = document.getElementById('formPix');
    const formBoleto = document.getElementById('formBoleto');
    const aprovado = document.getElementById('aprovacao');

    function primeiroBtn() {
        btn1.classList.add("btnSelected");
        btn2.classList.remove("btnSelected")
        btn3.classList.remove("btnSelected")

        formPix.classList.add("hide")
        formBoleto.classList.add("hide")
        formCartao.classList.remove("hide")

        formPix.classList.remove("notHide")
        formBoleto.classList.remove("notHide")
        formCartao.classList.add("notHide")

        aprovado.classList.add("notHidden")
        aprovado.classList.remove("hide")

        $('input[name="payment_option"]').val("credit_card")
    }

    function segundoBtn() {
        btn2.classList.add("btnSelected");
        btn1.classList.remove("btnSelected")
        btn3.classList.remove("btnSelected")

        formCartao.classList.add("hide")
        formBoleto.classList.add("hide")
        formPix.classList.remove("hide")

        formPix.classList.add("notHide")
        formCartao.classList.remove("notHide")
        formBoleto.classList.remove("notHide")

        aprovado.classList.add("notHidden")
        aprovado.classList.remove("hide")

        $('input[name="payment_option"]').val("pix")
    }

    function terceiroBtn() {
        btn3.classList.add("btnSelected");
        btn2.classList.remove("btnSelected")
        btn1.classList.remove("btnSelected")

        formCartao.classList.add("hide")
        formPix.classList.add("hide")
        formBoleto.classList.remove("hide")

        formBoleto.classList.add("notHide")
        formCartao.classList.remove("notHide")
        formPix.classList.remove("notHide")

        aprovado.classList.remove("notHidden")
        aprovado.classList.add("hide")

        $('input[name="payment_option"]').val("boleto")
    }
    //Alert Reclame Aqui
    function reclameAqui() {
        alert("RA1000 é um selo de autenticação do Reclame Aqui, essa empresa conquistou esse selo por resolver 97,8% dos problemas de seus clientes.")
    }
</script>

@endsection
