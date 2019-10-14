<?php

use Illuminate\Database\Seeder;
use App\Coordinator;
class CoordinadorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coordinator::create([
            'nombre'         => 'Claudia Lissette',
            'apellido'       => 'Rodriguez de Dimas',
            'telefono'       => '5030000000',
            'email_personal' => 'claudia.dimas@mail.utec.edu.sv',
            'oficina'        => 'Tercera planta, Gbriela mistral',
            'user_id'        => 1,
            'is_enabled'     => true,
        ]);
    }
}
