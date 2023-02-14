<section class="sectionForm" id="dados">
    <strong class="labelContainer"><div>1</div> <p>Dados pessoais</p></strong>
    <div class="campo">
        <label for="name">Nome Completo</label>
        <input class="inputForm customer" name="name" id="name" type="text" value="{{ isset($customer->name) ? $customer->name : old('name') }}" required autofocus>
    </div>

    <div class="campo">
        <label for="email">E-mail</label>
        <input class="inputForm customer" name="email" id="email" type="text" required value="{{ isset($customer->email) ? $customer->email : old('email') }}">
    </div>

    <div class="campo">
        <label for="mobilePhone">Telefone ou celular</label>
        <input type="tel" name="mobilePhone" id="mobilePhone" class="inputForm customer" maxlength="20" required value="{{ isset($customer->mobilePhone) ? $customer->mobilePhone : old('mobilePhone') }}">
    </div>

    <div>
        <label for="cpfCnpj">CPF/CNPJ</label>
        <input class="inputForm customer" name="cpfCnpj" id="cpfCnpj" type="text" maxlength="14" required value="{{ isset($customer->cpfCnpj) ? $customer->cpfCnpj : old('cpfCnpj') }}">
    </div>
</section>

<section class="sectionForm" id="endereco">
    <strong class="labelContainer"><div>2</div> <p>Endereço</p></strong>
    <div class="campo">
        <label for="cep">CEP</label>
        <input class="inputForm" name="postalCode" id="cep" type="text" data-mask="00.000-000" onblur="searchCEP(this.value)" maxlength="10" required>
    </div>

    <div class="campo">
        <label for="uf">Estado</label>
        <input class="inputForm" name="state" id="uf" type="text" required>
    </div>

    <div class="campo">
        <label for="cidade">Cidade</label>
        <input class="inputForm" name="city" id="cidade" type="text" required>
    </div>

    <div class="campo">
        <label for="bairro">Bairro</label>
        <input class="inputForm" name="province" id="bairro" type="text" required>
    </div>

    <div class="campo">
        <label for="address">Rua, avenida...</label>
        <input class="inputForm" name="address" id="address" type="text" required>
    </div>

    <div class="campo">
        <label for="addressNumber">Número...</label>
        <input class="inputForm" name="addressNumber" id="addressNumber" type="text" required>
    </div>

    <div class="campo">
        <label for="complement">Apartamento, casa, etc... (opcional)</label>
        <input type="text" name="complement" id="complement">
    </div>
</section>
