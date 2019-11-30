<?php

use Illuminate\Database\Seeder;
use App\Rol;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        Rol::create([
            'nombre'      => 'Administrador',
            'descripcion' => 'Este rol posee control total de la plataforma'
        ]);

        // 2
        Rol::create([
            'nombre'      => 'Docente',
            'descripcion' => 'Este rol permite crear solicitud de instructor para la materia'
        ]);

        // 3
        Rol::create([
            'nombre'      => 'Instructor',
            'descripcion' => 'Este rol permite llevar el control e historial de asistencia al docente'
        ]);

        // 4
        Rol::create([
            'nombre'      => 'Auxiliar',
            'descripcion' => 'Este rol permite auxiliar a el coordinador'
        ]);

        // 5
        Rol::create([
            'nombre'      => 'Coordinador',
            'descripcion' => 'Este rol posee control parcial de la plataforma'
        ]);
    }
}
