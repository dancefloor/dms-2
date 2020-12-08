<?php

namespace App\Http\Livewire\User;

use Carbon\Carbon;
use Livewire\Component;

class ContactForm extends Component
{
    public $user;
    public $mobile;
    public $phone;
    public $mobile_verified_at;
    public $phone_verified_at;
    public $skype;

    public function updateUserContact()
    {
        $this->user->update([
            'mobile'            => $this->mobile,
            'phone'             => $this->phone,
            'mobile_verified_at'=> $this->mobile_verified_at,
            'phone_verified_at' => $this->phone_verified_at,
            'skype'             => $this->skype,
        ]);

        session()->flash('success','User Contact information updated successfully');
    }

    public function mount($user)
    {
        $this->user                 = $user;
        $this->mobile               = $user->mobile;
        $this->phone                = $user->phone;
        $this->mobile_verified_at   = $user->mobile_verified_at;
        $this->phone_verified_at    = $user->phone_verified_at;
        $this->skype                = $user->skype;
    }

    public function render()
    {
        return view('livewire.user.contact-form');
    }
}


