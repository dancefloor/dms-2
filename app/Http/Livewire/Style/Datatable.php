<?php

namespace App\Http\Livewire\Style;

use App\Models\Style;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;
    
    public function render()
    {        
        return view('livewire.style.datatable', [
            'styles' => Style::paginate(10),
        ]);
    }
}
