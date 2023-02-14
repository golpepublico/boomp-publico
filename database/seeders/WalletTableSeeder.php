<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Seeder;

class WalletTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach ($users as $user) {
            $wallet = Wallet::create([
                'user_id' => $user->id,
                'balance' => 0.00,
                'balance_history' => 0.00,
            ]);
            $wallet->save();
        }
    }
}
