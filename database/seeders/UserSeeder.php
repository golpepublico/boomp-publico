<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'          => 'admin',
            'email'         => 'admin@mail.com',
            'mobilePhone'   => '11999887722',
            'cpfCnpj'       => '75331724000',
            'password'      => Hash::make('password'),
        ]);

        $user->store()->create([
            'store'         => "Admin's Store",
            'slug'          => 'admin-store',
            'url'           => 'www.adminstore.com.br',
            'dominioshopify'=> 'teste.shopify.com',
            'apikeyapp'     => 'admin-store-apikeyapp',
            'passwordapp'   => 'admin-store-passwordapp',
            'email'         => 'admin@adminstore.com.br',
        ]);

        User::create([
            'name'          => 'Billy Kidd',
            'email'         => 'kidd.v.r@gmail.com',
            'mobilePhone'   => '11999887733',
            'cpfCnpj'       => '42453181000151',
            'password'      => Hash::make('123123'),
            'created_at'    => '2022-10-10 23:46:05',
        ]);

        User::create([
            'name'          => 'Julio Janaina',
            'email'         => 'julio@gmail.com',
            'mobilePhone'   => '11948826911',
            'cpfCnpj'       => '37799105860',
            'password'      => Hash::make('123123'),
            'created_at'    => '2022-10-10 23:46:05',
        ]);
    }
}
