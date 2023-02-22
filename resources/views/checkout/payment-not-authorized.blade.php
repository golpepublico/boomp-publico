<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status - Cartão </title>

    <!-- <link rel="stylesheet" href="{{ URL::to('assets/pages/status-checkout/css/reset.css') }}"> -->
    <link rel="stylesheet" href="{{ URL::to('assets/pages/status-checkout/css/status.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/pages/status-checkout/css/status_cartao.css') }}">
    <script src="https://kit.fontawesome.com/9aa4c0757e.js" crossorigin="anonymous"></script>
</head>
<body>
@include('checkout.status-header')
    <main>
        <div class="widthMax">
            <h1 class="colorBlue">Compra não aprovada</h1>

            <p class="justify-contentCenter">Infelizmente a compra não foi aprovada, por favor tente novamente realizar o pagamento.</p>
        </div>
        <div class="widthMax">
            <h2 class="colorBlue">Detalhes</h2>
            <h2>Pedido n° <span> {{$order->payment_id_moip}} </span></h2>
        </div>
        <div id="divBtnWhats">
                @if (isset($order->user->mobilePhone))
               <a href="https://api.whatsapp.com/send?phone=55{{$order->user->mobilePhone}}"> <button class="btnStatus">Entrar em contato <i class="fa-brands fa-whatsapp"></i></button></a>
                @endif
        </div>
        <div class="widthMax">
            <div class="divCard">
                <h1>Pedido</h1>
                <div id="card1">
                    <img src="{{ URL::to('storage/images/product/' . $product->image) }}" alt="">
                    <div>
                        <h2>{{$product->description}}</h2>
                        <p>Qtde 1</p>
                        <h2>Valor total: <b>R$ {{ number_format($paymentData->value, 2, ',', '.') }} </b></h2>
                    </div>
                </div>
            </div>
            <div  class="divCard">
                <div class="justify-contentCenter">
                    <h2>Pagamento</h2>
                    <h3><i class="fa-solid fa-credit-card" style="margin-right: 10px;"></i>Pagamento por Cartão de crédito</h3>
                </div>
                <div class="justify-flexEnd">
                    @if(isset($order->installmentCount))
                        <p>{{$order->installmentCount}}x <b> de R$ {{ number_format($order->installmentValue, 2, ',', '.') }} </b></p>
                     @else
                        <p>1x <b>R$ {{ number_format($order->value, 2, ',', '.') }}</b></p>
                    @endif
                    <h2>Valor total:: <b>R$ {{ number_format($order->value, 2, ',', '.') }} </b></h2>
                </div>
            </div>
        </div>
        <div class="widthMax">
            <h2></h2>
            <h2>Endereço de entrega</h2>
            <p>{{$order->customer->name}}</p>
            <p>{{$endereco->endereco}}, {{$endereco->numero}} - {{$endereco->bairro}} - {{$endereco->complement}}.</p>
            <p>{{$endereco->cep}} - {{isset($endereco->cidade) ? $endereco->cidade : ''}}-{{isset($endereco->uf) ? $endereco->uf : ''}}</p>
        </div>
    </main>
    @include('checkout.status-footer')
</body>
</html>
