<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
                $table->Increments('id')->unique();

                //fullcalendar
                $table->string('title');
                $table->datetime('start_date');
                $table->datetime('end_date');
                //fullcalendar
                $table->text('note')->nullable();
                //Chave extrangeira pessoas - doutor
                $table->integer('doctor_requests_id')->unsigned()->nullable();
                $table->foreign('doctor_requests_id')->references('id')->on('peoples');
                //Chave extrangeira pessoas - doutor solicitante
                //Chave extrangeira pessoas - pacientes
                $table->integer('patients_id')->unsigned()->nullable();
                $table->foreign('patients_id')->references('id')->on('peoples');
                //Chave extrangeira pessoas - pacientes
                //Chave extrangeira equipamentos
                $table->integer('equipament_id')->unsigned()->nullable();
                $table->foreign('equipament_id')-> references('id')->on('equipaments');
                //Chave extrangeira equipamentos
                $table->String('convenant', 200)->nullable();
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
        Schema::dropIfExists('schedules');
    }
}
