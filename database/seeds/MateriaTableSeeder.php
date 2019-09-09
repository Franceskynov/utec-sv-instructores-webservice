<?php

use Illuminate\Database\Seeder;
use App\Materia;

class MateriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Materia::create([
            'nombre'      => 'Matematica 1',
            'descripcion' => '...',
            'is_enabled'  => true
        ]);

        Materia::create([
            'nombre'      => 'Matematica 2',
            'descripcion' => '...',
            'is_enabled'  => true
        ]);

        Materia::create([
            'nombre'      => 'Matematica 3',
            'descripcion' => '...',
            'is_enabled'  => true
        ]);

        Materia::create([
            'nombre'      => 'Programacion 1',
            'descripcion' => '...',
            'is_enabled'  => true
        ]);

        Materia::create([
            'nombre'      => 'Programacion 2',
            'descripcion' => '...',
            'is_enabled'  => true
        ]);

        Materia::create([
            'nombre'      => 'Programacion 3',
            'descripcion' => '...',
            'is_enabled'  => true
        ]);
    }
}
