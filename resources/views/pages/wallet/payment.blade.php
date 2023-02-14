@extends('layouts.layout')

@section('title-page', 'Pagamentos')

@section('css')
    <link rel="stylesheet" href="{{ URL::to('assets/pages/css/conta.css') }}">
@endsection

@section('content')
    @include('pages.wallet.header-wallet')
    <div class="titulo">
        <h2> Pagamentos </h2>
    </div>
    <div class="card" id="container-pagamento">
        <div id="panel-top">
            <form action="{{ url()->current() }}" method="GET">
                <div id="filters">
                    <div id="title-filter">
                        <span class="material-icons-outlined">tune</span>
                        <p>Filtros</p>
                    </div>

                    <div id="filter-data">
                        <input onchange="this.form.submit()" type="date" name="dateInitial" id="dateInitial"
                            value="{{ $dateInitial }}">
                        <span class="material-icons-outlined">arrow_right_alt</span>
                        <input onchange="this.form.submit()" type="date" name="dateFinal" id="dateFinal"
                            value="{{ $dateFinal }}">
                    </div>
                    
                    <div id="filter-tipo">
                        <div class="form-group">
                            <select name="statusSearch" onchange="this.form.submit()" id="status">
                                <option value="" disabled selected>Tipo de Status</option>
                                <option value="0" {{ $statusSearch == '0' ? 'selected' : '' }}>Todos</option>
                                @foreach ($statusWithdraws as $status)
                                    <option value="{{ $status->value }}"
                                        {{ request()->statusSearch == $status->value ? 'selected' : '' }}>
                                        {{ $status->description }}
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
                <button> <a href="{{ route('withdraw.export-withdraw') }}"> Exportar relatório </a></button>
            </div>
        </div>
        <div id="pagamentos" class="scroll-different">
            <table>
                <thead>
                    <th>Data de solicitação</th>
                    <th>Data de pagamento</th>
                    <th>Status</th>
                    <th>Tipo de pagamento</th>
                    <th>Favorecido</th>
                    <th>Meio de recebimento</th>
                    <th>Valor Solicitado</th>
                </thead>
                <tbody>
                    @if (count($withdraws) > 0)
                        @foreach ($withdraws as $withdraw)
                            <tr>
                                <td class="block-cell">
                                    <span> {{ date('d/m/Y', strtotime($withdraw->created_at)) }} </span>
                                    <span> {{ date('H:i:s', strtotime($withdraw->created_at)) }} </span>
                                </td>
                                <td class="block-cell">
                                    @if (empty($withdraw->payment_date))
                                        <span> - - - - - - - - - - </span>
                                    @else
                                        <span> {{ date('d/m/Y', strtotime($withdraw->payment_date)) }} </span>
                                        <span> {{ date('H:i:s', strtotime($withdraw->payment_date)) }} </span>
                                    @endif
                                </td>
                                <td class="status-cell">
                                    <div>
                                        @if ($withdraw->status == 1)
                                            <span class="material-icons-outlined"
                                                style="color: red;">remove_circle_outline</span> Cancelado
                                        @elseif ($withdraw->status == 2)
                                            <span class="material-icons-outlined" style="color: yellow;">pending</span>
                                            Pendente
                                        @elseif ($withdraw->status == 3)
                                            <span class="material-icons-outlined">check_circle</span> Pago
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    @if ($withdraw->payment_type == 1)
                                        <span>Automático</span>
                                    @else
                                        <span>Manual</span>
                                    @endif
                                </td>
                                <td> {{ $withdraw->account_holder }} </td>
                                <td class="block-cell">
                                    <span class="bold">
                                        {{ $withdraw->name }}
                                    </span>
                                    <span>
                                        Ag.: {{ $withdraw->agency }} Conta: {{ $withdraw->account }}
                                    </span>
                                </td>
                                <td> R$ {{ number_format($withdraw->value_withdraw, 2, ',', '.') }} </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">Nenhum registro encontrado</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('pagination')
    {{ $withdraws->links('layouts.pagination') }}
@endsection
