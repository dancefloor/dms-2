<?php

namespace App\Http\Livewire\Course;

use Livewire\Component;

class ScheduleForm extends Component
{

    public $course;
    public $start_date;
    public $end_date;
    public $monday;
    public $start_time_mon;
    public $end_time_mon;
    public $tuesday;
    public $start_time_tue;
    public $end_time_tue;
    public $wednesday;
    public $start_time_wed;
    public $end_time_wed;
    public $thursday;
    public $start_time_thu;
    public $end_time_thu;
    public $friday;
    public $start_time_fri;
    public $end_time_fri;
    public $saturday;
    public $start_time_sat;
    public $end_time_sat;
    public $sunday;
    public $start_time_sun;
    public $end_time_sun;
    public $duration;

    public function updateSchedule()
    {
        $this->validate([                        
            'duration'          => 'nullable|date_format:H:i:s',
            'start_time_mon'    => 'nullable|date_format:H:i:s'       
        ]);

        $this->course->update([
            'start_date'    => $this->start_date,
            'end_date'      => $this->end_date,
            'monday'        => $this->monday,
            'start_time_mon'=> $this->start_time_mon,
            'end_time_mon'  => $this->end_time_mon,
            'tuesday'       => $this->tuesday,
            'start_time_tue'=> $this->start_time_tue,
            'end_time_tue'  => $this->end_time_tue,
            'wednesday'     => $this->wednesday,
            'start_time_wed'=> $this->start_time_wed,
            'end_time_wed'  => $this->end_time_wed,
            'thursday'      => $this->thursday,
            'start_time_thu'=> $this->start_time_thu,
            'end_time_thu'  => $this->end_time_thu,
            'friday'        => $this->friday,
            'start_time_fri'=> $this->start_time_fri,
            'end_time_fri'  => $this->end_time_fri,
            'saturday'      => $this->saturday,
            'start_time_sat'=> $this->start_time_sat,
            'end_time_sat'  => $this->end_time_sat,
            'sunday'        => $this->sunday,
            'start_time_sun'=> $this->start_time_sun,
            'end_time_sun'  => $this->end_time_sun, 
            'duration'    => $this->duration,
        ]);

        session()->flash('success','Schedule updated successfully.');
    }

    public function mount($course)
    {        
        $this->course           = $course;
        $this->start_date       = $course->start_date;
        $this->end_date         = $course->end_date;
        
        $this->monday           = $course->monday;
        $this->start_time_mon   = $course->start_time_mon;
        $this->end_time_mon     = $course->end_time_mon;
        
        $this->tuesday          = $course->tuesday;
        $this->start_time_tue   = $course->start_time_tue;
        $this->end_time_tue     = $course->end_time_tue;
        
        $this->wednesday        = $course->wednesday;
        $this->start_time_wed   = $course->start_time_wed;
        $this->end_time_wed     = $course->end_time_wed;
        
        $this->thursday         = $course->thursday;
        $this->start_time_thu   = $course->start_time_thu;
        $this->end_time_thu     = $course->end_time_thu;
        
        $this->friday           = $course->friday;
        $this->start_time_fri   = $course->start_time_fri;
        $this->end_time_fri     = $course->end_time_fri;
        
        $this->saturday         = $course->saturday;
        $this->start_time_sat   = $course->start_time_sat;
        $this->end_time_sat     = $course->end_time_sat;
        
        $this->sunday           = $course->sunday;
        $this->start_time_sun   = $course->start_time_sun;
        $this->end_time_sun     = $course->end_time_sun;

        $this->duration       = $course->duration;
    }

    public function render()
    {
        return view('livewire.course.schedule-form');
    }
}

