<?php

namespace App\Http\Livewire\Payment;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;
    
    public function render()
    {
        return view('livewire.payment.datatable', [
            'payments' => Payment::latest()->paginate(10),
        ]);
    }
}
