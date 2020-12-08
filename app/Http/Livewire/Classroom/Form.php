<?php

namespace App\Http\Livewire\Classroom;

use App\Models\Classroom;
use Livewire\Component;
use Illuminate\Support\Str;

class Form extends Component
{
    public $action;
    public $classroom;
    public $name;
    public $slug;
    public $m2;
    public $capacity;
    public $limit_couples;
    public $price_hour;
    public $price_month;
    public $color;
    public $dance_shoes;
    public $location;
    public $comments;

    public function createClassroom()
    {        
        $classroom = new Classroom;
        $classroom->name          = $this->name;
        $classroom->slug          = $this->slug;
        $classroom->m2            = $this->m2;
        $classroom->capacity      = $this->capacity;
        $classroom->limit_couples = $this->limit_couples;
        $classroom->price_hour    = $this->price_hour;
        $classroom->price_month   = $this->price_month;
        $classroom->color         = $this->color;
        $classroom->dance_shoes   = $this->dance_shoes;
        $classroom->comments      = $this->comments;                 
        $classroom->location()->associate($this->location)->save();

        session()->flash('success','Classroom created successfully.');

        return redirect(route('locations.index'));
    }

    public function updatedName()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updateClassroom()
    {
        $this->classroom->update([
            'name'          => $this->name,
            'slug'          => $this->slug,
            'm2'            => $this->m2,
            'capacity'      => $this->capacity,
            'limit_couples' => $this->limit_couples,
            'price_hour'    => $this->price_hour,
            'price_month'   => $this->price_month,
            'color'         => $this->color,
            'dance_shoes'   => $this->dance_shoes,
            'comments'      => $this->comments,
        ]);

        $this->classroom->location()->associate($this->location)->save();

        session()->flash('success','Classroom updated successfully.');

        return redirect(route('locations.index'));
    }    

    public function mount($action, $classroom = null)
    {
        $this->action = $action;
        if ($classroom) {         
            $this->classroom = $classroom;
            $this->name         = $classroom->name;
            $this->slug         = $classroom->slug;
            $this->m2           = $classroom->m2;
            $this->capacity     = $classroom->capacity;
            $this->limit_couples= $classroom->limit_couples;
            $this->price_hour   = $classroom->price_hour;
            $this->price_month  = $classroom->price_month;
            $this->color        = $classroom->color;
            $this->dance_shoes  = $classroom->dance_shoes;
            $this->location     = $classroom->location_id;
            $this->comments     = $classroom->comments;        
        }
    }

    public function render()
    {
        return view('livewire.classroom.form');
    }
}
