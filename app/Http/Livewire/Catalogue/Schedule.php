<?php

namespace App\Http\Livewire\Catalogue;

use App\Models\Course;
use Livewire\Component;

class Schedule extends Component
{
    public $style;
    public $level;
    public $focus;
    // public $location;
    public $day;

    public function render()
    {
        return view('livewire.catalogue.schedule', [
            'courses' => Course::style($this->style)
                ->level($this->level)
                ->daysOfWeek($this->day)
                ->focus($this->focus)
                // ->location($this->location)
                ->orderBy('start_time_mon','asc')
                ->orderBy('start_time_tue','asc')
                ->orderBy('start_time_wed','asc')
                ->orderBy('start_time_thu','asc')
                ->orderBy('start_time_fri','asc')
                ->orderBy('start_time_sat','asc')
                ->orderBy('start_time_sun','asc')
                ->get(),
        ]);
    }
}


