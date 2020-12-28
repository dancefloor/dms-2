<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Livewire\Component;


class RegisteredCourses extends Component
{   
    public $user;
    protected $registered_courses;
    
    public function render()
    {        
        
        $this->user = auth()->user();
        
        $this->registered_courses = $this->user->learns()->paginate(8); 
        
        return view('livewire.profile.registered-courses')->with('registered_courses', $this->registered_courses);
    }
}
