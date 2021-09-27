<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class WorkStatus extends Component
{
    use WithFileUploads;
    
    public User $user;
    public $unemployementProof;
    public $unemployementProofTemp;

    protected $rules = [
        'user.work_status'                  => 'required',
        'user.work_status_verified'         => 'nullable',
        'user.unemployement_expiry_date'    => 'nullable',
    ];

    public function updatedUserWorkStatus()
    {
        $this->user->work_status_verified = false;
    }

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
        if ($this->user->work_status == 'student') {
            $this->user->unemployement_expiry_date = Carbon::createFromFormat('Y-m-d', date('Y').'-07-31');    
        }
        if ($this->user->work_status == 'unemployed') {
            $this->user->unemployement_expiry_date = Carbon::now()->addMonth(2);
        } 
    }
    
    public function mount(User $user)
    {
        $this->user = $user;
        $this->unemployementProof = $user->unemployement_proof;
    }

    public function render()
    {
        return view('livewire.user.work-status');
    }
}
