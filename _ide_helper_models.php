<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Coordinator
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Coordinator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Coordinator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Coordinator query()
 * @mixin \Eloquent
 */
	class Coordinator extends \Eloquent {}
}

namespace App{
/**
 * App\Facultad
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Materia[] $materias
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Facultad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Facultad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Facultad query()
 * @mixin \Eloquent
 */
	class Facultad extends \Eloquent {}
}

namespace App{
/**
 * App\Especialidad
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Especialidad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Especialidad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Especialidad query()
 * @mixin \Eloquent
 */
	class Especialidad extends \Eloquent {}
}

namespace App{
/**
 * App\Nota
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Instructor[] $instructores
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Nota newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Nota newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Nota query()
 * @mixin \Eloquent
 */
	class Nota extends \Eloquent {}
}

namespace App{
/**
 * App\Instructor
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Asignacion[] $asignaciones
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Training[] $capacitaciones
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Historial[] $historial
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Asignacion[] $instructoria
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Nota[] $notas
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Instructor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Instructor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Instructor query()
 * @mixin \Eloquent
 */
	class Instructor extends \Eloquent {}
}

namespace App{
/**
 * App\School
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\School newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\School newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\School query()
 * @mixin \Eloquent
 */
	class School extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read mixed $created_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\Rol $rol
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Docente
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Especialidad[] $especialidades
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Asignacion[] $instructorias
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Materia[] $materias
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Docente newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Docente newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Docente query()
 * @mixin \Eloquent
 */
	class Docente extends \Eloquent {}
}

namespace App{
/**
 * App\Ciclo
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ciclo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ciclo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Ciclo query()
 * @mixin \Eloquent
 */
	class Ciclo extends \Eloquent {}
}

namespace App{
/**
 * App\Rol
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rol newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rol newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Rol query()
 * @mixin \Eloquent
 */
	class Rol extends \Eloquent {}
}

namespace App{
/**
 * App\Asignacion
 *
 * @property-read \App\Aula $aula
 * @property-read \App\Ciclo $ciclo
 * @property-read \App\Docente $docente
 * @property-read \App\Horario $horario
 * @property-read \App\Instructor $instructor
 * @property-read \App\Materia $materia
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Asignacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Asignacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Asignacion query()
 * @mixin Eloquent
 */
	class Asignacion extends \Eloquent {}
}

namespace App{
/**
 * App\Horario
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Aula[] $aulas
 * @property-read \App\Ciclo $ciclo
 * @property-read string $created_at
 * @property-read string $inicio
 * @property-read string $updated_at
 * @property-read string $fin
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Horario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Horario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Horario query()
 * @mixin \Eloquent
 */
	class Horario extends \Eloquent {}
}

namespace App{
/**
 * App\Materia
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Docente[] $docentes
 * @property-read \App\School $escuela
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Facultad[] $facultades
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Asignacion[] $instructorias
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Materia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Materia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Materia query()
 * @mixin \Eloquent
 */
	class Materia extends \Eloquent {}
}

namespace App{
/**
 * App\Aula
 *
 * @property-read \App\Edificio $edificio
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Horario[] $horarios
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Aula newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Aula newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Aula query()
 * @mixin \Eloquent
 */
	class Aula extends \Eloquent {}
}

namespace App{
/**
 * App\Training
 *
 * @property-read \App\Docente $docente
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Training newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Training newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Training query()
 * @mixin \Eloquent
 */
	class Training extends \Eloquent {}
}

namespace App{
/**
 * App\Historial
 *
 * @property-read \App\Ciclo $ciclo
 * @property-read \App\Docente $docente
 * @property-read mixed $nota
 * @property-read \App\Materia $materia
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Historial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Historial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Historial query()
 * @mixin \Eloquent
 */
	class Historial extends \Eloquent {}
}

namespace App{
/**
 * App\Setting
 *
 * @property-read \App\Ciclo $ciclo
 * @property-read int $horas_sociales_a_asignar
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting query()
 * @mixin \Eloquent
 */
	class Setting extends \Eloquent {}
}

namespace App{
/**
 * App\Edificio
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Aula[] $aulas
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Edificio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Edificio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Edificio query()
 * @mixin \Eloquent
 */
	class Edificio extends \Eloquent {}
}

