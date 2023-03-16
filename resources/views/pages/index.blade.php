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
        <a href="/"><img src="{{ asset('assets/pages/img/logo_extendido.png') }}" alt="Logo BComp" /></a>

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


                    <img src="{{ asset('assets/landing/img/home/automatic-financial.png') }}" alt="dashbord" />
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

                @foreach ($solutionListData as $item)
                    <div class="solutionItem">
                        <h2>{{ $item['title'] }}</h2>
                        <p>{{ $item['paragraph'] }}</p>
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
                            Escolha o Link de Pagamento e receba suas vendas com uma tecnologia simples, fácil e rápida.
                        </li>
                        <li>
                            <img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="valid" />
                            Utilize nosso checkout e integre com sua plataforma preferida
                        </li>
                    </ul>
                </div>

                <button class="buttonGeneric__nobg">
                    Teste em minutos
                    <img src="{{ asset('assets/landing/img/svg/arrow-main-color.svg') }}" alt="seta para direita" />
                </button>
            </div>

            <div class="containerGenericImage">
                <img src="{{ asset('assets/landing/img/home/po.jpg') }}" alt="iphone image" />
            </div>
        </div>

        <div class="containerGeneric containerSmartSignature">
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

            <img src="{{ asset('assets/landing/img/home/smart-subscription.png') }}" alt="pessoa no noot" />
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

                <h2>R$0,00</h2>

                <button class="buttonGeneric">Ver planos</button>
            </div>
        </div>

        <div class="containerGeneric containerPaymentMethods">
            <div class="containerGenericInfo">
                <div class="containerGenericTitle">
                    <h2>Métodos de pagamentos</h2>
                    <p>A BOOMP oferece os principais meios de pagamento para que você aumente suas vendas</p>

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

                <p>A BOOMP oferece integração gratuita com outras plataformas parceiras para facilitar seu negócio</p>

                <ul>
                    <li><img src="{{ asset('assets/landing/img/global/check-icon.svg') }}" alt="check">Utilize
                        nosso checkout ou integre com a sua melhor escolha</li>
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


        <div class="containerGeneric containerPlans containerGetStartedToday">
            <img src="{{ asset('assets/landing/img/home/circles.svg') }}" alt="cinrculo">
            <div class="containerGenericInfo">
                <div class="containerGenericTitle containerTitleNoMargin">
                    <h2>Comece hoje mesmo sem taxinhas escondidas</h2>
                </div>
            </div>

            <button class="buttonGeneric">Começar Agora <img
                    src="{{ asset('assets/landing/img/svg/arrow-main-color.svg') }}"
                    alt="seta para direita" /></button>
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

    <script type="module" src="{{asset('assets/landing/js/script.js')}}"></script>
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
