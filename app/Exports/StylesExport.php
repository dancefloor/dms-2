<?php

namespace App\Exports;

use App\Models\Style;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StylesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Style::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'name',
            'slug',
            'icon',
            'color',
            'image',
            'origin',
            'family',
            'music',
            'year',
            'description',
            'created_at',
            'updated_at',
            'deleted_at',
        ];
    }
}



