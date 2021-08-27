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
        'reduction',
        'adjustment',
        'received',
        'coupon_code',
        'total',
        'comments',
        'comments_admin',
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
        'subtotal'  => 'double',
        'vat'       => 'double',
        'discount'  => 'double',        
        'reduction' => 'double',        
        'total'     => 'double',
        'received'  => 'double',
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
        return $this->belongsToMany(\App\Models\Course::class)->withTimestamps();
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

    public function scopeByUserID($query, $id)
    {
        if (!empty($id)) {
            $query->where('user_id',$id);
        }
        return $query;
    }

    public function scopeIsUnpaid($query)
    {
        return $query->where('status','open')->orWhere('status','partial');
    }

    public function scopeIsRefundable($query)
    {
        return $query->where('status','paid')->orWhere('status','partial');
    }

    public function getAmountDiffAttribute()
    {
        return $this->received - $this->total;
    }
}
