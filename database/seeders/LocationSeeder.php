<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'name'          => 'AJ Studio',
            'slug'          => 'aj-studio',
            'shortname'     => 'AJ Studio',
            'address'       => 'Rue de carouge 35',            
            'postal_code'   => '1205',
            'city'          => 'Genève',
            'neighborhood'  => 'Planpalais',
            'state'         => 'Genève',
            'country'       => 'Switzerland',
            'google_maps_shortlink'    => 'https://goo.gl/maps/YQW9FN34QEn',
            'google_maps'    => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11047.142782797582!2d6.1436611!3d46.1948231!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcf3f3e883bf9f03!2sGeneva+Swing!5e0!3m2!1sfr!2sch!4v1525178730015" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>',            
        ]);

        Location::create([
            'name'          => 'Bartdak',
            'slug'          => 'bartdak',
            'shortname'     => 'Bartdak',
            'address'       => 'Rue de Lyon 106',            
            'postal_code'   => '1203',
            'city'          => 'Genève',
            'neighborhood'  => 'Servette',
            'state'         => 'Genève',
            'country'       => 'Switzerland',
            'google_maps'   => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.0673254301587!2d6.121727250886276!3d46.20911567901434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c64c63dece719%3A0xcb3e6fd72d729c88!2sRue+de+Lyon+106%2C+1203+Gen%C3%A8ve!5e0!3m2!1sfr!2sch!4v1457708787459" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'google_maps_shortlink' => 'https://goo.gl/maps/HSbcnMqapeE2',
        ]);

        Location::create([
            'name'          => 'Corps à Corps & Âme',
            'slug'          => 'corps-a-corps-ame',
            'shortname'     => 'CCA',
            'address'       => 'Rue de la Servette 23',            
            'postal_code'   => '1201',
            'city'          => 'Genève',
            'neighborhood'  => 'Servette',
            'state'         => 'Genève',
            'country'       => 'Switzerland',
            'google_maps'   => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.030388440152!2d6.135446050886288!3d46.20985047901436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c64d99dbb39db%3A0x6944b6daff25080d!2sRue+de+la+Servette+23%2C+1201+Gen%C3%A8ve!5e0!3m2!1sfr!2sch!4v1457693002881" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'google_maps_shortlink' => 'https://goo.gl/maps/mBi7u3WwWEw',
        ]);

        Location::create([
            'name'          => 'Dance Aera',
            'slug'          => 'dance-aera',
            'address'       => 'Rue de la Coulouvrenière 19',            
            'postal_code'   => '1204',
            'city'          => 'Genève',
            'neighborhood'  => 'Jonction',
            'state'         => 'Genève',
            'country'       => 'Switzerland',
            'google_maps_shortlink' => 'https://goo.gl/maps/TNqn6DS9XG72',
            'google_maps'   => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.32452960493!2d6.13512491558237!3d46.20399877911661!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c64d69326bcf9%3A0xce387c0283cd71d2!2sDance+Area+Geneva!5e0!3m2!1sfr!2sch!4v1525431673367" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>',
        ]);

        Location::create([
            'name'          => 'Diafa',
            'slug'          => 'diafa',
            'address'       => 'Rue Pictet-de-Bock 6',
            'address_info'  => '',
            'postal_code'   => '1204',
            'city'          => 'Genève',
            'neighborhood'  => 'Plainpalais',
            'state'         => 'Genève',
            'country'       => 'Switzerland',
            'google_maps'   => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.8433395464053!2d6.1403078155820365!3d46.193676079116464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c7ad43a4d5831%3A0x6848ee65b49c3016!2sEcole+Diafa+-+Danse%2C+Yoga+%26+Th%C3%A9%C3%A2tre!5e0!3m2!1sfr!2sch!4v1499200062463" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'google_maps_shortlink' => 'https://goo.gl/maps/zET3ucqTyZm',
        ]);

        Location::create([
            'name'          => 'Encore en Corps',
            'slug'          => 'encore-en-corps',
            'address'       => 'chemin de la gravière 8bis',            
            'postal_code'   => '1227',
            'city'          => 'Les Acacias',
            'neighborhood'  => 'Les Acacias',
            'state'         => 'Genève',
            'country'       => 'Switzerland',
            'google_maps'   => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.687354015368!2d6.1282885161465455!3d46.196779892281754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c7b2d11426ad3%3A0x70d4906d0fe004a7!2sEcole+de+danse+Escope!5e0!3m2!1sfr!2sch!4v1526036297673" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'google_maps_shortlink' => 'https://goo.gl/maps/4Kofp8G3kZw',
        ]);

        Location::create([
            'name'          => 'Studio Vélodrome',
            'slug'          => 'studio-velodrome',
            'shortname'     => 'Vélodrome',
            'address'       => 'Rue du vélodrome 18',            
            'postal_code'   => '1205',
            'city'          => 'Genève',
            'neighborhood'  => 'Jonction',
            'state'         => 'Genève',
            'country'       => 'Switzerland',
            'google_maps'   => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d22092.292178820164!2d6.131432!3d46.199781!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c64d2e151c4db%3A0xea431fb4020ab483!2sRue+du+V%C3%A9lodrome+14%2C+1205+Gen%C3%A8ve%2C+Suisse!5e0!3m2!1sfr!2sus!4v1534868845352" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'google_maps_shortlink' => 'https://goo.gl/maps/yVPkqABgDX92',
        ]);

        Location::create([
            'name'          => 'Usine Kugler',
            'slug'          => 'usine-kugler',
            'shortname'     => 'Kugler',
            'address'       => 'Chemin de la Truite 4bis',            
            'postal_code'   => '1205',
            'city'          => 'Genève',
            'neighborhood'  => 'Jonction',
            'state'         => 'Genève',
            'country'       => 'Switzerland',
            'google_maps'   => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.432166910195!2d6.123457550885996!3d46.20185727901415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c64cc4422a7b7%3A0x2db9e10eae203d26!2sRue+de+la+Truite+4%2C+1205+Gen%C3%A8ve!5e0!3m2!1sfr!2sch!4v1457709064486" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'google_maps_shortlink' => 'https://goo.gl/maps/rgWXRXd8bvu',
        ]);

        Location::create([
            'name'          => 'Vivre son Corps',
            'slug'          => 'vivre-son-corps',
            'address'       => 'Rue de la Servette 61',            
            'postal_code'   => '1202',
            'city'          => 'Genève',
            'neighborhood'  => 'Servette',
            'state'         => 'Genève',
            'country'       => 'Switzerland',
            'google_maps'   => '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11043.75018100402!2d6.1334893!3d46.2116974!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc81314a6b5190b1a!2sEcole+de+danse+Vivre+son+Corps!5e0!3m2!1sfr!2sch!4v1561640618761!5m2!1sfr!2sch" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'google_maps_shortlink' => 'https://goo.gl/maps/bkZCzVVEaXXtLXVn8',
        ]);

        Location::create([
            'name'          => 'Holmes Place',
            'slug'          => 'holmes-place',
            'address'       => 'Rue de Rhone 50',            
            'postal_code'   => '1204',
            'city'          => 'Genève',
            'neighborhood'  => 'Bel-air',
            'state'         => 'Genève',
            'country'       => 'Switzerland',
            'google_maps'   => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11044.63051346102!2d6.129786193094432!3d46.20731921422737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c652eb58b9267%3A0xa36a1b6262509a1e!2sRue%20du%20Rh%C3%B4ne%2050%2C%201204%20Gen%C3%A8ve!5e0!3m2!1sfr!2sch!4v1596361360338!5m2!1sfr!2sch" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>',
            'google_maps_shortlink' => 'https://goo.gl/maps/BzJ3bzW3Y58d8ATw8',
        ]);

        Location::create([
            'name'          => 'Body Black Gym (Prilly)',
            'slug'          => 'body-black-gym',
            'address'       => 'Chemin du Viaduc 12',            
            'postal_code'   => '1008',
            'city'          => 'Prilly-Malley',
            'neighborhood'  => 'Bel-air',
            'state'         => 'Lausanne',
            'country'       => 'Switzerland',
            'google_maps'   => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9428.624492485387!2d6.583564796501738!3d46.51882252640237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c31c8a3f7ad0f%3A0x505904a541794d24!2sChemin%20du%20Viaduc%2012%2C%201008%20Prilly!5e0!3m2!1sfr!2sch!4v1596361217342!5m2!1sfr!2sch" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>',
            'google_maps_shortlink' => 'https://goo.gl/maps/q3fzmaEeWbCwRFmn7',
        ]);
    }
}
