<?php

namespace App\Http\Livewire\Location;

use App\Models\Location;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $action;
    public $location;
    public $name;
    public $slug;
    public $shortname;
    public $address;
    public $address_info;
    public $postal_code;
    public $city;
    public $neighborhood;
    public $state;
    public $country;
    public $comments;
    public $contact;
    public $website;
    public $email;
    public $phone;
    public $contract;    
    public $video;
    public $entry_code;
    public $google_maps_shortlink;
    public $google_maps;
    public $public_transportation;
    public $file;

    public function createLocation()
    {
       
        $this->validate([
            'contract' => 'nullable|file|mimes:pdf|max:2048', 
        ]);

        if ($this->contract) {
            $this->file = $this->contract->store('locations');
        }    

        Location::create([
            'name'                  => $this->name,
            'slug'                  => $this->slug,
            'shortname'             => $this->shortname,
            'address'               => $this->address,
            'address_info'          => $this->address_info,
            'postal_code'           => $this->postal_code,
            'city'                  => $this->city,
            'neighborhood'          => $this->neighborhood,
            'state'                 => $this->state,
            'country'               => $this->country,
            'comments'              => $this->comments,
            'contact'               => $this->contact,
            'website'               => $this->website,
            'email'                 => $this->email,
            'phone'                 => $this->phone,
            'contract'              => $this->file,
            'video'                 => $this->video,
            'entry_code'            => $this->entry_code,
            'google_maps_shortlink' => $this->google_maps_shortlink,
            'google_maps'           => $this->google_maps,
            'public_transportation' => $this->public_transportation,
        ]);

        session()->flash('success', 'Location created successfully.');
        
        return redirect(route('locations.index'));
    }

    public function updateLocation()
    {

        $this->location->update([
            'name'                  => $this->name,
            'slug'                  => $this->slug,
            'shortname'             => $this->shortname,
            'address'               => $this->address,
            'address_info'          => $this->address_info,
            'postal_code'           => $this->postal_code,
            'city'                  => $this->city,
            'neighborhood'          => $this->neighborhood,
            'state'                 => $this->state,
            'country'               => $this->country,
            'comments'              => $this->comments,
            'contact'               => $this->contact,
            'website'               => $this->website,
            'email'                 => $this->email,
            'phone'                 => $this->phone,
            'video'                 => $this->video,
            'entry_code'            => $this->entry_code,
            'google_maps_shortlink' => $this->google_maps_shortlink,
            'google_maps'           => $this->google_maps,
            'public_transportation' => $this->public_transportation,
        ]);

        if($this->contract != $this->location->contract){
            $this->location->update([
                'contract' => $this->contract->store('locations'),
            ]);            
        }

        session()->flash('success', 'Location updated successfully.');
        
        return redirect(route('locations.index'));
    }

    public function updatedName()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function mount($action, $location =  null)
    {
        $this->action = $action;

        if ($location) {            
            $this->location = $location;
            $this->name = $location->name;
            $this->slug = $location->slug;
            $this->shortname = $location->shortname;
            $this->address = $location->address;
            $this->address_info = $location->address_info;
            $this->postal_code = $location->postal_code;
            $this->city = $location->city;
            $this->neighborhood = $location->neighborhood;
            $this->state = $location->state;
            $this->country = $location->country;
            $this->comments = $location->comments;
            $this->contact = $location->contact;
            $this->website = $location->website;
            $this->email = $location->email;
            $this->phone = $location->phone;
            $this->contract = $location->contract;
            $this->video = $location->video;
            $this->entry_code = $location->entry_code;
            $this->google_maps_shortlink = $location->google_maps_shortlink;
            $this->google_maps = $location->google_maps;
            $this->public_transportation = $location->public_transportation;
        }
    }

    public function render()
    {
        return view('livewire.location.form');
    }
}
