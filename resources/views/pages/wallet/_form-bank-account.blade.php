<div class="part-nova">
    <label for="titular"> Nome do titular: </label>
    <input type="text" name="account_holder" id="titular"
        value="{{ isset($bankAccount->account_holder) ? $bankAccount->account_holder : old('account_holder') }}" required
        autofocus>
</div>
<div class="part-nova">
    <label for="banco"> Banco: </label>
    <select name="bank_id" id="banco" required>
        <option value="" disabled selected>Selecione seu banco</option>
        @foreach ($banks as $bank)
            <option value="{{ $bank->id }}"
                {{ isset($bankAccount->bank_id) && $bankAccount->bank_id == $bank->id ? 'selected' : '' }}>
                {{ $bank->name }}</option>
        @endforeach
    </select>
</div>
<div class="part-nova">
    <label for="agencia"> Nº da agência: </label>
    <input type="text" name="agency" id="agencia"
        value="{{ isset($bankAccount->agency) ? $bankAccount->agency : old('agency') }}" required>
</div>
<div class="part-nova">
    <label for="conta"> Nº da conta: </label>
    <input type="text" name="account" id="conta"
        value="{{ isset($bankAccount->account) ? $bankAccount->account : old('account') }}" required>
</div>
<div class="part-nova">
    <label for="cpfCnpj"> CPF/CNPJ: </label>
    <input type="text" name="cpfCnpj" id="cpfCnpj"
        value="{{ isset($bankAccount->cpfCnpj) ? $bankAccount->cpfCnpj : old('cpfCnpj') }}" required>
</div>
<div id="nova-buttons">
    <button type="submit" id="nova-cadastrar"> Cadastrar </button>
    <button type="reset" id="nova-cancelar"> Cancelar </button>
</div>
