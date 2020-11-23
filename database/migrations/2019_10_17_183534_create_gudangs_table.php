<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreategudangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_owner');
            $table->string('name_building');
            $table->string('address_building');
            $table->bigInteger('cost');
            $table->integer('capacity');
            $table->string('description');
            $table->string('files');
            $table->boolean('antarjemput');
            $table->boolean('pendingin');
            $table->boolean('sirkulasi_udara');
            $table->boolean('submission')->default('1');
            $table->boolean('verif')->default('0');
            $table->boolean('edit')->default('0');
            $table->timestamps();

            $table->foreign('id_owner')->references('id')->on('users')->ondelete('restrict');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gudangs');
    }
}
