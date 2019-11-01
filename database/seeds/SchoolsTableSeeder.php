<?php

use Illuminate\Database\Seeder;
use App\School;
class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::create([
            'name'        => 'Informatica',
            'description' => 'Escuela de informatica'
        ]);

        School::create([
            'name'        => 'Ciencias aplicadas',
            'description' => 'Escuela de ciencias aplicadas'
        ]);
    }
}
