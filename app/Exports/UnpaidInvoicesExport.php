<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class UnpaidInvoicesExport implements FromQuery, WithMapping
{
    use Exportable;
    
    public function map($order): array
    {
        return [
            $order->user->gender,
            $order->user->lastname,
            $order->user->name,
            $order->user->email,
            $order->user->phone,
            $order->id,
            $order->courses->pluck('name'),
            $order->total,
            $order->received,
            $order->total - $order->received,
        ];
    }

    public function query()
    {                
        return Order::query()->whereIn('status',['open','partial']);        
    }
}





