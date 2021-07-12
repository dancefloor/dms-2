<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;

class PersonalInfoForm extends Component
{
    use WithFileUploads;

    public $user;           
    public $unemployementProof;
    public $unemployementProofTemp;    

    protected $rules = [
        'user.birthday'     => 'nullable|date',
        'user.gender'       => 'required',
        'user.branch'       => 'nullable',
        'user.profession'   => 'nullable',
        'user.biography'    => 'nullable',
        'user.aware_of_df'  => 'required',                
    ];

    public function updatePersonalInfo()
    {        
        $this->validate();

        $this->user->save();

        session()->flash('success','Personal information updated successfully');
    }



    public function mount($user)
    {
        $this->user = $user;                                
    }

    public function render()
    {
        return view('livewire.user.personal-info-form');
    }
}











