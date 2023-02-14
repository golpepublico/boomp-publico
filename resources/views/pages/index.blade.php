<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!--Links-->
    <script src="https://kit.fontawesome.com/aff34075b0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('landing/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/styleSlider.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('landing/css/index.css')}}">


</head>

<body>
    @include('layouts.landing-header')

    <main>
        <section class="sectionNormal">
            <div>
                <h1>Para o seu negócio realizar mais vendas!</h1>
                <p>Tudo em um só lugar. Ganhe agilidade, suporte e tecnologia para escalar. Aqui na Boomp focamos em Growth.</p>
            </div>
            <div class="divImg"><img src="{{asset('landing/img/img1.webp')}}" alt="imagem" style="max-height: 100%; width: auto;" id="img1Dis"></div>
        </section>

        <div id="seta"><i class="fa-solid fa-angles-down"></i></div>

        <section class="sectionNormal classReverse">
            <div class="divImg"><img src="{{asset('landing/img/img2.webp')}}" alt="imagem" style="max-width: 100%; height: auto;"></div>
            <div>
                <h1>Checkout com aprovação máxima</h1>
                <p>Solução completa em meios de pagamento para o seu e-commerce com uma taxa de aprovação de 97%.</p>

            </div>
        </section>

        <section class="sectionNormal classReverse">
            <div class="divImg"><img src="{{asset('landing/img/img4.webp')}}" alt="imagem" style="max-width: 100%; height: auto;">
                <p style="background-color: #0029F2; width: 100%; text-align: center; color: #fff; padding-top: 15px; padding-bottom: 15px;"><a href="#" style="color: #fff;">Conheça nossos preços<i class="fa-solid fa-arrow-up" style="margin-left: 10px;"></i></a></p>
            </div>
            <div>
                <h1>Coloque o seu negócio no próximo nível</h1>
                <p>Gere links de pagamento customizáveis para você vender online. Aumente suas vendas oferecendo produtos adicionais. Reconquiste clientes que abandonaram seu checkout com envios de E-mail, SMS e WhatsApp.</p>
            </div>
        </section>

        <section id="sectionDuvidas">
            <div class="duvidas">
                <h1><i class="fa-solid fa-circle-question"></i>O que é check-out?</h1>
                <p>O checkout é a página de pagamento dentro do ambiente de vendas, pensado em todos os detalhes para que as vendas tenham um altíssimo numero de conversão! Nele é possível ofertar produtos adicionais com desconto em mesmo frete, promoções, cupons de descontos, mostrar provas sociais, integrar com outras ferramentas de vendas, etc.</p>
            </div>
            <div class="duvidas">
                <h1><i class="fa-solid fa-circle-question"></i>O que é gateway de pagamento?</h1>
                <p>O gateway de pagamento é um serviço oferecido a lojas virtuais, SaaS e empresas de grande porte, que recebe, autoriza e confere pagamentos de transações online de maneira rápida e segura, seja por PIX, boleto ou cartão de crédito e débito.</p>
            </div>
            <div class="duvidas">
                <h1><i class="fa-solid fa-circle-question"></i>Na Boomp, tenho um gerente de conta?</h1>
                <p>Sim! Na Boomp você terá além de um gerente de conta, toda uma equipe de suporte para auxiliar no que for preciso.</p>
            </div>
            <div class="duvidas">
                <h1><i class="fa-solid fa-circle-question"></i>Qual é a taxa de antecipação?</h1>
                <p>Não cobramos taxa de antecipação! Entendemos que o dinheiro é essencial para o fluxo de caixa do empreendedor, portanto, oferecemos a antecipação sem custos para os clientes verificados.</p>
            </div>
            <div class="duvidas">
                <h1><i class="fa-solid fa-circle-question"></i>Minha conta será bloqueada se eu vender infoproduto?</h1>
                <p>Não! Na Boomp prezamos pela tecnologia, principalmente no mercado de vendas. Qualquer tipo de infoproduto é bem vindo e estamos aqui pra te fazer vender mais!</p>
            </div>
            <div class="duvidas">
                <h1><i class="fa-solid fa-circle-question"></i>A Boomp atende ao meu comércio eletrônico?</h1>
                <p>Sim! Temos integrações com as principais plataformas de vendas online. Caso não tenha a que você utiliza, vamos integrar com ela! Basta chamar nosso suporte e fazer a solicitação.</p>
            </div>
            <div class="duvidas">
                <h1><i class="fa-solid fa-circle-question"></i>Quantos dias meu dinheiro fica bloqueado após as vendas?</h1>
                <p>Os clientes verificados recebem os valores de sua venda em até 2 (dois) dias úteis!</p>
            </div>
            <div class="duvidas">
                <h1><i class="fa-solid fa-circle-question"></i>Qual a taxa de aprovação?</h1>
                <p>A taxa de aprovação da Boomp é de até 97%! Temos a melhor taxa do mercado pois importamos nosso banco de dados de nossa rede de máquinas físicas, assim, cartões que já fizeram transações mediante senha digitada tem mais chance de serem aprovados em milissegundos!</p>
            </div>
        </section>

        <section id="sectionCadastro">
            <div class="containerCadastro">
                <div>
                    <h1>4 Soluções em Apenas uma Plataforma</h1>
                    <p>
                        Bank, Gateway, Checkout e App!
                    </p>
                </div>
                <a href="https://boomp.com.br/register" class="btn">Crie sua conta</a>
            </div>
        </section>

        @include('layouts.landing-footer')
    </main>
    <script src="{{asset('landing/js/script.js')}}"></script>
    <script src="{{asset('landing/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('landing/js/scriptSlider.js')}}"></script>
</body>

</html>
