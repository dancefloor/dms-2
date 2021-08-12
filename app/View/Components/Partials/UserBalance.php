<?php

namespace App\View\Components\Partials;

use App\Models\Order;
use App\Models\User;
use Illuminate\View\Component;

class UserBalance extends Component
{
    public User $user;
    public $balance;
    public $total;
    public $received;
    public $text = 'Your current balance is';
    public $style = 'text-gray-500';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        // $this->total = Order::where('user_id', $this->user->id)->whereStatus('open')->orWhere('status','partial')->orWhere('status','overpaid')->sum('total');
        // $this->received = Order::where('user_id', $this->user->id)->whereStatus('open')->orWhere('status','partial')->orWhere('status','overpaid')->sum('received');        
        // $this->balance = $this->total - $this->received;
        $this->balance = $this->user->balance;
        
        if ($this->balance > 0) 
        {
            $this->text = 'You have to pay';
            $this->style = 'text-red-500';
        } elseif ($this->balance < 0)
        {
            $this->text = 'You have a credit of';
            $this->style = 'text-green-500';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.partials.user-balance');
    }
}
