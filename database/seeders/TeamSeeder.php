<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
        $gab = User::firstOrCreate([
            'name'     => 'Gabriel',
            'lastname'      => 'Zambrano',
            'email'         => 'gab.zambrano@gmail.com',
            'password'      => Hash::make('password'),
            'profession'    => 'entrepreneur',
            'picture'       => '',
            'gender'        => 'male',
            'mobile'        => '+41 76 571 4931',
            'phone'         => '+385 99 648 3693',
            'address'        => 'Karašička ulica 29',            
            'address_info'  => '',
            'postal_code'   => '10000',
            'city'          => 'Zagreb',
            'state'         => 'Zagreb',
            'country'       => 'Croatia',
            'facebook'      => 'https://www.facebook.com/',
            'instagram'     => 'https://www.instagram.com/uespiiiiii/',
            'linkedin'      => 'https://hr.linkedin.com/',
            'twitter'       => '@gab_zam',
            'skype'         => 'gabrielvinci',
            'snapchat'      => '@elgato',
            'tiktok'        => '@gabzon',
            'youtube'       => 'https://www.youtube.com/',
            'email_verified_at' => now(),
        ]);    
            
        $gab->roles()->attach(1);
        $gab->ownedTeams()->save(Team::forceCreate([
            'user_id' => $gab->id,
            'name' => explode(' ', $gab->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));


        $coco = User::firstOrCreate([
            'name'          => 'Corinne',
            'lastname'      => 'Lecaçon',
            'email'         => 'corinne@dancefloorgenevasalsa.ch',
            'password'      => Hash::make('password'),
            'picture'       => 'images/teachers/coco-square.png',
            'portrait'      => 'images/teachers/coco.jpg',
            'gender'        => 'female',
            'mobile'        => '+41 76 571 3939',
            'email_verified_at' => now(),
        ]);
        $coco->roles()->attach([3, 4, 6]);
        $coco->ownedTeams()->save(Team::forceCreate([
            'user_id' => $coco->id,
            'name' => explode(' ', $coco->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));


        $fred = User::firstOrCreate([
            'name'          => 'Fred',
            'lastname'      => 'Dancefloor',
            'email'         => 'te.frederic@gmail.com',
            'password'      => '$2y$10$UNX1dW20SSa8gqzqZoVq5emO3SeOXLgkMvCDhrddH7j89TuZ2pPya',
            'picture'       => 'images/teachers/fred-square.png',
            'portrait'      => 'images/teachers/fred.jpg',
            'gender'        => 'male',
            'mobile'        => '+41 76 571 2003',
            'email_verified_at' => now(),            
        ]);        
        $fred->roles()->attach([2, 3, 6]);
        $fred->ownedTeams()->save(Team::forceCreate([
            'user_id' => $fred->id,
            'name' => explode(' ', $fred->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));

        $kelly = User::firstOrCreate([
            'name'          => 'Kelly',
            'lastname'      => 'Mota',
            'email'         => 'kelly@dancefloorgenevasalsa.ch',
            'password'      => Hash::make('password'),
            'picture'       => 'images/teachers/kelly-square.png',
            'portrait'      => 'images/teachers/kelly.jpg',
            'gender'        => 'female',
            'mobile'        => '+41 76 571 4928',
            'email_verified_at' => now(),
        ]);
        $kelly->roles()->attach(6);
        $kelly->ownedTeams()->save(Team::forceCreate([
            'user_id' => $kelly->id,
            'name' => explode(' ', $kelly->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));

        $kouame = User::firstOrCreate([
            'name'          => 'Kouamé',
            'lastname'      => 'Kouadio',
            'email'         => 'kouame@dancefloorgva.com',
            'password'      => '$2y$10$AGr3NSvhPFYZ7R7eA.bMa.XMIjR7gJteJc1sGlfTe3gKjLOXJxJGm',
            'picture'       => 'images/teachers/kouame-square.png',
            'portrait'      => 'images/teachers/kouame.jpg',
            'gender'        => 'male',
            'mobile'        => '+41 76 571 3939',
            'email_verified_at' => now(),
        ]);
        $kouame->roles()->attach([2, 3, 6]);
        $kouame->ownedTeams()->save(Team::forceCreate([
            'user_id' => $kouame->id,
            'name' => explode(' ', $kouame->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));

        $laety = User::firstOrCreate([
            'name'          => 'Laëtycia',
            'lastname'      => 'Vumuka',
            'email'         => 'laetycia.vumuka@gmail.com',
            'password'      => Hash::make('password'),
            'picture'       => 'images/teachers/laetycia-square.png',
            'portrait'      => 'images/teachers/laetycia.jpg',
            'gender'        => 'female',
            'mobile'        => '+41 76 571 3939',
            'email_verified_at' => now(),
        ]);
        $laety->roles()->attach(6);
        $laety->ownedTeams()->save(Team::forceCreate([
            'user_id' => $laety->id,
            'name' => explode(' ', $laety->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));

        $mona = User::firstOrCreate([
            'name'          => 'Mona',
            'lastname'      => 'Georgieva',
            'email'         => 'monageorgieva@gmail.com',
            'password'      => Hash::make('password'),
            'picture'       => 'images/teachers/mona-square.png',
            'portrait'      => 'images/teachers/mona.jpg',
            'gender'        => 'female',
            'mobile'        => '+41 76 571 0392',
            'email_verified_at' => now(),
        ]);
        $mona->roles()->attach(6);
        $mona->ownedTeams()->save(Team::forceCreate([
            'user_id' => $mona->id,
            'name' => explode(' ', $mona->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));

        $sabrina = User::firstOrCreate([
            'name'          => 'Sabrina',
            'lastname'      => 'Giacomini',
            'email'         => 'sab86_81@hotmail.com',
            'password'      => Hash::make('password'),
            'picture'       => 'images/teachers/sabrina-square.png',
            'portrait'      => 'images/teachers/sabrina.jpg',
            'gender'        => 'female',
            'mobile'        => '+41 76 571 2312',
            'email_verified_at' => now(),
        ]);
        $sabrina->roles()->attach(6);
        $sabrina->ownedTeams()->save(Team::forceCreate([
            'user_id' => $sabrina->id,
            'name' => explode(' ', $sabrina->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));

        $sonia = User::firstOrCreate([
            'name'          => 'Sonia',
            'lastname'      => 'Martinez',
            'email'         => 'Sonia.martinez001@gmail.com',
            'password'      => Hash::make('password'),
            'picture'       => 'images/teachers/sonia-square.png',
            'portrait'      => 'images/teachers/sonia.jpg',
            'gender'        => 'female',
            'mobile'        => '+41 76 571 3221',
            'email_verified_at' => now(),
        ]);
        $sonia->roles()->attach(6);
        $sonia->ownedTeams()->save(Team::forceCreate([
            'user_id' => $sonia->id,
            'name' => explode(' ', $sonia->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));

        $vivien = User::firstOrCreate([
            'name'          => 'Vivien',
            'lastname'      => 'Hochstatter',
            'email'         => 'vivien.m.hoch@gmail.com',
            'password'      => Hash::make('password'),
            'picture'       => 'images/teachers/vivien-square.png',
            'portrait'      => 'images/teachers/vivien.jpg',
            'gender'        => 'male',
            'mobile'        => '+41 76 571 19393',
            'email_verified_at' => now(),
        ]);
        $vivien->roles()->attach(6);
        $vivien->ownedTeams()->save(Team::forceCreate([
            'user_id' => $vivien->id,
            'name' => explode(' ', $vivien->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));

        $yann = User::firstOrCreate([
            'name'          => 'Yann',
            'lastname'      => 'Mayor',
            'email'         => 'mayor@geaction.com',
            'password'      => Hash::make('password'),
            'picture'       => 'images/teachers/yann-square.png',
            'portrait'      => 'images/teachers/yann.jpg',
            'gender'        => 'male',
            'mobile'        => '+41 76 571 3577',
            'email_verified_at' => now(),
        ]);
        $yann->roles()->attach(6);
        $yann->ownedTeams()->save(Team::forceCreate([
            'user_id' => $yann->id,
            'name' => explode(' ', $yann->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));

        $edgar = User::firstOrCreate([
            'name'          => 'Edgar',
            'lastname'      => 'Ochoa',
            'email'         => 'edgar8amedina@gmail.com',
            'password'      => '$2y$10$5EpVNgK0x48poTLdwlQlhu/mExHKGuwRbHF1a.5vd6iVJDywROymi',
            'gender'        => 'male',
            'mobile'        => '+41 76 571 3523',
            'email_verified_at' => now(),
            'facebook' => 'https://www.facebook.com/edgar.ochoa.7161',
        ]);
        $edgar->roles()->attach([2,3,6]);
        $edgar->ownedTeams()->save(Team::forceCreate([
            'user_id' => $edgar->id,
            'name' => explode(' ', $edgar->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));

        $jess = User::firstOrCreate([
            'name'          => 'Jessica',
            'lastname'      => 'Mayor',
            'email'         => 'jessica@dancefloorgenevasalsa.ch',
            'password'      => Hash::make('password'),
            'gender'        => 'female',
            'mobile'        => '+41 76 232 1523',
            'email_verified_at' => now(),
        ]);
        $jess->roles()->attach(6);
        $jess->ownedTeams()->save(Team::forceCreate([
            'user_id' => $jess->id,
            'name' => explode(' ', $jess->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));

        $ivan = User::firstOrCreate([
            'name'          => 'Ivan',
            'lastname'      => 'Larson',
            'email'         => 'ivan@dancefloorgenevasalsa.ch',
            'password'      => Hash::make('password'),
            'gender'        => 'male',
            'mobile'        => '+41 76 232 1523',
            'email_verified_at' => now(),
        ]);
        $ivan->roles()->attach(6);
        $ivan->ownedTeams()->save(Team::forceCreate([
            'user_id' => $ivan->id,
            'name' => explode(' ', $ivan->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));

        $diana = User::firstOrCreate([
            'name'          => 'Diana',
            'lastname'      => 'Taveira',
            'email'         => 'diana@dancefloorgenevasalsa.ch',
            'password'      => Hash::make('password'),
            'gender'        => 'female',
            'mobile'        => '+41 76 232 1233',
            'email_verified_at' => now(),
        ]);
        $diana->roles()->attach(6);
        $diana->ownedTeams()->save(Team::forceCreate([
            'user_id' => $diana->id,
            'name' => explode(' ', $diana->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));

        $kevin = User::firstOrCreate([
            'name'          => 'Kevin',
            'lastname'      => 'Michael',
            'email'         => 'kevin@dancefloorgenevasalsa.ch',
            'password'      => Hash::make('password'),
            'gender'        => 'male',
            'mobile'        => '+41 76 232 1053',
            'email_verified_at' => now(),
        ]);
        $kevin->roles()->attach(6);
        $kevin->ownedTeams()->save(Team::forceCreate([
            'user_id' => $kevin->id,
            'name' => explode(' ', $kevin->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));

        $laura = User::firstOrCreate([
            'name'          => 'Laura',
            'lastname'      => 'Boscardin',
            'email'         => 'laura@dancefloorgenevasalsa.ch',
            'password'      => Hash::make('password'),
            'gender'        => 'female',
            'mobile'        => '+41 76 232 1053',
            'email_verified_at' => now(),
        ]);
        $laura->roles()->attach(6);
        $laura->ownedTeams()->save(Team::forceCreate([
            'user_id' => $laura->id,
            'name' => explode(' ', $laura->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
