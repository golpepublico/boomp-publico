<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            StoreSeeder::class,
            RoleSeeder::class,
            CategoriesSeeder::class,
            ProductsSeeder::class,
            UFsSeeder::class,
            CustomersSeeder::class,
            CouponsTableSeeder::class,
            OrderSeeder::class,
            PixelSeeder::class,
            BankTableSeeder::class,
            BankAccountsTableSeeder::class,
            WalletTableSeeder::class,
            WithdrawTableSeeder::class,
            WalletTransactionTableSeeder::class,
        ]);
    }
}
