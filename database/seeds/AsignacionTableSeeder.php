<?php

use Illuminate\Database\Seeder;
use App\Asignacion;
class AsignacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asignacion::create([
            'nombre' => 'rodriguez-melvin-2504802014-3c4f5b92',
            'ciclo_id' => 1,
            // 'horario_id' => 1,
            'aula_id' => 1,
            'instructor_id' => 1,
            'materia_id' => 4,
            'docente_id' => 6,
            'dia'        => 0 ,
            'nombre_dia' => 'Lunes',
            'inicio'     => '9:00',
            'fin'        => '10:00',
            'is_enabled' => true
        ]);
    }
}
