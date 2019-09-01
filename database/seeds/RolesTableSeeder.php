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
        Rol::create([
            'nombre'      => 'Administrador',
            'descripcion' => 'Este rol posee control total de la plataforma'
        ]);

        Rol::create([
            'nombre'      => 'Docente',
            'descripcion' => 'Este rol permite crear solicitud de instructor para la materia'
        ]);

        Rol::create([
            'nombre'      => 'Instructor',
            'descripcion' => 'Este rol permite llevar el control e historial de asistencia al docente'
        ]);
    }
}
