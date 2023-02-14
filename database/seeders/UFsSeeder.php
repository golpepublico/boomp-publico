<?php

namespace Database\Seeders;

use App\Models\UFs;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UFsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ufs = [
            [
                'nome' => 'Paraná',
                'sigla' => 'PR',
                'regiao' => 'Sul'
            ],
            [
                'nome' => 'Rio Grande do Sul',
                'sigla' => 'RS',
                'regiao' => 'Sul'
            ],
            [
                'nome' => 'Santa Catarina',
                'sigla' => 'SC',
                'regiao' => 'Sul'
            ],

            [
                'nome' => 'São Paulo',
                'sigla' => 'SP',
                'regiao' => 'Sudeste'
            ],
            [
                'nome' => 'Espírito Santo',
                'sigla' => 'ES',
                'regiao' => 'Sudeste'
            ],
            [
                'nome' => 'Minas Gerais',
                'sigla' => 'MG',
                'regiao' => 'Sudeste'
            ],
            [
                'nome' => 'Rio de Janeiro',
                'sigla' => 'RJ',
                'regiao' => 'Sudeste'
            ],

            [
                'nome' => 'Alagoas',
                'sigla' => 'AL',
                'regiao' => 'Nordeste'
            ],
            [
                'nome' => 'Bahia',
                'sigla' => 'BA',
                'regiao' => 'Nordeste'
            ],
            [
                'nome' => 'Ceará',
                'sigla' => 'CE',
                'regiao' => 'Nordeste'
            ],
            [
                'nome' => 'Distrito Federal',
                'sigla' => 'DF',
                'regiao' => 'Centro-Oeste'
            ],
            [
                'nome' => 'Goiás',
                'sigla' => 'GO',
                'regiao' => 'Centro-Oeste'
            ],
            [
                'nome' => 'Mato Grosso',
                'sigla' => 'MT',
                'regiao' => 'Centro-Oeste'
            ],
            [
                'nome' => 'Mato Grosso do Sul',
                'sigla' => 'MS',
                'regiao' => 'Centro-Oeste'
            ],
            [
                'nome' => 'Paraíba',
                'sigla' => 'PB',
                'regiao' => 'Nordeste'
            ],
            [
                'nome' => 'Pernambuco',
                'sigla' => 'PE',
                'regiao' => 'Nordeste'
            ],
            [
                'nome' => 'Piauí',
                'sigla' => 'PI',
                'regiao' => 'Nordeste'
            ],
            [
                'nome' => 'Rio Grande do Norte',
                'sigla' => 'RN',
                'regiao' => 'Nordeste'
            ],
            [
                'nome' => 'Sergipe',
                'sigla' => 'SE',
                'regiao' => 'Nordeste'
            ],

            [
                'nome' => 'Acre',
                'sigla' => 'AC',
                'regiao' => 'Norte'
            ],
            [
                'nome' => 'Amapá',
                'sigla' => 'AP',
                'regiao' => 'Norte'
            ],
            [
                'nome' => 'Amazonas',
                'sigla' => 'AM',
                'regiao' => 'Norte'
            ],
            [
                'nome' => 'Pará',
                'sigla' => 'PA',
                'regiao' => 'Norte'
            ],
            [
                'nome' => 'Rondônia',
                'sigla' => 'RO',
                'regiao' => 'Norte'
            ],
            [
                'nome' => 'Roraima',
                'sigla' => 'RR',
                'regiao' => 'Norte'
            ],
            [
                'nome' => 'Tocantins',
                'sigla' => 'TO',
                'regiao' => 'Norte'
            ],
        ];

        foreach ($ufs as $uf) {
            UFs::create($uf);
        }
    }
}
