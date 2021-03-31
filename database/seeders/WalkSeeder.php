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
        DB::table('walks')->insert([
            "locatie" => "noordwijk",
            "beschrijving" => "Mooi plekkie aan de zee",
        ]);
        DB::table('walks')->insert([
            "locatie" => "katwijk",
            "beschrijving" => "Voornamelijk veel katholieken",
        ]);
    }
}
