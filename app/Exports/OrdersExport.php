<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::all();        
    }

    public function headings(): array
    {
        return [
            'id',
            'user_id',
            'subtotal',
            'vat',
            'discount',
            'coupon_code',
            'reduction',
            'adjustment',
            'total',
            'received',
            'comments',
            'status',
            'author_id',
            'created_at',
            'updated_at'            
        ];
    }
}