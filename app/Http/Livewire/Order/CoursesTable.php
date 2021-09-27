<?php

namespace App\Http\Livewire\Order;

use App\Models\Course;
use App\Models\Registration;
use App\Models\User;
use Livewire\Component;

class CoursesTable extends Component
{
    public $registrations;
    public $courses;
    public $user;
    public $oid;

    protected $listeners = ['courseListUpdated'];

    public function courseListUpdated()
    {
        $this->query();        
    }

    public function query()
    {                            
        $this->registrations = Registration::where('order_id', $this->oid)->where('user_id', $this->user->id)->get();        
    }
    
    public function remove(Registration $r)
    {
        $course = Course::findOrFail($r->course_id);
        $course->students()->detach($this->user->id);
        $course->orders()->detach($this->oid);
        $this->emit('removeCourse');        
        $this->query();
    }
    
    public function mount($courses, $user = null, $order = null)
    {                   
        $this->courses = $courses;              
        $this->user = $user;
        $this->oid = $order->id;  
        $this->query();
    }



    public function render()
    {
        return view('livewire.order.courses-table');
    }
}
