<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faqs')->insert([
            'vraag' => 'Wat zijn de kosten van de loop?',
            'antwoord' => 'Dinnerwalks is een initiatief om de lokale horeca te steunen in deze moeilijke tijd. We proberen de kosten dan ook zo laag mogelijk te houden. We vragen u een eenmalige bijdrage van €3.50 voor de deelname, maar de kosten voor de gerechtjes bepalen de horecazaken zelf en betaalt u dus ook ter plekke. U bent uiteraard niet verplicht om bij elke zaak een gerechtje af te nemen.'
        ]);
        DB::table('faqs')->insert([
            'vraag' => 'Hoe moet ik betalen voor de wandeling?',
            'antwoord' => 'U maakt een reservering via het reserveringssysteem op onze website. Na uw reservering ontvangt u een e-mail met daarin alle benodigde gegevens om uw wandeling een succes te maken.'
        ]);
        DB::table('faqs')->insert([
            'vraag' => 'Hoe ontvang ik alle informatie over de wandeling?',
            'antwoord' => 'Wanneer u betaald heeft ontvangt u een dag voor de route van de wandeling, een link de podcast en uw unieke code. Met deze code ontvangt u bij de deelnemende horeca een gerechtje tegen een gereduceerde prijs.'
        ]);
        DB::table('faqs')->insert([
            'vraag' => 'Hoe wordt er rekening gehouden met de corona maatregelen?',
            'antwoord' => 'Op dit moment mogen mensen van de overheid met maximaal 2 personen buiten zijn. Om die reden is ons maximum ingesteld op 2 personen per tijdslot. Ben u met meer personen van 1 huishouden, dan kan u meerdere tijdsloten achter elkaar reserveren. Zijn deze vol? Dan zijn wij helaas genoodzaakt u op een ander moment de wandeling te laten wandelen. Tijdens het afhalen van de gerechten verzoeken wij u vriendelijk een mondkapje te dragen. Ook vragen wij u niet bij de horecazaken te blijven hangen, maar met u gerechtjes door te wandelen. Wij zijn ons bewust van de gevaren van Corona en houden hier dan ook voldoende rekening mee. Wilt u meer informatie? Kijk dan op: rijksoverheid.nl'
        ]);
        DB::table('faqs')->insert([
            'vraag' => 'Wanneer vinden de wandelingen plaats?',
            'antwoord' => 'Onze wandelingen zijn elke zaterdag en zondag en duren ongeveer 2 tot 2,5 uur.'
        ]);
        DB::table('faqs')->insert([
            'vraag' => 'Wat zijn onze voorwaarden?',
            'antwoord' => 'Wij kunnen het inschrijfgeld van €3.50 helaas niet teruggeven, omdat het onder elke weersomstandheid mogelijk is om de route te wandelen. Tenzij de wereld wordt veroverd door aliëns, dat is een ander verhaal. De code die u ontvangt is eenmalig en persoonsgebonden.'
        ]);
    }
}
