<?php

namespace App\Http\Livewire\Order;

use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use App\Models\Registration;
use App\Services\RegistrationManager;
use App\Services\OrderPriceCalculator;
use App\Services\OrderService;
use Livewire\Component;


class Form extends Component
{
    public $action = 'store';
    public Order $order;
    public User $user;
    public $cids = [];     

    protected $listeners = ['addCourse', 'removeCourse'];

    protected $rules = [
        'order.user_id'         => 'required|int',
        'order.author_id'       => 'nullable',
        'order.method'          => 'nullable',
        'order.status'          => 'required',
        'order.coupon_code'     => 'nullable',
        'order.discount'        => 'nullable',
        'order.reduction'       => 'nullable',
        'order.adjustment'      => 'nullable',
        'order.subtotal'        => 'required',
        'order.vat'             => 'nullable',
        'order.total'           => 'required',
        'order.comments'        => 'nullable',
        'order.comments_admin'  => 'nullable',
    ];

    public function addCourse(int $cid, int $uid)
    {        
        $course = Course::findOrFail($cid);                
        $this->order->courses()->attach($course);
        $course->students()->attach($uid, ['role'=>'student', 'status'=> $this->order->status, 'order_id' => $this->order->id ]);                    
        $this->emit('courseListUpdated');
        $this->calculateAmounts();
    }

    public function removeCourse()
    {
        $this->calculateAmounts();
        $this->render();
    }

    public function calculateAmounts()
    {        
        $this->cids = OrderService::getCourseIds($this->order->id);                
        $this->order->subtotal = OrderService::getOrderAmount($this->cids);        
        $this->count = count($this->cids);
        $this->order->discount = OrderPriceCalculator::getDiscount($this->count,$this->order->subtotal);  
        $this->order->total = OrderPriceCalculator::getTotal($this->order->subtotal, $this->order->discount, $this->order->reduction, 0, $this->order->adjustment);  
    }  
    
    public function updatedOrderAdjustment($value = 0):void
    {          
         
        if ($value != '') {
            $this->order->adjustment =  $value;            
        }else {
            $this->order->adjustment = 0;    
        }
        
        $this->order->total = OrderPriceCalculator::getTotal($this->order->subtotal, $this->order->discount, $this->order->reduction, 0, $this->order->adjustment);        
    }
       
    public function save()
    {
        $this->validate();        

        // $this->order->courses()->attach($this->cids);
        $this->order->save();
        
        (new RegistrationManager)->updateRegistrations($this->order);

        RegistrationManager::updateOrder($this->order->id);         


        session()->flash('success', 'Order saved successfully.');

        return redirect()->route('orders.index');
    }

    public function mount(Order $order =  null)
    {                            
        if ($order->exists) {
            $this->order = $order;        
            $this->user = User::findOrFail($order->user_id);   
            $this->order->reduction = $this->user->work_status != 'working' ? 20:0;                      
        } 

        $this->calculateAmounts();        
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



// $this->subtotal = OrderPriceCalculator::getSubtotal(Auth::id(), Auth::user()->pendingCourses);          
      
// $this->total = OrderPriceCalculator::getTotal($this->subtotal, $this->discount, $this->reducedPrice, $this->commission, 0);                
// $this->discountText = OrderPriceCalculator::getDiscountText($this->count);
// $this->title = OrderPriceCalculator::getTitle(Auth::user()->pendingCourses); 