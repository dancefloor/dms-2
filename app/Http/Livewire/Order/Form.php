<?php

namespace App\Http\Livewire\Order;

use App\Models\Course;
use App\Models\Order;
use App\Models\Registration;
use App\Services\RegistrationManager;
use App\Services\OrderPriceCalculator;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class Form extends Component
{
    public $action;
    public $order;
    public $user_id;
    public $method;
    public $status;
    public $coupon_code;
    public $discount;
    public $subtotal;
    public $vat;
    public $total;
    public $comments;
    public $author_id;
    public $courses;
    public $cids;

    public function updatedCids()
    {
        $amount = 0;
        foreach ($this->cids as $c) {
            $course = Course::findOrFail($c);
            $amount += $course->full_price;
        }
        $this->subtotal = $amount;
        $this->total = OrderPriceCalculator::getTotal($this->subtotal, $this->discount, 0);  
    }

    public function updatedDiscount($value)
    {
        if ($value == "") {
            $this->discount = 0;
        }
        $this->total = OrderPriceCalculator::getTotal($this->subtotal, $this->discount, 0);
    }    
       
    public function create()
    {

        $newOrder = Order::create([
            'user_id'       => $this->user_id,
            'method'        => $this->method,
            'status'        => $this->status,
            'coupon_code'   => $this->coupon_code,
            'discount'      => $this->discount,
            'subtotal'      => $this->subtotal,
            'vat'           => $this->vat,
            'total'         => $this->total,
            'comments'      => $this->comments,
            'author_id'     => auth()->user()->id,
        ]);


        $newOrder->courses()->attach($this->cids);

        foreach ($this->cids as $id) {            
            $registration = Registration::where('course_id', $id)
                ->where('user_id', $this->user_id)
                ->where('role', 'student')
                ->first();
            if ($registration ==  null) {
                $course = Course::findOrFail($id);
                $course->students()->attach($this->user_id, ['role'=>'student', 'status'=>'open', 'created_at'=> now()]);
                $registration = Registration::where('course_id', $course->id)
                ->where('user_id', $this->user_id)
                ->where('role', 'student')
                ->first();
            }

            $newOrder->registrations()->save($registration);

            RegistrationManager::registrationToOpen($registration->id);
        }

        session()->flash('success', 'Order created successfully.');

        return redirect()->route('orders.index');
    }

    public function update()
    {
        $this->order->update([
            'user_id'       => $this->user_id,
            'method'        => $this->method,
            'status'        => $this->status,
            'coupon_code'   => $this->coupon_code,
            'discount'      => $this->discount,
            'subtotal'      => $this->subtotal,
            'vat'           => $this->vat,
            'total'         => $this->total,
            'comments'      => $this->comments,
            'author_id'     => auth()->user()->id,
        ]);       
        
        if ($this->cids) {

            $this->order->courses()->sync($this->cids);
            
            foreach ($this->cids as $cid) {            
                $registration = $this->getRegistration($cid);
                if ($registration) {
                    $this->order->registrations()->save($registration);    
                } else {
                    $course = Course::find($cid);
                    $course->students()->attach($this->user_id, ['role'=>'student', 'status'=>'pre-registered', 'created_at'=> now()]);
                    $registration = $this->getRegistration($cid);
                }
                
                RegistrationManager::registrationToOpen($registration->id);
            }
        }

        session()->flash('success', 'Order updated successfully.');

        return redirect()->route('orders.index');
    }

    public function mount($action, $order =  null)
    {
        $this->action = $action;
        if ($order) {
            $this->order        = $order;
            $this->user_id      = $order->user_id;
            $this->method       = $order->method;
            $this->status       = $order->status;
            $this->coupon_code  = $order->coupon_code;
            $this->discount     = $order->discount;
            $this->subtotal     = $order->subtotal;
            $this->vat          = $order->vat;
            $this->total        = $order->total;
            $this->comments     = $order->comments;
            $this->author_id    = $order->author_id;
            $this->courses      = $order->courses;
        }
    }

    public function getRegistration($id)
    {
        return Registration::where('course_id', $id)
            ->where('user_id', $this->user_id)
            ->where('role', 'student')
            ->first();
    }

    public function render()
    {
        return view('livewire.order.form');
    }
}
