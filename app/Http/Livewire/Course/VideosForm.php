<?php

namespace App\Http\Livewire\Course;

use GrahamCampbell\ResultType\Success;
use Livewire\Component;
class VideosForm extends Component
{


    public $course;
    public $teaser_video_1;
    public $teaser_video_2;
    public $teaser_video_3;

    public function updateVideos()
    {
        $this->course->update([
            'teaser_video_1' => $this->teaser_video_1,
            'teaser_video_2' => $this->teaser_video_2,
            'teaser_video_3' => $this->teaser_video_3,
        ]);

        session()->flash('success','Videos updated successfully.');
    }

    public function mount($course)
    {
        $this->course = $course;
        $this->teaser_video_1 = $course->teaser_video_1;
        $this->teaser_video_2 = $course->teaser_video_2;
        $this->teaser_video_3 = $course->teaser_video_3;
    }

    public function render()
    {
        return view('livewire.course.videos-form');
    }
}
