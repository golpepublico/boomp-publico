@extends('layouts.layout')

@section('title-page', 'Saque')

@section('css')
<link rel="stylesheet" href="{{ URL::to('assets/pages/css/conta.css') }}">
@endsection
@include('pages.wallet.modal-withdraw')
@section('content')
@include('pages.wallet.header-wallet')

<div class="titulo">
    <h2> Transferir </h2>
</div>
    
@include('layouts.alerts')

<div class="card" id="container-saque">
    <div id="saque">
        <div id="etapas">
            <div class="item-etapa etapa-ativa">
                <div class="number-etapa ">
                    1
                </div>
                <p>
                    Para onde deseja transferir?
                </p>
            </div>
            <div class="item-etapa">
                <div class="number-etapa">
                    2
                </div>
                <p>
                    Inserir valor
                </p>
            </div>
            <div class="item-etapa">
                <div class="number-etapa">
                    3
                </div>
                <p>
                    Confirmar transferência
                </p>
            </div>
        </div>
        <div id="form-saque">
            <form method="post" action="{{ route('wallet.create-transfer') }}" enctype="multipart/form-data">
                @csrf
                @include('pages.wallet._form-withdraw')
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ URL::to('assets/pages/js/jquery.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
    <script src="{{ URL::to('assets/pages/js/saque.js') }}"></script>
    <script src="{{ URL::to('assets/pages/js/mask-utils.js') }}"></script>
@endsection
