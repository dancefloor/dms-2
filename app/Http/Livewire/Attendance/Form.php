<?php

namespace App\Http\Livewire\Attendance;

use Illuminate\Support\Str;
use App\Models\Attendance;
use App\Models\Course;
use App\Models\Presence;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Form extends Component
{
    public Attendance $attendance;
    public string $action = 'store';
    public $students;
    public $status = '';  
    public $studentStatus = [];  
    public $presences;    

    protected $rules = [
        'attendance.date'           => 'required|date',
        'attendance.is_cancelled'   => 'nullable',
        'attendance.comments'       => 'nullable',
        'attendance.user_id'        => 'nullable',
        'attendance.course_id'      => 'required',        
    ];
    
    public function save()
    {   
        $this->attendance->user_id = auth()->user()->id;     
        $this->validate();                
        $this->attendance->save();
        
        if ($this->action == 'store') {
            $course = Course::find($this->attendance->course_id);                    
            $this->students = $course->students->pluck('id')->toArray();
            if (count($this->students) > 0) { 
                // dd($this->students);               
                $this->attendance->attendees()->attach($this->students);            
            }
            
        }
        
        
        session()->flash('success','Attendance saved successfully.');
        return redirect(route('attendances.edit', $this->attendance));
    }

    // public function updatedAttendanceCourseId($value)
    // {
    //     dd($value);
    // }

    public function mount(Attendance $attendance = null)
    {
        if ($attendance->exists) {
            $this->attendance = $attendance;                                 
            $this->action = 'update';
            $this->presences = Presence::where('attendance_id',$this->attendance->id)->get();
        }else{
            $this->attendance = new Attendance;
            $this->attendance->course_id;            
        }
    }

    public function render()
    {
        return view('livewire.attendance.form');
    }
}

