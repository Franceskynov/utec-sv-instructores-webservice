<?php

use Illuminate\Database\Seeder;
use App\Administrator;
class AdministratorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrator::create([
            'nombre'     => 'Edwin Alberto',
            'apellido'   => 'Callejas',
            'email_personal'      => 'edwin.callejas@mail.utec.edu.sv',
            'telefono'   => '503 ',
            'oficina'    => '...',
            'user_id'    => 2,
            'is_enabled' => true
        ]);
    }
}
