<?php

use Illuminate\Database\Seeder;
use App\Ciclo;

class CicloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ciclo::create([
            'nombre'      => '01-2019',
            'descripcion' => 'Ciclo correspondiente al periodo ...'
        ]);

        Ciclo::create([
            'nombre'      => '02-2019',
            'descripcion' => 'Ciclo correspondiente al periodo ...'
        ]);

        Ciclo::create([
            'nombre'      => '01-2020',
            'descripcion' => 'Ciclo correspondiente al periodo ...'
        ]);

        Ciclo::create([
            'nombre'      => '02-2020',
            'descripcion' => 'Ciclo correspondiente al periodo ...'
        ]);

        Ciclo::create([
            'nombre'      => '01-2021',
            'descripcion' => 'Ciclo correspondiente al periodo ...'
        ]);

        Ciclo::create([
            'nombre'      => '02-2021',
            'descripcion' => 'Ciclo correspondiente al periodo ...'
        ]);
    }
}
