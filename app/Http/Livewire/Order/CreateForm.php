<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class CreateForm extends Component
{
    public $user;
    public $status = 'open';
    

    public function create()
    {                
        $order = Order::create([
            'user_id'   => $this->user[0],
            'status'    => $this->status,            
            'author_id' => auth()->user()->id,
        ]);

        return redirect()->route('orders.edit', $order);
    }

    public function mount(int|null $uid)
    {        
        if ($uid != null) {
            $this->user = $uid;            
        }
    }
    
    public function render()
    {
        return view('livewire.order.create-form');
    }
}
