<?php

namespace App\Http\Livewire\Attendance;

use App\Models\Presence;
use Livewire\Component;

class StudentStatus extends Component
{
    public $attendance;
    public $presence;
    public $student;    

    protected $rules = [
        'presence.status'     => 'nullable',
        'presence.comments'   => 'nullable',
    ];

    public function updatedPresenceStatus($value)
    {
        $this->presence->status = $value;
        $this->presence->save();
        // $this->emit('studentStatus', $value, $this->student->id);
        // $this->attendance->attendees()->updateExistingPivot($id,['status'=> $this->studentStatus[$id]]);
        session()->flash('updated', 'status updated!');
    }

    public function mount($attendance,$student)
    {
        $this->attendance =  $attendance;
        $this->student = $student;
        $this->presence = Presence::where('user_id',$student->id)->where('attendance_id', $attendance->id)->first();
    }

    public function render()
    {
        return view('livewire.attendance.student-status');
    }
}
