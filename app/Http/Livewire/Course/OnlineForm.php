<?php

namespace App\Http\Livewire\Course;

use Livewire\Component;

class OnlineForm extends Component
{
    public $course;
    public $is_online;
    public $live_price;
    public $online_description;
    public $live_description;
    public $online_price;
    public $online_link;

    public function updateOnline()
    {
    
        $this->course->update([
            'is_online' => $this->is_online,
            'live_price' => $this->live_price,
            'online_description' => $this->online_description,
            'live_description' => $this->live_description,
            'online_price' => $this->online_price,
            'online_link' => $this->online_link,
        ]);

        session()->flash('success','Online information updated successfully.');
    }

    public function mount($course)
    {
        $this->course       = $course;
        $this->is_online    = $course->is_online;
        $this->live_price   = $course->live_price;
        $this->online_price = $course->online_price;
        $this->online_link  = $course->online_link;
        $this->live_description = $course->live_description;
        $this->online_description = $course->online_description;
    }

    public function render()
    {
        return view('livewire.course.online-form');
    }
}


