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
use App\Edificio;

class EdificioController extends Controller
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

        if ( $edificios =  Edificio::with('aulas')->get()) {

            $this->response = $this->successResponse($edificios);

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
        $validator = CustomValidators::requestValidator($request, CustomValidators::$edificioRules);

        if ($validator->fails())
        {
            $this->response = $this->invalidCreation;

        } else {

            Edificio::create($request->all());

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
        if ( $edificios =  Edificio::find($id)) {

            $this->response = $this->successResponse($edificios->load('aulas'));

        } else {

            $this->response = $this->invalidResponse;
        }

        return \Response::json($this->response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
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
        if($edificio =  Edificio::find($id))
        {
            $validator = CustomValidators::requestValidator($request, CustomValidators::$edificioRules);

            if ($validator->fails())
            {
                $this->response = $this->invalidChecking;

            } else {

                if($edificio->update($request->all()))
                {
                    $this->response = $this->successResponse($edificio);

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
        if($edificio = Edificio::find($id))
        {
           if ($edificio->is_enabled)
           {
               $edificio->update([
                   'is_enabled' => ($edificio->is_enabled == 1) ? 0 : 0
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
