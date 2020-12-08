<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class SocialForm extends Component
{
    public $user;
    public $facebook;
    public $linkedin;
    public $instagram;
    public $youtube;
    public $tiktok;
    public $twitter;    
    public $snapchat;
    public $pinterest;

    public function updateUserSocial(){
        
        $this->user->update([
            'facebook'  => $this->facebook,
            'linkedin'  => $this->linkedin,
            'instagram' => $this->instagram,
            'youtube'   => $this->youtube,
            'tiktok'    => $this->tiktok,
            'twitter'   => $this->twitter,            
            'snapchat'  => $this->snapchat,
            'pinterest' => $this->pinterest,           
         ]);
         
         session()->flash('success','User Social information updated successfully');
    }

    public function mount($user)
    {
        $this->user         = $user;
        $this->facebook     = $user->facebook;
        $this->linkedin     = $user->linkedin;
        $this->instagram    = $user->instagram;
        $this->youtube      = $user->youtube;
        $this->tiktok       = $user->tiktok;
        $this->twitter      = $user->twitter;        
        $this->snapchat     = $user->snapchat;
        $this->pinterest    = $user->pinterest;
    }

    public function render()
    {
        return view('livewire.user.social-form');
    }
}











