<?php

namespace App\Exports;

use App\Models\Classroom;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClassroomsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Classroom::all();
    }

    public function headings(): array
    {
        return [
            'id',        
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
            'deleted_at',
            'created_at',
            'updated_at',      
        ];
    }
}

