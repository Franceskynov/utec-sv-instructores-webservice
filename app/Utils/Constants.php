<?php


namespace App\Utils;


class Constants
{
    /**
     * Endpints
     */
    public const ENDPOINT = 'http://consultas.utec.edu.sv/servicios_movil/ServiciosAlumnos.asmx?WSDL';

    /**
     * Strings
     */
    public const CARNET  = 'carnet';
    public const ERROR   = 'error';
    public const MESSAGE = 'message';
    public const DATA    = 'data';
    public const PARAMS = [
                'encoding' => 'UTF-8'
            ];


    /**
     * Messages
     */
    public const MESSAGE_SUCCESS = 'Peticion realizada con exito';
    public const MESSAGE_INVALID_RESPONSE = 'La recuperacion de datos fallo';
    public const MESSAGE_INVALID_CARNET = 'El carnet no es valido';

    public const MESSAGE_SUCCESS_CREATION = 'El registro se creo correctamente';
    public const MESSAGE_INVALID_CREATION = 'Fallo la creacion del registro';
}
