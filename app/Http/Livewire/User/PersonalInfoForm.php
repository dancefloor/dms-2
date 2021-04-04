<?php

namespace App\Http\Livewire\User;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class PersonalInfoForm extends Component
{
    use WithFileUploads;

    public $user;
    public $birthday;
    public $profession;
    public $biography;
    public $gender;
    public $branch;
    public $aware_of_df;
    public $work_status;
    public $unemployementProof;
    public $unemployementProofTemp;
    public $unemployement_expiry_date;
    public $price_hour;
    public $workStatusVerified;

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
            'unemployement_expiry_date' => $this->unemployement_expiry_date,
            'work_status_verified'  => $this->workStatusVerified,
        ]);

        if ($this->unemployementProofTemp != null) {
            $this->user->update(['unemployement_proof' => $this->unemployementProofTemp]);           
        }

        session()->flash('success','Personal information updated successfully');
    }

    public function updatedUnemployementProof()
    {
        $this->validate([
            'unemployementProof' => 'nullable|mimes:jpeg,png,jpg,gif,pdf|max:2048',            
        ]);
        $this->unemployementProofTemp = $this->unemployementProof->store('proof');      
        $this->unemployementProof = $this->unemployementProofTemp;
        if ($this->work_status == 'student') {
            $this->unemployement_expiry_date = Carbon::createFromFormat('Y-m-d',date('y').'-07-31');    
        }
        if ($this->work_status == 'unemployed') {
            $this->unemployement_expiry_date = Carbon::now()->addMonth(2);
        } 
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
        $this->unemployementProof = $user->unemployement_proof;
        $this->unemployement_expiry_date = $user->unemployement_expiry_date;
        $this->price_hour = $user->price_hour;       
        $this->workStatusVerified = $user->work_status_verified;       
    }

    public function render()
    {
        return view('livewire.user.personal-info-form');
    }
}











