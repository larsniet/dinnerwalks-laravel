<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCateringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caterings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("location_id");
            $table->foreign('location_id')->references('id')->on('locations');

            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users');

            $table->string("name");
            $table->binary("logo");
            $table->string("address");
            $table->string("status")->default("Active");
            $table->string("website");
            $table->string("instagram");
            $table->string("facebook");
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
