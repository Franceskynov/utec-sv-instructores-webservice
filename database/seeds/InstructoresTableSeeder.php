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
            'nombre'  => 'MELVIN ANTONIO FLORES RODRIGUEZ',
            'carnet'  => '2504802014',
            'carrera' => 'INGENIERIA EN SISTEMAS Y COMPUTACIÓN',
            'cum'     => '7.2',
            'user_id' => 8,
            'is_selected' => true
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
                'comentarios' => 'Posee dominio de la materia',
                'ciclo_id'    => 1,
                'materia_id'  => 4
            ])
        ]);

        $instructorA->capacitaciones()->sync([
            1 => [
                'estado' => 'Aprobado',
                'nota'   => '8.9'
            ],
            2 => [
                'estado' => 'Aprobado',
                'nota'   => '7.9'
            ],
            3 => [
                'estado' => 'Aprobado',
                'nota'   => '8.0'
            ]
        ]);

        $instructorB = Instructor::create([
            'nombre'  => 'JOSE DANIEL VILLALTA ESCAMILLA',
            'carnet'  => '2700062018',
            'carrera' => 'INGENIERIA EN SISTEMAS Y COMPUTACIÓN',
            'cum'     => '7.5',
            'user_id' => 9
        ]);

        /**
         *
         */
        $instructorC = Instructor::create([
            'nombre'  => 'WALTER HERNAN RAMOS',
            'carnet'  => '2564062012',
            'carrera' => 'INGENIERIA EN SISTEMAS Y COMPUTACIÓN',
            'cum'     => '7.6',
            'user_id' => 10
        ]);

        $instructorC->notas()->saveMany([
            new Nota([
                'mat_codigo' => 'ALG1-E',
                'mat_nombre' => 'ALGORITMOS I',
                'nota'       => '7.4',
                'estado'     => 'Aprobada',
                'ciclo'      => '02-2012'
            ]),
            new Nota([
                'mat_codigo' => 'MAT1-T',
                'mat_nombre' => 'MATEMATICA I',
                'nota'       => '7.6',
                'estado'     => 'Aprobada',
                'ciclo'      => '02-2012'
            ]),
            new Nota([
                'mat_codigo' => 'ORTI-I',
                'mat_nombre' => 'ORIENTACION TECNICA DE INGENIERIA',
                'nota'       => '6.8',
                'estado'     => 'Aprobada',
                'ciclo'      => '02-2012'
            ]),
        ]);
    }
}
