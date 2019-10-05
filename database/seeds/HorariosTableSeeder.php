<?php

use Illuminate\Database\Seeder;
use App\Horario;
class HorariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Horario::create([
            'dia'        => 0 ,
            'nombre_dia' => 'Lunes',
            'inicio'     => '9:00',
            'fin'        => '10:00'
        ]);

        Horario::create([
            'dia'        => 0 ,
            'nombre_dia' => 'Lunes',
            'inicio'     => '10:00',
            'fin'        => '11:00'
        ]);

        Horario::create([
            'dia'        => 1 ,
            'nombre_dia' => 'Martes',
            'inicio'     => '9:00',
            'fin'        => '10:00'
        ]);

        Horario::create([
            'dia'        => 1 ,
            'nombre_dia' => 'Martes',
            'inicio'     => '10:00',
            'fin'        => '11:00'
        ]);

        Horario::create([
            'dia'        => 2 ,
            'nombre_dia' => 'Miercoles',
            'inicio'     => '9:00',
            'fin'        => '10:00'
        ]);

        Horario::create([
            'dia'        => 2 ,
            'nombre_dia' => 'Miercoles',
            'inicio'     => '10:00',
            'fin'        => '11:00'
        ]);

        Horario::create([
            'dia'        => 3 ,
            'nombre_dia' => 'Jueves',
            'inicio'     => '9:00',
            'fin'        => '10:00'
        ]);

        Horario::create([
            'dia'        => 3 ,
            'nombre_dia' => 'Jueves',
            'inicio'     => '10:00',
            'fin'        => '11:00'
        ]);

        Horario::create([
            'dia'        => 4 ,
            'nombre_dia' => 'Viernes',
            'inicio'     => '9:00',
            'fin'        => '10:00'
        ]);

        Horario::create([
            'dia'        => 4 ,
            'nombre_dia' => 'Viernes',
            'inicio'     => '10:00',
            'fin'        => '11:00'
        ]);
    }
}
