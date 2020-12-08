<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.user.datatable',[
            'users' => User::paginate(10),
        ]);
    }
}
