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
use App\Utils\DataManipulation;
use Illuminate\Support\Facades\Hash;
use App\Docente;
use App\User;

class DocenteController extends Controller
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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->input('noPaginate'))
        {
            if ( $row = Docente::with('especialidades')->get() ) {
                $this->response = $this->successResponse($row);
            } else {
                $this->response = $this->invalidResponse;
            }
        } else {
            if ( $rowPaginate =  Docente::with('especialidades')->paginate(DataManipulation::getRowsPerPage($request)) ) {
                $this->response = $this->successResponse($rowPaginate);
            } else {
                $this->response = $this->invalidResponse;
            }
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
        $validator = CustomValidators::requestValidator($request, CustomValidators::$docenteRules);

        if ($validator->fails())
        {
            $this->response = $this->invalidCreation;

        } else {

            $email = $request->email;
            $user = explode( '@', $email)[0];
            $secret = DataManipulation::randomStrings();
            $created = User::create([
                'username'   => $user,
                'email'      => $email,
                'password'   => bcrypt($secret),
                'rol_id'     => 2,
                'is_admin'   => false,
                'is_enabled' => false
            ]);

            if ($id = $created->id)
            {

                $data = [
                    'email'    => $email,
                    'password' => $secret
                ];

                \Mail::send('notifications.nuevos_usuarios', $data, function($message) use ($email)
                {
                    $message->to($email)->subject('Creacion de un nuevo usuario');
                    $message->from('contactanos@utec.edu.sv', 'Control de instructores');
                });

                $docente = Docente::create([
                    'nombre'     => $request->nombre,
                    'apellido'   => $request->apellido,
                    'email'      => $email,
                    'telefono'   => $request->telefono,
                    'oficina'    => $request->oficina,
                    'user_id'    => $id,
                    'is_enabled' => true
                ]);

                $docente_id = $docente->id;
                $especialidades = $request->especialidades;

                if(count($especialidades) > 0)
                {
                    if(Docente::addEspecialidadesToDocente($docente_id, $especialidades)) {
                        $this->response = $this->successCreation;
                    } else {
                        $this->response = $this->simpleInvalodCreation;
                    }
                } else {
                    $this->response = $this->invalidChecking;
                }

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
        if ( $row =  Docente::find($id)) {

            $this->response = $this->successResponse($row->load('especialidades'));

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
        return dd($id);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        if($row = Docente::find($id))
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
