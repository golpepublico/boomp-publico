<div class="part-saque" id="part-saque-1">
    <h6> Para onde deseja transferir? </h6>
    <p class="dispo-saque"> Saldo disponível: <span> R$ {{ number_format($wallet->balance, 2, ',', '.') }}</span></p>
    <div id="button-bank">
        <button>
            <span class="material-icons-outlined">
                account_balance
            </span>
            Conta Bancária
        </button>
    </div>
    <select name="bank_account_id" id="bank_account_id"  required>
        @foreach ($bankAccounts as $bankAccount)
            <option value="{{ isset($bankAccount->id) ? $bankAccount->id : old('bank_account_id') }}">
                {{ $bankAccount->bank->name }} - {{ $bankAccount->user->name }} (Agência: {{ $bankAccount->agency }},
                Conta: {{ $bankAccount->account }})
            </option>
        @endforeach
    </select>
    <div class="button-avancar">
        <button class="avancar-to-2"> Avançar </button>
    </div>
</div>
<div class="part-saque" id="part-saque-2">
    <h6> Quanto deseja transferir? </h6>
    <p class="dispo-saque"> Saldo disponível: <span> R$ {{ number_format($wallet->balance, 2, ',', '.') }} </span></p>
    <div id="input-valor">
        <label id="RS"> R$ </label>
       <input type="text" class="valor-saque error" name="value_withdraw" id="value_withdraw"
        value="{{ isset($wallet->value_withdraw) ? $wallet->value_withdraw : old('value_withdraw') }}" required autofocus>
    </div>

    <div class="button-avancar space-between">
        <button class="retornar-to-1"> Voltar </button>
        <button class="avancar-to-3"> Avançar </button>
    </div>
</div>
<div class="part-saque" id="part-saque-3">
    <h6> Confirmar saque? </h6>
    <p class="dispo-saque"> Saldo disponível: <span> R$ {{ number_format($wallet->balance, 2, ',', '.') }} </span></p>

    <div class="info-saque">
        <p> Conta bancária: <span id="retBank"> </span> </p>
        <p> Valor do saque: R$  <span id="retWithdraw">0.000,00</span></p>
        <p> CPF/CNPJ: <span id="retCpfCnpj">000.000.000-00</span></p>
    </div>
    <div class="button-avancar space-between">
        <button class="retornar-to-2">Voltar</button>
        <button type="submit">Finalizar</button>
    </div>
</div>
