<?php

namespace App\View\Components\Partials;

use Illuminate\View\Component;

class ReducedPriceNotification extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.partials.reduced-price-notification');
    }
}
