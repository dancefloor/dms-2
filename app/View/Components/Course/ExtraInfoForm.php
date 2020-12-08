<?php

namespace App\View\Components\Course;

use Illuminate\View\Component;

class ExtraInfoForm extends Component
{
    public $course;
    public $to_waiting;
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

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($course)
    {
        $this->course       = $course;
        $this->to_waiting   = $course->to_waiting;
        $this->status       = $course->status;
        $this->students     = $course->students;
        $this->portrait     = $course->portrait;
        $this->styles       = $course->styles;
        $this->teachers     = $course->teachers;
        $this->classroom    = $course->classroom;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.course.extra-info-form');
    }
}
