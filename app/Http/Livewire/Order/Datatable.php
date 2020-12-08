<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.order.datatable', [
            'orders' => Order::paginate(10),
        ]);
    }
}
