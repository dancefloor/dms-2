<?php

namespace App\View\Components\Catalogue;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class CourseCard extends Component
{
    public $course;
    public $border = 'border';
    public $user;
    public $text;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($course, $user = null)
    {
        $this->course = $course;
        if (Auth::check()) {
            $this->user = $user;

            switch ($user->registrationStatus($this->course->id)) {
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
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.catalogue.course-card');
    }
}
