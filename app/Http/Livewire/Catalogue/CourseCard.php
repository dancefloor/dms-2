<?php

namespace App\Http\Livewire\Catalogue;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CourseCard extends Component
{
    public $course;
    public $border = 'border';
    public $user;
    public $text;

    public function deregister(Course $course)
    {        
        $course->students()->detach(auth()->user()->id);
        
        $this->design(auth()->user()->registrationStatus($course->id));
        
        session()->flash('success', 'You have remove this class from your list successfully');                        
        
        $this->emit('cartCountRefresh'); 
    }

    public function register(Course $course)
    {
        $uid = auth()->user()->id;   

        // if ($this->registrationExists($uid, $course->id)) {
        //     session()->flash('alert', 'You are already registered for this course');
        //     return redirect()->back();
        // }

        $course->students()->attach($uid, ['role'=>'student', 'status'=>'pre-registered', 'created_at'=> now()]);
        
        session()->flash('pre-registered', 'You have successfully pre-register. Please proceed to pay on your ');

        $this->design(auth()->user()->registrationStatus($course->id));
        $this->emit('cartCountRefresh'); 
    }


    public function mount($course, $user = null)
    {
        $this->course = $course;        
        if (Auth::check()) {
            $this->user = $user;
            
            $this->design($user->registrationStatus($this->course->id));
        }
    }

    public function design($status)
    {
        switch ($status) {
            case 'pre-registered':
                $this->border = 'border-orange-500 border-2';
                $this->text = 'text-orange-600';
                break;
            case 'waiting':
                $this->border = 'border-blue-600 border-2';
                $this->text = 'text-blue-700';
                break;
            case 'registered':
                $this->border = 'border-green-600 border-2';
                $this->text = 'text-green-700';
                break;
            case 'standby':
                $this->border = 'border-pink-400 border-2';
                $this->text = 'text-pink-700';
                break;
            case 'expired':
                $this->border = 'border-gray-800 border-2';
                $this->text = 'text-gray-600';
                break;
            case 'processing':
                $this->border = 'border-teal-300 border-2';
                $this->text = 'text-teal-600';
                break;
            case 'partial':
                $this->border = 'border-green-400 border-2';
                $this->text = 'text-green-600';
                break;
            case 'rejected':
                $this->border = 'border-gray-200 border bg-gray-100';
                $this->text = 'text-gray-400';
                break;
            default:
                $this->border = 'border border-gray-200 bg-gray-100';
                $this->text = 'text-gray-400';
                break;
        }
    }

    public function render()
    {
        return view('livewire.catalogue.course-card');
    }
}
