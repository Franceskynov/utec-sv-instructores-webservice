<?php

use Illuminate\Database\Seeder;
use App\Training;

class TrainingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Training::create([
            'nombre'      => 'Capacitacion para instructores nivel 1',
            'descripcion' => 'En esta capacitacion se ...',
            'tipo'        => 'Precencial',
            'docente_id'  => 2,
            'is_enabled'  => true
        ]);

        Training::create([
            'nombre'      => 'Capacitacion para instructores nivel 2',
            'descripcion' => 'En esta capacitacion se ...',
            'tipo'        => 'Precencial',
            'docente_id'  => 2,
            'is_enabled'  => true
        ]);

        Training::create([
            'nombre'      => 'Capacitacion para instructores nivel 3',
            'descripcion' => 'En esta capacitacion se ...',
            'tipo'        => 'Virtual',
            'docente_id'  => 2,
            'is_enabled'  => true
        ]);
    }
}
