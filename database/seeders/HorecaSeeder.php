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
            'naam' => "Beach",
            'email' => Str::random(10).'@gmail.com',
            'logo' => "images/beach.jpg",
            "adres" => "Zeereep 102",
            'website' => 'https://beachnoordwijk.nl/',
            'instagram' => 'https://www.instagram.com/beachnoordwijk/',
            'facebook' => 'https://www.facebook.com/beach.noordwijk',
            'walk_id' => 1,
        ]);

        DB::table('horecas')->insert([
            'naam' => "Beachclub C",
            'email' => Str::random(10).'@gmail.com',
            'logo' => "images/beachclubc.png",
            "adres" => "Kon. Astrid Boulevard 104",
            'website' => 'https://beachclubcnoordwijk.nl/',
            'instagram' => 'https://www.instagram.com/beachclub.c.noordwijk/',
            'facebook' => 'https://www.facebook.com/BeachclubC',
            'walk_id' => 1,
        ]);

        DB::table('horecas')->insert([
            'naam' => "Open Doors",
            'email' => Str::random(10).'@gmail.com',
            'logo' => "images/opendoors.jpg",
            "adres" => "De Grent 34",
            'website' => 'https://open-doors.nl/',
            'instagram' => 'https://www.instagram.com/opendoors_noordwijk/',
            'facebook' => 'https://www.facebook.com/OpenDoorsNoordwijk',
            'walk_id' => 1,
        ]);

        DB::table('horecas')->insert([
            'naam' => "Pannekoekenhuisje",
            'email' => Str::random(10).'@gmail.com',
            'logo' => "images/pannekoekenhuisje.png",
            "adres" => "Kon. Wilhelmina Boulevard 15A-B",
            'website' => 'https://www.hetpannekoekenhuisje.nl/',
            'instagram' => 'https://www.instagram.com/pannekoekenhuisjenoordwijk/',
            'facebook' => 'https://www.facebook.com/pannekoekenhuisjenoordwijk',
            'walk_id' => 1,
        ]);

        DB::table('horecas')->insert([
            'naam' => "Alexander Beach Club",
            'email' => Str::random(10).'@gmail.com',
            'logo' => "images/alexander.png",
            "adres" => "Koningin Wilhelmina Boulevard afrit 10",
            'website' => 'https://www.alexanderbeach.nl/',
            'instagram' => 'https://www.instagram.com/alexanderbeachclubnoordwijk/',
            'facebook' => 'https://www.facebook.com/alexanderbeachclubnoordwijk',
            'walk_id' => 1,
        ]);

        DB::table('horecas')->insert([
            'naam' => "Palace Hotel",
            'email' => Str::random(10).'@gmail.com',
            'logo' => "images/palace.png",
            "adres" => "Pickeplein 8",
            'website' => 'https://palacehotel.nl/',
            'instagram' => 'https://www.instagram.com/hotelnoordwijk/',
            'facebook' => 'https://www.facebook.com/PalaceHotelNoordwijk',
            'walk_id' => 1,
        ]);

        DB::table('horecas')->insert([
            'naam' => "Nani",
            'email' => Str::random(10).'@gmail.com',
            'logo' => "images/nani.png",
            "adres" => "Bomstraat 23",
            'website' => 'https://naninoordwijk.sitedish.shop/',
            'instagram' => 'https://www.instagram.com/naninoordwijk.nl/',
            'facebook' => 'https://www.facebook.com/Naninoordwijk',
            'walk_id' => 1,
        ]);

        DB::table('horecas')->insert([
            'naam' => "Paal 14",
            'email' => Str::random(10).'@gmail.com',
            'logo' => "images/paal14.png",
            "adres" => "Boulevard Zeezijde 7",
            'website' => 'https://paal14.nl/',
            'instagram' => 'https://www.instagram.com/strandpaviljoenpaal14/',
            'facebook' => 'https://www.facebook.com/Paal14',
            'walk_id' => 2,
        ]);

        DB::table('horecas')->insert([
            'naam' => "SandCbar",
            'email' => Str::random(10).'@gmail.com',
            'logo' => "images/sandcbar.png",
            "adres" => "Boulevard Zeezijde 43",
            'website' => 'https://www.sandcbar.nl/',
            'instagram' => 'https://www.instagram.com/sandcbar_katwijk/',
            'facebook' => 'https://www.facebook.com/www.sandcbar.nl',
            'walk_id' => 2,
        ]);

        DB::table('horecas')->insert([
            'naam' => "Hotel Steeds aan zee & Grand Cafe de Koningin",
            'email' => Str::random(10).'@gmail.com',
            'logo' => "images/steedsaanzee.png",
            "adres" => "Kon. Wilhelminastraat 14",
            'website' => 'http://steedsaanzee.nl/grand-cafe-restraurant-de-koningin-katwijk/',
            'instagram' => 'https://www.instagram.com/bar70.katwijk/',
            'facebook' => 'https://www.facebook.com/Bar70Katwijk',
            'walk_id' => 2,
        ]);
    }
}
