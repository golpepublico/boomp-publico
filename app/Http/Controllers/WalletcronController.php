<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\WalletTransaction;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

const PIX_BOLETO_PARAMS = 2;
const CREDIT_PARAMS = 14;

class WalletcronController extends Controller
{
    public function transaction(Request $request)
    {
        $headers = $request->header();
        $today = Carbon::now()->isoFormat('YYYY-MM-DD');

        $transactions = WalletTransaction::where([
            'blocked' => true,
            'transaction_type' => 1
        ])->get();

        foreach ($transactions as $t => $transaction) {
            $datetime1 = new DateTime($transaction->created_at->format('Y-m-d'));
            $datetime2 = new DateTime($today);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');

            if ($transaction->billingType === '0' || $transaction->billingType === '2') {
                if ($days >= PIX_BOLETO_PARAMS) {
                    $wallet = Wallet::where('id', $transaction->wallet_id)->first();
                    $wallet->balance += $transaction->value;
                    // $wallet->balance_history += $transaction->value;
                    $wallet->save();

                    $transaction->blocked = false;
                    $transaction->save();
                    Log::info("Saldo disponibilizado para $transaction->id wallet $transaction->wallet_id");
                }
            }

            if ($transaction->billingType === '1') {
                if ($days >= CREDIT_PARAMS) {
                    $wallet = Wallet::where('id', $transaction->wallet_id)->first();
                    $wallet->balance += $transaction->value;
                    // $wallet->balance_history += $transaction->value;
                    $wallet->save();

                    $transaction->blocked = false;
                    $transaction->save();
                    Log::info("Saldo disponibilizado para $transaction->id wallet $transaction->wallet_id");
                }
            }
        }


        return \response()->json([
            'status' => '1100', //token invalido
        ], Response::HTTP_OK);
    }
}
