<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Walk;
use DB;

class PodcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $walk = Walk::where('name', 'culinair')->first();
        DB::table('podcasts')->insert([
            'walk_id' => $walk->id,
            'stored_location' => 'storage/walks/'. $walk->location->name . strtolower($walk->name) .'/podcasts/Deel_1.mp3'
        ]);
        DB::table('podcasts')->insert([
            'walk_id' => $walk->id,
            'stored_location' => 'storage/walks/'. $walk->location->name . strtolower($walk->name) .'/podcasts/Deel_2.mp3'
        ]);
        DB::table('podcasts')->insert([
            'walk_id' => $walk->id,
            'stored_location' => 'storage/walks/'. $walk->location->name . strtolower($walk->name) .'/podcasts/Deel_3.mp3'
        ]);
        DB::table('podcasts')->insert([
            'walk_id' => $walk->id,
            'stored_location' => 'storage/walks/'. $walk->location->name . strtolower($walk->name) .'/podcasts/Deel_4.mp3'
        ]);
        DB::table('podcasts')->insert([
            'walk_id' => $walk->id,
            'stored_location' => 'storage/walks/'. $walk->location->name . strtolower($walk->name) .'/podcasts/Deel_5.mp3'
        ]);
        DB::table('podcasts')->insert([
            'walk_id' => $walk->id,
            'stored_location' => 'storage/walks/'. $walk->location->name . strtolower($walk->name) .'/podcasts/Deel_6.mp3'
        ]);
    }
}
