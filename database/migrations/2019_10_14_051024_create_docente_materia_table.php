<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocenteMateriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_materia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('docente_id')
                ->unsigned();
            $table->foreign('docente_id')
                ->references('id')
                ->on('docentes');

            $table->integer('materia_id')
                ->unsigned();
            $table->foreign('materia_id')
                ->references('id')
                ->on('materias');
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
        Schema::dropIfExists('docente_materia');
    }
}
