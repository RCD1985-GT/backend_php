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
        Schema::create('messages', function (Blueprint $table) { // AQUI VAN LOS CAMPOS DE LA TABLA MESSAGE
            $table->id();
            $table->string('body');
            $table->unsignedBigInteger('user_id'); 
            // $table->unsignedBigInteger('party_id'); 
            $table->string('title');
            $table->timestamps();


            // FOREIGN KEY
            $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('party_id')->references('id')->on('parties');


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
