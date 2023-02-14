<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boomp</title>

</head>

<body style="background-color: #202125;padding: 1rem;font-family: 'Roboto', sans-serif;">
    <div class="container" style="padding: 1rem;">
        <main style="background-color: #202125;padding: 1rem;display: grid;grid-template-rows: .5fr .5fr .5fr;grid-gap: 1rem;border-radius: 5px;border: solid 1px #34353a;">
            <h1 style="padding: 1rem;background-color: #2323FF;color: #202125;border-radius: 5px;display: flex;align-items: center;justify-content: center;text-align: center;">Pagamento confirmado</h1>

            <section>
                <h2 style="color: #fff;font-weight: 200;margin-bottom: 10px;">Olá {{$order->customer->name}}</h2>
            </section>
        </main>
        <p style="color: #8a8a8a;">Obrigado por realizar a compra!<br>
            <br>
            Agradecemos por comprar na <a href="#" style="color: #2323FF;cursor: pointer;">BOOMP.</a>. Seu pagamento foi confirmado!<br>
            <br>
            Para obter mais informações sobre sua compra, acesse a <a href="#" style="color: #2323FF;cursor: pointer;">BOOMP.</a><br>
            <br>
            A BOOMP é uma plataforma de pagamento e para obter informações sobre o produto não hesite em contatar o suporte do produto através do email:<br>
            <br>
            <span style="font-weight: 400;color: #ffffff;">contato@boomp.com.br</span>
        </p>


        <div>
            <h2 style="color: #fff;font-weight: 200;margin-bottom: 10px;">informações da compra:</h2>
            <li>Código da transação: <span id="id" style="font-weight: 400;color: #ffffff;">{{$idPayment}}</span></li>
            <li>Valor: <span id="valor" style="font-weight: 400;color: #ffffff;">R$ {{ Number::formatToCurrency($order->value, 2)}}</span></li>
            <li>Nome do produto: <span id="nome" style="font-weight: 400;color: #ffffff;">{{$order->product->name}}</span></li>
        </div>

        <footer>
            <h2 style="color: #fff;font-weight: 200;margin-bottom: 10px;">Abraços,<br>
                Equipe Boomp</h2>
        </footer>

    </div>
</body>

</html>
