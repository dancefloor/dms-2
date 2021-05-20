<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;
    public $day;
    public $search = '';
    public $level;
    public $classroom;

    public function updatingSearching()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.course.datatable',[
            'courses' => Course::where('name', 'like', '%'. $this->search .'%')
                                ->daysOfWeek($this->day)
                                ->level($this->level)
                                ->classroom($this->classroom)
                                ->latest()
                                ->paginate(15),
        ]);
    }
}
