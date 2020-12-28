<?php

namespace App\Http\Livewire\Partials;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class CartIcon extends Component
{    
    public $listeners = ['cartCountRefresh' => 'render'];
    
    public function render()
    {
        return view('livewire.partials.cart-icon')->with('count',  Auth::user()->pendingCourses->count());
    }
}
