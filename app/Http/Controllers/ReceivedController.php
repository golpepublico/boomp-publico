<?php

namespace App\Http\Controllers;

use App\Enums\StatusOrderType;
use App\Enums\TransactionType;
use App\Mail\ReceivedMailer;
use App\Models\Order;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use CodePhix\Asaas\Asaas;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Nette\Utils\Json;

const PAYMENT_RECEIVED = 'PAYMENT_RECEIVED';
const PAYMENT_AUTHORIZED = 'PAYMENT.AUTHORIZED';
const PAYMENT_CANCELED_MOIP = 'PAYMENT.CANCELLED';
const REFUND_REQUESTED = 'REFUND.COMPLETED';

class ReceivedController extends Controller
{

    // protected $asaasMdl;

    // public function __construct()
    // {
    //     $this->asaasMdl = new Asaas(env('ASAAS_SECRET_KEY'), env('ASSAS_AMBIENTE'));
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statusPayment(Request $request)
    {
        $token = $request->header('asaas-access-token');
        $headers = $request->header();
        if ($token != env('ASAAS_TOKEN')) {
            Log::info(Json::encode(["erro" => "token invalido {$token}", 'headers' => $headers]));
            return \response()->json([
                'status' => '1120', //token invalido
            ], Response::HTTP_OK);
        }

        $data = json_decode($request->getContent());
        Log::info(Json::encode(['webhook-payment-status' => $data]));
        if (!empty($data->event) && $data->event === PAYMENT_RECEIVED) {

            $order = Order::where('payment_id_asaas', $data->payment->id)->first();
            if (!empty($order)) {
                // if ($data->payment->billingType === 'CREDIT_CARD') {
                //     $antecipacao = [
                //         'payment' => $data->payment->id
                //     ];
                //     $ret = $this->asaasMdl->antecipacao->create($antecipacao);
                // }
                $billingWallet = $order->billingType->value;

                $order->status = StatusOrderType::PAGO;
                $order->save();
                $wallet = Wallet::where('user_id', $order->store->user_id)->first();
                if (!isset($wallet->id)) {
                    Log::info("criado wallet para cliente " . $order->store->user_id);
                    $wallet = Wallet::create([
                        'user_id' => $order->store->user_id,
                        'balance' => 0.00,
                    ]);
                    $wallet->save();
                }

                WalletTransaction::create([
                    'wallet_id' => $wallet->id,
                    'title' => 'Creditado valor do pedido',
                    'description' => 'Nº do pedido: #' . $order->payment_id_asaas,
                    'transaction_type' => TransactionType::CREDITO,
                    'value' => $order->netValue,
                    'balance' => $wallet->balance_history + $order->netValue,
                    'blocked' => true,
                    'billingType' => $billingWallet,
                ]);

                $wallet->balance_history += $order->netValue;
                $wallet->save();

                Mail::to($order->customer->email)->send(new ReceivedMailer($order, $data));
            } else {
                Log::info(Json::encode(['webhook-payment-status' => 'ID de pagamento não encontrado: ' . $data->payment->id]));
            }
        }

        return \response()->json([
            'status' => '1100', //OK
        ], Response::HTTP_OK);
    }

    public function statusPaymentCredit(Request $request)
    {
        $headers = $request->header();
        $data = json_decode($request->getContent());
        $token = $request->header('authorization');
        if ($token != env('MOIP_TOKEN_WEBHOOK')) {
            Log::info(Json::encode(["erro" => "MOIP TOKEN WEBHOOK invalido {$token}", 'headers' => $headers]));
            return \response()->json([
                'status' => '1120', //token invalido
            ], Response::HTTP_UNAUTHORIZED);
        }

        if (isset($data->event) && $data->event === PAYMENT_CANCELED_MOIP) {
            //PAGAMENTO MOIP CANCELADO
            $order = Order::where('payment_id_moip', $data->resource->payment->id)->first();
            if (!empty($order)) {
                $order->status = StatusOrderType::CANCELADO;
                $order->save();
                Log::info("ORDER CANCELADO $order->payment_id_moip");
            }
        }

        if (isset($data->event) && $data->event === PAYMENT_AUTHORIZED) {
            //PAGAMENTO MOIP AUTORIZADO

            $order = Order::where('payment_id_moip', $data->resource->payment->id)->first();
            if (!empty($order)) {
                $billingWallet = $order->billingType->value;

                // if($order->status->value == StatusOrderType::PAGO){
                //     Log::info(Json::encode(["erro" => "Order ja esta com status pago " . $order->id]));
                //     return \response()->json([
                //         'status' => '1140', //token invalido
                //     ], Response::HTTP_UNAUTHORIZED);
                // }
                $netValue = $data->resource->payment->amount->liquid / 100;
                $order->status = StatusOrderType::PAGO;
                $order->netValue = $netValue;
                $order->save();

                $wallet = Wallet::where('user_id', $order->store->user_id)->first();
                if (!isset($wallet->id)) {
                    Log::info("criado wallet para cliente " . $order->store->user_id);
                    $wallet = Wallet::create([
                        'user_id' => $order->store->user_id,
                        'balance' => 0.00,
                    ]);
                    $wallet->save();
                }

                WalletTransaction::create([
                    'wallet_id' => $wallet->id,
                    'title' => 'Creditado valor do pedido',
                    'description' => 'Nº do pedido: #' . $order->payment_id_moip,
                    'transaction_type' => TransactionType::CREDITO,
                    'value' => $netValue,
                    'balance' => $wallet->balance_history + $netValue,
                    'blocked' => true,
                    'billingType' => $billingWallet,
                ]);

                $wallet->balance_history += $netValue;
                $wallet->save();
                Mail::to($order->customer->email)->send(new ReceivedMailer($order, $data));
            } else {
                Log::info(Json::encode(['webhook-payment-status' => 'ID de pagamento não encontrado: ' .  $data->resource->payment->id]));
            }
        }

        if (isset($data->resource->refund->_links->payment->title) && $data->event === REFUND_REQUESTED) {
            //PAGAMENTO MOIP REVERTIDO

            $order = Order::where('payment_id_moip', $data->resource->refund->_links->payment->title)->first();
            if (!empty($order)) {
                $billingWallet = $order->billingType->value;
                $order->status = StatusOrderType::ESTORNADO;
                $order->save();

                $wallet = Wallet::where('user_id', $order->store->user_id)->first();

                WalletTransaction::create([
                    'wallet_id' => $wallet->id,
                    'title' => 'Estornado valor do pedido',
                    'description' => 'Nº do pedido: #' . $order->payment_id_moip,
                    'transaction_type' => TransactionType::DEBITO,
                    'value' => $order->value,
                    'balance' => $wallet->balance - $order->value,
                    'blocked' => false,
                    'billingType' => $billingWallet,
                ]);

                $wallet->balance -= $order->value;
                $wallet->balance_history -= $order->value;
                $wallet->save();
                Log::info("PAGAMENTO REVERTIDO $order->payment_id_moip");
                //Mail::to($order->customer->email)->send(new ReceivedMailer($order, $data));
            } else {
                Log::info(Json::encode(['webhook-payment-status' => 'ID de pagamento não encontrado: ' . $data->resource->refund->_links->payment->title]));
            }
        }

        Log::info(Json::encode(["MOIP" => "MOIP WEBHOOK", 'headers' => $headers, 'data' => $data]));

        return \response()->json([
            'status' => '1100', //OK
        ], Response::HTTP_OK);
    }
}
