<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $status;
    public $amount;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($status, $amount)
    {
        $this->status = $status;
        $this->amount = $amount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        return $this->from('info@dancefloor.family')
        ->markdown('mail.payment-confirmation');
    }
}
