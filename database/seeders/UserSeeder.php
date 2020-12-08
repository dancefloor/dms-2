<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Actions\Fortify\CreateNewUser;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $heardOf = ['instagram', 'facebook', 'google', 'friend', 'old-student', 'party', 'festival', 'public-manifestation', 'instructor'];
        
        $json = file_get_contents(database_path('data/d.json'));

        $data = json_decode($json);
        foreach ($data as $key => $user) {
            User::create([
                'firstname'     => $user->firstname,
                'lastname'      => $user->lastname,
                'email'         => $user->email,
                'password'      => Hash::make('password'),
                'mobile'        => $user->mobile,
                'gender'        => $user->gender,
                'aware_of_df'   => $heardOf[array_rand($heardOf)]
            ]);
        }

        //factory(App\User::class, 50)->create();
        // Populate the pivot table
        User::all()->each(function ($user) {
            $user->roles()->attach(6);
        });
    }
}
