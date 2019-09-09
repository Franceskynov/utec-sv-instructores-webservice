<?php

use Illuminate\Database\Seeder;
use App\Facultad;
use App\Materia;

class FacultadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Facultad::create([
            'nombre' => 'Informatica y Ciencias Aplicadas',
            'abreviacion' => 'FICA',
            'descripcion' => '...'
        ])->materias()->sync([1, 2, 3, 4, 5, 6]);

        Facultad::create([
            'nombre' => 'Ciencias Empresariales',
            'abreviacion' => 'FCE',
            'descripcion' => '...'
        ]);

        Facultad::create([
            'nombre' => 'Ciencias Sociales',
            'abreviacion' => 'FCS',
            'descripcion' => '...'
        ]);

        Facultad::create([
            'nombre' => 'Derecho',
            'abreviacion' => 'FD',
            'descripcion' => '...'
        ]);
    }
}
