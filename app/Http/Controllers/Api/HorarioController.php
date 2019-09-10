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
use App\Utils\Constants;
use App\Utils\CustomValidators;
use App\Horario;

class HorarioController extends Controller
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
        if ( $horario =  Horario::get()) {

            $this->response = $this->successResponse($horario);

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
        $validator = CustomValidators::requestValidator($request, CustomValidators::$horarioRules);

        if ($validator->fails())
        {
            $this->response = $this->invalidCreation;

        } else {

            Horario::create($request->all());

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
        if ( $horario =  Horario::find($id)) {

            $this->response = $this->successResponse($horario);

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
        if($horario = Horario::find($id))
        {
            $validator = CustomValidators::requestValidator($request, CustomValidators::$horarioRules);

            if ($validator->fails())
            {
                $this->response = $this->invalidChecking;

            } else {

                if($horario->update($request->all()))
                {
                    $this->response = $this->successResponse($horario);

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
        if($horario = Horario::find($id))
        {
            if ($horario->is_enabled)
            {
                $horario->update([
                    'is_enabled' => ($horario->is_enabled == 1) ? 0 : 0
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
