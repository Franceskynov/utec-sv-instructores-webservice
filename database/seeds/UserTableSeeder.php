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
            'is_enabled' => true,
            'is_activated' => true
        ]);

        /**
         * Docentes
         */
        User::create([
            'username'   => 'dany.chacon',
            'email'      => 'dany.chacon@mail.utec.edu.sv',
            'password'   => bcrypt('secret'),
            'rol_id'     => 2,
            'is_admin'   => false,
            'is_enabled' => true,
            'is_activated' => true
        ]);


        User::create([
            'username'   => 'martha.belloso',
            'email'      => 'martha.belloso@mail.utec.edu.sv',
            'password'   => bcrypt('secret'),
            'rol_id'     => 2,
            'is_admin'   => false,
            'is_enabled' => true,
            'is_activated' => true
        ]);

        User::create([
            'username'   => 'edwin.callejas',
            'email'      => 'edwin.callejas@mail.utec.edu.sv',
            'password'   => bcrypt('secret'),
            'rol_id'     => 2,
            'is_admin'   => false,
            'is_enabled' => true,
            'is_activated' => true
        ]);

        User::create([
            'username'   => 'oscar.pineda',
            'email'      => 'oscar.pineda@mail.utec.edu.sv',
            'password'   => bcrypt('secret'),
            'rol_id'     => 2,
            'is_admin'   => false,
            'is_enabled' => true,
            'is_activated' => true
        ]);

        User::create([
            'username'   => 'ronny.cortez',
            'email'      => 'ronny.cortez@mail.utec.edu.sv',
            'password'   => bcrypt('secret'),
            'rol_id'     => 2,
            'is_admin'   => false,
            'is_enabled' => true,
            'is_activated' => true
        ]);

        User::create([
            'username'   => 'julio.barrera',
            'email'      => 'julio.barrera@mail.utec.edu.sv',
            'password'   => bcrypt('secret'),
            'rol_id'     => 2,
            'is_admin'   => false,
            'is_enabled' => true,
            'is_activated' => true
        ]);


        /**
         * Instructores
         */
        User::create([
            'username'   => 'instructor001',
            'email'      => 'instructor001@gmail.com',
            'password'   => bcrypt('secret'),
            'rol_id'     => 3,
            'is_admin'   => false,
            'is_enabled' => true,
            'is_activated' => true
        ]);
    }
}
