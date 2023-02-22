<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invalid</title>
    <link rel="stylesheet" href="{{ URL::to('assets/pages/status-checkout/css/status.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/pages/status-checkout/css/status_pix.css') }}">
    <script src="https://kit.fontawesome.com/9aa4c0757e.js" crossorigin="anonymous"></script>
</head>

<body>
    @include('checkout.status-header')

    <section>
        <div>
            <h1>A cobrança não e mais valida:</h1>

        </div>
    </section>

    @include('checkout.status-footer')
</body>

</html>
