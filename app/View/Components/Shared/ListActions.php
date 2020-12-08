<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class ListActions extends Component
{
    public $route;
    public $item;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($route, $item)
    {
        $this->route = $route;
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.shared.list-actions');
    }
}
