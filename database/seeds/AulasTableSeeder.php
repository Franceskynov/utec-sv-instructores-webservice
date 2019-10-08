<?php

use Illuminate\Database\Seeder;
use App\Aula;
class AulasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aula::create([
            'codigo'      => 'Bj_201',
            'capacidad'   => 50,
            'edificio_id' => 3
        ])->horarios()->sync([
            1 => ['is_used' => false],
            4 => ['is_used' => false],
            6 => ['is_used' => false]
        ]);

        Aula::create([
            'codigo'      => 'Bj_202',
            'capacidad'   => 50,
            'edificio_id' => 3
        ])->horarios()->sync([
            2 => ['is_used' => false],
            3 => ['is_used' => false],
            4 => ['is_used' => false]
        ]);

        Aula::create([
            'codigo'      => 'Bj_203',
            'capacidad'   => 50,
            'edificio_id' => 3
        ])->horarios()->sync([
            7 => ['is_used' => false],
            5 => ['is_used' => false],
            6 => ['is_used' => false]
        ]);
    }
}
