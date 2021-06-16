<?php

namespace App\Http\Livewire\Attendance;

use App\Models\Attendance;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.attendance.datatable', [
            'attendances' => Attendance::latest()->paginate(10)
        ]);
    }
}
