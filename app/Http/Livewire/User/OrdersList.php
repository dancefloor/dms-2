<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrdersList extends Component
{
    use WithPagination;
    public $user;
    
    public function mount($user)
    {
        $this->user = $user;        
    }

    public function render()
    {
        $orders = Order::where('user_id', $this->user)->paginate(10);
        return view('livewire.user.orders-list', ['orders' => $orders]);
    }
}
