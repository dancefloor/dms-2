<?php

namespace App\Http\Livewire\Profile;

use App\Models\Registration;
use App\Models\User;
use Livewire\Component;


class RegisteredCourses extends Component
{   
    public $user;
    protected $registered_courses;
    
    public function render()
    {        
        
        $this->user = auth()->user();
        
        // $this->registered_courses = $this->user->learns()->latest()->paginate(8); 

        $this->registered_courses = Registration::where('user_id',$this->user->id)->whereRole('student')->latest()->paginate(10);
        
        return view('livewire.profile.registered-courses')->with('registered_courses', $this->registered_courses);
    }
}
