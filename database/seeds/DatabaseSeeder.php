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
             HorariosTableSeeder::class,
             AulasTableSeeder::class,
             FacultadesTableSeeder::class,
             // InstructoresTableSeeder::class,
             RolesTableSeeder::class,
             UserTableSeeder::class,
         ]);
    }
}
