<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classroom::create([ 'name' => 'AJ Studio',          'slug' => 'aj-studio',      'location_id' => 1 ]);
        Classroom::create([ 'name' => 'Bartdak',            'slug' => 'bartdak',        'location_id' => 2 ]);
        Classroom::create([ 'name' => 'CCA',                'slug' => 'cca',            'location_id' => 3 ]);
        Classroom::create([ 'name' => 'Dance Aera',         'slug' => 'dance-aera',     'location_id' => 4 ]);
        Classroom::create([ 'name' => 'Diafa | Salle A',    'slug' => 'diafa-salle-a',  'location_id' => 5 ]);
        Classroom::create([ 'name' => 'Diafa | Salle B',    'slug' => 'diafa-salle-b',  'location_id' => 5 ]);
        Classroom::create([ 'name' => 'Encore en Corps',    'slug' => 'encore-en-corps','location_id' => 6 ]);
        Classroom::create([ 'name' => 'Studio Vélodrome',   'slug' => 'velodrome',      'location_id' => 7 ]);
        Classroom::create([ 'name' => 'Usine Kugler',       'slug' => 'kugler',         'location_id' => 8 ]);
        Classroom::create([ 'name' => 'Vivre son Corps',    'slug' => 'corps',          'location_id' => 9 ]);
        Classroom::create([ 'name' => 'Holmes Place',       'slug' => 'holmes-place',   'location_id' => 10 ]);
        Classroom::create([ 'name' => 'Body Black Gym',     'slug' => 'body-black-gym', 'location_id' => 11 ]);
    }
}
