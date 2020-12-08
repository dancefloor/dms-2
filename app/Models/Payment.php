<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'provider',
        'method',
        'amount',
        'amount_received',
        'currency',
        'mollie_payment_id',
        'status',
        'received_date',
        'comments',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'        => 'integer',
        'user_id'   => 'integer',
    ];

    // /**
    //  * The attributes that should be mutated to dates.
    //  *
    //  * @var array
    //  */
    // protected $dates = [
    //     'received_date',
    // ];


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function order()
    {
        return $this->belongsTo(\App\Models\Order::class);
    }
}


