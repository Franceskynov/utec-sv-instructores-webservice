<?php

   /*
   |--------------------------------------------------------------------------
   | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
   |--------------------------------------------------------------------------
   |
   */
namespace App\Http\Controllers\Api;

use App\Utils\DataManipulation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Aula;
use App\Utils\CustomValidators;

class AulaController extends Controller
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
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);
        if ( $aulas =  Aula::with('edificio', 'horarios', 'horarios.ciclo')->get()) {

            $this->response = $this->successResponse($aulas);

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
        $request->user()->authorizeRoles(['Administrador']);
        $validator = CustomValidators::requestValidator($request, CustomValidators::$aulaRules);

        if ($validator->fails())
        {
            $this->response = $this->invalidCreation;

        } else {

            $created = Aula::create($request->all());
            if ($id = $created->id)
            {
                $horarios = $request->horarios;
                if(count($horarios) > 0)
                {
                    if(Aula::addHorarioToAula($id, $horarios)) {
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

            $this->response = $this->successCreation;
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
        if ( $aula =  Aula::find($id)) {

            $this->response = $this->successResponse($aula->load('edificio', 'horarios'));

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
       // $request->user()->authorizeRoles(['Administrador']);
        if($aula =  Aula::find($id))
        {
            $rules = CustomValidators::$aulaRules;
            $rules['codigo'] = 'required';
            $validator = CustomValidators::requestValidator($request, $rules);

            if ($validator->fails())
            {
                $this->response = $this->invalidChecking;

            } else {

                if($aula->update($request->all()))
                {
                    $storedHorarios =  $aula->horarios->pluck('id')->toArray();
                    // $horarios = $request->horarios;
                    $this->response = $this->validUpdate;

//                    if(count($horarios) > 0) {
//                        if (Aula::addHorarioToAula($id, DataManipulation::tagDiff($storedHorarios, $horarios), 'editMode')) {
//                            $this->response = $this->validUpdate;
//                        } else {
//                            $this->response = $this->simpleInvalodCreation;
//                        }
//                    } else {
//                        $this->response = $this->invalidChecking;
//                    }

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
    public function destroy($id, Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);
        if($aula = Aula::find($id))
        {
            if ($aula->is_enabled)
            {
                $aula->update([
                    'is_enabled' => ($aula->is_enabled == 1) ? 0 : 0
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
