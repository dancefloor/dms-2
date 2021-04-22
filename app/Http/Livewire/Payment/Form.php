<?php

namespace App\Http\Livewire\Payment;

use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Services\RegistrationManager;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Form extends Component
{
    public $action;
    public $payment;
    public $code;
    public $provider;
    public $method;
    public $amount;
    public $amount_received;
    public $currency;
    public $mollie_payment_id;
    public $status;
    public $received_date;
    public $comments;
    public $user_id = '';
    public $order_id = '';
    
    // public $users;
    // public $orders;

    public function create()
    {
        
        $payment = new Payment;
        $payment->code = $this->code;
        $payment->provider = $this->provider;
        $payment->method = $this->method;
        $payment->amount = $this->amount;
        $payment->amount_received = $this->amount_received;
        $payment->currency = $this->currency;
        $payment->mollie_payment_id = $this->mollie_payment_id;
        $payment->status = $this->status;
        $payment->received_date = $this->received_date;
        $payment->comments = $this->comments;
        
        $payment->order()->associate($this->order_id);
        $payment->user()->associate($this->user_id); 
        $payment->save();                 

        $status = RegistrationManager::updateOrder($this->order_id);
        
        // Mail::to(auth()->user()->email)->send(new RegistrationPaymentConfirmation($status));

        session()->flash('success','Payment created successfully');

        return redirect()->route('payments.index');
    }

    public function update()
    {
        $this->payment->update([
            'code'              => $this->code,
            'provider'          => $this->provider,
            'method'            => $this->method,
            'amount'            => $this->amount,
            'amount_received'   => $this->amount_received,
            'currency'          => $this->currency,
            'mollie_payment_id' => $this->mollie_payment_id,
            'status'            => $this->status,
            'received_date'     => $this->received_date,
            'comments'          => $this->comments,
            'user_id'           => $this->user_id,
            'order_id'          => $this->order_id,
        ]);

        $status = RegistrationManager::updateOrder($this->order_id);

        session()->flash('success','Payment created successfully');        

        return redirect()->route('payments.index');
    }

    public function mount($action, $payment = null, $uid = null, $oid = null)
    {
        $this->action = $action;
        if ($payment) {
            $this->code             = $payment->code;
            $this->provider         = $payment->provider;
            $this->method           = $payment->method;
            $this->amount           = $payment->amount;
            $this->amount_received  = $payment->amount_received;
            $this->currency         = $payment->currency;
            $this->mollie_payment_id= $payment->mollie_payment_id;
            $this->status           = $payment->status;
            $this->received_date    = $payment->received_date;
            $this->comments         = $payment->comments;
            $this->user_id          = $payment->user_id;
            $this->order_id         = $payment->order_id;
        }
        if ($uid) {
            $this->user_id = $uid;
        }        
        if ($oid) {            
            $this->order_id = $oid;
            $order = Order::find($oid);
            $this->user_id = $order->user_id;
        }
    }    

    public function render()
    {
        return view('livewire.payment.form', [
            'users' => User::whereHas('orders', function (Builder $query){
                $query->where('status','open');
            })->get(),
            'orders' => Order::byUserID($this->user_id)->isUnpaid()->get()            
        ]);
    }
}




