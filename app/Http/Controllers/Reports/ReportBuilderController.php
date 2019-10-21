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
        $materiaId =  $request->input('materia');
        if ($materia = Materia::find($materiaId)) {
            $title = "Reporte de docentes por la materia: $materia->nombre";
            $docenteData = Docente::with('materias')->whereHas('materias', function($q) use($materiaId) {
                $q->where('materia_id', '=', $materiaId);
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
        $row =  Instructor::where('carrera', $carrera)->first();
        if ($row && $capacitaciones == 'todas')
        {
            $title = "Reporte de instructores por la carrera de: $row->carrera";
            $data = [
                'rows' => Instructor::where('carrera', $row->carrera)
                    ->with('capacitaciones', 'historial')
                    ->has('capacitaciones', '>=', 3)
                    ->paginate(1000),
                'subtitle' => 'Intructores con capacitaciones'
            ];
        } else if ($capacitaciones == 'ninguna') {

            $title = "Reporte de instructores por la carrera de: $row->carrera";
            $data = [
              'rows' => Instructor::where('carrera', $row->carrera)
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
        if ($ciclo = Ciclo::find($cicloId))
        {
            $title = " Reporte de instructorias del ciclo: $ciclo->nombre " ;
            $data = Asignacion::where('ciclo_id', $cicloId)
                ->with(
                    'ciclo',
                    'horario',
                    'instructor',
                    'instructor.historial',
                    'materia',
                    'aula',
                    'aula.edificio',
                    'docente',
                    'docente.especialidades'
                )->paginate(1000);
        } else {
            $title = '';
            $data = [];
        }


        return PdfBuilder::makePdf($title, 'pdf.issues', $data, 1, 'reporte', true);
    }

    /**
     * @return mixed
     */
    public function historial()
    {
        $data = Historial::with(
            'materia', 'ciclo', 'docente')->get();
        return PdfBuilder::makePdf('Reporte de instructorias', 'pdf.hystory', $data, 1);
    }
}
