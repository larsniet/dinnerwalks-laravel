<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;
use App\Models\User;
use DB;
use Str;

class CateringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('caterings')->insert([
            'location_id' => Location::where('name', 'Leiden')->first()->id,
            'user_id' => User::where('email', 'ard@qreca.nl')->first()->id,
            'name' => "Grand Café Van Buuren",
            'logo' => "storage/horeca_images/vanbuuren.jpg",
            "address" => "Stationsweg 7",
            'website' => 'https://www.grandcafevanbuuren.nl/',
            'instagram' => 'https://www.instagram.com/grandcafevanbuuren/',
            'facebook' => 'https://www.facebook.com/GrandCafeVanBuuren',
        ]);
        DB::table('caterings')->insert([
            'location_id' => Location::where('name', 'Leiden')->first()->id,
            'user_id' => User::all()->random()->id,
            'name' => "Aperitivo",
            'logo' => "storage/horeca_images/aperitivo.jpg",
            "address" => "Breestraat 49",
            'website' => 'http://www.aperitivoleiden.nl/',
            'instagram' => 'https://www.instagram.com/aperitivoleiden/',
            'facebook' => 'https://www.facebook.com/aperitivoleiden',
        ]);
        DB::table('caterings')->insert([
            'location_id' => Location::where('name', 'Leiden')->first()->id,
            'user_id' => User::all()->random()->id,
            'name' => "Pakhuis",
            'logo' => "storage/horeca_images/pakhuis.jpg",
            "address" => "Doelensteeg 8",
            'website' => '=https://www.pakhuisleiden.nl/',
            'instagram' => 'https://www.instagram.com/pakhuisleiden/',
            'facebook' => 'https://www.facebook.com/pakhuisleiden',
        ]);
        DB::table('caterings')->insert([
            'location_id' => Location::where('name', 'Leiden')->first()->id,
            'user_id' => User::all()->random()->id,
            'name' => "Buddhas",
            'logo' => "storage/horeca_images/buddhas.png",
            "address" => "Botermarkt 20",
            'website' => 'https://www.buddhas.nl/',
            'instagram' => 'https://www.instagram.com/buddhasleiden/',
            'facebook' => 'https://www.facebook.com/Buddhasleiden',
        ]);

    }
}
