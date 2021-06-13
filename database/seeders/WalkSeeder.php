<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kortingscode;
use DB;

class WalkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = strtotime('04/10/2022');

        DB::table('walks')->insert([
            "locatie" => "Noordwijk",
            "beschrijving" => "Mooi plekkie aan de zee",
            "kortingscode" => Kortingscode::all()->random()->code,
            "preview" => "storage/walks/noordwijk/noordwijk.jpg",
            "pdf" => "storage/walks/noordwijk/noordwijk.pdf",

            "podcast1" => "storage/walks/noordwijk/podcasts/Deel_1.mp3",
            "podcast2" => "storage/walks/noordwijk/podcasts/Deel_2.mp3",
            "podcast3" => "storage/walks/noordwijk/podcasts/Deel_3.mp3",
            "podcast4" => "storage/walks/noordwijk/podcasts/Deel_4.mp3",
            "podcast5" => "storage/walks/noordwijk/podcasts/Deel_5.mp3",

            "max_aantal_personen" => 2,
            "max_boekings_datum" => date('Y-m-d', $date),
            "status" => "Actief",
            "prijs" => 3.50
        ]);
        DB::table('walks')->insert([
            "locatie" => "Katwijk",
            "beschrijving" => "Lekker mooi strand en ondergrondse garage",
            "kortingscode" => Kortingscode::all()->random()->code,
            "preview" => "storage/walks/katwijk/katwijk.jpg",
            "pdf" => "storage/walks/katwijk/katwijk.pdf",

            "podcast1" => "storage/walks/katwijk/podcasts/Deel_1.mp3",
            "podcast2" => "storage/walks/katwijk/podcasts/Deel_2.mp3",
            "podcast3" => "storage/walks/katwijk/podcasts/Deel_3.mp3",
            "podcast4" => "storage/walks/katwijk/podcasts/Deel_4.mp3",
            "podcast5" => "storage/walks/katwijk/podcasts/Deel_5.mp3",

            "max_aantal_personen" => 2,
            "max_boekings_datum" => date('Y-m-d', $date),
            "status" => "Actief",
            "prijs" => 3.50
        ]);
    }
}
