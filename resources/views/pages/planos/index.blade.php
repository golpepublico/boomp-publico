<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!--Links-->
    <script src="https://kit.fontawesome.com/9aa4c0757e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- <link rel="stylesheet" href="{{ asset('assets/landing/css/swiper-bundle.min.css') }}"> -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <link rel="stylesheet" href="{{ asset('assets/landing/css/styleSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/index.css') }}">  -->

    <link rel="stylesheet" href="{{ asset('assets/pages/css/landingPage/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/pages/css/landingPage/globalStyle.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/pages/css/landingPage/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/pages/css/landingPage/hamburguerButton.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/pages/css/landingPage/header.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/pages/css/landingPage/solution.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/pages/css/landingPage/footer.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/pages/css/landingPage/plans.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/pages/css/landingPage/faq.css') }}">
</head>

<body>
    <header class="noPadding">
        <a href="/"><img src="{{ asset('assets/pages/img/logo_extendido.png') }}" alt="Logo BComp" /></a>

        <div class="containerHeader">
            <ul>
                <li><a href="">Planos</a></li>
                <li><a href="{{ route('dashboard.index') }}">Acessar Dashboard</a></li>
                <li class="liIdioma" id="hamburger-button3"><img
                        src="{{ asset('assets/landing/img/global/brazil-flag-icon.050724f.webp') }}" alt="bandeira"
                        style="width: 25px; height: 25px;"><img id="imgIdiomaDektop"
                        src="{{ asset('assets/landing/img/global/simple-arrow.svg') }}" class="imgidiomaClassDektop">
                </li>
            </ul>

            <button id="hamburger-button" class="hamburger--button mobileHeader">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </button>

            <div class="mobileIdioma"><img id="hamburger-button2"
                    src="{{ asset('assets/landing/img/global/brazil-flag-icon.050724f.webp') }}" alt="bandeira"
                    style="width: 40px; height: 40px;" class="mobileHeader"> <img
                    src="{{ asset('assets/landing/img/global/simple-arrow.svg') }}" alt="" id="imgIdioma"
                    class="imgidiomaClass"></div>
        </div>

        <div class="containerHeader__mobile mobileHeader">

            <ul id="menu" class="hiddenMenu">
                <li><a href="">Planos</a></li>
                <li><a href="{{ route('dashboard.index') }}">Acessar Dashboard</a></li>
            </ul>
        </div>

        <div class="containerIdioma" id="menuIdioma">

            <h2> Selecione seu idioma</h2>

            <ul>
                <li><img src="{{ asset('assets/landing/img/global/brazil-flag-icon.050724f.webp') }}" alt="brasil">
                    Portugues</li>
                <li><img src="{{ asset('assets/landing/img/global/usa-flag-icon.3230684.webp') }}" alt="brasil">
                    Inglês</li>
            </ul>
        </div>
    </header>

    <div class="pageWapper">

        <div class="containerPlansBuy">
            <div class="containerPlansBuy__title">
                <h2>Planos</h2>

                <ul>
                    <li>
                        <img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="check" />

                        <div class="title">
                            <h2>Links de pagamento</h2>
                            <p>Crie links de produtos e comece a vender</p>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="check" />
                        <div class="title">
                            <h2>Assinatura inteligente</h2>
                            <p>Aumente taxa de conversão em 53%</p>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="check" />

                        <div class="title">
                            <h2>Subcontas ilimitadas</h2>
                            <p>Gerencie múltiplas contas com o seu acesso</p>
                        </div>
                    </li>
                    <li>
                        <img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="check" />

                        <div class="title">
                            <h2>Splits de pagamento</h2>
                            <p>Divida automaticamente e evite bi-tributação</p>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="containerPlans__plans">
                <div class="containerPlans__plans-item">
                    <div class="containerPlans__plans-item-info">
                        <div class="containerPlans__plans-item-info-title">
                            <img src="{{ asset('assets/landing/img/plans/basic-plan.svg') }}" alt="basico plano" />
                            <div class="containerPlans__plans-item-title-info">
                                <span class="badged">Menor taxa do mercado</span>
                                <p>Para autônomos</p>
                                <h2>Básico</h2>
                            </div>
                        </div>


                    </div>

                    <ul class="containerPlans__plans-list">
                        <li>
                            <div>
                                <p>PIX</p>
                                <span>Receba em 1 dia</span>
                            </div>
                            <div>
                                <p>0.97%</p>
                            </div>
                        </li>
                        <li>
                            <div>
                                <p>Cartão</p>
                                <span>Receba parcelado</span>
                            </div>
                            <div class="carditem">
                                <div>
                                    <span>1</span>
                                    <p>3.49%</p>
                                </div>
                                <div>
                                    <span>2-6</span>
                                    <p>4.75%</p>
                                </div>
                                <div>
                                    <span>7-12</span>
                                    <p>4.99%</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div>
                                <p>Boleto Bancário</p>
                                <span>Receba no dia</span>
                            </div>
                            <div>
                                <p>2.99%</p>
                            </div>
                        </li>
                        <li class="noBorder">
                            <ul>
                                <li>
                                    <div><span>Taxa de processamento</span></div>
                                    <div><span>R$0.99</span></div>
                                </li>
                                <li>
                                    <div><span>Saque</span></div>
                                    <div><span>Grátis</span></div>
                                </li>
                                <li>
                                    <div><span>Antecipação sob demanda</span></div>
                                    <div><span>2.99%</span></div>
                                </li>
                                <li>
                                    <div><span>Manutenção de conta</span></div>
                                    <div><span>Grátis</span></div>
                                </li>
                                <li>
                                    <div><span>Subcontas ilimitadas</span></div>
                                    <div><span>Grátis</span></div>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <button class="buttonGeneric__nobg">
                        <a href="{{ route('register') }}">Criar conta gratuita
                            <img src="{{ asset('assets/landing/img/svg/arrow-main-color.svg') }}"
                                alt="seta direita" />
                        </a>
                    </button>
                </div>

                <div class="containerPlans__plans-item popular">
                    <div class="containerPlans__plans-item-info">
                        <div class="containerPlans__plans-item-info-title">
                            <img src="{{ asset('assets/landing/img/plans/pro-plan.svg') }}" alt="pro plano" />
                            <div class="containerPlans__plans-item-title-info">
                                <span class="badged badgedPt">Mais popular</span>
                                <p>Para startups</p>
                                <h2>Profissional</h2>
                            </div>
                        </div>


                    </div>

                    <ul class="containerPlans__plans-list">
                        <li>
                            <div>
                                <p>PIX</p>
                                <span>Receba em 1 dia</span>
                            </div>
                            <div>
                                <p>0.97%</p>
                            </div>
                        </li>
                        <li>
                            <div>
                                <p>Cartão</p>
                                <span>Receba em 14 dias</span>
                            </div>
                            <div class="carditem">
                                <div>
                                    <p>4.49%</p>
                                    <span>+1% por parcela</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div>
                                <p>Boleto Bancário</p>
                                <span>Receba no dia</span>
                            </div>
                            <div>
                                <p>2.99%</p>
                            </div>
                        </li>
                        <li class="noBorder">
                            <ul>
                                <li>
                                    <div><span>Taxa de processamento</span></div>
                                    <div><span>R$0.99</span></div>
                                </li>
                                <li>
                                    <div><span>Saque</span></div>
                                    <div><span>Grátis</span></div>
                                </li>
                                <li>
                                    <div><span>Antecipação sob demanda</span></div>
                                    <div><span>2.99%</span></div>
                                </li>
                                <li>
                                    <div><span>Manutenção de conta</span></div>
                                    <div><span>Grátis</span></div>
                                </li>
                                <li>
                                    <div><span>Subcontas ilimitadas</span></div>
                                    <div><span>Grátis</span></div>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <button class="buttonGeneric__nobg">
                        <a href="{{ route('register') }}">Testar agora
                            <img src="{{ asset('assets/landing/img/svg/arrow-main-color.svg') }}"
                                alt="seta direita" />
                        </a>
                    </button>
                </div>
            </div>
        </div>

        <div class="containerSell">
            <div>
                <div class="containerSell__title">
                    <h2>Está com dúvidas?</h2>
                    <p>
                        Nosso time está pronto para ajudar você a tomar a decisão que irá
                        escalar suas vendas
                    </p>
                </div>
                <div class="containerSell__item">
                    <a href="#" class="buttonGeneric__nobg">Fale com um especialista</a>
                </div>
            </div>
        </div>

        <div class="containerFaq">
            <h2>Perguntas Frequentes</h2>

            <?php
            $objectFaq = [
                [
                    'title' => 'Como criar minha conta?',
                    'text' => 'Crie sua conta na Boomp em 10 minutos. Escolha o plano que se encaixa melhor para você, complete seu cadastro com suas informações de pessoa física ou jurídica e os seus dados bancários. A partir daí você já pode começar a usar a Boomp para alavancar suas vendas.',
                ],
                [
                    'title' => 'O que posso fazer com Boomp',
                    'text' => 'A Boomp é uma plataforma de pagamentos com soluções para empresas e consumidores. Aqui na Boomp, você consegue fazer split de pagamentos, oferecer planos mensais ou anuais para seus clientes com a nossa opção de pagamento recorrente, integrar com diversas plataformas de sistema de gerenciamento e vendas online e transferências internacionais.',
                ],
                [
                    'title' => 'Como vou receber o valor das minhas vendas?',
                    'text' => 'Você vai receber o seu pagamento na conta bancária cadastrada no nosso sistema no prazo determinado do plano escolhido.',
                ],
                [
                    'title' => 'Qual plano escolher?',
                    'text' => 'Na Boomp, você pode escolher um dos seguintes planos sem pagar nada para ter sua conta: Se você é autônomo, escolha o plano básico. Ele tem a menor taxa do mercado e te permite receber via Pix, cartão (parcelado ou à vista) ou boleto. Consulte as taxas da operação aqui. Se você tem uma startup, escolha o plano profissional. Receba em até um dia útil pelo Pix, em 30 dias para pagamentos em cartão e no mesmo dia do pagamento via boleto. Se você cria para a internet como infoprodutor, escolha o plano Creators e receba em 1 dia pelo Pix, em até 15 dias via cartão e no mesmo dia pelo boleto bancário.',
                ],
            ];
            
            ?>

            <div id="faq" class="containerFaq__list">
                @foreach ($objectFaq as $elem)
                    <div class="containerFaq__item">
                        <div class="containerFaq__title">
                            <h2>{{ $elem['title'] }}</h2>
                            <img class="arrow" src="{{ asset('assets/landing/img/global/simple-arrow.svg') }}"
                                alt="Arrow">
                        </div>
                        <div
                            class="containerFaq__text_0 containerFaq__text {{ $elem['title'] == 'Qual plano escolher?' && ' textWhite' }}">
                            <p>{{ $elem['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <script>
                const faqItems = document.querySelectorAll('.containerFaq__item');

                faqItems.forEach((item) => {
                    const title = item.querySelector('.containerFaq__title');
                    const text = item.querySelector('.containerFaq__text');

                    title.addEventListener('click', () => {
                        text.classList.remove('containerFaq__text_0');
                        title.querySelector('.arrow').classList.toggle('openImg');



                        if (title.firstElementChild.innerText == 'Qual plano escolher?') {
                            text.classList.toggle('textWhiteOpen');
                        } else {
                            text.classList.toggle('open')
                        }
                    });
                });
            </script>

        </div>

    </div>


    <footer>
        <div class="containerFooter">
            <div class="info_item1__title" style="margin-bottom: 20px">
                <p>Feito com muito amor</p>
            </div>
            <div class="logo">

                <img src="{{ asset('assets/landing/img/footer/logo-extendida-branco.png') }}" alt="logo">
            </div>

            <div class="info">
                <div class="info_item1">

                    <div class="info_item1__list">
                        <p>Tecnologia de ponta a ponta</p>

                        <div class="info_item1__list__itens">
                            <img src="{{ asset('assets/landing/img/footer/umbler-logo-bg-primary.svg') }}"
                                alt="logo">

                            <img src="{{ asset('assets/landing/img/footer/white-stanfordrebuild-logo.png') }}"
                                alt="logo">
                        </div>
                    </div>
                </div>

                <div class="info_item2">
                    <ul>
                        <li><a href="#">Soluções</a></li>
                        <li><a href="#">Link de pagamento</a></li>
                        <li><a href="#">Pagamento por assinaturas</a></li>
                        <li><a href="#">Split de pagamentos</a></li>
                        <li><a href="#">API para integração</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Empresa</a></li>
                        <li><a href="#">Preços</a></li>
                        <li><a href="#">Central de ajuda</a></li>
                        <li><a href="#">Termos e privacidade</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer">
                <div class="footer__title">
                    <span>A atividade de subcredenciamento é dispensada de autorização do Banco Central do Brasil,
                        conforme termos da Circular nº 3.885/2018. Demais dispositivos aplicáveis, como o disposto nas
                        Circulares nº 3.682/2013, 3.886/2018, 3.952/2019 e Resolução nº 24/2020 são rigorosamente
                        cumpridos.</span>
                </div>
                <ul class="footer__list">
                    <li><img src="{{ asset('assets/landing/img/footer/linkedin.svg') }}" alt="likding"></li>
                    <li><a target="_blank" href="https://instagram.com/appboomp"><img src="{{ asset('assets/landing/img/footer/instagram.svg') }}" alt="insta"></a></li>
                    <li><img src="{{ asset('assets/landing/img/footer/youtube.svg') }}" alt="youtube"></li>
                    <li><img src="{{ asset('assets/landing/img/footer/twitter.svg') }}" alt="twitter"></li>
                    <li><img src="{{ asset('assets/landing/img/footer/facebook.svg') }}" alt="facebook"></li>
                </ul>
            </div>
        </div>
    </footer>

    <script type="module" src="{{asset('assets/landing/js/scriptsPlans.js')}}"></script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/640663ea4247f20fefe45a24/1gqsfcjgu';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>
