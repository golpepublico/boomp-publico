@extends('layouts.layout')

@section('title-page', 'Pedidos')

@section('css')
<link rel="stylesheet" href="{{ URL::to('assets/pages/css/pedidos.css') }}">
<style>
    .card{
        margin-top: 2px;
    }
</style>
@endsection

@section('content')
    @include('pages.orders.navigation')
    <div class="titulo">
        <h2> Pedidos </h2>
    </div>
    <span class="text-config">Acompanhe o status dos seus pedidos </span>

    <div id="filtro-pedidos">
        <form class="flex" method="get" action="{{ url()->current() }}">
            <div class="filtro-pedido">
                <span class="material-icons-outlined">
                    search
                </span>
                <input type="text" onchange="this.form.submit()" name="email" placeholder="Procure pelo e-mail do cliente" value="{{ request()->input('email', old('email')) }}">
            </div>
            <div  class="filtro-pedido" style="margin-left: 25px;">
                <span class="material-icons-outlined">
                    shopping_cart
                </span>
                <select name="status" onchange="this.form.submit()" id="">
                    <option value=""> Status </option>
                    @foreach ($statusOrder as $status => $value)
                    <option value="{{ $status }}"> {{ $value }} </option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="perPage" value="{{ $perPage }}">

    </div>
    <div id="container-pedidos" class="scroll-different">
        @foreach ($orders as $order)
        <div class="pedido-item card">
            <div class="titulo-pedido">
                <div class="icon-tipo">
                @switch ($order->billingType)
                    @case(BillingType::BOLETO())
                        <i class="fas fa-barcode"></i>
                        @break
                    @case(BillingType::CREDIT_CARD())
                        <span class="material-icons-outlined">
                            credit_card
                        </span>
                        @break
                    @case(BillingType::PIX())
                        <span class="material-icons-outlined">
                            qr_code_2
                        </span>
                        @break
                @endswitch
                </div>
                <div class="valor-pedido">
                    <div class="valor-status"> <p class="valor"> R$ {{ Number::formatToCurrency($order->value) }}</p>
                    @if ($order->status == StatusOrderType::PAGO())
                    <div class="status-box pago">
                    @else
                    <div class="status-box pendente">
                    @endif
                    <span class="material-icons-outlined">
                        lens
                    </span>
                    <p> {{ $order->status->description }} </p>
                    </div>
                </div>
                    <p class="nome"> {{ $order->customer->name }} </p>
                </div>
            </div>
            <div class="info-pedido">
                <div class="tipo-pedido">
                @switch ($order->billingType)
                    @case(BillingType::BOLETO())
                        <i class="fas fa-barcode"></i>
                        @break
                    @case(BillingType::CREDIT_CARD())
                        <span class="material-icons-outlined">
                            credit_card
                        </span>
                        @break
                    @case(BillingType::PIX())
                        <span class="material-icons-outlined">
                            qr_code_2
                        </span>
                        @break
                @endswitch
                @if(isset($order->billingType->description))
                    <p> {{ $order->billingType->description }} </p>
                @else
                    <p> {{ $order->status->description }}  </p>
                @endif
                </div>
                <div class="objeto-pedido">
                    <p> {{ $order->product->name }}</p>
                </div>
                <div class="data-pedido">
                    <p> {{ $order->dateCreated }} </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @section('pagination')
        {{ $orders->links('layouts.pagination') }}
    @endsection

@endsection
