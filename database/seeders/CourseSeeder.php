<?php

namespace Database\Seeders;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Monday

        $c1 = Course::create([
            'name' => 'Lady Styling Cubaine',
            'slug' => 'lady-styling-cubaine',
            'monday' => 1, 'level' => 'Open level',
            'start_time_mon' => '18:45', 'end_time_mon' => '19:45',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 160, 'reduced_price' => 140,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'styling',
            'type'  => 'class',   
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);        
        $c1->teachers()->attach(6);
        $c1->styles()->attach(1);        
        $c1->classroom()->associate(1)->save(); // AJ Studio
        $c1->students()->attach(1, ['role'=>'student', 'status'=>'registered']);
        $c1->students()->attach(5, ['role'=>'student', 'status'=>'registered']);
        $c1->students()->attach(9, ['role'=>'student', 'status'=>'registered']);
        $c1->students()->attach(15, ['role'=>'student', 'status'=>'registered']);
        
        // $c1->students()->attach(5, ['role'=>'student', 'status'=>'registered']);
        // $c1->students()->attach(7, ['role'=>'student', 'status'=>'registered']);
        // $c1->students()->attach(9, ['role'=>'student', 'status'=>'registered']);
        // $c1->students()->attach(12, ['role'=>'student', 'status'=>'registered', 'option'=> '', 'created_at'=> now()]);

        $c2 = Course::create([
            'name' => 'Afrohouse Afrobeat',
            'slug' => 'afrohouse-afrobeat',
            'monday'=> 1, 'level' => 'Beginner',
            'start_time_mon' => '18:45', 'end_time_mon' => '19:45',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 160, 'reduced_price' => 140,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'footwork',
            'type'  => 'class', 
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c2->teachers()->attach(14); //Ivan
        $c2->styles()->attach(12);        
        $c2->classroom()->associate(3)->save(); //CCA
        // $c2->students()->attach([1,4,6,18,21,12,3]);
        

        $c3 = Course::create([
            'name' => 'Salsa con rumba',
            'slug' => 'salsa-con-rumba',
            'monday'=> 1, 'level' => 'Intermediate',
            'start_time_mon' => '19:00', 'end_time_mon' => '20:00',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 160, 'reduced_price' => 140,
            'user_id' => 1,
            'status'=> 'active',
            'focus' => 'partnerwork',
            'type'  => 'class', 
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c3->teachers()->attach([5,9]); //Kouame & Sonia
        $c3->styles()->attach([1,7]);
        $c3->classroom()->associate(11)->save();       // Holmes
        // $c3->students()->associate([1,6,8,20,23,15,4]);
  

        $c4 = Course::create([
            'name' => 'House Dance',
            'slug' => 'house-dance',
            'monday'=> 1, 'level' => 'Open level',
            'start_time_mon' => '19:50', 'end_time_mon' => '20:50',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 160, 'reduced_price' => 140,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'footwork',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            
        ]);
        $c4->teachers()->attach([6]); // Laety
        $c4->styles()->attach(14);
        $c4->classroom()->associate(1)->save(); // AJ Studio
        

        $c5 = Course::create([
            'name' => 'Hip Hop',
            'slug' => 'hip-hop',
            'monday'=> 1, 'level' => 'Intermediate',
            'start_time_mon' => '19:50', 'end_time_mon' => '19:50',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 160, 'reduced_price' => 140,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'footwork',
            'type'  => 'class', 
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',                        
        ]);
        $c5->teachers()->attach(14); //Ivan
        $c5->styles()->attach(13);        
        $c5->classroom()->associate(3)->save();


        $c6 = Course::create([
            'name' => 'Pasitos con styling',
            'slug' => 'pasitos-con-styling',
            'monday'=> 1, 'level' => 'Intermediate',
            'start_time_mon' => '19:50', 'end_time_mon' => '20:50',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 160, 'reduced_price' => 140,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'footwork',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            
        ]);
        $c6->teachers()->attach([10]); // Vivien
        $c6->styles()->attach(7);
        $c6->classroom()->associate(9)->save();
        // Usine Kugler


        $c7 = Course::create([
            'name' => 'Tiempo contra tiempo',
            'slug' => 'tiempo contra tiempo',
            'monday'=> 1, 'level' => 'Intermediate',
            'start_time_mon' => '20:00', 'end_time_mon' => '21:00',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 180, 'reduced_price' => 160,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'footwork',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',            
        ]);
        $c7->teachers()->attach(5); 
        $c7->styles()->attach(1);
        $c7->classroom()->associate(11)->save();          

        $c8 = Course::create([
            'name' => 'Afrohouse Afrobeat',
            'slug' => 'afrohouse-afrobeat',
            'monday'=> 1, 'level' => 'Beginner',
            'start_time_mon' => '20:55', 'end_time_mon' => '21:55',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 160, 'reduced_price' => 140,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'footwork',
            'type'  => 'class', 
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',                        
        ]);
        $c8->teachers()->attach(6); //laety
        $c8->styles()->attach(12);        
        $c8->classroom()->associate(1)->save(); //AJ Studio

        $c9 = Course::create([
            'name' => 'Afrohouse Afrobeat',
            'slug' => 'afrohouse-afrobeat',
            'monday'=> 1, 'level' => 'Upper Intermediate',
            'start_time_mon' => '20:55', 'end_time_mon' => '21:55',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 160, 'reduced_price' => 140,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'footwork',
            'type'  => 'class',             
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c9->teachers()->attach(14); //Ivan
        $c9->styles()->attach(12);        
        $c9->classroom()->associate(3)->save(); //CCA
        
        $c10 = Course::create([
            'name' => 'Salsa contra afro-cubano',
            'slug' => 'salsa-con-afrocubano',
            'monday'=> 1, 'level' => 'Open level',
            'start_time_mon' => '21:00', 'end_time_mon' => '22:00',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 180, 'reduced_price' => 160,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'footwork',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',                        
        ]);
        $c10->teachers()->attach(5); //Kouame
        $c10->styles()->attach([1,5]);
        $c10->classroom()->associate(11)->save();       // Holmes  


        // Mardi  --------------------------------------------------------///////////
        $c11 = Course::create([
            'name' => 'Salsa cubaine',
            'slug' => 'salsa-cubaine',
            'tuesday'=> 1, 'level' => 'Beginner',
            'start_time_tue' => '18:45', 'end_time_tue' => '19:45',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 160, 'reduced_price' => 140,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'partnerwork',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c11->teachers()->attach([10,8]); // Vivien & Sabrina
        $c11->styles()->attach(1);
        $c11->classroom()->associate(3)->save();


        $c13 = Course::create([
            'name' => 'Footwork Bodymoves',
            'slug' => 'footwork-bodymoves',
            'tuesday'=> 1, 'level' => 'Beginner',
            'start_time_tue' => '19:00', 'end_time_tue' => '20:00',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 160, 'reduced_price' => 140,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'partnerwork',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c13->teachers()->attach(7);
        $c13->styles()->attach([2,3]);
        $c13->classroom()->associate(9)->save();

        
        $c14 = Course::create([
            'name' => 'Preparation atelier choregraphique',
            'slug' => 'atelier-choregraphique',
            'tuesday'=> 1, 'level' => 'Advanced',
            'start_time_tue' => '19:50', 'end_time_tue' => '21:50',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 295, 'reduced_price' => 275,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'Choreography',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c14->teachers()->attach([10,8]);
        $c14->styles()->attach(1);
        $c14->classroom()->associate(3)->save();


        $c15 = Course::create([
            'name' => 'Lady Styling Choré',
            'slug' => 'lady-styling-chore',
            'tuesday'=> 1, 'level' => 'Upper intermediate',
            'start_time_tue' => '19:50', 'end_time_tue' => '21:20',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 220, 'reduced_price' => 200,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'Choreography',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c15->teachers()->attach(5);
        $c15->styles()->attach(2);
        $c15->classroom()->associate(7)->save();


        $c16 = Course::create([
            'name' => 'Lady styling Fusion',
            'slug' => 'lady-styling-fusion',
            'tuesday'=> 1, 'level' => 'Open levels',
            'start_time_tue' => '20:00', 'end_time_tue' => '21:00',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 200, 'reduced_price' => 180,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'Styling',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c16->teachers()->attach(6); 
        $c16->styles()->attach(1);
        $c15->classroom()->associate(9)->save();
        

        $c17 = Course::create([
            'name' => 'Lady Styling',
            'slug' => 'lady-styling',
            'tuesday' => 1, 'level' => 'All levels',
            'start_time_tue' => '19:00', 'end_time_tue' => '20:15',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 180, 'reduced_price' => 160,
            'status'=> 'active',
            'user_id' => 1,
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c17->teachers()->attach(6); 
        $c17->styles()->attach(1);
        $c17->classroom()->associate(9)->save();







        // Mercredi --------------------------------------------------------///////////////////

        $c18 = Course::create([
            'name' => 'Lady Styling cubaine',
            'slug' => 'lady-styling-cubaine',
            'wednesday'=> 1, 'level' => 'Intermediate',
            'start_time_wed' => '18:30', 'end_time_wed' => '19:45',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 200, 'reduced_price' => 180,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'styling',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c18->teachers()->attach(8); 
        $c18->styles()->attach(1);
        $c18->classroom()->associate(9)->save();
        
        
        $c19 = Course::create([
            'name' => 'Shines Footwork',
            'slug' => 'shines-footwork',
            'wednesday'=> 1, 'level' => 'Upper Intermediate',
            'start_time_wed' => '18:45', 'end_time_wed' => '19:45',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 160, 'reduced_price' => 140,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'footwork',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c19->teachers()->attach([2,3]); 
        $c19->styles()->attach(3);
        $c19->classroom()->associate(3)->save();
        

        $c20 = Course::create([
            'name' => 'Lady Styling improvisation',
            'slug' => 'lady-styling-improvisation',
            'wednesday'=> 1, 'level' => 'Upper Intermediate',
            'start_time_wed' => '19:30', 'end_time_wed' => '20:30',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 160, 'reduced_price' => 140,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'styling',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c20->teachers()->attach(15); // diana
        $c20->styles()->attach([1,2,3]);
        $c20->classroom()->associate(10)->save();        

        
        $c21 = Course::create([
            'name' => 'Salsa Fusion (hip-hop)',
            'slug' => 'salsa-fusion-hip-hop',
            'wednesday'=> 1, 'level' => 'Beginner',
            'start_time_wed' => '19:50', 'end_time_wed' => '20:50',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 160, 'reduced_price' => 140,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'footwork',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c21->teachers()->attach(4); 
        $c21->styles()->attach(1);
        $c21->classroom()->associate(9)->save();


        $c22 = Course::create([
            'name' => 'Boogaloo',
            'slug' => 'boogaloo',
            'wednesday'=> 1, 'level' => 'Advanced',
            'start_time_wed' => '19:50', 'end_time_wed' => '20:50',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 160, 'reduced_price' => 140,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'footwork',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c22->teachers()->attach(2); 
        $c22->styles()->attach(7);
        $c22->classroom()->associate(3)->save();

        
        $c23 = Course::create([
            'name' => 'Afrobeat',
            'slug' => 'afrobeat',
            'wednesday'=> 1, 'level' => 'Open level',
            'start_time_wed' => '20:15', 'end_time_wed' => '21:15',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 160, 'reduced_price' => 140,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'footwork',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c23->teachers()->attach(6); 
        $c23->styles()->attach(12);
        $c23->classroom()->associate(3)->save();

        $c24 = Course::create([
            'name' => 'salsa cubaine',
            'slug' => 'salsa-cubaine',
            'wednesday'=> 1, 'level' => 'Beginner',
            'start_time_wed' => '20:30', 'end_time_wed' => '22:00',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 160, 'reduced_price' => 140,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'partnerwork',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c24->teachers()->attach([16,17]);
        $c24->styles()->attach(1);
        $c24->classroom()->associate(10)->save();

        $c25 = Course::create([
            'name' => 'Salsa fusion',
            'slug' => 'salsa-fusion',
            'wednesday'=> 1, 'level' => 'Beginner',
            'start_time_wed' => '20:30', 'end_time_wed' => '22:00',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 160, 'reduced_price' => 140,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'footwork',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c25->teachers()->attach(10); 
        $c25->styles()->attach(10);
        $c25->classroom()->associate(9)->save();








        // Jeudi ------------------------------------------------------------------------------------------------------
        $c26 = Course::create([
            'name' => 'Salsa fusion',
            'slug' => 'salsa-fusion-debutant',
            'thursday'=> 1, 'level' => 'Open level',
            'start_time_thu' => '18:45', 'end_time_thu' => '20:15',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 220, 'reduced_price' => 200,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'footwork',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c26->teachers()->attach([5,3]); 
        $c26->styles()->attach(10);
        $c26->classroom()->associate(3)->save();
        

        $c27 = Course::create([
            'name' => 'Salsa con Reggaeton',
            'slug' => 'salsa-con-reggaeton',
            'thursday'=> 1, 'level' => 'Open level',
            'start_time_thu' => '19:30', 'end_time_thu' => '20:30',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 200, 'reduced_price' => 180,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'footwork',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c27->teachers()->attach(12);
        $c27->styles()->attach(7);
        $c27->classroom()->associate(10)->save();

        $c28 = Course::create([
            'name' => 'Salsa Fusion',
            'slug' => 'salsa-Fusion-interadvance',
            'thursday'=> 1, 'level' => 'Upper Intermediate', 'level_number' => '2',
            'start_time_thu' => '20:20', 'end_time_thu' => '21:50',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 220, 'reduced_price' => 200,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'footwork',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c28->teachers()->attach([3,5]);  
        $c28->styles()->attach(10);
        $c28->classroom()->associate(3)->save();

        $c29 = Course::create([
            'name' => 'Salsa cubaine',
            'slug' => 'salsa-cubaine',
            'thursday'=> 1, 'level' => 'Advanced', 'level_number' => '2',
            'start_time_thu' => '20:20', 'end_time_thu' => '21:50',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 220, 'reduced_price' => 200,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'partnerwork',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c29->teachers()->attach([11,13]);  
        $c29->styles()->attach(1);
        $c29->classroom()->associate(9)->save();

        $c29 = Course::create([
            'name' => 'Lady Styling & Body Movements',
            'slug' => 'lady-styling-body-movements',
            'thursday'=> 1, 'level' => 'Upper intermediate', 'level_number' => '2',
            'start_time_thu' => '20:30', 'end_time_thu' => '22:00',
            'start_date' => Carbon::now(), 'end_date' => Carbon::now()->addMonth(),
            'full_price' => 220, 'reduced_price' => 200,
            'status'=> 'active',
            'user_id' => 1,
            'focus' => 'styling',
            'type'  => 'class',
            'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, nisi hic? Officiis, accusamus provident distinctio, in accusantium deleniti ipsum quidem eveniet optio odio quod veniam sint est vitae. Temporibus vitae pariatur eius, dolore accusamus voluptatibus molestiae quasi, repudiandae labore at minus. Aperiam placeat similique omnis eveniet quasi culpa, aspernatur quidem. Soluta quam temporibus minima repellendus sapiente ipsa accusamus ipsum qui!',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam optio, voluptatum laudantium, cumque inventore enim quibusdam ut repellat mollitia consectetur sequi! Labore nemo non distinctio eos nulla voluptas praesentium odit aliquam expedita, commodi nisi enim quaerat similique accusantium, tempore placeat! Necessitatibus distinctio nemo, deleniti quia laborum animi nulla quisquam beatae id quae sint amet consectetur officiis! Error fugiat qui ex nihil, aut ipsam eos quas nostrum eaque mollitia dignissimos, accusantium dolorem ipsum neque non doloribus tempora in consectetur porro beatae quasi! Fugiat obcaecati, ullam, odit vero necessitatibus ratione hic incidunt neque autem modi nihil, veniam ipsa itaque ea reiciendis omnis?',            
            'teaser_video_1'=> '<iframe width="100%" height="450" src="https://www.youtube.com/embed/bcECi554r30" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_2' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/ii9BJ5GcgwQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'teaser_video_3' => '<iframe width="100%" height="450" src="https://www.youtube.com/embed/2d6Iz0ZjQtk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);
        $c29->teachers()->attach(9);  
        $c29->styles()->attach(1);
        $c29->classroom()->associate(10)->save();

    }
}


//  1 AJ Studio',          
//  2 Bartdak',            
//  3 CCA',                
//  4 Dance Aera',         
//  5 Diafa | Salle A',    
//  5 Diafa | Salle B',    
//  6 Encore en Corps',    
//  7 Studio Vélodrome',   
//  8 Usine Kugler',       
//  9 Vivre son Corps',    
// 10 Holmes Place',       
// 11 Body Black Gym',     

// '1' => 'Cuban salsa',
// '2' => 'Salsa on1', 
// '3' => 'Salsa on2', 
// '4' => 'Rueda de Casino', 
// '5' => 'Afro-cuban', 
// '6' => 'son-cubano', 
// '7' => 'Rumba',
// '8' => 'Boogaloo', 
// '9' => 'Pachanga', 
// '10' => 'Salsa fusion', 
// '11' => 'Dancehall', 
// '12' => 'Afro-beats', 
// '13' => 'Hip-hop', 
// '14' => 'House',
// '15' => 'streching', 

