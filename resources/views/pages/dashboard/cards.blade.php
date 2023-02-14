<div class="cards">
    <div class="card">
        <div class="card-up">
            <span class="material-icons-outlined">shopping_basket</span>
            @php
                $arrow = '';
                if ($indicators->percentTotalYesterdayXToday > 0)
                    $arrow = 'arrow_upward';
                else if ($indicators->percentTotalYesterdayXToday < 0)
                    $arrow = 'arrow_downward';
            @endphp
            <span class="material-icons-outlined icon-card {{ $arrow }}">{{ $arrow }}
                <span class="card-percent">{{ Number::formatToCurrency($indicators->percentTotalYesterdayXToday) }}%</span>
            </span>
        </div>
        <div class="card-down">
            <span class="card-number">R$ {{ Number::formatToCurrency($indicators->valorTotalPedidos) }}</span>
            <span class="card-text">Faturamento</span>
        </div>
    </div>
    <div class="card">
        <div class="card-up">
            <span class="material-icons-round">local_grocery_store</span>
            @php
                $arrow = '';
                if ($indicators->percentQtdeVendasYesterdayXToday > 0)
                    $arrow = 'arrow_upward';
                else if ($indicators->percentQtdeVendasYesterdayXToday < 0)
                    $arrow = 'arrow_downward';
            @endphp
            <span class="material-icons-outlined icon-card {{ $arrow }}">{{ $arrow }}
                <span class="card-percent">{{ Number::formatToCurrency($indicators->percentQtdeVendasYesterdayXToday) }}%</span>
            </span>
        </div>
        <div class="card-down">
            <span class="card-number">{{ $indicators->qtdeVendas }}</span>
            <span class="card-text">Total de vendas</span>
        </div>
    </div>
    <div class="card">
        <div class="card-up">
            <span class="material-icons-outlined">credit_card</span>
            @php
                $arrow = '';
                if ($indicators->percentTicketMedioYesterdayXToday > 0)
                    $arrow = 'arrow_upward';
                else if ($indicators->percentTicketMedioYesterdayXToday < 0)
                    $arrow = 'arrow_downward';
            @endphp
            <span class="material-icons-outlined icon-card {{ $arrow }}">{{ $arrow }}
                <span class="card-percent">{{ Number::formatToCurrency($indicators->percentTicketMedioYesterdayXToday) }}%</span>
            </span>
        </div>
        <div class="card-down">
            <span class="card-number">R$ {{ Number::formatToCurrency($indicators->ticketMedio) }}</span>
            <span class="card-text">Ticket Médio</span>
        </div>
    </div>
    <div class="card">
        <div class="card-up">
            <i class="fas fa-percent"></i>
            @php
                $arrow = '';
                if ($indicators->percentChargeBackYesterdayXToday > 0)
                    $arrow = 'arrow_upward';
                else if ($indicators->percentChargeBackYesterdayXToday < 0)
                    $arrow = 'arrow_downward';
            @endphp
            <span class="material-icons-outlined icon-card {{ $arrow }}">{{ $arrow }}
                <span class="card-percent">{{ Number::formatToCurrency($indicators->percentChargeBackYesterdayXToday) }}%</span>
            </span>
        </div>
        <div class="card-down">
            <span class="card-number">{{ Number::formatToCurrency($indicators->chargeBack) }}%</span>
            <span class="card-text">chargebacks no período</span>
        </div>
    </div>
</div>
