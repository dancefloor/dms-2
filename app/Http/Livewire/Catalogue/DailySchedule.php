<?php

namespace App\Http\Livewire\Catalogue;

use App\Models\Course;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class DailySchedule extends Component
{
    public $monday;
    public $tuesday;
    public $wednesday;
    public $thursday;
    public $style;
    public $level;
    public $focus;
    public $city;
    public $day;
    public $loading_message = '';

    public function loadCourses()
    {
        $this->loading_message = "Loading Courses...";

        $this->monday   = Course::daysOfWeek('monday')->city($this->city)->style($this->style)->level($this->level)->orderBy('start_time_mon','asc')->get();
        $this->tuesday  = Course::daysOfWeek('tuesday')->city($this->city)->style($this->style)->level($this->level)->orderBy('start_time_tue','asc')->get();
        $this->wednesday= Course::daysOfWeek('wednesday')->city($this->city)->style($this->style)->level($this->level)->orderBy('start_time_wed','asc')->get();
        $this->thursday = Course::daysOfWeek('thursday')->city($this->city)->style($this->style)->level($this->level)->orderBy('start_time_thu','asc')->get();    
    }    

    public function updatedCity($value)
    {
        $this->city = $value;
        $this->loadCourses();
    }

    public function updatedStyle($value)
    {
        $this->style = $value;
        $this->loadCourses();
    }

    public function updatedLevel($value)
    {
        $this->level = $value;
        $this->loadCourses();
    }

    public function mount()
    {             
        $this->loadCourses();        
    }

    public function render()
    {        
        return view('livewire.catalogue.daily-schedule');
    }

    // public function courseQuery($day, $startTime)
    // {
    //     return Course::style($this->style)
    //                     ->daysOfWeek($day)
    //                     ->level($this->level)
    //                     ->city($this->city)
    //                     ->orderBy($startTime,'asc')->get();
    // }
}


// 'mondays'   => $this->courseQuery('monday','start_time_mon'),
// 'tuesdays'  => $this->courseQuery('tuesday','start_time_tue'),
// 'wednesdays'=> $this->courseQuery('wednesday','start_time_wed'),
// 'thursdays' => $this->courseQuery('thursday','start_time_thu'),
// 'fridays'   => $this->courseQuery('friday','start_time_fri'),
// 'saturdays' => $this->courseQuery('saturday','start_time_sat'),
// 'sundays'   => $this->courseQuery('sunday','start_time_sun'),