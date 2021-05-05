<?php

namespace App\Http\Livewire\Partials;

use App\Models\Registration;
use Livewire\Component;

class RegistrationsTable extends Component
{
    public $registrations; 
    public $listeners = ['refreshTable' => 'render']; 
    
    public function cancel($value)
    {
        $r = Registration::find($value['id']);        
        $r->status = 'canceled';
        $r->save();        
        $this->emit('refreshTable');
    }    

    public function mount($registrations)
    {
        $this->registrations = $registrations;
    }

    public function render()
    {
        return view('livewire.partials.registrations-table');
    }
}
