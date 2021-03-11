<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'shortname',
        'address',
        'address_info',
        'postal_code',
        'city',
        'neighborhood',
        'state',
        'country',
        'comments',
        'contact',
        'website',
        'email',
        'phone',
        'contract',
        'video',
        'entry_code',
        'google_maps_shortlink',
        'google_maps',
        'public_transportation',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }

    public function courses()
    {
        return $this->hasManyThrough(Course::class, Classroom::class);
    }
    
    public function scopeCity($query, $city)
    {
        return $query->where('city',$city);
    }

    public function scopeNeighborhood($query, $neighborhood)
    {
        return $query->where('city',$neighborhood);
    }
}
