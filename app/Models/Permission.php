<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'label'
    ];
    
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
    
    public function hasRole($id)
    {
        return in_array($id, $this->roles->pluck('id')->toArray());
    }
}




