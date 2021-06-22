<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'course_id',
        'user_id',
        'comments',
        'is_cancelled',        
    ];

    protected $casts = [
        'date'  => 'date:Y-m-d'
    ];

    public function attendees()
    {
        return $this->belongsToMany(User::class,'presences','attendance_id','user_id')->withPivot('status', 'comments');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}



