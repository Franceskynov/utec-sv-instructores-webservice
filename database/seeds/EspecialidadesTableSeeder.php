<?php

use Illuminate\Database\Seeder;
use App\Especialidad;
class EspecialidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Especialidad::create([
            'nombre' => 'Inenier@ en sistemas',
            'descripcion' => '... ...'
        ]);

        Especialidad::create([
            'nombre' => 'Inenier@ industrial',
            'descripcion' => '... ...'
        ]);

        Especialidad::create([
            'nombre' => 'Inenier@ electrico',
            'descripcion' => '... ...'
        ]);

        Especialidad::create([
            'nombre' => 'Licenciad@ en sistemas',
            'descripcion' => '... ...'
        ]);

        Especialidad::create([
            'nombre' => 'Licenciad@ en redes',
            'descripcion' => '... ...'
        ]);

        Especialidad::create([
            'nombre' => 'Licenciad@ en based de datos',
            'descripcion' => '... ...'
        ]);

        Especialidad::create([
            'nombre' => 'Licenciad@ en idioma ingles',
            'descripcion' => '... ...'
        ]);

        Especialidad::create([
            'nombre' => 'Licenciad@ en mercadeo',
            'descripcion' => '... ...'
        ]);

        Especialidad::create([
            'nombre' => 'Licenciad@ en comunicaciones',
            'descripcion' => '... ...'
        ]);

        Especialidad::create([
            'nombre' => 'Licenciad@ en diseño grafico',
            'descripcion' => '... ...'
        ]);

        Especialidad::create([
            'nombre' => 'Tecnic@ en redes',
            'descripcion' => '... ...'
        ]);

        Especialidad::create([
            'nombre' => 'Tecnic@ en diseño grafico',
            'descripcion' => '... ...'
        ]);
    }
}
