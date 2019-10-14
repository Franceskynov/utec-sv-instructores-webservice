<?php

use Illuminate\Database\Seeder;
use App\Docente;
class DocentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $docenteA = Docente::create([
            'nombre'     => 'Dany Salvador',
            'apellido'   => 'Chacon Orellana',
            'email'      => 'dany.chacon@mail.utec.edu.sv',
            'telefono'   => '503 ',
            'oficina'    => '...',
            'user_id'    => 2,
            'is_enabled' => true
        ]);
        $docenteA->especialidades()->sync([1, 2]);
        $docenteA->materias()->sync([1, 2]);

        $docenteB = Docente::create([
            'nombre'     => 'Marta Eugenia',
            'apellido'   => 'Belloso Rivas',
            'email'      => 'martha.belloso@mail.utec.edu.sv',
            'telefono'   => '503',
            'oficina'    => '...',
            'user_id'    => 3,
            'is_enabled' => true
        ]);
        $docenteB->especialidades()->sync([1, 2]);
        $docenteB->materias()->sync([1, 2]);


        $docenteC = Docente::create([
            'nombre'     => 'Edwin Alberto',
            'apellido'   => 'Callejas',
            'email'      => 'edwin.callejas@mail.utec.edu.sv',
            'telefono'   => '503',
            'oficina'    => '...',
            'user_id'    => 4,
            'is_enabled' => true
        ]);
        $docenteC->especialidades()->sync([1, 2]);
        $docenteC->materias()->sync([1, 2]);

        $docenteD = Docente::create([
            'nombre'     => 'Oscar Bertony',
            'apellido'   => 'Pineda Medrano',
            'email'      => 'oscar.pineda@mail.utec.edu.sv',
            'telefono'   => '503',
            'oficina'    => '...',
            'user_id'    => 5,
            'is_enabled' => true
        ]);
        $docenteD->especialidades()->sync([4, 2]);
        $docenteD->materias()->sync([1, 2]);

        $docenteE = Docente::create([
            'nombre'     => 'Ronny Adalberto',
            'apellido'   => 'Cortez Reyes',
            'email'      => 'ronny.cortez@mail.utec.edu.sv',
            'telefono'   => '503',
            'oficina'    => '...',
            'user_id'    => 6,
            'is_enabled' => true
        ]);
        $docenteE->especialidades()->sync([7, 2]);
        $docenteE->materias()->sync([1, 2]);

        $docenteF = Docente::create([
            'nombre'     => 'Julio Cesar',
            'apellido'   => 'Rosales Barrera',
            'email'      => 'julio.barrera@mail.utec.edu.sv',
            'telefono'   => '503',
            'oficina'    => '...',
            'user_id'    => 7,
            'is_enabled' => true
        ]);
        $docenteF->especialidades()->sync([4, 6]);
        $docenteF->materias()->sync([1, 2]);

    }
}
