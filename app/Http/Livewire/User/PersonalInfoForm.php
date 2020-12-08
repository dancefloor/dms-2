<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class PersonalInfoForm extends Component
{
    public $user;
    public $birthday;
    public $profession;
    public $biography;
    public $gender;
    public $branch;
    public $aware_of_df;
    public $work_status;
    public $unemployement_proof;
    public $unemployement_expiry_date;
    public $price_hour;

    public function updatePersonalInfo()
    {
        $this->user->update([
            'gender'        => $this->gender,
            'birthday'      => $this->birthday,
            'branch'        => $this->branch,
            'profession'    => $this->profession,
            'biography'     => $this->biography,
            'aware_of_df'   => $this->aware_of_df,
            'work_status'   => $this->work_status,
            'price_hour'    => $this->price_hour,
            'unemployement_proof'       => $this->unemployement_proof,
            'unemployement_expiry_date' => $this->unemployement_expiry_date,
        ]);

        session()->flash('success','Personal information updated successfully');
    }

    public function mount($user)
    {
        $this->user = $user;
        $this->birthday = $user->birthday;
        $this->profession = $user->profession;
        $this->biography = $user->biography;
        $this->gender = $user->gender;
        $this->branch = $user->branch;
        $this->aware_of_df = $user->aware_of_df;
        $this->work_status = $user->work_status;
        $this->unemployement_proof = $user->unemployement_proof;
        $this->unemployement_expiry_date = $user->unemployement_expiry_date;
        $this->price_hour = $user->price_hour;       
    }

    public function render()
    {
        return view('livewire.user.personal-info-form');
    }
}











