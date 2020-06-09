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
            $table->bigIncrements('id');
            $table->string('title');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('color',7);
            $table->string('condition')->nullable();
            $table->string('priority')->nullable();
            $table->string('participants')->nullable();
            //Chave estrangeira de Sala
            $table->integer('room_id')->unsigned()->nullable();
            $table->foreign('room_id')->references('id')->on('room');
            // Chave estrangeira de Sala 
            //Chave estrangeira de Usuário
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            // Chave estrangeira de Usuário 
            $table->longText('description')->nullable();

            $table->timestamps();
            $table->softDeletes();

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
