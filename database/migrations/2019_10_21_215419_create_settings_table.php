<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ciclo_id')
                ->unsigned();
            $table->foreign('ciclo_id')
                ->references('id')
                ->on('ciclos');
            $table->integer('horas_sociales_a_asignar')
                ->default(150);
            $table->string('docente_email_prefix');
            $table->string('instructor_email_prefix');
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
        Schema::dropIfExists('settings');
    }
}
