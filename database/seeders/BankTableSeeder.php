<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = [
            '001' => 'Banco do Brasil',
            '033' => 'Banco Santander (Brasil)',
            '104' => 'Caixa Econômica Federal',
            '237' => 'Banco Bradesco',
            '260' => 'Banco Nubank',
            '077' => 'Banco Inter',
            '341' => 'Banco Itaú', 
        ];

        foreach ($banks as $code => $name) {
            DB::table('banks')->insert([
                'code' => $code,
                'name' => $name,
            ]);
        }
    }
}
