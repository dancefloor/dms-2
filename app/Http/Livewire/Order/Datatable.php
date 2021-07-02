<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;
    public User $user;
   
    
    public function mount(User $user = null)
    {
        $this->user = $user;
    }

    public function render()
    {
        
        if ($this->user->exists) {        
            $orders = Order::where('user_id', $this->user->id)->latest()->paginate(10);
        }else{
            $orders = Order::latest()->paginate(10);
        }
        return view('livewire.order.datatable', [
            'orders' => $orders,
        ]);
    }
}
