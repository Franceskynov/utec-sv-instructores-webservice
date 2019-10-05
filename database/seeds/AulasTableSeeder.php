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
        ])->horarios()->sync([1, 4, 6]);

        Aula::create([
            'codigo'      => 'Bj_202',
            'capacidad'   => 50,
            'edificio_id' => 3
        ])->horarios()->sync([2, 3, 4]);

        Aula::create([
            'codigo'      => 'Bj_203',
            'capacidad'   => 50,
            'edificio_id' => 3
        ])->horarios()->sync([7, 5, 6]);
    }
}
