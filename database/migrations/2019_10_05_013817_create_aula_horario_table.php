<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAulaHorarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aula_horario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aula_id')->unsigned();
            $table->foreign('aula_id')->references('id')->on('aulas');

            $table->integer('horario_id')->unsigned();
            $table->foreign('horario_id')->references('id')->on('horarios');
            $table->boolean('is_used')->default(false);
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
        Schema::dropIfExists('aula_horario');
    }
}
