<?php

namespace App\View\Components\User;

use App\Models\User;
use Illuminate\View\Component;

class RoleGenderIcon extends Component
{
    public User $user;
    public String $color;
    public String $icon = 'student';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {        
        $this->user = $user;

        $this->color = 'text-pink-600';
        
        if ($user->gender == 'male') {
            $this->color = 'text-blue-600';
        }

        if ($user->isInstructor()) {
            $this->icon = 'dance';
        }

        if ($user->isAdmin()) {
            $this->icon = 'keys';
        }

        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.user.role-gender-icon');
    }
}
