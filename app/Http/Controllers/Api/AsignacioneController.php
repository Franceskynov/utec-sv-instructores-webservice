<?php
    /*
   |--------------------------------------------------------------------------
   | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
   |--------------------------------------------------------------------------
   |
   */
namespace App\Http\Controllers\Api;

use App\Utils\CustomValidators;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Asignacion;
use App\Instructor;
use App\Docente;
use Illuminate\Support\Facades\Mail;
use App\Mail\AsignacioneMailable;

class AsignacioneController extends Controller
{
    public function __construct()
    {
        if (env('JWT_LOGIN'))
        {
            $this->middleware('jwt.auth');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        if ( $rows =  Asignacion::with('ciclo', 'instructor', 'instructor.historial', 'materia', 'aula', 'aula.edificio', 'docente', 'docente.especialidades')->get()) {

            $this->response = $this->successResponse($rows);

        } else {

            $this->response = $this->invalidResponse;
        }

        return \Response::json($this->response);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = CustomValidators::requestValidator($request, CustomValidators::$asignacionRules);

        if ($validator->fails())
        {
            $this->response = $this->invalidCreation;

        } else {

            $created = Asignacion::create($request->all());
            $instructor = Instructor::find($request->instructor_id);
            $docente = Docente::find($request->docente_id);
            $instructor->update([
               'is_selected' => 1
            ]);

            $id = $created->id;
            $instructorEmail = $instructor->carnet . '@mail.utec.edu.sv';
            $docenteEmail = $docente->email;
            $emails = [$docenteEmail, $instructorEmail];
            Mail::to($emails)
                ->send(new AsignacioneMailable($id, 'Asignacion de instructoria', 'create'));

            $this->response = $request->all();
        }

        return \Response::json($this->response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        if ( $row =  Asignacion::with('ciclo', 'instructor', 'instructor.historial', 'materia', 'aula', 'aula.edificio', 'docente', 'docente.especialidades')->find($id)) {

            $this->response = $this->successResponse($row);

        } else {

            $this->response = $this->invalidResponse;
        }

        return \Response::json($this->response);
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
        if($row = Asignacion::find($id))
        {
            $validator = CustomValidators::requestValidator($request, CustomValidators::$asignacionRules);

            if ($validator->fails())
            {
                $this->response = $this->invalidChecking;

            } else {

                if($row->update($request->all()))
                {
                    $emails = [];
                    if ($row->docente_id == $request->docente_id)
                    {
                        $docente = Docente::find($request->docente_id);
                        $emails[] = $docente->email;
                    } else {
                        $docenteStored = Docente::find($row->docente_id);


                        $docente = Docente::find($request->docente_id);
                        $emails = [$docenteStored->email, $docente->email];
                    }

                    $instructor = Instructor::find($request->instructor_id);

                    $instructorEmail = $instructor->carnet . '@mail.utec.edu.sv';

                    $emails[] = $instructorEmail;
                    Mail::to($emails)
                        ->send(new AsignacioneMailable($id, 'Modificacion de instructoria', 'modify'));
                    $this->response = $this->successResponse($row);

                } else {

                    $this->response = $this->invalidUpdate;
                }
            }

        } else {

            $this->response = $this->notFoundResponse;
        }

        return \Response::json($this->response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if($row = Asignacion::find($id))
        {
            if ($row->is_enabled)
            {
                $row->update([
                    'is_enabled' => ($row->is_enabled == 1) ? 0 : 0
                ]);

                $this->response = $this->successDeletion;

            } else {
                $this->response = $this->previouslyDeleted;
            }

        } else {
            $this->response = $this->notFoundResponse;
        }

        return \Response::json($this->response);
    }
}
