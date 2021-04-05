<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('walks', function (Blueprint $table) {
            $table->id();
            $table->string("locatie")->unique();
            $table->string("beschrijving");
            $table->float("prijs");

            $table->integer("max_aantal_personen");
            $table->date("max_boekings_datum");

            $table->integer("aantal_geboekt")->default(0);
            $table->float("omzet")->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('walks');
    }
}
