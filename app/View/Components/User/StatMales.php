<?php

namespace App\View\Components\User;

use App\Models\User;
use Illuminate\View\Component;

class StatMales extends Component
{
    public $males;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->males = User::whereGender('male')->count();        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.user.stat-males');
    }
}
