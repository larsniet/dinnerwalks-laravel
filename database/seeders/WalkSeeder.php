<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        $date = strtotime('04/10/2021');

        DB::table('walks')->insert([
            "locatie" => "Noordwijk",
            "beschrijving" => "Mooi plekkie aan de zee",
            "preview" => "storage/walks/noordwijk/noordwijk.jpg",
            "max_aantal_personen" => 2,
            "max_boekings_datum" => date('Y-m-d', $date),
            "prijs" => 3.50
        ]);
        DB::table('walks')->insert([
            "locatie" => "Katwijk",
            "beschrijving" => "Lekker mooi strand en ondergrondse garage",
            "preview" => "storage/walks/katwijk/katwijk.jpg",
            "max_aantal_personen" => 2,
            "max_boekings_datum" => date('Y-m-d', $date),
            "prijs" => 3.50
        ]);
    }
}
