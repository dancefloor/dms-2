<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class CourseDailySchedule extends Component
{
    public $course;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($course)
    {
        $this->course = $course;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.shared.course-daily-schedule');
    }

    public function dailySchedule() 
    {
        $schedule = [];
        if ($this->course->monday == 1) {
            $mon = [
                'day' => 'Monday',
                'start_time' => date('H:i', strtotime($this->course->start_time_mon)),
                'end_time' => date('H:i', strtotime($this->course->end_time_mon)),
            ];
            $schedule[] = $mon;
        }

        

        if ($this->course->tuesday == 1) {
            $tue = [
                'day' => 'Tuesday',
                'start_time' => date('H:i', strtotime($this->course->start_time_tue)),
                'end_time' => date('H:i', strtotime($this->course->end_time_tue)),
            ];
            $schedule[] = $tue;
        }

        if ($this->course->wednesday == 1) {
            $wed = [
                'day' => 'Wednesday',
                'start_time' => date('H:i', strtotime($this->course->start_time_wed)),
                'end_time' => date('H:i', strtotime($this->course->end_time_wed)),
            ];
            $schedule[] = $wed;
        }

        if ($this->course->thursday == 1) {
            $thu = [
                'day' => 'Thursday',
                'start_time' => date('H:i', strtotime($this->course->start_time_thu)),
                'end_time' => date('H:i', strtotime($this->course->end_time_thu)),
            ];
            $schedule[] = $thu;
        }

        if ($this->course->friday == 1) {
            $fri = [
                'day' => 'Friday',
                'start_time' => date('H:i', strtotime($this->course->start_time_fri)),
                'end_time' => date('H:i', strtotime($this->course->end_time_fri)),
            ];
            $schedule[] = $fri;
        }

        if ($this->course->saturday == 1) {
            $sat = [
                'day' => 'Saturday',
                'start_time' => date('H:i', strtotime($this->course->start_time_sat)),
                'end_time' => date('H:i', strtotime($this->course->end_time_sat)),
            ];
            $schedule[] = $sat;
        }

        if ($this->course->sunday == 1) {
            $sun = [
                'day' => 'Sunday',
                'start_time' => date('H:i', strtotime($this->course->start_time_sun)),
                'end_time' => date('H:i', strtotime($this->course->end_time_sun)),
            ];
            $schedule[] = $sun;
        }
        
        return $schedule;
    }
}

