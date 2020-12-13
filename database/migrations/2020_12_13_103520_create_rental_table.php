<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_building');
            $table->dateTime('day_start');
            $table->dateTime('day_over');
            $table->unsignedBigInteger('id_loaner');
            $table->timestamps();

            $table->foreign('id_building')->references('id')->on('buildings')->ondelete('restrict');

            $table->foreign('id_loaner')->references('id')->on('users')->ondelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental');
    }
}
