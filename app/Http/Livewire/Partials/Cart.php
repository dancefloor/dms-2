<?php

namespace App\Http\Livewire\Partials;

use App\Models\Course;
use Livewire\Component;
use App\Services\OrderPriceCalculator;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{
    public $subtotal = 0;
    public $total = 0;
    public $method;
    public $count;
    public $discount = 0;        
    public $discountText;
    public $commission = 0;
    public $title;

    protected $listeners = [
        'subtotalUpdated' => 'removeCourse',
    ];

    public function mount()
    {
        $this->subtotal = OrderPriceCalculator::getSubtotal(Auth::id(), Auth::user()->pendingCourses);          
        $this->count = count(Auth::user()->pendingCourses);
        // $this->discount = OrderPriceCalculator::getDiscount($this->count,$this->subtotal);
        $this->discount = 0;        
        $this->total = OrderPriceCalculator::getTotal($this->subtotal, $this->discount, 0);                
        $this->discountText = OrderPriceCalculator::getDiscountText($this->count);
        $this->title = OrderPriceCalculator::getTitle(Auth::user()->pendingCourses);             
    }

    public function updatedMethod($value)
    {        
        $this->method = $value;
        $this->commission = OrderPriceCalculator::getCommission($this->method, $this->subtotal);
        $this->total = OrderPriceCalculator::getTotal($this->subtotal, $this->discount, $this->commission);
        $this->emit('cartCountRefresh');   
    }

    public function removeCourse(Course $course)
    {                
        $course->students()->detach(auth()->user()->id);

        $this->subtotal = OrderPriceCalculator::getSubtotal(Auth::id(), Auth::user()->pendingCourses);        
        $this->total = OrderPriceCalculator::getTotal($this->subtotal, $this->discount, 0);            

        session()->flash('success', 'You have remove this class from your list successfully'); 
        $this->emit('cartCountRefresh');          
    }

    public function render()
    {
        return view('livewire.partials.cart');
    }

    
}
