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
            "locatie" => "Leiden",
            "beschrijving" => "Een leuke culinaire wandeling door het mooie historische centrum van Leiden! We hebben voor jullie 2 routes uitgestippeld, aan jullie dus de keuze hoe ver je wilt wandelen (+/- 6 & +/- 7 km). Je kan op eigen gelegenheid vanaf 14:00 uur starten met wandelen. Geniet onderweg van 4 heerlijke gerechtjes bij Van Buuren, Aperitivo, Pakhuis en Buddhas. Wist jij dat in Leiden de koudste tempratuur ooit gemeten is? Of dat het huishouden van Jan Steen zich oorspronkelijk in Leiden bevond? En waar komt het spreekwoord: ‘Je er met een Jantje van Leiden van afmaken’ eigenlijk vandaan? Luister voor deze en nog veel meer leuke verhalen over Leiden onze podcast tijdens de wandeling. Dinnerwalks neemt je hierin letterlijk en figuurlijk aan de hand en leidt je door Leiden en zijn verhalen!",
            "kortingscode" => Kortingscode::all()->random()->code,
            "preview" => "storage/walks/leiden/leiden.png",
            "pdf" => "storage/walks/leiden/leiden.pdf",

            "podcast1" => "storage/walks/leiden/podcasts/Deel_1.mp3",
            "podcast2" => "storage/walks/leiden/podcasts/Deel_2.mp3",
            "podcast3" => "storage/walks/leiden/podcasts/Deel_3.mp3",
            "podcast4" => "storage/walks/leiden/podcasts/Deel_4.mp3",
            "podcast5" => "storage/walks/leiden/podcasts/Deel_5.mp3",
            "podcast6" => "storage/walks/leiden/podcasts/Deel_6.mp3",

            "max_aantal_personen" => 4,
            "max_boekings_datum" => date('Y-m-d', $date),
            "status" => "Actief",
            "prijs" => 3.50
        ]);
    }
}
