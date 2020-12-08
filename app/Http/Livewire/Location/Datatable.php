<?php

namespace App\Http\Livewire\Location;

use App\Models\Location;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.location.datatable',[
            'locations' => Location::paginate(10),
        ]);
    }
}