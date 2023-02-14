@extends('layouts.layout')

@section('title-page', 'Extrato')

@section('css')
<link rel="stylesheet" href="{{ URL::to('assets/pages/css/conta.css') }}">
@endsection
@section('content')
@include('pages.wallet.header-wallet')
<div class="titulo">
    <h2> Extrato </h2>
</div>
<div id="saldo-info">
    <div class="card saldo-card">
        <div class="saldo-principal">
            <div class="saldo-details">
                <p class="saldo-status"> Saldo disponível </p>
                <p class="saldo-valor dispo"> <span> R$ </span> {{ isset($wallet->balance) ? number_format($wallet->balance, 2, ',', '.') : 0 }} </p>
            </div>
            <div class="saldo-action">
                <button class="button-saldo">
                <a href="{{ route('wallet.withdraw') }}"> Transferir </a>
                </button>
            </div>
        </div>
        <div class="saldo-aviso">
            <p>
                Valor sujeito à mudanças até o final do dia
            </p>
        </div>
    </div>
    <div class="card saldo-card">
        <div class="saldo-principal">
            <div class="saldo-details">
                <p class="saldo-status"> Saldo à receber </p>
                <p class="saldo-valor"> <span> R$ </span> {{ isset($ordersPending->totalPending) ? number_format($ordersPending->totalPending, 2, ',', '.') : 0 }}
                </p>
            </div>
            <div class="saldo-action">
                <button class="button-saldo">
                    <a href="#"> Ver calendário </a>
                </button>
            </div>
        </div>
        <div class="saldo-aviso">
            <p>
                Lançamentos previstos para entrar na sua conta digital
            </p>
        </div>
    </div>
</div>
<div class="card" id="container-extrato">
    <div id="panel-top">
        <form action="{{ url()->current() }}" method="GET">
            <div id="filters">
                <div id="title-filter">
                    <span class="material-icons-outlined">tune</span>
                    <p>Filtros</p>
                </div>

                <div id="filter-data">
                    <input onchange="this.form.submit()" type="date" name="dateInitial" id="dateInitial" value="{{ $dateInitial }}">
                    <span class="material-icons-outlined">arrow_right_alt</span>
                    <input onchange="this.form.submit()" type="date" name="dateFinal" id="dateFinal" value="{{ $dateFinal }}">
                </div>

                <div id="filter-tipo">
                    <div class="form-group">
                        <select name="operationSearch" onchange="this.form.submit()" id="status">
                            <option value="" disabled selected>Tipo de Operação</option>
                            <option value="0" {{ $operationSearch == '0' ? 'selected' : '' }}>Todos</option>
                            @foreach ($transactionTypes as $transactionType)
                            <option value="{{ $transactionType->value }}" {{ request()->operationSearch == $transactionType->value ? 'selected' : '' }}>
                                {{ $transactionType->description }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="clean-box">
                    <a href="{{ url()->current() }}">Limpar tudo</a>
                </div>
            </div>
        </form>

        <div id="export">
            <button> <a href="{{ route('withdraw.export-wallet-transaction') }}"> Exportar relatório </a></button>
        </div>
    </div>
    <div id="extratos" class="scroll-different">
        @if (count($walletTransactions) > 0)
        @foreach ($walletTransactions as $walletTransaction)
        <div class="extrato-row">
            <div class="extrato-side">
                <div class="date-hour">
                    <p> {{ date('d/m/Y', strtotime($walletTransaction->created_at)) }} </p>
                    <p> {{ date('H:i:s', strtotime($walletTransaction->created_at)) }} </p>
                </div>
                <div class="tipo">
                    <p class="tipo-title"> {{ $walletTransaction->title }} </p>
                    <p> {{ $walletTransaction->description }} </p>
                </div>
            </div>
            <div class="extrato-side">
                <div class="valor-extrato">
                    <p> <span> R$</span> {{ number_format($walletTransaction->value, 2, ',', '.') }}
                        {{ $walletTransaction->transaction_type == 1 ? 'C' : 'D' }}
                    </p>
                </div>
                <div class="valor-extrato">
                    <p> <span>R$</span>
                        {{ number_format($walletTransaction->balance, 2, ',', '.') }}
                    </p>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="extrato-row">
            <div class="extrato-side">
                <div class="date-hour">
                    <p> 00/00/0000 </p>
                    <p> 00:00:00 </p>
                </div>
                <div class="tipo">
                    <p class="tipo-title"> Lançamento em conta </p>
                    <p> Nenhum lançamento encontrado </p>
                </div>
            </div>
            <div class="extrato-side">
                <div class="valor-extrato">
                    <p> <span> R$</span> 0,00 </p>
                </div>
                <div class="valor-extrato">
                    <p> <span>R$</span> 0,00 </p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@section('pagination')
@if (count($walletTransactions) > 0)
    {{ $walletTransactions->links('layouts.pagination') }}
@endif
@endsection
