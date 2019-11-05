<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utils\PdfBuilder;
use App\Docente;
use App\Instructor;
use App\Asignacion;
use App\Historial;
use App\Ciclo;
use App\Materia;
use App\User;
use App\School;
class ReportBuilderController extends Controller
{

    public function __construct()
    {
        if (env('JWT_LOGIN'))
        {
            $this->middleware('jwt.auth');
        }
    }

    /**
     * @return mixed
     */
    public function getUserData()
    {
        $authtorizedUser = \JWTAuth::user();
        return User::find($authtorizedUser->id)->first();
    }

    /**
     * @return mixed
     */
    public function docentes(Request $request)
    {
        $schoolId =  $request->input('school');
        $school = School::find($schoolId);
        if ($school) {
            $title = "Reporte de docentes por la escuela de: $school->name";
            $docenteData = Docente::with('materias')->whereHas('materias', function($q) use($schoolId) {
                $q->where('school_id', '=', $schoolId);
            })->paginate(1000);

            $data = [
              'rows' => $docenteData,
              'user' => self::getUserData()
            ];
        } else {
            $title = '';
            $data = [];
        }

        return PdfBuilder::makePdf($title, 'pdf.teachers', $data, 1, 'reporte', true);
    }

    /**
     * @return mixed
     */
    public function instructores(Request $request)
    {
        $carrera = $request->input('carrera');
        $capacitaciones = $request->input('capacitaciones');
        $isScholarshipped = $request->input('scholarshipped');
        $row =  Instructor::where('carrera', $carrera)->first();
        if ($row && $capacitaciones == 'todas')
        {
            $title = "Reporte de instructores por la carrera de: $row->carrera";
            $data = [
                'rows' => Instructor::where('carrera', $row->carrera)
                    ->where('is_scholarshipped', $isScholarshipped)
                    ->with('capacitaciones', 'historial')
                    ->has('capacitaciones', '>=', 3)
                    ->paginate(1000),
                'subtitle' => 'Intructores con capacitaciones'
            ];
        } else if ($capacitaciones == 'ninguna') {

            $title = "Reporte de instructores por la carrera de: $row->carrera";
            $data = [
              'rows' => Instructor::where('carrera', $row->carrera)
                  ->where('is_scholarshipped', $isScholarshipped)
                  ->with('capacitaciones', 'historial')
                  ->has('capacitaciones', '=', 0)
                  ->paginate(1000),
              'subtitle' => 'Instructores sin capacitacion'
            ];
        } else {
            $title = '';
            $data = [];
        }

        return PdfBuilder::makePdf($title, 'pdf.instructors', $data, 1, 'reporte', true);
    }

    /**
     * @return mixed
     */
    public function asignacion(Request $request)
    {
        $cicloId = $request->input('ciclo');
        $schoolId = $request->input('escuela');
        $ciclo = Ciclo::find($cicloId);
        $school = School::find($schoolId);
        if ($ciclo && $school)
        {
            $title = " Reporte de instructorias del ciclo: $ciclo->nombre y de la escuela $school->name" ;
            $data = Asignacion::with(
                    'ciclo',
                    'instructor',
                    'instructor.historial',
                    'materia',
                    'aula',
                    'aula.edificio',
                    'docente',
                    'docente.especialidades'
                )
                ->where('ciclo_id', $cicloId)
                ->whereHas('materia', function($q) use($schoolId) {
                    $q->where('school_id', '=', $schoolId);
        })->paginate(1000);
        } else {
            $title = '';
            $data = [];
        }


        return PdfBuilder::makePdf($title, 'pdf.issues', $data, 1, 'reporte', true);
    }

    /**
     * @return mixed
     */
    public function historial(Request $request)
    {

        $cicloId = $request->input('ciclo');
        $schoolId = $request->input('escuela');
        $data = Historial::with(
            'materia', 'ciclo', 'docente', 'instructor')->where('ciclo_id', $cicloId)
            ->whereHas('materia', function($q) use($schoolId) {
                $q->where('school_id', '=', $schoolId);
            })->paginate(1000);
        return PdfBuilder::makePdf('Reporte de instructorias', 'pdf.hystory', $data, 1, 'reporte', true);
    }
}
