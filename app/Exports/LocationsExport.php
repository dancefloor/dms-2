<?php

namespace App\Exports;

use App\Models\Location;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LocationsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Location::all();
    }

    public function headings(): array
    {
        return [
            'id',        
            'name',
            'slug',
            'shortname',
            'address',
            'address_info',
            'postal_code',
            'city',
            'neighborhood',
            'state',
            'country',
            'comments',
            'contact',
            'website',
            'email',
            'phone',
            'contract',
            'video',
            'entry_code',
            'google_maps_shortlink',
            'google_maps',
            'public_transportation',
            'deleted_at',
            'created_at',
            'updated_at',
        ];
    }
}