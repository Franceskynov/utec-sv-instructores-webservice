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
            $table->double('nota');
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
