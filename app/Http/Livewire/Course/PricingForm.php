<?php

namespace App\Http\Livewire\Course;

use Livewire\Component;

class PricingForm extends Component
{
    public $course;
    public $full_price;
    public $reduced_price;    
    public $promo_price;
    public $promo_price_expiry_date;

    public function updatePrice()
    {
        $this->course->update([
            'full_price'    => $this->full_price,
            'reduced_price' => $this->reduced_price,            
            'promo_price'   => $this->promo_price,
            'promo_price_expiry_date' => $this->promo_price_expiry_date,
        ]);

        session()->flash('success', 'Pricing updated successfully.');
    }

    public function mount($course)
    {
        $this->course           = $course;
        $this->full_price       = $course->full_price;
        $this->reduced_price    = $course->reduced_price;        
        $this->promo_price      = $course->promo_price;
        $this->promo_price_expiry_date = $course->promo_price_expiry_date;   
    }

    public function render()
    {
        return view('livewire.course.pricing-form');
    }
}
