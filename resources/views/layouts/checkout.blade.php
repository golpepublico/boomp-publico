<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.checkout-head')
    @yield('css')
</head>

<body>

    @include('layouts.checkout-header')

    <div>
        @yield('content')
    </div>


    @include('layouts.checkout-footer')

    <script src="{{ URL::to('assets/pages/js/jquery.js') }}"></script>
    <script src="{{ URL::to('assets/pages/js/checkout.js') }}"></script>
    @yield('js')
</body>

</html>
