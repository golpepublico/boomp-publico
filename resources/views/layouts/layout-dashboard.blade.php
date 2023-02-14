<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>  @yield('title-page') </title>
    @include('layouts.app-head')
    @yield('css')
</head>

<body>
    @include('layouts.header-layout')
    @yield('before-main')
    <main>
        @include('layouts.sidebar-layout')

        @yield('content')
    </main>

    @include('layouts.footer-layout')
    @yield('js')
</body>

</html>
