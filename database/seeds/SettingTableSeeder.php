<?php

use Illuminate\Database\Seeder;
use App\Setting;
class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'ciclo_id'                 => 2,
            'horas_sociales_a_asignar' => 150,
            'docente_email_prefix'     => '@mail.utec.edu.sv',
            'instructor_email_prefix'  => '@mail.utec.edu.sv'
        ]);
    }
}
