<?php

namespace Database\Seeders;

use App\Models\Style;
use Illuminate\Database\Seeder;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        Style::create([
            'name'          => 'Cuban salsa',
            'slug'          => 'cuban-salsa', 
            'music'         => 'Timba, Salsa cubana, Rumba, Afrocuban',
            'family'        => 'Cuban Salsa',
            'description'   => '',
            'color'         => 'red-800', 
            'image'         => '',
            'origin'        => 'Cuba',
            'year'          => '',
        ]);

        Style::create([
            'name'          => 'Salsa on1', 
            'slug'          => 'salsa-on1',
            'music'         => 'Salsa',
            'family'        => 'Line Salsa', 
            // 'description'   => '',
            'color'         => 'blue-800', 
            'image'         => '', 
            'origin'        => 'Los Angeles, USA',
            'year'          => '70\'s',
        ]);

        Style::create([
            'name'          => 'Salsa on2', 
            'slug'          => 'salsa-on2',
            'family'        => 'Line Salsa', 
            // 'description'   => '',
            'color'          => 'blue-700', 
            // 'image'         => '', 
            'origin'        => 'New York, USA',
            'year'          => '60\'s - 70\'s',
        ]);

        Style::create([
            'name'          => 'Rueda de Casino', 
            'slug'          => 'rueda-casino',
            'music'         => 'Timba, Cuban salsa, Salsa',
            'family'        => 'Cuban Salsa',
            'description'   => '',
            'color'         => 'red-700', 
            'image'         => '',
            'origin'        => 'Havana, Cuba',
            'year'          => '1950\'s',
        ]);

        Style::create([
            'name'          => 'Afro-cuban', 
            'slug'          => 'Afro-cuban', 
            'music'         => 'Afro-cuban, Timba, Cuban salsa',
            'family'        => 'Cuban Salsa',
            'description'   => '',
            'color'         => 'red-600', 
            'image'         => '',
            'origin'        => 'Cuba',
            'year'          => '',
        ]);    

        Style::create([
            'name'          => 'Son Cubano', 
            'slug'          => 'son-cubano', 
            'family'        => 'Cuban Salsa', 
            'description'   => '',
            'color'         => 'red-200', 
            'image'         => '', 
            'origin'        => 'Cuba',
            'year'          => ''
        ]);

        Style::create([
            'name'          => 'Rumba',
            'slug'          => 'rumba',
            'music'         => 'Rumba, timba, cuban salsa',
            'family'        => 'Cuban salsa',
            'description'   => '',
            'color'         => 'red-500', 
            'image'         => '',
            'origin'        => 'Cuba',
            'year'          => '19th century',
        ]);

        Style::create([
            'name'          => 'Boogaloo', 
            'slug'          => 'boogaloo', 
            'music'         => 'Funk, Soul, Salsa',
            'family'        => 'Line Salsa', 
            'description'   => 'Boogaloo is a freestyle, improvisational street dance movement of soulful steps and robotic movements which make up the foundations of popping dance and turfing; boogaloo can incorporate illusions, restriction of muscles, stops, robot and/or wiggling. The style also incorporates foundational popping techniques, which were initially referred to as "Posing Hard".It is related to the later electric boogaloo dance.',
            'color'         => 'blue-600', 
            'image'         => '', 
            'origin'        => 'Chicago, USA',
            'year'          => '1965 and 1966',
        ]);

        Style::create([
            'name'          => 'Pachanga', 
            'slug'          => 'pachange', 
            'music'         => 'Pachanga, Salsa',
            'family'        => 'Line Salsa', 
            'description'   => 'Pachanga is a genre of music which is described as a mixture of son montuno and merengue and has an accompanying signature style of dance. This type of music has a festive, lively style and is marked by jocular, mischievous lyrics. Pachanga originated in Cuba in the 1950s and played an important role in the evolution of Caribbean style music as it is today. Considered a prominent contributor to the eventual rise of salsa, Pachanga itself is an offshoot of Charanga style music.[1] Very similar in sound to Cha-Cha but with a notably stronger down-beat, Pachanga once experienced massive popularity all across the Caribbean and was brought to the United States by Cuban immigrants post World War II. This led to an explosion of Pachanga music in Cuban music clubs that influenced Latin culture in the United States for decades to come',
            'color'         => 'blue-500',  
            'origin'        => 'Chicago, USA',
            'year'          => '1965 and 1966',
        ]);

        Style::create([
            'name'          => 'Salsa fusion', 
            'slug'          => 'salsa-fusion', 
            'family'        => 'Fusion', 
            'description'   => '',
            'color'         => 'blue-900', 
            'image'         => '', 
            'origin'        => '',
            'year'          => '',
        ]);
        
        Style::create([
            'name'          => 'Dancehall', 
            'slug'          => 'dancehall',
            'music'         => 'Reggae, R&B, ska, rocksteady, dub, toasting, dancehall',
            'family'        => 'Urban', 
            'description'   => 'Dancehall is a genre of Jamaican popular music that originated in the late 1970s.[4] Initially, dancehall was a more sparse version of reggae than the roots style, which had dominated much of the 1970s.[5][6] In the mid-1980s, digital instrumentation became more prevalent, changing the sound considerably, with digital dancehall (or "ragga") becoming increasingly characterized by faster rhythms. Key elements of dancehall music include its extensive use of Jamaican Patois rather than Jamaican standard English and a focus on the track instrumentals (or "riddims").',
            'color'         => 'green-700', 
            'origin'        => 'Jamaica',
            'year'          => 'Late 70\'s',
        ]);

        Style::create([
            'name'          => 'Afro-beats', 
            'slug'          => 'afro-beats', 
            'music'         => 'Coupé Decalé, afrohouse, afrogroove',
            'family'        => 'Urban', 
            'description'   => 'Afrobeat is a music genre which involves the combination of elements of West African musical styles such as fuji music, yoruba, and highlife with American funk and jazz influences, with a focus on chanted vocals, complex intersecting rhythms, and percussion. The term was coined in the 1960s by Nigerian multi-instrumentalist and bandleader Fela Kuti, who is responsible for pioneering and popularizing the style both within and outside Nigeria. Distinct from Afrobeat is Afrobeats – a sound originating in West Africa in the 21st century, one which takes in diverse influences and is an eclectic combination of genres such as British house music, hiplife, hip hop, dancehall, soca, Jùjú music, highlife, R&B, Ndombolo, Naija beats, Azonto, and Palm-wine music. The two genres, though often conflated, are not the same.',
            'color'         => 'green-600',             
            'origin'        => 'West African',
            'year'          => '1920s',
        ]);

        Style::create([
            'name'          => 'Hip-hop', 
            'slug'          => 'hip-hop',
            'family'        => 'Urban',
            'description'   => 'Hip-hop dance refers to street dance styles primarily performed to hip-hop music or that have evolved as part of hip-hop culture. It includes a wide range of styles primarily breaking which was created in the 1970s and made popular by dance crews in the United States. The television show Soul Train and the 1980s films Breakin, Beat Street, and Wild Style showcased these crews and dance styles in their early stages; therefore, giving hip-hop mainstream exposure. The dance industry responded with a commercial, studio-based version of hip-hop—sometimes called "new style"—and a hip-hop influenced style of jazz dance called "jazz-funk". Classically trained dancers developed these studio styles in order to create choreography from the hip-hop dances that were performed on the street. Because of this development, hip-hop dance is practiced in both dance studios and outdoor spaces.',
            'color'         => 'teal-600',            
            'origin'        => 'USA',
            'year'          => '1970s',
        ]);        

        Style::create([
            'name'          => 'House',
            'slug'          => 'house',
            'music'         => 'House',
            'family'        => 'Urban', 
            'description'   => '',
            'color'         => 'teal-700', 
            'image'         => '', 
            'origin'        => 'Chicago and New York, USA',
            'year'          => '80\'s',
        ]);
        
        Style::create([
            'name'          => 'Streching', 
            'slug'          => 'streching', 
            'family'        => 'Sport', 
            'description'   => '',
            'color'         => 'pink-400', 
            'image'         => '', 
            'origin'        => 'India',
            'year'          => '',
        ]);

                // Style::create([
        //     'name'          => 'Lady Styling', 
        //     'description'   => '',
        //     'icon'          => '', 
        //     'image'         => '',
        //     'origin'        => '',
        //     'year'          => '',
        // ]);

        // Style::create([
        //     'name'          => 'Men Styling', 
        //     'description'   => '',
        //     'icon'          => '', 
        //     'image'         => '',
        //     'origin'        => '',
        //     'year'          => '',
        // ]);
    }
}
