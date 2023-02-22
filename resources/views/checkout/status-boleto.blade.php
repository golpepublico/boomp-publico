<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status-boleto </title>
    <link rel="stylesheet" href="{{ URL::to('assets/pages/status-checkout/css/reset.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/pages/status-checkout/css/status.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/pages/status-checkout/css/status_boleto.css') }}">
    <script src="https://kit.fontawesome.com/9aa4c0757e.js" crossorigin="anonymous"></script>

</head>

<body>
    @include('checkout.status-header')
    <section class="containerStatus flexRow" id="section1">
        <div>
            <h2>Código da compra</h2>
            <h3>{{$order->payment_id_asaas}}</h3>
        </div>

        <div>
            <h2>Valor</h2>
            <h3>R$ {{ number_format($order->value, 2, ',', '.') }}</h3>
        </div>

        <div id="divBtn">
            <button class="btnStatus" onclick="copyToClipboard()"><i class="fa-solid fa-copy"></i> Copiar Código</button>
            <button class="btnStatus" onclick="openLinkBoleto('{{ Storage::url($order->path_file) }}')"><i class="fa-solid fa-barcode"></i> Imprimir Boleto</button>
            <!-- <a class="btnStatus" download="Boleto-Boomp" href="{{ Storage::url($order->path_file) }}" title="Boleto-Boomp">
                <button class="btnStatus"><i class="fa-solid fa-barcode"></i> Imprimir Boleto</button>
            </a> -->
            <input type="text" style="display: none;" class="inputForm" value="{{$boletoCode->barCode}}" id="copy">
        </div>
    </section>

    <div class="containerStatus flexColumn">
        <h2>Vencimento</h2>
        <h3>{{\Carbon\Carbon::parse($paymentData->dueDate)->format('d/m/Y')}}</h3>
    </div>

    <div class="containerStatus flexRow">
        <div id="divCodeBar">
            @php
            $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
            @endphp

            <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode('$boletoCode->barCode', $generatorPNG::TYPE_CODE_128)) }}" id="codeBar" alt="codeBar">
            <span>{{$boletoCode->barCode}}</span>
        </div>
    </div>

    <div class="containerStatus flexColumn">
        <h3>Atenção!</h3>
        <p>Lembre-se, o pagamento não poderá ser efetuado após o vencimento.</p>
    </div>

    @include('checkout.status-footer')
</body>

</html>
<script>
    function openLinkBoleto(url){
        window.open(url, '_blank').focus();
    }
    function copyToClipboard() {
        /* Get the text field */
        var copyText = document.getElementById("copy");
        console.log(copyText)
        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);

        /* Alert the copied text */
        alert("O Código foi copiado: " + copyText.value);
    }
</script>
