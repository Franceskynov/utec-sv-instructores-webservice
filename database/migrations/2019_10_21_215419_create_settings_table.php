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
            $table->double('minimun_cum')->default(7.5);
            $table->double('minimum_score')->default(8);
            $table->double('autoevaluacion_percentage', 2,3)->default(0.05);
            $table->double('evaluacion_rrhh_percentage', 2, 3)->default(0.80);
            $table->double('evaluacion_docente_percentage', 2, 3)->default(0.15);
            $table->boolean('enable_website_recaptcha')->default(false);
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
