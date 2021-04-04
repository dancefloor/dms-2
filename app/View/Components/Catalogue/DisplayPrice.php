<?php

namespace App\View\Components\Catalogue;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class DisplayPrice extends Component
{
    public $course;
    public $price;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($course)
    {
        $this->course =  $course;
        if (Auth::check()) {
            if (auth()->user()->work_status == 'working') {
                $this->price = $this->course->full_price;    
            }else{
                $this->price = $this->course->reduced_price;
            } 

        }else{
            $this->price = $this->course->full_price;
        }

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.catalogue.display-price');
    }
}
