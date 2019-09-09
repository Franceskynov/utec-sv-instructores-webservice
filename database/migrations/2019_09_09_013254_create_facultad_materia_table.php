<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultadMateriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facultad_materia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('facultad_id')->unsigned()->nullable();
            $table->foreign('facultad_id')->references('id')->on('facultades');

            $table->integer('materia_id')->unsigned()->nullable();
            $table->foreign('materia_id')->references('id')->on('materias');
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
        Schema::dropIfExists('facultad_materia');
    }
}
