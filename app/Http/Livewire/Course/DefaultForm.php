<?php

namespace App\Http\Livewire\Course;

use App\Models\Course;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class DefaultForm extends Component
{
    use WithFileUploads;

    public $action;
    public $course;
    public $name;
    public $slug;
    public $tagline;
    public $keywords;
    public $excerpt;
    public $description;
    public $level;
    public $level_number;
    public $type;
    public $focus;
    public $thumbnail;
    public $image;

    public function createCourse()
    {
        $this->validate([
            'thumbnail' => 'nullable|image|max:1024',  
        ]);

        $course = Course::create([            
            'name'          => $this->name,
            'slug'          => $this->slug,
            'tagline'       => $this->tagline,
            'keywords'      => $this->keywords,
            'excerpt'       => $this->excerpt,
            'description'   => $this->description,
            'level'         => $this->level,
            'level_number'  => $this->level_number,
            'type'          => $this->type,
            'focus'         => $this->focus,     
            'user_id'       => auth()->user()->id,  
            'thumbnail'     => $this->image,      
        ]);

        session()->flash('success','Course created successfully.');
        
        return redirect(route('courses.edit', $course));
    }
    
    public function updateCourse()
    {               
        $this->course->update([            
            'name'          => $this->name,
            'slug'          => $this->slug,
            'tagline'       => $this->tagline,
            'keywords'      => $this->keywords,
            'excerpt'       => $this->excerpt,
            'description'   => $this->description,
            'level'         => $this->level,
            'level_number'  => $this->level_number,
            'type'          => $this->type,
            'focus'         => $this->focus,
        ]);

        if ($this->course->thumbnail != $this->thumbnail) {            
            $this->course->update([
                'thumbnail'     => $this->image
            ]);            
            $this->thumbnail = $this->image;
        }

        session()->flash('success','Course updated successfully.');                
    }

    public function updatedThumbnail()
    {
        $this->image = $this->thumbnail->store('courses');      
        $this->thumbnail = $this->image;
    }

    public function updatedName()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function mount($action, $course = null)
    {
        $this->action = $action;

        if ($course) 
        {
            $this->course = $course;
            $this->name = $course->name;
            $this->slug = $course->slug;
            $this->tagline = $course->tagline;
            $this->keywords = $course->keywords;
            $this->excerpt = $course->excerpt;
            $this->description = $course->description;
            $this->level = $course->level;
            $this->level_number = $course->level_number;
            $this->type = $course->type;
            $this->focus = $course->focus;   
            $this->thumbnail = $course->thumbnail;        
        }
    }
    
    public function render()
    {
        return view('livewire.course.default-form');
    }
}
