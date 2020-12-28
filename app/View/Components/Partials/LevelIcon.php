<?php

namespace App\View\Components\Partials;

use Illuminate\View\Component;

class LevelIcon extends Component
{
    public $levelIcon;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($level)
    {
        switch ($level) {
            case 'Open level':
                $this->levelIcon = 'reception-0';
                break;
            case 'Beginner':
                $this->levelIcon = 'reception-1';
                break;
            case 'Elementary':
                $this->levelIcon = 'reception-1';
                break;
            case 'Intermediate':
                $this->levelIcon = 'reception-2';
                break;
            case 'Upper intermediate':
                $this->levelIcon = 'reception-2';
                break;            
            case 'Advanced':
                $this->levelIcon = 'reception-3';
                break;
            case 'Expert':
                $this->levelIcon = 'reception-3';
                break;
            case 'Master':
                $this->levelIcon = 'reception-4';
                break;
            default:
                $this->levelIcon = 'reception-4';
                break;
        }
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.partials.level-icon');
    }
}
