<?php

namespace App\Http\Livewire\Course;

use Livewire\Component;

class ExtraInfoForm extends Component
{
    public $course;
    public $standby;
    public $portrait;
    public $status;
    public $students;
    public $styles;
    public $teachers;
    public $classroom;

    public function updateExtraInfo()
    {
        dd($this->styles);
        // $this->validate([
        //     'thumbnail' => 'nullable|image|max:1024', 
        //     'portrait' => 'nullable|image|max:1024', 
        // ]);        

        if ($this->styles) {
            $this->course->styles()->attach($this->styles);            
        }

        if ($this->teachers) {
            $this->course->teachers()->attach($this->teachers, ['role'=>'instructor']);            
        }

        if ($this->students) {
            $studentsTable = [];
            foreach ($this->students as $key => $value) {    
                $studentsTable[$value] = ['role'=>'student'];               
            }            
            $this->course->students()->attach($studentsTable);                     
        }


        $this->course->update([            
            'portrait'  => $this->portrait->store('courses'),
        ]);

        session()->flash('success','Images uploaded successfully.');
    }

    public function mount($course)
    {
        $this->course       = $course;
        $this->standby      = $course->standby;
        $this->status       = $course->status;
        $this->students     = $course->students;
        $this->portrait     = $course->portrait;
        $this->styles       = $course->styles;
        $this->teachers     = $course->teachers;
        $this->classroom    = $course->classroom;
    }
    
    public function render()
    {
        return view('livewire.course.extra-info-form');
    }
}







