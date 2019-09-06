<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username'   => 'admin',
            'email'      => 'admin@gmail.com',
            'password'   => bcrypt('secret'),
            'rol_id'     => 1,
            'is_admin'   => true,
            'is_enabled' => true
        ]);

        User::create([
            'username'   => 'docente001',
            'email'      => 'docente@gmail.com',
            'password'   => bcrypt('secret'),
            'rol_id'     => 2,
            'is_admin'   => false,
            'is_enabled' => true
        ]);

        User::create([
            'username'   => 'alumno001',
            'email'      => 'test@gmail.com',
            'password'   => bcrypt('secret'),
            'rol_id'     => 3,
            'is_admin'   => false,
            'is_enabled' => true
        ]);
    }
}
