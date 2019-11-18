<?php

    /*
   |--------------------------------------------------------------------------
   | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
   |--------------------------------------------------------------------------
   |
   */
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
    public const MESSAGE_WELLCOME = 'Bienvenido esta es solamente una api';

    public const MESSAGE_SUCCESS = 'Peticion realizada con exito';
    public const MESSAGE_INVALID_RESPONSE = 'La recuperacion de datos fallo';
    public const MESSAGE_INVALID_EMAIL_RESPONSE = 'El email ingresado no esta registrado';
    public const MESSAGE_INVALID_CARNET = 'El carnet no es valido';

    public const MESSAGE_SUCCESS_CREATION = 'El registro se creo correctamente';
    public const MESSAGE_SUCCESS_CHANGED_CREDENTIALS = 'Se modificaron las credenciales correctamente';
    public const MESSAGE_SUCCESS_ACTIVATED_USER = 'Se activo el usuario correctamente';
    public const MESSAGE_INVALID_ACTIVATED_USER_ACTIVATED = 'El usuario ya se encuentra activado';
    public const MESSAGE_INVALID_ACTIVATED_USER = 'No se pudo activar el usuario';
    public const MESSAGE_INVALID_CHANGED_CREDENTIALS = 'No se cambiaron las credenciales';
    public const MESSAGE_INVALID_CREATION = 'Fallo la creacion del registro';
    public const MESSAGE_INVALID_TRAINGIN_ASIGNATION = 'El curso ya fue asignado';

    public const MESSAGE_SUCCESS_DELETION   = 'El registro se elimino correctamente';
    public const MESSAGE_INVALID_DELETION   = 'El registro no pudo ser borrado';
    public const MESSAGE_PREVIOUSLY_DELETED = 'El registro ya fue eliminado';

    public const MESSAGE_NOT_FOUND = 'El registro no pudo ser encontrado';
    public const MESSAGE_RESOURCE_NOT_FOUND = 'El recurso no pudo ser encontrado';

    public const MESSAGE_SUCCESS_UPDATE = 'El registro fue actualizado con exito';
    public const MESSAGE_INVALID_UPDATE = 'El registro no pudo ser actualizado';
    public const MESSAGE_INVALID_CHECKING = 'Los datos enviados no cumplen con los requerimientos';

    public const MESSAGE_INVALID_DELETE_USER_ADM = 'Error los usuarios administradores no pueden ser borrados';
    public const MESSAGE_LOGIN_SUCCESS = 'La autorizacion correcta';
    public const MESSAGE_LOGIN_FAILS = 'La el email o la clave son incorrectos, por favor revise';
    public const MESSAGE_LOGOUT_SUCCESS = 'Se cerro la sesion';

    public const EMAIL_USER_CREATION_HEADER_MESSAGE = 'Creacion de usuario en el sistema de control de estudiantes';
    public const EMAIL_USER_CREATION_FOOTER_MESSAGE = 'El motivo por el cual usted recibio este mensaje fue por que fue registrado en el sistema de control de instructores.';


    public const EMAIL_USER_CHANGE_CREDENTIALS_HEADER_MESSAGE = 'Modificacion de credenciales';
    public const EMAIL_USER_CHANGE_CREDENTIALS_FOOTER_MESSAGE = 'El motivo por el cual usted recibio este mensaje fue por que usted realizo un cambio de credenciales ';

    public const EMAIL_ACCOUNT_RECOVER_HEADER_MESSAGE = 'Recuperacion de su cuenta';
    public const EMAIL_ACCOUNT_RECOVER_FOOTER_MESSAGE = 'El motivo por el cual usted recibio este mensaje fue por que usted solicito un cambio de clave. Si usted no lo ha solicitado ignore este mensaje';

    public const EMAIL_ASIGNATION_HEADER_MESSAGE = 'Asignacion de instructoria por parte de el coordinador';
    public const EMAIL_ASIGNATION_MODIFY_HEADER_MESSAGE = 'Modificacion de instructoria por parte de el coordinador';
    public const EMAIL_ASIGNATION_FOOTER_MESSAGE = 'El motivo por el cual usted recibio este mensaje fue por que el coordinador de los instructores selecciono los diferentes parametros para una instructoria';

    public const EMAIL_EVALUATION_SELFAPPRAISAL_HEADER_MESSAGE = 'Porfavor realice la siguiente auto-evaluacion para ello debera de ingresar al sistema con sus credenciales';
    public const EMAIL_EVALUATION_SELFAPPRAISAL_FOOTER_MESSAGE = 'El motivo por el cual usted recibio este mensaje fue porque la instructoria en la cual fue inscrito finalizo y se requiere de su auto-evaluacion para asignarle una nota de desempeño';

    public const EMAIL_INSTRUCTOR_QUERIE_HEADER_MESSAGE = 'Credenciales temporales <br> <b> Aviso: </b> <small> Estas credenciales solo funcionaran el el dispositivo en el que inicio el proceso </small>';
    public const EMAIL_INSTRUCTOR_QUERIEL_FOOTER_MESSAGE = 'El motivo por el cual usted recibio este mensaje fue porque empezo el proceso de inscripcion al sistema de instructores';

}
