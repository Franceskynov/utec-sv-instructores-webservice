<?php

use Illuminate\Database\Seeder;
use App\Facultad;

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
        ]);

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
