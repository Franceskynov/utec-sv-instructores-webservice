<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             EdificiosTableSeeder::class,
             CicloTableSeeder::class,
             SettingTableSeeder::class,
             HorariosTableSeeder::class,
             AulasTableSeeder::class,
             SchoolsTableSeeder::class,
             MateriaTableSeeder::class,
             FacultadesTableSeeder::class,
             EspecialidadesTableSeeder::class,
             RolesTableSeeder::class,
             UserTableSeeder::class,
             AdministratorTableSeeder::class,
             CoordinadorTableSeeder::class,
             // DocentesTableSeeder::class,
//             TrainingsTableSeeder::class,
             // InstructoresTableSeeder::class,


             //AsignacionTableSeeder::class,

         ]);
    }
}
