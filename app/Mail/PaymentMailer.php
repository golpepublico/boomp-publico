<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use stdClass;

class PaymentMailer extends Mailable
{
    use Queueable, SerializesModels;
    private $paymentData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(stdClass $paymentData)
    {
        $this->paymentData = $paymentData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Pedido Aguardando Pagamento');
        $this->to($this->paymentData->to, 'Boomp');

        if(isset($this->paymentData->boleto)){
            $this->attach('../storage/app/public/' . $this->paymentData->pathFile, [
                'as' => $this->paymentData->nameFIle,
                'mime' => $this->paymentData->mime,
            ]);
            return $this->view('emails.payment', ['paymentData' => $this->paymentData]);
        }
        return $this->view('emails.payment-pix', ['paymentData' => $this->paymentData]);
    }
}
