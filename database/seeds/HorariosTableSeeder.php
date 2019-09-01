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
    }
}
