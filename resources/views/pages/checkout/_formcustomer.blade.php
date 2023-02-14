<input class="inputForm customer" name="name" id="name" type="text" placeholder="Nome completo *" value="{{ isset($customer->name) ? $customer->name : old('name') }}" required autofocus>
<input class="inputForm customer" name="cpfCnpj" id="cpfCnpj" type="text" placeholder="CPF/CNPJ*" maxlength="14" required value="{{ isset($customer->cpfCnpj) ? $customer->cpfCnpj : old('cpfCnpj') }}">
<input class="inputForm customer" name="email" id="email" type="text" placeholder="E-mail *" required value="{{ isset($customer->email) ? $customer->email : old('email') }}">
<!-- <input class="inputForm customer" name="mobilePhone" id="mobilePhone" type="text" placeholder="Telefone (WhatsApp) *" maxlength="20" required value="{{ isset($customer->mobilePhone) ? $customer->mobilePhone : old('mobilePhone') }}"> -->
<div id="containerTelInput">
    <div>
        <img src="{{ URL::to('assets/pages/img/bandeira-brasil.jpg') }}" alt="brasil">+55
    </div>
    <input type="tel" name="mobilePhone" id="mobilePhone" placeholder="Telefone (WhatsApp) *" class="inputForm customer" maxlength="20" required value="{{ isset($customer->mobilePhone) ? $customer->mobilePhone : old('mobilePhone') }}">
</div>
<input class="inputForm" name="postalCode" id="cep" type="text" placeholder="CEP *" data-mask="00.000-000" onblur="searchCEP(this.value)" maxlength="10" required>
<input class="inputForm" name="state" id="uf" type="text" placeholder="Estado *" required>
<input class="inputForm" name="city" id="cidade" type="text" placeholder="Cidade *" required>
<input class="inputForm" name="province" id="bairro" type="text" placeholder="Bairro *" required>
<input class="inputForm" name="address" id="endereco" type="text" placeholder="Rua, avenida... *" required>
<input class="inputForm" name="addressNumber" id="addressNumber" type="text" placeholder="Número... *" required>
<input class="inputForm" name="complement" id="complement" type="text" placeholder="Apartamento, casa, etc... (Opcional)">
<input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
<input type="hidden" name="store_id" id="store_id" value="{{ $product->store_id }}">
