<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new User([
            'name'      => $row['prenom'],
            'lastname'  => $row['nom'],
            'email'     => $row['email'], 
            'mobile'    => $row['tel'],
            'gender'    => $row['genre'],
            'password'  => Hash::make('password'),
            'remember_token'    => Str::random(10),
            'email_verified_at' => now(),
        ]);
    }
}



