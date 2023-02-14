<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'store_id'      => 1,
            'category_id'   => 1,
            'image'         => '20220820193739.jpg',
            'name'          => 'Apple iPhone 13 Pro Max (128 GB) - Grafite',
            'slug'          => 'apple-iphone-13-pro-max-128-gb-grafite',
            'description'   => 'O Apple iPhone 13 é um smartphone iOS com características inovadoras que o tornam uma excelente opção para qualquer tipo de utilização.',
            'price'         => 7799.00,
            'url'           => 'https://www.adminstore.com.br',
            'variation'     => true,
            'weight'        => null,
            'width'         => null,
            'length'        => null,
            'height'        => null,
        ]);

        Product::create([
            'store_id'      => 2,
            'category_id'   => 8,
            'image'         => '20220820193730.jpg',
            'name'          => 'MacBook Pro de 13": Chip M2 da Apple de 256 GB SSD - Cinza-Espacial',
            'slug'          => 'macbook-pro-de-13-chip-m2-da-apple-de-256-gb-ssd-cinza-espacial',
            'description'   => 'O novo chip M2 deixa o MacBook Pro de 13 polegadas ainda mais eficiente. O design compacto que você já conhece oferece até 20 horas de bateria1, além de um sistema de resfriamento ativo que garante desempenho rápido o tempo todo. Com uma tela Retina brilhante, câmera FaceTime HD e microfones com qualidade de estúdio, é o nosso notebook profissional mais portátil.',
            'price'         => 15299.99,
            'url'           => 'https://www.cariristore.com.br',
            'variation'     => false,
            'weight'        => 100,
            'width'         => 100,
            'length'        => 100,
            'height'        => 100,
        ]);

        Product::create([
            'store_id'      => 2,
            'category_id'   => 7,
            'image'         => '20220820193739.jpg',
            'name'          => 'Apple iPhone 13 Pro Max (128 GB) - Grafite',
            'slug'          => 'apple-iphone-13-pro-max-128-gb-grafite',
            'description'   => 'O Apple iPhone 13 é um smartphone iOS com características inovadoras que o tornam uma excelente opção para qualquer tipo de utilização.',
            'price'         => 7799.00,
            'url'           => 'https://www.cariristore.com.br',
            'variation'     => true,
            'weight'        => null,
            'width'         => null,
            'length'        => null,
            'height'        => null,
        ]);

        Product::create([
            'store_id'      => 2,
            'category_id'   => 14,
            'image'         => '20220820193100.jpg',
            'name'          => 'PlayStation®5 + Horizon Forbidden West',
            'slug'          => 'playstation5-horizon-forbidden-west',
            'description'   => 'O PlayStation®5 é o console mais avançado já criado. Jogue os jogos mais recentes e os mais populares com uma velocidade e uma potência incríveis, graças ao processador personalizado de oito núcleos e à GPU de alta velocidade. E com o SSD personalizado, você pode carregar e jogar instantaneamente, sem atrasos.',
            'price'         => 4499.00,
            'url'           => 'https://www.cariristore.com.br',
            'variation'     => true,
            'weight'        => null,
            'width'         => null,
            'length'        => null,
            'height'        => null,
        ]);

        Product::create([
            'store_id'      => 2,
            'category_id'   => 14,
            'image'         => '20220820193101.jpg',
            'name'          => 'Console Xbox Series S',
            'slug'          => 'console-xbox-series-s',
            'description'   => 'O Xbox Series S é o console mais compacto e acessível da nova geração. Com velocidade e potência incríveis, ele oferece uma experiência de jogo de próxima geração com uma resolução de até 1440p e 120 fps. E com o SSD personalizado, você pode carregar e jogar instantaneamente, sem atrasos.',
            'price'         => 2799.00,
            'url'           => 'https://www.cariristore.com.br',
            'variation'     => true,
            'weight'        => null,
            'width'         => null,
            'length'        => null,
            'height'        => null,
        ]);

        Product::create([
            'store_id'      => 2,
            'category_id'   => 11,
            'image'         => '20220820193102.jpg',
            'name'          => 'Fone de Ouvido Bluetooth JBL Tune 510BT Pure Bass Preto - JBLT510BTBLK',
            'slug'          => 'fone-de-ouvido-bluetooth-jbl-tune-510bt-pure-bass-preto-jblt510btblk',
            'description'   => 'O fone de ouvido JBL Tune 510BT é um fone de ouvido Bluetooth com graves profundos e potentes. Com uma bateria de longa duração, você pode ouvir música por até 20 horas. O fone de ouvido é leve e confortável, com almofadas de ouvido macias e ajustáveis. O controle remoto e o microfone integrados permitem que você atenda chamadas e controle a reprodução de música sem precisar tirar o fone de ouvido.',
            'price'         => 250.00,
            'url'           => 'https://www.cariristore.com.br',
            'variation'     => false,
            'weight'        => null,
            'width'         => null,
            'length'        => null,
            'height'        => null,
        ]);

        Product::create([
            'store_id'      => 2,
            'category_id'   => 11,
            'image'         => '20220820193103.jpg',
            'name'          => 'Caixa de Som Bluetooth JBL Boombox 2 80W Preta - JBLBOOMBOX2BLK',
            'slug'          => 'caixa-de-som-bluetooth-jbl-boombox-2-80w-preta-jblboombox2blk',
            'description'   => 'A JBL Boombox 2 é uma caixa de som Bluetooth com graves profundos e potentes. Com uma bateria de longa duração, você pode ouvir música por até 24 horas. A caixa de som é leve e confortável, com almofadas de ouvido macias e ajustáveis. O controle remoto e o microfone integrados permitem que você atenda chamadas e controle a reprodução de música sem precisar tirar o fone de ouvido.',
            'price'         => 2999.00,
            'url'           => 'https://www.cariristore.com.br',
            'variation'     => true,
            'weight'        => null,
            'width'         => null,
            'length'        => null,
            'height'        => null,
        ]);

        Product::create([
            'store_id'      => 2,
            'category_id'   => 11,
            'image'         => '20220820193104.jpg',
            'name'          => 'Smart TV LED 43" Full HD Semp 43S5300, 2 HDMI 1 USB, Wi-Fi, Google Assistant, Controle Remoto Com Comando De Voz, Android',
            'slug'          => 'smart-tv-led-43-full-hd-semp-43s5300-2-hdmi-1-usb-wi-fi-google-assistant-controle-remoto-com-comando-de-voz-android',
            'description'   => 'A Smart TV LED 43" Full HD Semp 43S5300 é uma TV com tela de 43 polegadas, resolução Full HD, 2 HDMI, 1 USB, Wi-Fi, Google Assistant, Controle Remoto Com Comando De Voz, Android.',
            'price'         => 2399.00,
            'url'           => 'https://www.cariristore.com.br',
            'variation'     => true,
            'weight'        => null,
            'width'         => null,
            'length'        => null,
            'height'        => null,
        ]);

        Product::create([
            'store_id'      => 2,
            'category_id'   => 11,
            'image'         => '20220820193105.jpg',
            'name'          => 'Kindle 10a. geração com bateria de longa duração e iluminação embutida - Cor Preta',
            'slug'          => 'kindle-10a-geracao-com-bateria-de-longa-duracao-e-iluminacao-embutida-cor-preta',
            'description'   => 'O Kindle é um leitor de livros eletrônicos com tela de 6 polegadas, 8 GB de armazenamento interno, Wi-Fi, bateria de longa duração e iluminação embutida.',
            'price'         => 399.00,
            'url'           => 'https://www.cariristore.com.br',
            'variation'     => true,
            'weight'        => null,
            'width'         => null,
            'length'        => null,
            'height'        => null,
        ]);

        Product::create([
            'store_id'      => 2,
            'category_id'   => 11,
            'image'         => '20220820193106.jpg',
            'name'          => 'Echo Dot (4ª Geração): Smart Speaker com Alexa | Perfeito para qualquer ambiente - Cor Preta',
            'slug'          => 'echo-dot-4a-geracao-smart-speaker-com-alexa-perfeito-para-qualquer-ambiente-cor-preta',
            'description'   => 'Conheça o Echo Dot (4ª Geração): nosso smart speaker com Alexa de maior sucesso ainda melhor. O novo design de áudio com direcionamento frontal (1 speaker de 1,6") garante mais graves e um som completo.',
            'price'         => 379.00,
            'url'           => 'https://www.cariristore.com.br',
            'variation'     => true,
            'weight'        => null,
            'width'         => null,
            'length'        => null,
            'height'        => null,
        ]);

        Product::create([
            'store_id'      => 2,
            'category_id'   => 11,
            'image'         => '20220820193107.jpg',
            'name'          => 'Fire TV Stick | Streaming em Full HD com Alexa | Com Controle Remoto por Voz com Alexa (inclui comandos de TV)',
            'slug'          => 'fire-tv-stick-streaming-em-full-hd-com-alexa-com-controle-remoto-por-voz-com-alexa-inclui-comandos-de-tv',
            'description'   => 'O Fire TV Stick é um dispositivo de streaming com Alexa integrado que permite que você assista a filmes e séries de TV em Full HD, com controle remoto por voz e comandos de TV.',
            'price'         => 360.00,
            'url'           => 'https://www.cariristore.com.br',
            'variation'     => true,
            'weight'        => null,
            'width'         => null,
            'length'        => null,
            'height'        => null,
        ]);

        Product::create([
            'store_id'      => 2,
            'category_id'   => 14,
            'image'         => '20220820193108.jpg',
            'name'          => 'The Last of Us Part II - PlayStation 4',
            'slug'          => 'the-last-of-us-part-ii-playstation-4',
            'description'   => 'The Last of Us Part II é um jogo de ação e aventura desenvolvido pela Naughty Dog e publicado pela Sony Interactive Entertainment para PlayStation 4.',
            'price'         => 87.00,
            'url'           => 'https://www.cariristore.com.br',
            'variation'     => true,
            'weight'        => null,
            'width'         => null,
            'length'        => null,
            'height'        => null,
        ]);

        Product::create([
            'store_id'      => 2,
            'category_id'   => 14,
            'image'         => '20220820193109.jpg',
            'name'          => 'God of War Ragnarök - Edição de Lançamento - PlayStation 4',
            'slug'          => 'god-of-war-ragnarok-edicao-de-lancamento-playstation-4',
            'description'   => 'God of War Ragnarök é um jogo de ação e aventura desenvolvido pela Santa Monica Studio e publicado pela Sony Interactive Entertainment para PlayStation 4.',
            'price'         => 246.00,
            'url'           => 'https://www.cariristore.com.br',
            'variation'     => true,
            'weight'        => null,
            'width'         => null,
            'length'        => null,
            'height'        => null,
        ]);

        Product::create([
            'store_id'      => 2,
            'category_id'   => 14,
            'image'         => '20220820193110.jpg',
            'name'          => 'The Last Of Us Part I - PlayStation 5',
            'slug'          => 'the-last-of-us-part-i-playstation-5',
            'description'   => 'The Last of Us Part I é um jogo de ação e aventura desenvolvido pela Naughty Dog e publicado pela Sony Interactive Entertainment para PlayStation 4. É o oitavo jogo da série The Last of Us e o sucessor de The Last of Us (2013).',
            'price'         => 289.00,
            'url'           => 'https://www.cariristore.com.br',
            'variation'     => true,
            'weight'        => null,
            'width'         => null,
            'length'        => null,
            'height'        => null,
        ]);        
        
        Product::create([
            'store_id'      => 3,
            'category_id'   => 3,
            'image'         => '20220820193729.jpg',
            'name'          => 'Husky Siberiano - Filhote com Pedigree',
            'slug'          => 'husky-siberiano-filhote-com-pedigree',
            'description'   => 'O Husky Siberiano é um cachorro que vem conquistando o Brasil. Um filhote dessa raça tem uma faixa de preço que varia bastante, principalmente os exemplares mais raros. A procura por ele aumentou tanto com sua presença na mídia, que gerou um certo aumento nos preços dos filhotes.',
            'price'         => 3200.00,
            'url'           => 'https://www.j&jstore.com.br',
            'variation'     => true,
            'weight'        => null,
            'width'         => null,
            'length'        => null,
            'height'        => null,
        ]);
    }
}
