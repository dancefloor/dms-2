<?php

namespace App\Http\Livewire\Classroom;

use App\Models\Classroom;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;
    
    public function render()
    {
        return view('livewire.classroom.datatable', [
            'classrooms' => Classroom::paginate(10),
        ]);
    }
}
