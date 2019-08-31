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

    public const MESSAGE_SUCCESS_DELETION   = 'El registro se elimino correctamente';
    public const MESSAGE_INVALID_DELETION   = 'El registro no pudo ser borrado';
    public const MESSAGE_PREVIOUSLY_DELETED = 'El registro ya fue eliminado';

    public const MESSAGE_NOT_FOUND = 'El registro no pudo ser encontrado';

    public const MESSAGE_INVALID_UPDATE = 'El registro no pudo ser actualizado';
    public const MESSAGE_INVALID_CHECKING = 'Los datos enviados no cumplen con los requerimientos';
}
