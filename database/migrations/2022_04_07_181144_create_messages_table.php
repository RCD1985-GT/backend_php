<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration // CAMBIAR ESTA LINEA EN PARTY Y GAME
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('body');
            $table->timestamps();


            // AQUI TENDRE QUE PONER UNA FOREIGN KEY DE USUARIO PARA RELACIOAR UN MENSAJE CON UN USUARIO

            // AQUI TENDRE QUE PONER UNA FOREIGN KEY DE PARTIDAS PARA RELACIOAR UN MENSAJE CON UNA PARTIDA



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
