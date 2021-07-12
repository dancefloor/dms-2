<?php

namespace App\Http\Livewire\Partials;


use App\Mail\OrderRegistrationConfirmation;
use App\Models\Course;
use App\Models\Order;
use App\Models\Registration;
use Livewire\Component;
use App\Services\OrderPriceCalculator;
use App\Services\RegistrationManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Checkout extends Component
{
    public $subtotal = 0;
    public $total = 0;
    public $method;
    public $count;
    public $reducedPrice = 0;
    public $discount = 0;        
    public $discountText;
    public $commission = 0;
    public $title;
    
    protected $listeners = [
        'subtotalUpdated' => 'removeCourse',
    ];

    public function mount()
    {
        $this->reducedPrice = auth()->user()->work_status != 'working' ? 20:0;
        $this->subtotal = OrderPriceCalculator::getSubtotal(Auth::id(), Auth::user()->pendingCourses);          
        $this->count = count(Auth::user()->pendingCourses);
        $this->discount = OrderPriceCalculator::getDiscount($this->count,$this->subtotal);        
        $this->total = OrderPriceCalculator::getTotal($this->subtotal, $this->discount, $this->reducedPrice, $this->commission, 0);                
        $this->discountText = OrderPriceCalculator::getDiscountText($this->count);
        $this->title = OrderPriceCalculator::getTitle(Auth::user()->pendingCourses);             
    }

    public function storeOrder()
    {        
        $order = Order::create([
            'subtotal'              => $this->subtotal,
            'vat'                   => null,
            'discount'              => $this->discount,
            'coupon_code'           => null,
            'reduction'             => $this->reducedPrice,
            'total'                 => $this->total,
            'comments'              => null,
            'status'                => 'open',
            'user_id'               => auth()->user()->id,
            'author_id'             => auth()->user()->id,
        ]);

        $courses = auth()->user()->pendingCourses()->pluck('course_id')->toArray();        
        if ($courses) {                
            $order->courses()->attach($courses);         
            foreach ($courses as $id) {
                $registration = Registration::where('course_id', $id)
                    ->where('user_id', auth()->user()->id)
                    ->where('role', 'student')
                    ->first();                                            

                $registration->status = 'open';
                $registration->save();
                $order->status = 'open';                 
                $order->save();
                $order->registrations()->save($registration);
                // RegistrationManager::registrationToOpen($registration->id);
            }                  
        }
                
        session()->flash('sucess','success');
        Mail::to(auth()->user()->email)->send(new OrderRegistrationConfirmation($order->status)); 
        
        return redirect()->route('order.confirmation', ['order' => $order, 'method'=> $this->method]);
    }

    public function updatedMethod($value)
    {        
        $this->method = $value;
        $this->commission = OrderPriceCalculator::getCommission($this->method, $this->subtotal);
        $this->total = OrderPriceCalculator::getTotal($this->subtotal, $this->discount, $this->reducedPrice,$this->commission);
        $this->emit('cartCountRefresh');   
    }

    public function removeCourse(Course $course)
    {                
        $course->students()->detach(auth()->user()->id);

        $this->subtotal = OrderPriceCalculator::getSubtotal(Auth::id(), Auth::user()->pendingCourses); 
        $this->count = count(Auth::user()->pendingCourses);
        $this->discount = OrderPriceCalculator::getDiscount($this->count,$this->subtotal);  
        $this->discountText = OrderPriceCalculator::getDiscountText($this->count);     
        $this->total = OrderPriceCalculator::getTotal($this->subtotal, $this->discount, 0);            

        session()->flash('success', 'You have remove this class from your list successfully'); 
        $this->emit('cartCountRefresh');          
    }

    public function render()
    {
        return view('livewire.partials.checkout');
    }
}