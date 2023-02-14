<?php

namespace Database\Seeders;

use App\Enums\StatusOrderType;
use App\Enums\StatusWithdrawType;
use App\Enums\TransactionType;
use App\Models\Order;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use App\Models\Withdraw;
use Illuminate\Database\Seeder;

class WalletTransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wallets = Wallet::all();
        foreach ($wallets as $wallet) {
            $orders = Order::join('stores', 'stores.id', '=', 'orders.store_id')
                ->where('stores.user_id', $wallet->user_id)
                ->where('orders.status', StatusOrderType::PAGO)
                ->select('orders.*')
                ->get();

            foreach ($orders as $order) {
                $walletTransaction = WalletTransaction::create([
                    'wallet_id' => $wallet->id,
                    'title' => 'Creditado valor do pedido',
                    'description' => 'Nº do pedido: #' . $order->payment_id_asaas,
                    'transaction_type' => TransactionType::CREDITO,
                    'value' => $order->value,
                    'balance' => $wallet->balance_history + $order->value,
                    'billingType' => 1,
                    'blocked' => false
                ]);
                $walletTransaction->save();

                $wallet->balance += $order->value;
                $wallet->balance_history += $order->value;
                $wallet->save();
            }
        }

        foreach ($wallets as $wallet) {
            $walletWithdraws = Withdraw::join('bank_accounts', 'bank_accounts.id', '=', 'withdraws.bank_account_id')
                ->join('banks', 'banks.id', '=', 'bank_accounts.bank_id')
                ->where('bank_accounts.user_id', $wallet->user_id)
                ->where('withdraws.status', StatusWithdrawType::PAGO)
                ->select('withdraws.*', 'bank_accounts.account_holder', 'bank_accounts.agency', 'bank_accounts.account', 'bank_accounts.cpfCnpj', 'banks.name as bank_name')
                ->get();

            foreach ($walletWithdraws as $walletWithdraw) {
                $walletTransaction = WalletTransaction::create([
                    'wallet_id' => $walletWithdraw->wallet_id,
                    'title' => 'Debitado valor do saque',
                    'description' => 'Transferido para: ('. $walletWithdraw->bank_name.' - Ag.: ' . $walletWithdraw->agency . ' - Conta: ' . $walletWithdraw->account . ')',
                    'transaction_type' => TransactionType::DEBITO,
                    'value' => $walletWithdraw->value_withdraw,
                    'balance' => $wallet->balance_history - $walletWithdraw->value_withdraw,
                    'blocked' => false
                ]);
                $walletTransaction->save();

                $wallet->balance -= $walletWithdraw->value_withdraw;
                $wallet->balance_history -= $walletWithdraw->value_withdraw;
                $wallet->save();
            }
        }
    }
}
