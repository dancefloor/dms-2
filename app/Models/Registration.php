<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\App;

class Registration extends Pivot
{
    use HasFactory;

    protected $table = 'registrations';  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'role',
        'option',
        'course_id',
        'user_id',
        'order_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [        
        'course_id' => 'integer',
        'user_id' => 'integer',
        'order_id' => 'integer',
    ];

    protected $dates = ['created_at', 'updated_at'];


    public function course()
    {
        return $this->belongsTo(\App\Models\Course::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }

    public function scopeHasOrder($query, $id)
    {
        if (!empty($id)) {
            return $query->where('order_id', $id);
        }
        return $query;
    }
}

