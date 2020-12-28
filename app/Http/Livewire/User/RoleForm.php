<?php

namespace App\Http\Livewire\User;

use App\Models\Role;
use Livewire\Component;

class RoleForm extends Component
{
    public $user;
    public $roles = [];
    public $updatedRoles = [];

    public function updateUserRoles()    
    {       
        foreach ($this->roles as $v) {        
            $role = Role::where('slug', $v)->firstOrFail();            
            $this->updatedRoles[] = $role->id;
        }
        $this->user->roles()->sync($this->updatedRoles);

        session()->flash('success', 'User roles updated successfully');
    }

    public function mount($user)
    {
        $this->user = $user;
        $this->roles = $user->roles->pluck('slug')->toArray();
    }

    public function render()
    {
        return view('livewire.user.role-form');
    }
}
