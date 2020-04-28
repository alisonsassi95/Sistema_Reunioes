<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnoticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnotics', function (Blueprint $table) {
            $table->increments('id')->unique();

            //Chave estrangeira da agenda de exames
            $table->integer('exam_id')->unsigned()->nullable();
            $table->foreign('exam_id')->references('id')->on('exams');

            //Chave extrangeira pessoas - pacientes
            $table->integer('patients_id')->unsigned()->nullable();
            $table->foreign('patients_id')->references('id')->on('peoples');

            //Chave extrangeira pessoas - doutor executante
            $table->integer('doctor_performer_id')->unsigned()->nullable();
            $table->foreign('doctor_performer_id')->references('id')->on('peoples');

            $table->text('diagnostic');
             
            $table->String('status',50)->nullable();

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
        Schema::dropIfExists('diagnotics');
    }
}
