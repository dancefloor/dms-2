<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }
    
    
    public function headings(): array
    {
        return [
            'id',
            'name',
            'lastname',
            'username',
            'email',
            'email_verified_at',                        
            'birthday',
            'picture',
            'portrait',
            'gender',
            'profession',
            'biography',
            'branch',
            'aware_of_df',
            'work_status',
            'unemployement_proof',
            'unemployement_expiry_date',
            'price_hour',
            'mobile',
            'phone',
            'mobile_verified_at',
            'phone_verified_at',
            'address',
            'address_info',
            'postal_code',
            'city',
            'state',
            'country',
            'lat',
            'lng',
            'facebook',
            'linkedin',
            'instagram',
            'youtube',
            'tiktok',
            'twitter',
            'skype',
            'snapchat',
            'pinterest',
            'current_team_id',
            'profile_photo_path',
            'created_at',
            'updated_at',
        ];
    }
}
