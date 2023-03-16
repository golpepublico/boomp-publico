<section class="sectionForm" id="pagamento">
    <strong class="labelContainer">
        <div>3</div>
        <p>Pagamento</p>
    </strong>
    <strong id="aprovacao">Aprovação rápida</strong>
    <div id="containerBtnPag">
        <strong id="btn1" class="btnPag btnSelected" onclick="primeiroBtn()"><i class="fa-regular fa-credit-card"></i>
            Cartão de Crédito</strong>
        <strong id="btn2" class="btnPag" onclick="segundoBtn()"><i class="fa-brands fa-pix"></i> Pix</strong>
        <strong id="btn3" class="btnPag" onclick="terceiroBtn()"><i class="fa-solid fa-barcode"></i>
            Boleto</strong>
    </div>
    <section id="formCartao" class="notHide">
        <input type="hidden" name="public_key" id="public_key" value="{{ env('MOIP_PUBLIC_KEY') }}">
        <input type="hidden" name="encrypted_value" id="encrypted_value">

        <div class="card-wrapper"></div>

        <div class="campo">
            <fieldset class="form-group control-fieldset">
                <legend style="font-size: 11.5px;"><b>BANDEIRAS ACEITAS</b></legend>
                <div class="img_bandeiras">
                    <img data-cfsrc="https://media.braip.com/public/card-flag/visa.png" alt="Visa" title="Visa"
                        src="https://media.braip.com/public/card-flag/visa.png">
                    <img data-cfsrc="https://media.braip.com/public/card-flag/master-card.png" alt="Master Card"
                        title="Master Card" src="https://media.braip.com/public/card-flag/master-card.png">
                    <img data-cfsrc="https://media.braip.com/public/card-flag/hiper-card.png" alt="Hipercard"
                        title="Hipercard" src="https://media.braip.com/public/card-flag/hiper-card.png">
                    <img data-cfsrc="https://media.braip.com/public/card-flag/american-express.png"
                        alt="American Express" title="American Express"
                        src="https://media.braip.com/public/card-flag/american-express.png">
                    <img data-cfsrc="https://media.braip.com/public/card-flag/diners.png" alt="Diners Club"
                        title="Diners Club" src="https://media.braip.com/public/card-flag/diners.png">
                    <img data-cfsrc="https://media.braip.com/public/card-flag/elo.png" alt="Elo" title="Elo"
                        src="https://media.braip.com/public/card-flag/elo.png">
                </div>
            </fieldset>
        </div>

        <div class="campo">
            <label for="numeroCartao">Número do Cartão</label>
            <div class="inputGeneric">
                <div class="genericIcon"><img src="{{ asset('assets/pages/img/checkout/card.svg') }}"
                        alt=""></div>
                <input type="text" name="numeroCartao" id="credit">
            </div>
        </div>

        <div class="campo">
            <label for="validade">Validade: mês/ano</label>
            <div class="inputGeneric">
                <div class="genericIcon"><img src="{{ asset('assets/pages/img/checkout/calender.svg') }}"
                        alt=""></div>
                <input type="text" name="validade" id="validade">
            </div>
        </div>

        <div class="campo">
            <label for="cvv">CVC</label>
            <div class="inputGeneric">
                <div class="genericIcon"><img src="{{ asset('assets/pages/img/checkout/lock.svg') }}" alt="">
                </div>
                <input type="text" name="cvv" id="cvv" maxlength="3">
            </div>
        </div>

        <div class="campo">
            <label for="name">Nome Impresso no Cartão</label>
            <div class="inputGeneric">
                <div class="genericIcon"><img src="{{ asset('assets/pages/img/checkout/user.svg') }}" alt="">
                </div>
                <input type="text" name="holderName" id="name" maxlength="15">
            </div>
        </div>

        <div class="campo">
            <label for="parcelas">Parcelas</label>
            <div class="inputGeneric">
                <div class="genericIcon"><img src="{{ asset('assets/pages/img/checkout/piggy-bank.svg') }}"
                        alt=""></div>
                <select name="numberInstallments" id="parcelas">
                    @for ($i = 1; $i <= 12; $i++)
                        @if ($i == 1)
                            {
                            <option value={{ $i }}> {{ $i }}x de R$
                                {{ number_format($product->price, 2, ',', '.') }}  Sem Juros</option>
                            }
                        @else
                            {
                            <option value="{{ $i }}" selected> {{ $i }}x de R$
                                {{ number_format($product->price / $i, 2, ',', '.') }}  Sem Juros</option>
                            }
                        @endif;
                    @endfor
                </select>
            </div>
        </div>
    </section>
    <section id="formPix" class="hide">
        <li>1 - Pagamento em segundos, sem complicação</li>
        <li>2 - Basta escanear, com o aplicativo do seu banco, o QRcode que iremos gerar para sua compra</li>
        <li>3 - O PIX foi desenvolvido pelo Banco Central para facilitar suas compras e é 100% seguro</li>
        <li>Valor no PIX: <span>R$ {{ number_format($product->price, 2, ',', '.') }}</span></li>
    </section>

    <section id="formBoleto" class="hide">
        <li>1 - Boleto (somente à vista)</li>
        <li>2 - Pagamento com Boleto Bancário leva até 3 dias úteis para ser compensado e então ter os produtos
            liberados.</li>
        <li>3 - Você pode pagar o boleto em qualquer banco ou casa lotérica até o dia do vencimento.</li>
        <li>4 - Depois do pagamento, fique atento ao seu e-mail para receber os dados de acesso ao produto (verifique
            também a caixa de SPAM).</li>
        <li>Valor no boleto: <span>R$ {{ number_format($product->price, 2, ',', '.') }}</span></li>
    </section>

    <section class="" id="resumo">
        <strong class="labelContainer">
            <div>4</div>
            <p>Resumo da compra</p>
        </strong>
        <div class="containerResumo">
            <h2 id="nomeProduto">{{ $product->name }}</h2>
            <span id="ofertaProduto">Oferta Promocional</span>
        </div>
        <div class="containerResumo">
            <div id="imgProduto">
                <img src="{{ URL::to('storage/images/product/' . $product->image) }}" alt="">
            </div>
            <li>
                <div class="headerLI">
                    Preço:
                </div>
                <div class="baseLI">
                    <span id="preco">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
                    <p>Em até 12x de <b>R$ {{ number_format($product->price / 12, 2, ',', '.') }}</b></p>
                </div>
            </li>
        </div>
        <div class="containerResumo">
            <li>
                <div class="containerIcon"><i class="fa-solid fa-truck-fast"></i></div>
                <div class="baseLI">
                    <p style="color: #68BC54;">Frete Grátis <i class="fa-solid fa-bolt"></i> <i
                            style="font-weight: bold;">Full</i><span style="color:#0056B3;"> •
                            Disponível</span><br><span style="color: #545454;">Enviado pelos Correios</span></p>
                </div>
            </li>
            <li>
                <div class="containerIcon"><i class="fa-solid fa-shield"></i></div>
                <div class="baseLI">
                    <span style="color:#0056B3;">Compra Garantida</span> Saia satisfeito ou devolvemos o dinheiro
                </div>
            </li>
            <li>
                <div class="containerIcon"><i class="fa-solid fa-award"></i></div>
                <div class="baseLI">
                    <span style="color:#0056B3;">Mais Vendido</span> Entre os produtos da coleção
                </div>
            </li>
        </div>


        <section class="" id="final">
            <button type="submit" id="btnSubmit" onclick="openLoad()" class="buttonBuy">Finalizar Compra</button>
            <p class="infoBuyBnt">Após preencher as informações do pedido acima clique “Finalizar Compra”
            Ambiente criptografado e 100% seguro.</p>
            <img src="{{ URL::to('assets/pages/img/img-checkout/compra-segura.png') }}" alt="Compra Segura">
        </section>
    </section>


</section>
