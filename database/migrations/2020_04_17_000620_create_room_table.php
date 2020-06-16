<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateroomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name', 45)->nullable(); 
            $table->string('location', 45)->nullable(); 
            $table->string('number', 45)->nullable(); 
            $table->string('capacity', 45)->nullable(); 
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);
            //Chave estrangeira de Perfil
            $table->integer('equipament_id')->unsigned()->nullable();
            $table->foreign('equipament_id')->references('id')->on('equipaments');
            // Chave estrangeira de Perfil   
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
        Schema::dropIfExists('room');
    }
}
