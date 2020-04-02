<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_usuari');
            $table->string('titol');
            $table->string('artista');
            $table->text('descripcio');
            $table->dateTime('dia_hora');
            $table->string('lloc');
            $table->integer('aforament');
            $table->integer('entrades_disponibles');
            $table->text('imatge');
            $table->timestamps();

            $table->foreign('id_usuari')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
