<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;
use Illuminate\Support\Facades\Hash;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::create([
            'store'         => 'Cariri Store',
            'slug'          => 'cariri-store',
            'url'           => 'https://boomp.com.br/checkout/cariri-store',
            'user_id'       => 2,
            'dominioshopify'=> 'teste.cariri-store.com',
            'apikeyapp'     => 'cariri-apikeyapp',
            'passwordapp'   => 'cariri-passwordapp',
            'email'         => 'cariri@cariristore.com.br',
        ]);

        Store::create([
            'store'         => 'J & J Store',
            'slug'          => 'j&j-store',
            'url'           => 'j&j-store.bcomp.io',
            'user_id'       => 3,
            'dominioshopify'=> 'teste.jj-store.com',
            'apikeyapp'     => 'jj-apikeyapp',
            'passwordapp'   => 'jj-passwordapp',
            'email'         => 'jj@jjstore.com.br',
        ]);
    }
}
