<?php

   /*
   |--------------------------------------------------------------------------
   | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
   |--------------------------------------------------------------------------
   |
   */
namespace App\Http\Controllers\Api;

use App\Utils\Constants;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utils\CustomValidators;
use App\Instructor;
use App\Utils\DataManipulation;
use App\User;
use App\Nota;

class InstructorController extends Controller
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
        if ( $instructor =  Instructor::with(
            'instructoria',
            'instructoria.ciclo',
            'capacitaciones',
            'notas'
        )->get()) {
            $this->status = 200;
            $this->response = $this->successResponse($instructor);

        } else {
            $this->status = 404;
            $this->response = $this->invalidResponse;
        }

        return \Response::json($this->response, $this->status);
    }

    public function carreras()
    {
        $rows = Instructor::distinct('carrera')->get('carrera');
        if ($rows)
        {
            $this->status = 200;
            $this->response = $this->successResponse($rows);
        } else {
            $this->status = 404;
            $this->response = $this->invalidResponse;
        }

        return \Response::json($this->response, $this->status);
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

    public function checkInstructorByCarnet(Request $request)
    {
        $carnet = $request->input('carnet');
        if ($row = Instructor::where('carnet', $carnet)->first())
        {
            $this->status = 200;
            $this->response = $this->successResponse($row);
        } else {
            $this->status = 200;
            $this->response = $this->invalidResponse;
        }

        return \Response::json($this->response, $this->status);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = CustomValidators::requestValidator($request, CustomValidators::$instructorRules);

        if ($validator->fails())
        {
            $failedRules = $validator->failed();
            $this->response = $this->invalidCreationResponse($failedRules);

        } else {

            $email = $request->email;
            $user = $request->username;
            $secret = DataManipulation::randomStrings();
            $created = User::create([
                'username'   => $user,
                'email'      => $email,
                'password'   => bcrypt($secret),
                'rol_id'     => 3,
                'is_admin'   => false,
                'is_enabled' => true
            ]);

            if ($id = $created->id) {

                $data = [
                    'url'           => env('APP_URL') . '/#/login',
                    'email'         => $email,
                    'password'      => $secret,
                    'headerMessage' => Constants::EMAIL_USER_CREATION_HEADER_MESSAGE,
                    'footerMessage' => Constants::EMAIL_USER_CREATION_FOOTER_MESSAGE
                ];

                \Mail::send('notifications.users_email_template', $data, function ($message) use ($email) {
                    $message->to($email)->subject('Creacion de un nuevo usuario');
                    $message->from('contactanos@utec.edu.sv', 'Control de instructores');
                });

                $instructor = Instructor::create([
                    'nombre'  => $request->nombre,
                    'carnet'  => $request->carnet,
                    'carrera' => $request->carrera,
                    'cum'     => $request->cum,
                    'telefono' => $request->telefono,
                    'email_personal' => $request->emailPersonal,
                    'user_id' => $id,
                    'is_scholarshipped' => $request->is_scholarshipped
                ]);

                $id = $instructor->id;
                $notas = $request->notas;
                $notasId = [];
                foreach ($notas as $key => $value)
                {
                    $created = Nota::create([
                        'mat_codigo' => $value['mat_codigo'],
                        'mat_nombre' => $value['mat_nombre'],
                        'nota'       => $value['nota'],
                        'estado'     => $value['estado'],
                        'ciclo'      => $value['ciclo']
                    ]);
                    $notasId[] = $created->id;
                }

                $instructor->notas()->sync($notasId);

                $this->response = $this->successCreation;
            } else {
                $this->response = $this->invalidCreation;
            }
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
        if ( $row =  Instructor::find($id)) {
            $data = $row->load(
                'notas',
                'user',
                'historial',
                'historial.materia',
                'historial.ciclo',
                'historial.docente',
                'instructoria',
                'instructoria.ciclo',
                //'instructoria.horario',
                'instructoria.materia',
                'instructoria.aula',
                'instructoria.docente',
                'capacitaciones',
                'asignaciones');
            $this->status = 200;
            $this->response = $this->successResponse($data);

        } else {

            $this->status = 404;
            $this->response = $this->invalidResponse;
        }

        return \Response::json($this->response, $this->status);
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
        if($row = Instructor::find($id))
        {

            if($row->update([
                'is_scholarshipped' => $request->isScholarshipped
            ]))
            {
                $this->response = $this->successResponse($row);

            } else {

                $this->response = $this->invalidUpdate;
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
        if($row = Instructor::find($id))
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
