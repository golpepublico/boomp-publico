<?php

namespace Database\Seeders;

use App\Models\Customers;
use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customers::create([
            'customer_id_asaas' => 'cus_000004963692',
            'name' => 'José da Silva',
            'cpfcnpj' => '30602155029',
            'mobilePhone' => '11987684562',
            'email' => 'cliente@gmail.com',
        ]);

        Customers::create([
            'customer_id_asaas' => 'cus_000001231231',
            'name' => 'Mari Juana',
            'cpfcnpj' => '96007190048',
            'mobilePhone' => '11956881232',
            'email' => 'marijuana@gmail.com',
        ]);

        Customers::create([
            'customer_id_asaas' => 'cus_00000145681',
            'name' => 'Glaubin Júnior',
            'cpfcnpj' => '98895267001',
            'mobilePhone' => '19897881232',
            'email' => 'glaubinjr@gmail.com',
        ]);

        Customers::create([
            'customer_id_asaas' => 'cus_000004975181',
            'name' => 'Billy Kidd Júnior',
            'cpfcnpj' => '68163800020',
            'mobilePhone' => '88999017940',
            'email' => 'kidd.v.r@gmail.com',
        ]);

        Customers::create([
            'customer_id_moip' => 'CUS-P02AFMEFOOGS',
            'name' => 'Maria Clara',
            'cpfcnpj' => '71463473036',
            'mobilePhone' => '88999015555',
            'email' => 'mariaclara@gmail.com',
        ]);
    }
}
