<?php

namespace Database\Seeders;

use App\Enums\PaymentType;
use App\Enums\StatusWithdrawType;
use Illuminate\Database\Seeder;
use App\Models\Withdraw;
use Illuminate\Support\Str;

class WithdrawTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Withdraw::create([
            'bank_account_id' => 1,
            'wallet_id' => 1,
            'status' => StatusWithdrawType::PAGO(),
            'payment_type' => PaymentType::AUTOMATICO(),
            'value_withdraw' => 5347.00,
            'code' => Str::random(6),
            'payment_date' => '2022-08-08',
        ]);

        Withdraw::create([
            'bank_account_id' => 2,
            'wallet_id' => 2,
            'status' => StatusWithdrawType::PAGO(),
            'payment_type' => PaymentType::AUTOMATICO(),
            'value_withdraw' => 200,
            'code' => Str::random(6),
            'payment_date' => '2022-09-02',
            'created_at' => '2022-09-02',
        ]);

        Withdraw::create([
            'bank_account_id' => 2,
            'wallet_id' => 2,
            'status' => StatusWithdrawType::PAGO(),
            'payment_type' => PaymentType::AUTOMATICO(),
            'value_withdraw' => 100,
            'code' => Str::random(6),
            'payment_date' => '2022-08-08',
            'created_at' => '2022-08-08',
        ]);

        Withdraw::create([
            'bank_account_id' => 2,
            'wallet_id' => 2,
            'status' => StatusWithdrawType::PAGO(),
            'payment_type' => PaymentType::MANUAL(),
            'value_withdraw' => 150,
            'code' => Str::random(6),
            'payment_date' => '2022-07-07',
            'created_at' => '2022-07-07',
        ]);

        Withdraw::create([
            'bank_account_id' => 2,
            'wallet_id' => 2,
            'status' => StatusWithdrawType::CANCELADO(),
            'payment_type' => PaymentType::AUTOMATICO(),
            'value_withdraw' => 100,
            'code' => Str::random(6),
            'payment_date' => '2022-08-08',
            'created_at' => '2022-08-08',
        ]);

        Withdraw::create([
            'bank_account_id' => 2,
            'wallet_id' => 2,
            'status' => StatusWithdrawType::PENDENTE(),
            'payment_type' => PaymentType::AUTOMATICO(),
            'value_withdraw' => 150,
            'code' => Str::random(6),
            'payment_date' => '2022-06-06',
            'created_at' => '2022-06-06',
        ]);
    }
}
