<?php

namespace App\Http\Livewire\Style;

use App\Models\Style;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $action;
    public $style;
    public $name;    
    public $slug;
    public $music;
    public $family;
    public $origin;
    public $year;
    public $icon;
    public $video;
    public $image;
    public $description;
    public $color;
    public $portrait;
    public $photo;
    public $portrait_tmp;

    public function createStyle()
    {        
        Style::create([
            'name'          => $this->name,
            'slug'          => $this->slug,
            'family'        => $this->family,
            'music'         => $this->music,
            'origin'        => $this->origin,
            'year'          => $this->year,
            'icon'          => $this->icon,
            'video'         => $this->video,
            'description'   => $this->description,
            'color'         => $this->color,  
            'image'         => $this->photo,                   
            'portrait'      => $this->portrait_tmp,                   
        ]);
        
        session()->flash('success','Style updated successfully.');

        return redirect(route('styles.index'));
    }

    public function updateStyle()
    {
        $this->style->update([
            'name'          => $this->name,
            'slug'          => $this->slug,
            'family'        => $this->family,
            'music'         => $this->music,
            'origin'        => $this->origin,
            'year'          => $this->year,
            'icon'          => $this->icon,
            'video'         => $this->video,
            'description'   => $this->description,
            'color'         => $this->color,                     
        ]);

        if ($this->style->image != $this->photo) {            
            $this->style->update([
                'image'     => $this->photo
            ]);            
            $this->image = $this->photo;
        }

        if ($this->style->portrait != $this->portrait_tmp) {            
            $this->style->update([
                'portrait'     => $this->portrait_tmp
            ]);            
            $this->portrait = $this->portrait_tmp;
        }
        
        session()->flash('success','Style updated successfully.');
    }

    public function updatedName()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updatedImage()
    {
        $this->photo = $this->image->store('styles');      
        $this->image = $this->photo;
    }

    public function updatedPortrait()
    {
        $this->portrait_tmp = $this->portrait->store('styles');      
        $this->portrait = $this->portrait_tmp;
    }

    public function mount($action, $style = null)
    {
        $this->action =  $action;
        if ($style) {
            $this->style        = $style;
            $this->name         = $style->name;
            $this->slug         = $style->slug;
            $this->family       = $style->family;
            $this->music        = $style->music;
            $this->origin       = $style->origin;
            $this->year         = $style->year;
            $this->icon         = $style->icon;
            $this->video        = $style->video;
            $this->image        = $style->image;
            $this->description  = $style->description;
            $this->color        = $style->color;
            $this->portrait     = $style->portrait;
            $this->portrait_tmp = $style->portrait;
            $this->photo        = $style->image;
        }
    }

    public function render()
    {
        return view('livewire.style.form');
    }
}
