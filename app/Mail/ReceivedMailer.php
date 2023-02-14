<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use stdClass;

class ReceivedMailer extends Mailable
{
    use Queueable, SerializesModels;
    private $order;
    private $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $data = [])
    {
        $this->order = $order;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Confirmação de Pagamento - Boomp');
        $this->to($this->order->customer->email, 'Boomp');
        $idPayment = '';
        if (!empty($this->order['payment_id_asaas'])) {
            $idPayment = $this->order['payment_id_asaas'];
        }
        if (!empty($this->order['payment_id_moip'])) {
            $idPayment = $this->order['payment_id_moip'];
        }

        return $this->view('emails.received-payment', ['order' => $this->order, 'idPayment' => $idPayment]);
    }
}
