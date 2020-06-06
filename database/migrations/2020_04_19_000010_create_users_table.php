<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->String('birthdate')->nullable();
            $table->String('genre', 1)->nullable();
            $table->string('email')->unique();
            $table->string('user')->unique();
            $table->string('password');
            $table->String('telephone', 15)->nullable();
            $table->String('sector', 45)->nullable();
            $table->String('description', 45)->nullable();
            $table->string('avatar')->default('default.jpg');
            $table->boolean('active')->default(true);

            //Chave estrangeira de Perfil
            $table->integer('profile')->unsigned()->nullable();
            $table->foreign('profile')->references('id')->on('profiles');
            // Chave estrangeira de Perfil           
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
