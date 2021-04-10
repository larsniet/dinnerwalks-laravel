<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoekingenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boekingen', function (Blueprint $table) {
            $table->id();
            $table->date("datum", $precision = 0);
            $table->string("kortingscode");
            $table->integer("personen");
            $table->float("prijs_boeking");
            $table->string("status")->default("Afgebroken");
            
            $table->unsignedBigInteger("walk_id");
            $table->foreign('walk_id')->references('id')->on('walks');

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            
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
        Schema::dropIfExists('boekingen');
    }
}
