<?php

namespace App\View\Components\Partial;

use App\Models\User;
use Illuminate\View\Component;
use phpDocumentor\Reflection\Types\This;

class RegistrationStatus extends Component
{
    // public User $user;
    // public int $cid;
    public string $status;
    public string $icon;
    public string $bgColor;
    public string $label;
    

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user, int $cid)
    {
        //$this->user = $user;
        // $this->cid = $cid;
        $this->status = $user->registrationStatus($cid);

        switch ($this->status) {
            case 'pre-registered':
                $this->icon = 'pending';
                $this->bgColor = 'bg-orange-400';                            
                $this->label = 'Pre-Registered';
                break;
            case 'waiting':
                $this->icon = 'waiting';
                $this->bgColor = 'bg-blue-600';
                $this->label = 'Waiting list';      
                break;
            case 'registered':
                $this->icon = 'checked';
                $this->bgColor = 'bg-green-600';
                $this->label = 'Registered';      
                break;
            case 'standby':
                $this->icon = 'standby';
                $this->bgColor = 'bg-pink-400';
                $this->label = 'StandBy';      
                break;
            case 'canceled':
                $this->icon = 'x-circle-thin';
                $this->bgColor = 'bg-gray-200 text-gray-800';
                $this->label = 'Canceled';      
                break;
            case 'partial':
                $this->icon = 'phase';
                $this->bgColor = 'bg-green-400';
                $this->label = 'Partially registered';      
                break;  
            case 'open':
                $this->icon = 'open';
                $this->bgColor = 'bg-teal-300';
                $this->label = 'Processing';                          
                break;        
            default:                
                $this->icon = 'warning-circle';
                $this->bgColor = 'bg-red-400';
                $this->label = 'Unable'; 
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
        return view('components.partial.registration-status');
    }
}

//1 pre-registered - register but didn't pay
//2 preocessing - "Processing" - registered waiting for payment to arrive
//3 registered - registered and fully paid
//4 partial - registered and partially paid
//6 waiting - "Waiting list" - the class is full you are in waiting list
//7 standby - you need to be accepted by the teacher
//5 canceled - payed and after canceled 
//8 rejected - teachers removed them