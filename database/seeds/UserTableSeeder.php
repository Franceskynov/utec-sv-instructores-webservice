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
        // 1
        User::create([
            'username'   => 'edwin.alberto',
            'email'      => 'edwin.alberto@mail.utec.edu.sv',
            'password'   => bcrypt('secret'),
            'rol_id'     => 1,
            'is_admin'   => true,
            'is_enabled' => true,
            'is_activated' => true
        ]);

        User::create([
            'username'   => 'claudia.dimas',
            'email'      => 'claudia.dimas@mail.utec.edu.sv',
            'password'   => bcrypt('secret'),
            'rol_id'     => 5,
            'is_admin'   => true,
            'is_enabled' => true,
            'is_activated' => true
        ]);

        /**
         * Docentes
         */
        // 2
//        User::create([
//            'username'   => 'dany.chacon',
//            'email'      => 'dany.chacon@mail.utec.edu.sv',
//            'password'   => bcrypt('secret'),
//            'rol_id'     => 2,
//            'is_admin'   => false,
//            'is_enabled' => true,
//            'is_activated' => true
//        ]);
//
//        // 3
//        User::create([
//            'username'   => 'martha.belloso',
//            'email'      => 'martha.belloso@mail.utec.edu.sv',
//            'password'   => bcrypt('secret'),
//            'rol_id'     => 2,
//            'is_admin'   => false,
//            'is_enabled' => true,
//            'is_activated' => true
//        ]);
//
//        // 4
//        User::create([
//            'username'   => 'edwin.callejas',
//            'email'      => 'edwin.callejas@mail.utec.edu.sv',
//            'password'   => bcrypt('secret'),
//            'rol_id'     => 2,
//            'is_admin'   => false,
//            'is_enabled' => true,
//            'is_activated' => true
//        ]);
//
//        // 5
//        User::create([
//            'username'   => 'oscar.pineda',
//            'email'      => 'oscar.pineda@mail.utec.edu.sv',
//            'password'   => bcrypt('secret'),
//            'rol_id'     => 2,
//            'is_admin'   => false,
//            'is_enabled' => true,
//            'is_activated' => true
//        ]);
//
//        // 6
//        User::create([
//            'username'   => 'ronny.cortez',
//            'email'      => 'ronny.cortez@mail.utec.edu.sv',
//            'password'   => bcrypt('secret'),
//            'rol_id'     => 2,
//            'is_admin'   => false,
//            'is_enabled' => true,
//            'is_activated' => true
//        ]);
//
//        // 7
//        User::create([
//            'username'   => 'julio.barrera',
//            'email'      => 'julio.barrera@mail.utec.edu.sv',
//            'password'   => bcrypt('secret'),
//            'rol_id'     => 2,
//            'is_admin'   => false,
//            'is_enabled' => true,
//            'is_activated' => true
//        ]);
//
//
//        /**
//         * Instructores
//         */
//        // 8
//        User::create([
//            'username'   => 'MelvinFlores',
//            'email'      => '2504802014@mail.utec.edu.sv',
//            'password'   => bcrypt('secret'),
//            'rol_id'     => 3,
//            'is_admin'   => false,
//            'is_admin'   => false,
//            'is_enabled' => true,
//            'is_activated' => true
//        ]);
//
//        // 9
//        User::create([
//            'username'   => 'DanielVillalta',
//            'email'      => '2700062018@mail.utec.edu.sv',
//            'password'   => bcrypt('secret'),
//            'rol_id'     => 3,
//            'is_admin'   => false,
//            'is_enabled' => true,
//            'is_activated' => true
//        ]);
//
//        // 10
//        User::create([
//            'username'   => 'WalterRamos',
//            'email'      => '2564062012@mail.utec.edu.sv',
//            'password'   => bcrypt('secret'),
//            'rol_id'     => 3,
//            'is_admin'   => false,
//            'is_enabled' => true,
//            'is_activated' => true
//        ]);
//
//        // 11
//        User::create([
//            'username'   => 'asistente',
//            'email'      => 'asistente@mail.utec.edu.sv',
//            'password'   => bcrypt('secret'),
//            'rol_id'     => 1,
//            'is_admin'   => false,
//            'is_enabled' => true,
//            'is_activated' => true
//        ]);
    }
}
