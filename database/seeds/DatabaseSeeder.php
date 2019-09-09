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
             RolesTableSeeder::class,
             UserTableSeeder::class,

             InstructoresTableSeeder::class,

         ]);
    }
}
