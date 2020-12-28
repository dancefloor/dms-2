<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.user.datatable',[
            'users' => User::where('name','LIKE', "%{$this->search}%")
                            ->orWhere('lastname','LIKE', "%{$this->search}%")
                            ->orWhere('email','LIKE', "%{$this->search}%")
                            ->paginate(10),
        ]);
    }
}