<?php

namespace App\Http\Controllers\Reports;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utils\PdfBuilder;
use App\Docente;
use App\Instructor;
use App\Asignacion;
use App\Historial;
class ReportBuilderController extends Controller
{

    /**
     * @return mixed
     */
    public function docentes()
    {
        $data = Docente::get();
        return PdfBuilder::makePdf('Reporte de docentes', 'pdf.teachers', $data, 1);
    }

    /**
     * @return mixed
     */
    public function instructores()
    {
        $data = Instructor::with('capacitaciones')->get();
        return PdfBuilder::makePdf('Reporte de instructores', 'pdf.instructors', $data, 1);
    }

    /**
     * @return mixed
     */
    public function asignacion()
    {
        $data = Asignacion::with(
            'ciclo',
                     'horario',
                     'instructor',
                     'instructor.historial',
                     'materia',
                     'aula',
                     'aula.edificio',
                     'docente',
                     'docente.especialidades')->get();
        return PdfBuilder::makePdf('Reporte de instructorias', 'pdf.issues', $data, 1);
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
