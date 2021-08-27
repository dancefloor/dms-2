<?php

namespace App\Http\Livewire\Payment;

use App\Mail\PaymentConfirmation;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Services\RegistrationManager;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Form extends Component
{       
    public $action;
    public $payment;
    public $code;
    public $provider;
    public $method = '';
    public $type = 'in';
    public $credit;
    public $debit;
    public $amount_received;
    public $currency;
    public $mollie_payment_id;
    public $status;
    public $received_date;
    public $comments;
    public $user_id = '';
    public $order_id = '';
    
    public $users;
    public $orders;

    public function create()
    {
        $this->validate([       
            'order_id'          => 'required|integer',     
            'received_date'     => 'required|date',            
            'method'            => 'required',
            'credit'            => 'required_if:type,in',
            'debit'             => 'required_if:type,out',
            'amount_received'   => 'required',
        ]);

        DB::transaction(function () {
            $payment = new Payment;
            $payment->code      = $this->code;
            $payment->provider  = $this->provider;
            $payment->method    = $this->method;
            $payment->type      = $this->type;
            $payment->credit    = $this->credit;
            $payment->debit     = $this->debit;
            $payment->currency  = $this->currency;        
            $payment->comments  = $this->comments;
            $payment->status    = 'paid';      
            $payment->received_date     = $this->received_date;
            $payment->amount_received   = $this->amount_received;
            $payment->mollie_payment_id = $this->mollie_payment_id;        
    
            $payment->order()->associate($this->order_id);
            $payment->user()->associate($this->user_id); 
            
            $payment->save();  

            RegistrationManager::updateOrder($this->order_id);                           
    
            Mail::to(auth()->user()->email)->send(new PaymentConfirmation($payment->order->status, $payment->credit));
                            
            session()->flash('success','Payment created successfully');
        });

        return redirect()->route('payments.index');
    }

    public function updatedCredit($value)
    {
        $this->amount_received = $value;
    }

    public function update()
    {
        $this->payment->update([
            'code'              => $this->code,
            'provider'          => $this->provider,
            'method'            => $this->method,
            'type'              => $this->type,
            'credit'            => $this->credit,
            'debit'             => $this->debit,
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

    public function mount($action, $payment = null, $uid = null, $oid = null, $refund = null)
    {
        $this->action = $action;
        // $this->received_date = Carbon::now()->toDateString();
        if ($payment) {
            $this->code             = $payment->code;
            $this->provider         = $payment->provider;
            $this->method           = $payment->method;
            $this->type             = $payment->type;
            $this->credit           = $payment->credit;
            $this->debit            = $payment->debit;
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

        $this->users = User::whereHas('orders', function (Builder $query){
            $query->where('status','open')->orWhere('status','partial');
        })->get();

        $this->orders =  Order::byUserID($this->user_id)->isUnpaid()->get();
        
        if ($refund) {            
            $this->refund = $refund;
            $this->users = User::whereHas('orders', function (Builder $query){
                $query->where('status','paid')->orWhere('status','partial');
            })->get();
            $this->orders =  Order::byUserID($this->user_id)->IsRefundable()->get();
        }
    }    

    public function render()
    {
        return view('livewire.payment.form');
    }
}




