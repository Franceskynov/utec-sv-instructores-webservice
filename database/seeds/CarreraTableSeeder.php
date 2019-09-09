<?php

use Illuminate\Database\Seeder;
use App\Carrera;

class CarreraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carrera::create([
            'nombre'      => 'Ingenieria en sistemas y computacion' ,
            'descripcion' => '...',
            'facultad_id' => 1
        ]);

        Carrera::create([
            'nombre'      => 'Licenciatura en informatica' ,
            'descripcion' => '...',
            'facultad_id' => 1
        ]);

        Carrera::create([
            'nombre'      => 'Tecnico en redes' ,
            'descripcion' => '...',
            'facultad_id' => 1
        ]);
    }
}
