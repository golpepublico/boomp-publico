<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BankAccount;

class BankAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        BankAccount::create([
            'user_id' => 1,
            'bank_id' => 4,
            'account_holder' => 'William Belchior',
            'agency' => '0001',
            'account' => '125478966-9',
            'cpfCnpj' => '75331724000',
        ]);
        
        BankAccount::create([
            'user_id' => 2,
            'bank_id' => 5,
            'account_holder' => 'Billy Kidd',
            'agency' => '0744-5',
            'account' => '12478965-4',
            'cpfCnpj' => '42453181000151',
        ]);

        BankAccount::create([
            'user_id' => 3,
            'bank_id' => 2,
            'account_holder' => 'Julio de Janaína',
            'agency' => '0877-9',
            'account' => '66897964-8',
            'cpfCnpj' => '37799105860',
        ]);
    }
}
