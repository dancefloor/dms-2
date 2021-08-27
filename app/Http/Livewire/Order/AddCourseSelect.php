<?php

namespace App\Http\Livewire\Order;

use App\Models\Course;
use App\Models\User;
use App\Services\OrderService;
use Livewire\Component;

class AddCourseSelect extends Component
{
    public $courses;
    public $course = '';
    public $user;
    public $cids;
    public $oid;

    protected $listeners = ['courseListUpdated'];

    public $rules = ['course' => 'required'];    

    public function courseListUpdated()
    {        
        $this->cids = OrderService::getCourseIds($this->oid);
        $this->query();
    }
    
    public function add()    
    {        
        $this->validate();                                      
        $this->emit('addCourse', intval($this->course), $this->user->id);              
        $this->course = '';        
    }

    public function query()
    {        
        $this->courses = Course::where('status','active')->orWhere('status','billable')->excluding($this->cids)->get();                
    }

    public function mount($order)
    {                
        $this->oid = $order->id;
        $this->user = User::findOrFail($order->user_id);
        $this->cids = OrderService::getCourseIds($order->id);
        $this->query();
    }


    public function render()
    {
        return view('livewire.order.add-course-select');
    }
}
