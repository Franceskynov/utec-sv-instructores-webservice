<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->double('nota')->default(0.0);
            $table->double('autoevaluacion')->default(0.0);
            $table->boolean('is_autoevaluado')->default(false);
            $table->double('evaluacion_rrhh')->default(0.0);
            $table->boolean('is_rrhh_evaluado')->default(false);
            $table->double('evaluacion_docente')->default(0.0);
            $table->boolean('is_docente_evaluado')->default(false);
            $table->text('comentarios');
            $table->integer('ciclo_id')
                ->unsigned();
            $table->foreign('ciclo_id')
                ->references('id')
                ->on('ciclos');
            $table->integer('materia_id')
                ->unsigned();
            $table->foreign('materia_id')
                ->references('id')
                ->on('materias');
            $table->integer('docente_id')
                ->unsigned();
            $table->foreign('docente_id')
                ->references('id')
                ->on('docentes');
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
        Schema::dropIfExists('historiales');
    }
}
