<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Str;

class HorecaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('horecas')->insert([
            'naam' => "Grand Café Van Buuren",
            'email' => Str::random(10).'@gmail.com',
            'logo' => "storage/horeca_images/vanbuuren.jpg",
            "adres" => "Stationsweg 7",
            'website' => 'https://www.grandcafevanbuuren.nl/',
            'instagram' => 'https://www.instagram.com/grandcafevanbuuren/',
            'facebook' => 'https://www.facebook.com/GrandCafeVanBuuren',
            'walk_id' => 1,
        ]);
        DB::table('horecas')->insert([
            'naam' => "Aperitivo",
            'email' => Str::random(10).'@gmail.com',
            'logo' => "storage/horeca_images/aperitivo.jpg",
            "adres" => "Breestraat 49",
            'website' => 'http://www.aperitivoleiden.nl/',
            'instagram' => 'https://www.instagram.com/aperitivoleiden/',
            'facebook' => 'https://www.facebook.com/aperitivoleiden',
            'walk_id' => 1,
        ]);
        DB::table('horecas')->insert([
            'naam' => "Pakhuis",
            'email' => Str::random(10).'@gmail.com',
            'logo' => "storage/horeca_images/pakhuis.jpg",
            "adres" => "Doelensteeg 8",
            'website' => '=https://www.pakhuisleiden.nl/',
            'instagram' => 'https://www.instagram.com/pakhuisleiden/',
            'facebook' => 'https://www.facebook.com/pakhuisleiden',
            'walk_id' => 1,
        ]);
        DB::table('horecas')->insert([
            'naam' => "Buddhas",
            'email' => Str::random(10).'@gmail.com',
            'logo' => "storage/horeca_images/buddhas.png",
            "adres" => "Botermarkt 20",
            'website' => 'https://www.buddhas.nl/',
            'instagram' => 'https://www.instagram.com/buddhasleiden/',
            'facebook' => 'https://www.facebook.com/Buddhasleiden',
            'walk_id' => 1,
        ]);

    }
}
