<?php

use Illuminate\Database\Seeder;
use App\Edificio;
class EdificiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Edificio::create([
            'id'          => 1,
            'nombre'      => 'Jorge Luis Borges',
            'direccion'   => '1.ª calle Poniente, 1137',
            'abreviacion' => 'JL',
            'descripcion' => 'La Utec reconoce y respeta, por su talento creador, al connotado literato argentino Jorge Luis Borges',
            'pisos'       => 3
        ]);

        Edificio::create([
            'id'          => 2,
            'nombre'      => 'Francisco Morazán',
            'direccion'   => 'Calle Arce, 1026',
            'abreviacion' => 'FM',
            'descripcion' => 'Edificio  nominado  en  honor  del  paladín  de  origen hondureño que unió la parcela centroamericana.',
            'pisos'       => 5
        ]);

        Edificio::create([
            'id'          => 3,
            'nombre'      => 'Benito Juárez',
            'direccion'   => 'Calle Arce, 1114',
            'abreviacion' => 'BJ',
            'descripcion' => 'La universidad ha nominado Benito  Juárez  al  edificio donde se erige el busto del que fuera brillante jurista y presidente de la República de México.',
            'pisos'       => 5
        ]);

        Edificio::create([
            'id'          => 4,
            'nombre'      => 'Giuseppe Garibaldi',
            'direccion'   => '1.ª calle Poniente y 19.ª avenida Norte',
            'abreviacion' => 'GG',
            'descripcion' => 'Este inmueble se denominó así conmemorando al estratega militar y político italiano, máximo defensor de las libertades.',
            'pisos'       => 2
        ]);

        Edificio::create([
            'id'          => 5,
            'nombre'      => 'Simón Bolívar',
            'direccion'   => 'Calle Arce, 1020',
            'abreviacion' => 'SB',
            'descripcion' => 'La universidad designó como Simón Bolívar a su   primer edificio en memoria del paladín latinoamericano, libertador de pueblos oprimidos  en  la época colonial tardía.',
            'pisos'       => 5
        ]);

        Edificio::create([
            'id'          => 6,
            'nombre'      => 'Thomas Jefferson',
            'direccion'   => 'Calle Arce y 17.ª avenida Sur',
            'abreviacion' => 'TJ',
            'descripcion' => 'La Utec ha nombrado este edificio en honor a un prócer  estadounidense  que  singulariza  la  tenacidad  y la perseverancia, tanto en el estudio de las ciencias como en la causa humana del bienestar social y la cultura de un pueblo. ',
            'pisos'       => 1
        ]);

        Edificio::create([
            'id'          => 7,
            'nombre'      => 'Claudia Lars',
            'direccion'   => '1.ª calle Poniente y 17.ª avenida Norte',
            'abreviacion' => 'CL',
            'descripcion' => 'La  Utec  recuerda  con  especial  aprecio  y  reconoce  con  admiración  a  la  poetisa  salvadoreña,  haciendo  más permanente este sentimiento al nominar Casa Claudia Larsa esta antigua residencia del centro histórico de la capital',
            'pisos'       => 1
        ]);

        Edificio::create([
            'id'          => 8,
            'nombre'      => 'Federico García Lorca ',
            'direccion'   => 'Calle Arce y 17.ª avenida Sur',
            'abreviacion' => 'FGL',
            'descripcion' => 'La denominación del edificio Federico García Lorca es un acertado reconocimiento a uno de los más grandes literatos del siglo XX.',
            'pisos'       => 4
        ]);

    }
}
