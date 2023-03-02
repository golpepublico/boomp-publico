<section class="sectionForm" id="dados">
    <strong class="labelContainer">
        <div>1</div>
        <p>Dados pessoais</p>
    </strong>
    <div class="campo">
        <label for="name">Nome Completo</label>

        <div class="inputGeneric">
            <div class="genericIcon"><img src="{{ asset('assets/pages/img/checkout/user.svg') }}" alt=""></div>
            <input class="inputForm customer" name="name" id="name" type="text"
                value="{{ isset($customer->name) ? $customer->name : old('name') }}" required autofocus>
        </div>
    </div>

    <div class="campo">
        <label for="email">E-mail</label>
        <div class="inputGeneric">
            <div class="genericIcon"><img src="{{ asset('assets/pages/img/checkout/email.svg') }}" alt=""></div>
            <input class="inputForm customer" name="email" id="email" type="text" required
                value="{{ isset($customer->email) ? $customer->email : old('email') }}">
        </div>
    </div>

    <div class="campo">
        <label for="mobilePhone">Telefone ou celular</label>
        <div class="inputGeneric">
            <div class="genericIcon"><img src="{{ asset('assets/pages/img/checkout/call.svg') }}" alt=""></div>
            <input type="tel" name="mobilePhone" id="mobilePhone" class="inputForm customer" maxlength="20" required
                value="{{ isset($customer->mobilePhone) ? $customer->mobilePhone : old('mobilePhone') }}">
        </div>
    </div>

    <div>
        <label for="cpfCnpj">CPF/CNPJ</label>
        <div class="inputGeneric"">
            <div class="genericIcon"
                style="padding: 10.5px 6px;
            width: 40px;" ><img src="{{ asset('assets/pages/img/checkout/account-card-id.png') }}"
                alt="" style="width: 28px;"></div>
            <input class="inputForm customer" name="cpfCnpj" id="cpfCnpj" type="text" maxlength="14" required
                value="{{ isset($customer->cpfCnpj) ? $customer->cpfCnpj : old('cpfCnpj') }}">
        </div>
    </div>
</section>

<section class="sectionForm" id="endereco">
    <strong class="labelContainer">
        <div>2</div>
        <p>Endereço</p>
    </strong>
    <div class="campo">
        <label for="cep">CEP</label>
        <div class="inputGeneric">
            <div class="genericIcon"><img src="{{ asset('assets/pages/img/checkout/location.svg') }}" alt="">
            </div>
            <input class="inputForm" name="postalCode" id="cep" type="text" data-mask="00.000-000"
                onblur="searchCEP(this.value)" maxlength="10" required>
        </div>
    </div>

    <div class="campo">
        <label for="uf">Estado</label>
        <div class="inputGeneric">
            <div class="genericIcon"><img src="{{ asset('assets/pages/img/checkout/add-location.svg') }}"
                    alt=""></div>
            <input class="inputForm" name="state" id="uf" type="text" required>
        </div>
    </div>

    <div class="campo">
        <label for="cidade">Cidade</label>
        <div class="inputGeneric">
            <div class="genericIcon"><img src="{{ asset('assets/pages/img/checkout/add-location.svg') }}"
                    alt=""></div>
            <input class="inputForm" name="city" id="cidade" type="text" required>
        </div>
    </div>

    <div class="campo">
        <label for="bairro">Bairro</label>
        <div class="inputGeneric">
            <div class="genericIcon"><img src="{{ asset('assets/pages/img/checkout/add-location.svg') }}"
                    alt=""></div>
            <input class="inputForm" name="province" id="bairro" type="text" required>
        </div>
    </div>

    <div class="campo">
        <label for="address">RUA</label>
        <div class="inputGeneric">
            <div class="genericIcon"><img src="{{ asset('assets/pages/img/checkout/add-location.svg') }}"
                    alt=""></div>
            <input class="inputForm" name="address" id="address" type="text" required>
        </div>
    </div>

    <div class="campo">
        <label for="addressNumber">NÚMERO</label>
        <div class="inputGeneric">
            <div class="genericIcon"><img src="{{ asset('assets/pages/img/checkout/add-location.svg') }}"
                    alt=""></div>
            <input class="inputForm" name="addressNumber" id="addressNumber" type="text" required>
        </div>
    </div>

    <div class="campo">
        <label for="complement">APARTAMENTO, CASA</label>
        <div class="inputGeneric">
            <div class="genericIcon"><img src="{{ asset('assets/pages/img/checkout/add-location.svg') }}"
                    alt=""></div>
            <input type="text" name="complement" id="complement">
        </div>
    </div>
</section>
