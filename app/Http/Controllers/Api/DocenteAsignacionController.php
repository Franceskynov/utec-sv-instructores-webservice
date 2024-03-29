<?php

namespace App\Http\Controllers\Api;

use App\Utils\CustomValidators;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Asignacion;
use App\Docente;
use App\Instructor;
use App\Historial;
use App\Training;
use Illuminate\Support\Facades\Mail;
use App\Mail\EvaluationMailable;
use App\Setting;
use App\Utils\HttpUtils;
class DocenteAsignacionController extends Controller
{

    public $settings;
    public function __construct()
    {
        $this->settings = Setting::find(1);
        if (env('JWT_LOGIN'))
        {
            $this->middleware('jwt.auth');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        if ($row = Docente::find($id))
        {
            $validator = CustomValidators::requestValidator($request, CustomValidators::$docenteAsignacionRules);

            if ($validator->fails())
            {
                $this->response = $this->invalidCreation;

            } else {
                $data = $row->instructorias()->where('instructor_id', $request->instructorId)->first();
                $instructorId = $data->instructor_id;
                $asignacionId = $data->id;
                $cicloId = $data->ciclo_id;
                $docenteId = $data->docente_id;
                $materiaId = $data->materia_id;
                $instructor = Instructor::where('id', $instructorId)->first();

                if ($instructor->is_selected) {
                    $instructor->update([
                        'is_selected' => 0,
                        'score' => $instructor->score + $this->settings->horas_sociales_a_asignar
                    ]);
                }

                $asignacion = Asignacion::find($asignacionId);
                $asignacion->update([
                    'is_enabled' => 0
                ]);

                $instructor->historial()->saveMany([
                    new Historial([
                        'nombre'      => $asignacion->nombre,
                        'evaluacion_docente' => Training::validateNota($request->nota),
                        'is_docente_evaluado' => true,
                        'nota'        => (Training::validateNota($request->nota) * $this->settings->evaluacion_docente_percentage),
                        'comentarios' => $request->comentarios,
                        'ciclo_id'    => $cicloId,
                        'materia_id'  => $materiaId,
                        'docente_id'  => $docenteId
                    ])
                ]);


                $host = HttpUtils::getServerUri($request);
                $emails = [$instructor->instructor_email];
                Mail::to($emails)
                    ->send( new EvaluationMailable($asignacion->nombre, 'Auto evaluacion para instructores', $host));

                $this->response = $this->successResponse([
                    'instructor' => $instructor,
                    'docente' => $data
                ]);
            }

        } else {

            $this->response = $this->invalidUpdate;
        }

        return \Response::json($this->response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
