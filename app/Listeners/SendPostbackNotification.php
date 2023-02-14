<?php

namespace App\Listeners;

use App\Events\PostbackEvent;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class SendPostbackNotification
{
    private $order;
    private $orderDataSend;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostbackEvent  $event
     * @return void
     */
    public function handle(PostbackEvent $event)
    {
        $this->order = $event->getOrder();

        $this->orderDataSend = [
            'customer' => [
                'name' => $this->order->customer->name,
                'email' => $this->order->customer->email,
                'mobilePhone' => $this->order->customer->mobilePhone,
            ],
            'order' => [
                'billingType' => $this->order->billingType,
                'value' => $this->order->value,
                'status' => $this->order->status->description,
                'product' => $this->order->product->name,
                'payment_date' => isset($this->order->payment_date) ? $this->order->payment_date : null
            ],
            'store' => $this->order->store->store,
        ];

        try {
            if (is_null($this->order->product->postback)) {
                throw new Exception("Produto {$this->order->product->name} não tem url de callback cadastrada");
            }

            $response = Http::post($this->order->product->postback->callbackurl, $this->orderDataSend);

            $this->setLog($response);
        } catch (Exception $e) {
            $this->setLog($e->getMessage());
        }
    }

    private function setLog($message)
    {
        $log = [
            'callbackurl' => $this->order->product->postback->callbackurl ?? null,
            'message' => $message,
            'orderData' => $this->orderDataSend,
        ];
        Log::Info("PostbackData: " . json_encode($log));
    }
}
