<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status-pix</title>
    <link rel="stylesheet" href="{{ URL::to('assets/pages/status-checkout/css/status.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/pages/status-checkout/css/status_pix.css') }}">
    <script src="https://kit.fontawesome.com/9aa4c0757e.js" crossorigin="anonymous"></script>
</head>

<body>
    @include('checkout.status-header')

    <section>
        <div>
            <h1>Siga os passos abaixo para realizar o pagamento:</h1>
            <li>
                <div>1</div>Copie o código <b>PIX</b>
            </li>
            <li>
                <div>2</div>Abra o aplicativo do seu banco favorito
            </li>
            <li>
                <div>3</div><span>NA seção de PIX, selecione a opção <strong>"Pix Copia e Cola"</strong></span>
            </li>
            <li>
                <div>4</div>Coloque o código
            </li>
            <li>
                <div>5</div>Confirme o pagamento
            </li>
        </div>

        <div>

            <button class="btnStatus" onclick="copyToClipboard()"><i class="fa-solid fa-copy"></i> Copiar código PIX</button>
            <img src="data:image/jpeg;base64, {{$pixData->encodedImage}}" alt="qrcode">
            <input type="text" style="display: none;" class="inputForm" value="{{$pixData->payload}}" id="copy">
            <button class="btnStatus" onclick="copyToClipboard()" style="background-color: #2b3dfd; color:white"><i class="fa-solid fa-copy"></i> Copiar código PIX</button>
            <!-- <button class="btnStatus btnStatus2">Já fiz meu pagamento</button> -->
        </div>
    </section>

    @include('checkout.status-footer')
</body>
<script>
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

</html>
