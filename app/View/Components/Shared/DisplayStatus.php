<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class DisplayStatus extends Component
{
    public $status;
    public $style;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($status)
    {
        $this->status = $status;
        switch ($status) {
            case 'open':
                $this->style = 'bg-yellow-100 text-yellow-800';
                break;
            case 'paid':
                $this->style = 'bg-green-200 text-green-800';
                break;
            case 'partial':
                $this->style = 'bg-teal-100 text-teal-800';
                break;
            case 'canceled':
                $this->style = 'bg-red-100 text-red-800';
                break;  
            case 'failed':
                $this->style = 'bg-orange-100 text-orange-800';
                break;   
            case 'expired':
                $this->style = 'bg-gray-100 text-gray-800';
                break; 
            case 'overpaid':
                $this->style = 'bg-indigo-200 text-indigo-800';
                break;                
            default:
                $this->style = 'bg-blue-100 text-blue-800';
                break;
        }
    }

    // $table->enum('status', ["processing","",,,,""]);

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.shared.display-status');
    }
}
