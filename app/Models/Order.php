<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'subtotal',
        'vat',
        'discount',
        'coupon_code',
        'total',
        'comments',
        'status',
        'author_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'        => 'integer',
        'user_id'   => 'integer',
        'subtotal'  => 'float',
        'vat'       => 'float',
        'discount'  => 'float',
        'total'     => 'float',
        'author_id' => 'integer',
    ];


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function author()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function courses(){
        return $this->belongsToMany(\App\Models\Course::class);
    }

    public function hasCourse($id)
    {
        return in_array($id, $this->courses()->pluck('course_id')->toArray());
    }

    public function registrations()
    {
        return $this->hasMany(\App\Models\Registration::class);
    }

    public function payments()
    {
        return $this->hasMany(\App\Models\Payment::class);
    }

    public function scopeIsOpen($query)
    {
        return $query->whereStatus('open');
    }

    public function scopeIsPartial($query)
    {
        return $query->whereStatus('open');
    }

    public function scopeIsUnpaid($query)
    {
        return $query->where('status','open')->orWhere('status','partial')->get();
    }
}
