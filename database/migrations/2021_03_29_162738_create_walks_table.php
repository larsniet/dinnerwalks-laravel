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

            $table->unsignedBigInteger("location_id");
            $table->foreign('location_id')->references('id')->on('locations');

            $table->unsignedBigInteger('discount_code_id')->nullable();
            $table->foreign('discount_code_id')->references('id')->on('discount_codes');

            $table->string("name")->unique();
            $table->longText("description");
            $table->string("status");
            $table->float("price");
            $table->binary("preview");
            $table->binary("pdf");
            $table->integer("max_people");
            $table->date("max_booking_date");

            $table->integer("amount_booked")->default(0);
            $table->float("revenue")->default(0);

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
