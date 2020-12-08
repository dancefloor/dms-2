<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class AddressForm extends Component
{
    public $user;
    public $country;
    public $address;
    public $city;
    public $state;
    public $postal_code;
    public $address_info;

    public function updateUserAddress()
    {        
        $this->user->update([
            'country'       => $this->country,
            'address'       => $this->address,
            'city'          => $this->city,
            'state'         => $this->state,
            'postal_code'   => $this->postal_code,
            'address_info'  => $this->address_info,
        ]);

        session()->flash('success', 'User address updated successfully');
    }

    public function mount($user)
    {
        $this->user     = $user;
        $this->country  = $user->country;
        $this->address  = $user->address;
        $this->city     = $user->city;
        $this->state    = $user->state;
        $this->postal_code  = $user->postal_code;
        $this->address_info = $user->address_info;
    }

    public function render()
    {
        return view('livewire.user.address-form');
    }
}
