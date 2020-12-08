<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.course.datatable',[
            'courses' => Course::paginate(10),
        ]);
    }
}
