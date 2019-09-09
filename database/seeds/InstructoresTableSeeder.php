<?php

use Illuminate\Database\Seeder;
use App\Instructor;
use App\Nota;
use App\User;
use App\Historial;

class InstructoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $instructorA = Instructor::create([
            'nombre'  => 'FakeName a',
            'carnet'  => 'FakeLastName a',
            'carrera' => 'INGENIERIA EN SISTEMAS Y COMPUTACIÓN',
            'cum'     => '7.7',
            'user_id' => 3
        ]);

        $instructorA->notas()->saveMany([
            new Nota([
                'mat_codigo' => 'ALG1-E',
                'mat_nombre' => 'ALGORITMOS I',
                'nota'       => '7.2',
                'estado'     => 'Aprobada',
                'ciclo'      => '01-2016'
            ]),

            new Nota([
                'mat_codigo' => 'MAT1-T',
                'mat_nombre' => 'MATEMATICA I',
                'nota'       => '6.8',
                'estado'     => 'Aprobada',
                'ciclo'      => '01-2016'
            ])
        ]);

        $instructorA->historial()->saveMany([
            new Historial([
                'nota'        => 8.5,
                'comentarios' => 'se sabe desembolver en la materia',
                'ciclo_id'    => 1,
                'materia_id'  => 4
            ])
        ]);
    }
}
