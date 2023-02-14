@extends('layouts.layout-dashboard')

@section('title-page', 'Integrações')

@section('css')
<link rel="stylesheet" href="{{ URL::to('assets/pages/css/integracoes.css') }}">
@endsection

@section('before-main')
<div id="fadeInte" class="hideInte"></div>
<div id="fadeInte2" class="hideInte2"></div>
@endsection

@section('content')
<section>
    @include('pages.integrations.tokenstable')
    @include('pages.integrations.configstable')

    @include('pages.integrations.modaltoken')
    @include('pages.integrations.modalconfiguracoes')
</section>
@endsection


@section('js')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ URL::to('assets/pages/js/jquery.js') }}"></script>
    <script src="{{ URL::to('assets/pages/js/integracoes.js') }}"></script>
@endsection
