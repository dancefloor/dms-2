<?php

namespace App\Http\Livewire\Partials;

use App\Models\Course;
use App\Models\Registration;
use Livewire\Component;

class StudentsList extends Component
{
    public Course $course;
    public $status = '';    

    public function updateStatus(int $uid)    
    {                
        $this->validate(['status' => 'required']);
        
        $r = Registration::where('course_id', $this->course->id)->where('user_id', $uid)->first();
        // dd($this->status);
        $r->status =  $this->status[$uid];
        
        $r->save();
        session()->flash('success','Status updated successfully');
        
        return redirect()->route('courses.show',$this->course);
        // $r = Registration::find($value['id']);        
        // $r->status = 'canceled';
        // $r->save();        
        // $this->emit('refreshTable');
    }

    public function mount(Course $course)
    {
        $this->course = $course;
    }

    public function render()
    {
        return view('livewire.partials.students-list');
    }
}
