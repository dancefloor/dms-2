<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class DefaultInfo extends Component
{
    public $user;
    public $name;
    public $lastname;
    public $email;

    public function updateUserDefaultInfo()
    {
        $this->user->update([
            'name'      => $this->name,
            'lastname'  => $this->lastname,
            'email'     => $this->email,
        ]);

        session()->flash('success', 'User updated successfully.');
    }

    public function mount($user)    
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
    }
    public function render()
    {
        return view('livewire.user.default-info');
    }
}
