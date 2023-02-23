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
</head>

<body>
    <header>
        <img src="{{ asset('assets/pages/img/logo_extendido.png') }}" alt="Logo BComp" />

        <div class="containerHeader">
            <ul>
                <li><a href="{{ route('plans.index') }}">Planos</a></li>
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
                <li><a href="{{ route('plans.index') }}">Planos</a></li>
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
        <div class="containerPaymentSolution">
            <div class="containerGeneric">
                <div class="containerGenericInfo">
                    <div class="containerGenericTitle">
                        <h2>
                            Solução de pagamentos completa para você vender mais, simples
                            assim!
                        </h2>
                        <p>
                            A plataforma preferida para receber pagamentos de pequenas
                            startups a grandes corporações.
                        </p>
                    </div>

                    <div class="containerButton">
                        <a href="{{ route('register') }}"><button class="buttonGeneric"> Criar conta
                                gratuita</button></a>
                        <button class="buttonGeneric__nobg">
                            Fale com um especialista
                            <img src="{{ asset('assets/landing/img/svg/arrow-main-color.svg') }}"
                                alt="seta para direita" />
                        </button>
                    </div>
                </div>

                <div class="containerImage">
                    <img src="{{ asset('assets/landing/img/svg/checkout.svg') }}" alt="checkout" />

                    <img src="{{ asset('assets/landing/img/svg/dashboard.svg') }}" alt="dashbord" />
                </div>
            </div>


        </div>

        <div class="containerGeneric containerSolution">
            <div class="containerGenericTitle">
                <h2>
                    A solução que você estava procurando, com uma ótima experiência
                </h2>
            </div>

            <div id="solutin" class="containerSolutionList">
                <?php
                $solutionListData = [
                    [
                        'title' => 'Educação',
                        'paragraph' => 'Educação Seu conhecimento em um curso online, ebook ou mentoria',
                        'images' => ['melver-solution.svg', 'melver-solution.svg'],
                    ],
                    [
                        'title' => 'SaaS',
                        'paragraph' => 'Pagamentos perfeitos para o seu negócio digital escalar com customização por API',
                        'images' => ['tradeinsights-solution.svg', 'divi-hub-solution.svg'],
                    ],
                    [
                        'title' => 'Gaming',
                        'paragraph' => 'Uma experiência de pagamento perfeita para desbloquear mais jogadores online',
                        'images' => ['loud-solution.svg', 'cidade-alta-solution.svg'],
                    ],
                    [
                        'title' => 'Notícias',
                        'paragraph' => 'Conteúdos exclusivos e pagos ou doações pelo conteúdo entregue para a sua audiência',
                        'images' => ['bmc-solution.svg', 'flow-solution.svg'],
                    ],
                    [
                        'title' => 'Investimentos',
                        'paragraph' => 'Planejamento qualificado e ofertas imperdíveis para o planejamento financeiro de seus clientes',
                        'images' => ['captable-solution.svg', 'eqi-solution.svg'],
                    ],
                    [
                        'title' => 'Finanças',
                        'paragraph' => 'De planejamento financeiro familiar a certificação de uma nova carreira financeira',
                        'images' => ['estrategia-solution.svg', 'eurico-solution.svg'],
                    ],
                ];
                
                ?>

                @foreach ($objectFaq as $elem)
                    <div class="containerFaq__item">
                        <div class="containerFaq__title">
                            <h2>{{ $elem['title'] }}</h2>
                            <img src="{{ asset('assets/landing/img/global/simple-arrow.svg') }}" alt="simple arrow">
                        </div>
                        <div
                            class="containerFaq__text {{ $elem['title'] == 'Qual plano escolher?' ? 'textWhite' : 'containerFaq__text_0' }}">
                            <p>{{ $elem['text'] }}</p>
                        </div>
                    </div>
                @endforeach
              
            </div>
        </div>

        <div class="containerGeneric containerPaymentLinks">
            <div class="containerGenericInfo">
                <div class="containerGenericTitle">
                    <h2>Links de pagamentos</h2>
                    <p>
                        Nosso checkout transparente é gratuito, eficiente e customizável
                        para atender as necessidades da sua empresa
                    </p>

                    <ul>
                        <li>
                            <img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="valid" />
                            Retentativas inteligentes, Order bump, Upsell em 1 clique,
                            Parcelas Inteligentes, Produtos ilimitados e muito mais!
                        </li>
                        <li>
                            <img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="valid" />
                            Defina os métodos de pagamentos e em até quantas parcelas deseja
                            receber por link de pagamento criado
                        </li>
                    </ul>
                </div>

                <button class="buttonGeneric__nobg">
                    Teste em minutos
                    <img src="{{ asset('assets/landing/img/svg/arrow-main-color.svg') }}" alt="seta para direita" />
                </button>
            </div>

            <div class="containerPaymentLinksImage">
                <img src="{{ asset('assets/landing/img/home/iphone.png') }}" alt="iphone image" />
            </div>
        </div>

        <div class="containerGeneric containerSmartSignature">
            <img src="{{ asset('assets/landing/img/home/smart-subscription.png') }}" alt="pessoa no noot" />
            <div class="containerGenericInfo">
                <div class="containerGenericTitle">
                    <h2>Assinatura inteligente</h2>
                    <p>A ferramentas necessária para o seu negócio escalar!</p>

                    <ul>
                        <li>
                            <img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="valid" />
                            Retentativas inteligentes, Order bump, Upsell em 1 clique,
                            Parcelas Inteligentes, Produtos ilimitados e muito mais!
                        </li>
                        <li>
                            <img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="valid" />
                            Defina os métodos de pagamentos e em até quantas parcelas deseja
                            receber por link de pagamento criado
                        </li>
                    </ul>
                </div>

                <button class="buttonGeneric__nobg">
                    Crie assinaturas pelo dashboard
                    <img src="{{ asset('assets/landing/img/svg/arrow-main-color.svg') }}" alt="seta para direita" />
                </button>
            </div>
        </div>

        <div class="containerGeneric containerPlans">
            <img src="{{ asset('assets/landing/img/home/circles.svg') }}" alt="cinrculo">
            <div class="containerGenericInfo">
                <div class="containerGenericTitle">
                    <h2>Taxas transparentes</h2>

                    <ul>
                        <li>
                            <img src="{{ asset('assets/landing/img/global/check-icon-white.svg') }}"
                                alt="icone de valido" />
                            Sem custos mensais
                        </li>
                        <li>
                            <img src="{{ asset('assets/landing/img/global/check-icon-white.svg') }}"
                                alt="icone de valido" />
                            Sem taxa de adesão
                        </li>
                        <li>
                            <img src="{{ asset('assets/landing/img/global/check-icon-white.svg') }}"
                                alt="icone de valido" />
                            Saques ilimitados gratuitos
                        </li>
                        <li>
                            <img src="{{ asset('assets/landing/img/global/check-icon-white.svg') }}"
                                alt="icone de valido" />
                            Comece do zero sem taxas abusivas
                        </li>
                        <li>
                            <img src="{{ asset('assets/landing/img/global/check-icon-white.svg') }}"
                                alt="icone de valido" />
                            Suporte via chat gratuitamente
                        </li>
                    </ul>
                </div>
            </div>

            <div class="containerPlans__plan">
                <div class="containerPlans__title">
                    <h3>Planos para você crescer</h2>
                        <p>Não cobramos taxas mensais para você começar sem gastar nada</p>
                </div>

                <h2>R$0,00 <span>por mês</span></h2>

                <button class="buttonGeneric">Ver planos</button>
            </div>
        </div>

        <div class="containerGeneric containerPaymentMethods">
            <div class="containerGenericInfo">
                <div class="containerGenericTitle">
                    <h2>Métodos de pagamentos</h2>
                    <p>A Primefy oferece os principais meios de pagamento para que você aumente suas vendas</p>

                    <ul>
                        <li><img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="check"> Pix,
                            Boleto Bancário ou Cartão de Crédito</li>
                        <li><img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="check"> Vendas
                            em até 12 parcelas, independente do método de pagamento</li>
                    </ul>
                </div>

                <a href="{{ route('register') }}"><button class="buttonGeneric__nobg">Criar conta <img
                            src="{{ asset('assets/landing/img/svg/arrow-main-color.svg') }}"
                            alt="seta para direita" /></button></a>
            </div>

            <div class="containerPaymentMethods__image">
                <img src="{{ asset('assets/landing/img/home/payment-methods.png') }}" alt="metodos de pagamento">
            </div>
        </div>

        <div class="containerGeneric containerECommerce">

            <div class="containerGenericTitle">
                <h2>Integre com sua plataforma de e-commerce</h2>

                <p>A Primefy oferece os principais meios de pagamento para que você aumente suas vendas</p>

                <ul>
                    <li><img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="check"> Pix,
                        Boleto Bancário ou Cartão de Crédito</li>
                    <li><img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="check"> Vendas em
                        até 12 parcelas, independente do método de pagamento</li>
                </ul>

                <a href="{{ route('register') }}"><button class="buttonGeneric__nobg">Criar conta <img
                            src="{{ asset('assets/landing/img/svg/arrow-main-color.svg') }}"
                            alt="seta para direita" /></button></a>
            </div>


            <div class="containerECommerce__image">
                <img src="{{ asset('assets/landing/img/home/logo_shopify.decf8e0.webp') }}" alt="shopify">
                <img src="{{ asset('assets/landing/img/home/logo_woocommerce.444c8e2.webp') }}" alt="woo cormerce">
            </div>

        </div>

        <div class="containerGeneric containerFinancialAutomation">
            <div class="containerGenericImage">
                <img src="{{ asset('assets/landing/img/home/automatic-financial.svg') }}" alt="automatic financial">
            </div>

            <div class="containerGenericInfo containerGenericInfoWidth40">
                <div class="containerGenericTitle containerTitleNoMargin">
                    <h2>Automatização financeira</h2>
                    <p>O dashboard criado para você ter controle de seus ganhos, realizar reembolsos, visualizar
                        detalhes de suas vendas e muito mais.</p>

                    <ul>
                        <li><img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="check">
                            Múltiplos CNPJs por acesso</li>
                        <li><img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="check">
                            Disponível para Android e iOS</li>
                        <li><img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="check"> Mapa
                            de vendas em tempo real</li>
                    </ul>
                </div>

                <a href="{{ route('login') }}"><button class="buttonGeneric__nobg">Acesse e veja você mesmo <img
                            src="{{ asset('assets/landing/img/svg/arrow-main-color.svg') }}"
                            alt="seta para direita" /></button></a>
            </div>
        </div>

        <div class="containerGeneric containerAntifraudSolution">
            <div class="containerGenericInfo containerGenericInfoWidth40">
                <div class="containerGenericTitle containerTitleNoMargin">
                    <h2>Solução anti-fraude</h2>
                    <p>Inteligência contextual para evitar usuários maliciosos para que você foque no seu crescimento
                    </p>

                    <ul>
                        <li><img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="check">
                            Anti-fraude gratuito</li>
                        <li><img src="{{ asset('assets/landing/img/global/check-icon.svg') }}"
                                alt="check">Visualize a análise de risco, endereço de IP de compra e demais
                            informações únicas de cada venda</li>
                    </ul>
                </div>

                <button class="buttonGeneric__nobg">Venda online com segurança <img
                        src="{{ asset('assets/landing/img/svg/arrow-main-color.svg') }}"
                        alt="seta para direita" /></button>
            </div>

            <div class="containerGenericImage">
                <img src="{{ asset('assets/landing/img/home/anti-fraud.png') }}" alt="pessoa">
            </div>
        </div>

        <div class="containerGeneric">
            <div class="containerGenericImage">
                <img src="{{ asset('assets/landing/img/home/international-transfer.png') }}" alt="">
            </div>

            <div class="containerGenericInfo containerGenericInfoWidth40">
                <div class="containerGenericTitle containerTitleNoMargin">
                    <h2>Transferências internacionais sem burocracia</h2>
                    <p>Receba de investimentos para a sua startup a transfrências do AdSense e Twitch</p>

                    <ul>
                        <li><img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="check">
                            Simples, justo, rápido e seguro</li>
                        <li><img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="check"> 1.99%,
                            a melhor taxa e sem burocracia</li>
                    </ul>
                </div>

                <button class="buttonGeneric__nobg">Simule e economize <img
                        src="{{ asset('assets/landing/img/svg/arrow-main-color.svg') }}"
                        alt="seta para direita" /></button>
            </div>
        </div>

        <div class="containerGeneric">
            <div class="containerGenericInfo containerGenericInfoWidth40">
                <div class="containerGenericTitle containerTitleNoMargin">
                    <h2>A API de pagamentos mais avançada e fácil de usar</h2>
                    <p>Uma infraestrutura de pagamentos online para você oferecer uma experiência única para seus
                        clientes</p>

                    <ul>
                        <li><img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="check">
                            Integrações completas para você implementar uma solução de pagamentos white-label</li>
                        <li><img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="check">
                            Suporte gratuito especializado para auxiliar você em cada etapa da sua integração</li>
                        <li><img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="check">
                            Integrações com Shopify, VTEX, WooCommerce e Magento</li>
                    </ul>
                </div>

                <button class="buttonGeneric__nobg">Veja a documentação <img
                        src="{{ asset('assets/landing/img/svg/arrow-main-color.svg') }}"
                        alt="seta para direita" /></button>
            </div>

            <div class="containerGenericImage">
                <img src="{{ asset('assets/landing/img/home/api-integration.svg') }}" alt="api intregation">
            </div>


        </div>

        <div class="containerGeneric containerPlans containerGetStartedToday">
            <img src="{{ asset('assets/landing/img/home/circles.svg') }}" alt="cinrculo">
            <div class="containerGenericInfo">
                <div class="containerGenericTitle containerTitleNoMargin">
                    <h2>Comece hoje mesmo sem taxinhas escondidas</h2>
                    <p>Faça como milhares de empreendedores e lojistas!</p>
                    <img src="{{ asset('assets/landing/img/home/users.png') }}" alt="users">
                </div>
            </div>

            <img src="{{ asset('assets/landing/img/home/cards.svg') }}" alt="card" class="card">
        </div>
    </div>

    <footer>
        <div class="containerFooter">
            <div class="logo">
                <img src="{{ asset('assets/landing/img/footer/logo-extendida-branco.png') }}" alt="logo">
            </div>

            <div class="info">
                <div class="info_item1">
                    <div class="info_item1__title">
                        <p>Correspondente de câmbio autorizado</p>
                        <img src="{{ asset('assets/landing/img/footer/white-bexs-logo.svg') }}" alt="bexs">
                    </div>

                    <div class="info_item1__list">
                        <p>Tecnologia</p>

                        <div class="info_item1__list__itens">
                            <img class="react" src="{{ asset('assets/landing/img/footer/white-midas-logo.png') }}"
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
                        <li><a href="#">Remessa internacional</a></li>
                        <li><a href="#">Split de pagamentos</a></li>
                        <li><a href="#">API para integração</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Empresa</a></li>
                        <li><a href="#">Preços</a></li>
                        <li><a href="#">Suporte</a></li>
                        <li><a href="#">Contato</a></li>
                        <li><a href="#">Carreiras</a></li>
                        <li><a href="#">Termos e privacidade</a></li>
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
                    <li><img src="{{ asset('assets/landing/img/footer/instagram.svg') }}" alt="insta"></li>
                    <li><img src="{{ asset('assets/landing/img/footer/youtube.svg') }}" alt="youtube"></li>
                    <li><img src="{{ asset('assets/landing/img/footer/twitter.svg') }}" alt="twitter"></li>
                    <li><img src="{{ asset('assets/landing/img/footer/facebook.svg') }}" alt="facebook"></li>
                </ul>
            </div>
        </div>
    </footer>

    <script type="module" src="{{asset('assets/landing/js/script.js')}}"></script>
    <!--
        <script src="{{ asset('assets/landing/js/swiper-bundle.min.js') }}"></script>
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="{{ asset('assets/landing/js/scriptSlider.js') }}"></script>
    -->

</body>

</html>
