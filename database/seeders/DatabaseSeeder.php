<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        $this->call([
            RoleSeeder::class,
            TeamSeeder::class,
            StyleSeeder::class,

            // 'TeamSeeder',
            //StudentSeeder::class,            
            LocationSeeder::class,
            ClassroomSeeder::class,
            //OnlineCoursesSeeder::class,
            CourseSeeder::class,
            ]
        );

        \App\Models\User::factory(10)->create();
    }
}
