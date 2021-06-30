<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;
use App\Models\DiscountCode;
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
            "location_id" => Location::where('name', 'leiden')->first()->id,
            'discount_code_id' => DiscountCode::all()->random()->id,
            "name" => "cocktail",
            "description" => "Een leuke cocktail wandeling door het mooie historische centrum van Leiden! We hebben voor jullie 2 routes uitgestippeld, aan jullie dus de keuze hoe ver je wilt wandelen (+/- 6 & +/- 7 km). Je kan op eigen gelegenheid vanaf 14:00 uur starten met wandelen. Geniet onderweg van 4 heerlijke gerechtjes bij Van Buuren, Aperitivo, Pakhuis en Buddhas. Wist jij dat in Leiden de koudste tempratuur ooit gemeten is? Of dat het huishouden van Jan Steen zich oorspronkelijk in Leiden bevond? En waar komt het spreekwoord: ‘Je er met een Jantje van Leiden van afmaken’ eigenlijk vandaan? Luister voor deze en nog veel meer leuke verhalen over Leiden onze podcast tijdens de wandeling. Dinnerwalks neemt je hierin letterlijk en figuurlijk aan de hand en leidt je door Leiden en zijn verhalen!",
            "status" => "Active",
            "price" => 3.50,
            "preview" => "storage/walks/leidencocktail/cocktail.jpeg",
            "pdf" => "storage/walks/leidencocktail/leiden.pdf",

            "max_people" => 4,
            "max_booking_date" => date('Y-m-d', $date),
        ]);

        DB::table('walks')->insert([
            "location_id" => Location::where('name', 'leiden')->first()->id,
            'discount_code_id' => DiscountCode::all()->random()->id,
            "name" => "culinair",
            "description" => "Een leuke culinaire wandeling door het mooie historische centrum van Leiden! We hebben voor jullie 2 routes uitgestippeld, aan jullie dus de keuze hoe ver je wilt wandelen (+/- 6 & +/- 7 km). Je kan op eigen gelegenheid vanaf 14:00 uur starten met wandelen. Geniet onderweg van 4 heerlijke gerechtjes bij Van Buuren, Aperitivo, Pakhuis en Buddhas. Wist jij dat in Leiden de koudste tempratuur ooit gemeten is? Of dat het huishouden van Jan Steen zich oorspronkelijk in Leiden bevond? En waar komt het spreekwoord: ‘Je er met een Jantje van Leiden van afmaken’ eigenlijk vandaan? Luister voor deze en nog veel meer leuke verhalen over Leiden onze podcast tijdens de wandeling. Dinnerwalks neemt je hierin letterlijk en figuurlijk aan de hand en leidt je door Leiden en zijn verhalen!",
            "status" => "Active",
            "price" => 3.50,
            "preview" => "storage/walks/leidenculinair/leiden.png",
            "pdf" => "storage/walks/leidenculinair/leiden.pdf",
            "max_people" => 4,
            "max_booking_date" => date('Y-m-d', $date),
        ]);

    }
}
