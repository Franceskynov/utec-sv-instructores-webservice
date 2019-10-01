<?php

   /*
   |--------------------------------------------------------------------------
   | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
   |--------------------------------------------------------------------------
   |
   */
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utils\CustomValidators;
use App\Instructor;
use App\Utils\DataManipulation;
use App\User;

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
        if ( $instructor =  Instructor::with('notas', 'user', 'historial', 'historial.materia')->get()) {

            $this->response = $this->successResponse($instructor);

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
                    'email' => $email,
                    'password' => $secret
                ];

                \Mail::send('notifications.nuevos_usuarios', $data, function ($message) use ($email) {
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
                    'user_id' => $id
                ]);

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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
