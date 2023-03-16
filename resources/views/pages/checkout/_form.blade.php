<div class="radio-section">
    <div class="radio-div space-between">
        <div class="tipo_pagamento flex">
            <input type="radio" class="radio" name="payment_option" value="credit_card" id="credito">
            <div id="op-cartao">
                <label for="payment_option" id="labelMetodos"> Cartão de crédito </label>
                <div class="flex" id="brand-cards">
                    <img src="{{ URL::to('assets/pages/img/img-checkout/card-mastercard.svg') }}" alt="mastercard">
                    <img src="{{ URL::to('assets/pages/img/img-checkout/card-visa.svg') }}" alt="visa">
                    <img src="{{ URL::to('assets/pages/img/img-checkout/card-elo.svg') }}" alt="elo">
                    <img src="{{ URL::to('assets/pages/img/img-checkout/card-amex.svg') }}" alt="amex">
                    <img src="{{ URL::to('assets/pages/img/img-checkout/card-hipercard.svg') }}" alt="hipercard">
                    <img src="{{ URL::to('assets/pages/img/img-checkout/card-discover.svg') }}" alt="discover">
                </div>
            </div>
        </div>
    </div>
    <div id="caso-credito">
        <input type="hidden" name="public_key" id="public_key" value="{{ env('MOIP_PUBLIC_KEY') }}">
        <input type="hidden" name="encrypted_value" id="encrypted_value">

        <div class="div-form">
            <input type="text" name="number" id="credit" class="digit-field" placeholder="Número do cartão *">
        </div>
        <div class="space-between">
            <div class="div-form">
                <input type="text" name="validate" id="validade" class="digit-field" placeholder="Validade: MM/AAAA *">
            </div>
            <div class="div-form">
                <input type="text" name="cvv" id="cvv" class="digit-field cvv" maxlength="3"
                    placeholder="Código de segurança CVV *">
            </div>
        </div>
        <div class="div-form">
            <input type="text" name="holderName" id="" class="digit-field" placeholder="Nome no cartão *" maxlength="15">
        </div>
        <div class="div-form">
            <label for="parcelas" id="labelParcelas"> Parcelas * </label>
            <select name="numberInstallments" id="" class="digit-field">
                @for ($i = 1; $i <= 12; $i++)
                    @if ($i == 1){
                        <option value={{$i}} > {{$i}}x de R$ {{ number_format($product->price, 2, ',', '.') }} Sem Juros</option>
                    }
                    @else {
                        <option value="{{$i}}" selected> {{$i}}x de R$ {{ number_format(($product->price) / $i, 2, ',', '.') }}  Sem Juros</option>
                    }
                    @endif;
                @endfor
            </select>
        </div>
    </div>
    <div class="radio-div space-between">
        <div class="tipo_pagamento flex">
            <input type="radio" class="not-credit" name="payment_option" value="boleto">
            <label for="payment_option" id="labelMetodos"> Boleto bancário </label>
        </div>
        <div>
            <p class="payment-icon"> <i class="fas fa-barcode"></i> </p>
        </div>
    </div>
    <div class="radio-div space-between">
        <div class="tipo_pagamento flex">
            <input type="radio" class="not-credit" name="payment_option" value="pix">
            <label for="payment_option" id="labelMetodos"> PIX </label>
        </div>
        <div>
            <p class="payment-icon"> <i class="fas fa-qrcode"></i> </p>
        </div>
    </div>

</div>
