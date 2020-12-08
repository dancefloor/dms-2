<?php

namespace App\View\Components\Course;

use Illuminate\View\Component;

class DisplayActivityColor extends Component
{
    public $color;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($status)
    {
        if ($status == 'active') {
            $this->color = 'bg-green-600';
        }else if ($status == 'finished') {
            $this->color = 'bg-red-700';
        }else {
            $this->color = 'bg-gray-400';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.course.display-activity-color');
    }
}