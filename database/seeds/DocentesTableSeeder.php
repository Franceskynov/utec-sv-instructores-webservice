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
        Docente::create([
            'nombre'     => 'Dany Salvador',
            'apellido'   => 'Chacon Orellana',
            'email'      => 'dany.chacon@mail.utec.edu.sv',
            'telefono'   => '503 ',
            'oficina'    => '...',
            'user_id'    => 2,
            'is_enabled' => true
        ])->especialidades()->sync([1, 2]);

        Docente::create([
            'nombre'     => 'Marta Eugenia',
            'apellido'   => 'Belloso Rivas',
            'email'      => 'martha.belloso@mail.utec.edu.sv',
            'telefono'   => '503',
            'oficina'    => '...',
            'user_id'    => 3,
            'is_enabled' => true
        ])->especialidades()->sync([1, 2]);


        Docente::create([
            'nombre'     => 'Edwin Alberto',
            'apellido'   => 'Callejas',
            'email'      => 'edwin.callejas@mail.utec.edu.sv',
            'telefono'   => '503',
            'oficina'    => '...',
            'user_id'    => 4,
            'is_enabled' => true
        ])->especialidades()->sync([1, 2]);

        Docente::create([
            'nombre'     => 'Oscar Bertony',
            'apellido'   => 'Pineda Medrano',
            'email'      => 'oscar.pineda@mail.utec.edu.sv',
            'telefono'   => '503',
            'oficina'    => '...',
            'user_id'    => 5,
            'is_enabled' => true
        ])->especialidades()->sync([4, 2]);

        Docente::create([
            'nombre'     => 'Ronny Adalberto',
            'apellido'   => 'Cortez Reyes',
            'email'      => 'ronny.cortez@mail.utec.edu.sv',
            'telefono'   => '503',
            'oficina'    => '...',
            'user_id'    => 6,
            'is_enabled' => true
        ])->especialidades()->sync([7, 2]);

        Docente::create([
            'nombre'     => 'Julio Cesar',
            'apellido'   => 'Rosales Barrera',
            'email'      => 'julio.barrera@mail.utec.edu.sv',
            'telefono'   => '503',
            'oficina'    => '...',
            'user_id'    => 7,
            'is_enabled' => true
        ])->especialidades()->sync([4, 6]);

    }
}
