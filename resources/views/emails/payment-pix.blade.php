<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>email(pix)</title>

</head>

<body style="background-color: #202125;padding: 1rem;font-family: 'Roboto', sans-serif;">
    <div class="container" style="padding: 1rem;">
        <main style="background-color: #202125;padding: 1rem;display: grid;grid-template-rows: .5fr .5fr .5fr .5fr;grid-gap: 1rem;border-radius: 5px;border: solid 1px #34353a;">
            <h1 style="padding: 1rem;background-color: #2323FF;color: #202125;border-radius: 5px;display: flex;align-items: center;justify-content: center;text-align: center;max-height: 150px;">Pedido Aguardando Pagamento</h1>

            <section>
                <h2 style="color: #fff;font-weight: 200;margin-bottom: 10px;">Olá {{$paymentData->customer->name}}</h2>
            </section>
        </main>
        <p style="color: #8a8a8a;">Obrigado por realizar a compra!<br>
            <br>
            Estamos aguardando o pagamento do Pix para dar continuidade ao seu pedido. Lembre-se, o pagamento não poderá ser efetuado após o vencimento.<br>
            <span id="qrcode" style="font-weight: 400;color: #ffffff;display: flex;flex-direction: row;align-items: center;justify-content: center;"><img src="data:image/jpeg;base64, {{$paymentData->encodedImage}}" alt="qr-code" style="height: auto;max-width: 150px;justify-content: center;"></span>
            <br>
            Linha digitável Pix Copia e Cola:
            <br>
            <b>{{$paymentData->payload}}</b>
            <br>
            <br>Para obter informações sobre sua compra, acesse a <a href="{{URL::to('/checkout/status');}}/{{$paymentData->pedido}}" style="color: #2323FF;cursor: pointer;">BOOMP.</a><br>
            <br>
            A BOOMP é uma plataforma de pagamento e para obter informações sobre o produto não hesite em contatar o suporte do produto através do email:<br>
            <br>
            <span style="font-weight: 400;color: #ffffff;">contato@boomp.com.br</span>
        </p>


        <div>
            <h2 style="color: #fff;font-weight: 200;margin-bottom: 10px;">informações da compra:</h2>
            <li>Código da transação: <span id="id" style="font-weight: 400;color: #ffffff;">{{$paymentData->pedido}}</span></li>
            <li>Valor: <span id="valor" style="font-weight: 400;color: #ffffff;">R$ {{Number::formatToCurrency($paymentData->order->value, 2)}}</span></li>
            <li>Nome do produto: <span id="nome" style="font-weight: 400;color: #ffffff;">{{$paymentData->produto->name}}</span></li>
        </div>

        <menu style="display: flex;flex-direction: row;justify-content: center;align-items: center;">
            <a href="{{URL::to('/checkout/status');}}/{{$paymentData->pedido}}" id="btn" style="color: #202125;cursor: pointer;background-color: #2323FF;text-align: center;text-decoration: none;text-transform: uppercase;padding: 1rem;border-radius: 5px;font-weight: bold;width: 30%;margin-left: auto;margin-right: auto;margin-top: 10px;margin-bottom: 10px;">Pagar pelo celular</a>
        </menu>

        <footer>
            <h2 style="color: #fff;font-weight: 200;margin-bottom: 10px;">Abraços,<br>
                Equipe Boomp</h2>

        </footer>
        <p style="color: #8a8a8a;">Se você está tendo problemas ao clicar em "Pagar pelo celular", copie e cole a seguinte URL no seu navegador:
            <br>
            <a href="#" style="color: #2323FF;cursor: pointer;">{{URL::to('/checkout/status');}}/{{$paymentData->pedido}}</a>
        </p>


    </div>
</body>

</html>
