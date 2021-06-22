<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Presence extends Pivot
{
    protected $table = 'presences';  

    protected $fillable = [
        'id',
        'comments',
        'status',
        'attendance_id',
        'user_id',        
    ];

    protected $casts = [
        'id'            => 'integer',
        'attendance_id' => 'integer',
        'user_id'       => 'integer',
        'order_id'      => 'integer',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function attendance()
    {
        return $this->belongsTo(\App\Models\Attendance::class);
    }

}
