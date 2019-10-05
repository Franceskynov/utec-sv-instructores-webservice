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
             HorariosTableSeeder::class,
             AulasTableSeeder::class,
             MateriaTableSeeder::class,
             FacultadesTableSeeder::class,
             EspecialidadesTableSeeder::class,
             RolesTableSeeder::class,
             UserTableSeeder::class,

             DocentesTableSeeder::class,
             InstructoresTableSeeder::class,

             AsignacionTableSeeder::class,

         ]);
    }
}
