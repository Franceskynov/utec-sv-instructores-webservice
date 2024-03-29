<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacions', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombre');

            $table->integer('ciclo_id')->unsigned();
            $table->foreign('ciclo_id')->references('id')->on('ciclos');

//            $table->integer('horario_id')->unsigned();
//            $table->foreign('horario_id')->references('id')->on('horarios');

            $table->integer('aula_id')->unsigned();
            $table->foreign('aula_id')->references('id')->on('aulas');

            $table->integer('instructor_id')->unsigned();
            $table->foreign('instructor_id')->references('id')->on('instructores');

            $table->integer('materia_id')->unsigned();
            $table->foreign('materia_id')->references('id')->on('materias');

            $table->integer('docente_id')->unsigned();
            $table->foreign('docente_id')->references('id')->on('docentes');

            $table->integer('dia');
            $table->string('nombre_dia');
            $table->time('inicio');
            $table->time('fin');

            $table->boolean('is_enabled')->default(true);
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
        Schema::dropIfExists('asignacions');
    }
}
