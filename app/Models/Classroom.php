<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'm2',
        'capacity',
        'limit_couples',
        'price_hour',
        'price_month',
        'dance_shoes',
        'comments',
        'color',
        'location_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'            => 'integer',
        'm2'            => 'float',
        'price_hour'    => 'float',
        'price_month'   => 'float',
        'dance_shoes'   => 'boolean',
        'location_id'   => 'integer',
    ];


    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    public function getAgeAttribute()
    {
        return $this->slug;
    }
}