<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorecasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horecas', function (Blueprint $table) {
            $table->id();
            $table->string("naam");
            $table->string("email");
            $table->binary("logo");
            $table->string("adres");
            $table->string("status")->default("Actief");
            $table->string("website");
            $table->string("instagram");
            $table->string("facebook");

            $table->unsignedBigInteger("walk_id");
            $table->foreign('walk_id')->references('id')->on('walks');

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
        Schema::dropIfExists('horecas');
    }
}
