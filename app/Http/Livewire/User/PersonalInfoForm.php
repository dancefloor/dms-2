<?php

namespace App\Http\Livewire\User;

use Carbon\Carbon;
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
        'user.work_status'  => 'required',
        'user.aware_of_df'  => 'required',
        'user.work_status_verified'         =>  'nullable',
        'user.unemployement_expiry_date'    =>  'nullable',        
    ];

    public function updatePersonalInfo()
    {        
        $this->validate();

        if ($this->unemployementProofTemp != null) {
            $this->user->update(['unemployement_proof' => $this->unemployementProofTemp]);           
        }

        $this->user->save();

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
        $this->unemployementProof = $user->unemployement_proof;                        
    }

    public function render()
    {
        return view('livewire.user.personal-info-form');
    }
}











