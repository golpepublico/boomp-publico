## Tecnologias utilizadas

- PHP 8.1.16
- Laravel Framework 8.83
- Mysql
- Docker (banco de dados)


## Como configurar o sistema

- composer install
- php artisan key:generate
- php artisan jwt:secret
- php artisan migrate
- cp .env.example .env


## Certifique-se que as variáveis abaixo estão preenchidas no arquivo .env

- DB_CONNECTION=
- DB_HOST=
- DB_PORT=
- DB_DATABASE=
- DB_USERNAME=
- DB_PASSWORD=
- ASAAS_SECRET_KEY=
- ASSAS_AMBIENTE=
- MOIP_TOKEN=
- MOIP_KEY=
- MOIP_PUBLIC_KEY=


## Para rodar a aplicação no servidor de desenvolvimento

- php artisan serve


## Caso dê o erro "Fatal error: Declaration of Moip\Auth\BasicAuth::register(Requests_Hooks &$hooks) must be compatible with Requests_Auth::register(Requests_Hooks $hooks)" durante o acesso do link de compra na página de produtos, deve ser feito o seguinte procedimento:

- Acessar pasta "vendor/rmccue/requests/src/Auth.php" e adicionar & antes do parametro do metodo register.
    - Ou seja, trocar "public function register(Hooks $hooks);" por "public function register(Hooks &$hooks);"
    - Referência: https://github.com/wirecardBrasil/moip-sdk-php/issues/324#issuecomment-981723421