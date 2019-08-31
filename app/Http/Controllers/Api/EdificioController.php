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
use App\Edificio;
use App\Utils\Constants;

class EdificioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if ( $edificios =  Edificio::get()) {
            $this->response = [
                Constants::ERROR    => false,
                Constants::MESSAGE  => Constants::MESSAGE_SUCCESS,
                Constants::DATA     => $edificios
            ];

        } else {

            $this->response = [
                Constants::ERROR    => true,
                Constants::MESSAGE  => Constants::MESSAGE_INVALID_RESPONSE,
                Constants::DATA     => []
            ];
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nombre'      => 'required',
            'direccion'   => 'required',
            'abreviacion' => 'required',
            'descripcion' => 'required',
            'pisos'       => 'required'
        ]);

        if ($validator->fails())
        {
            $this->response = [
                Constants::ERROR    => true,
                Constants::MESSAGE  => Constants::MESSAGE_INVALID_CREATION,
                Constants::DATA     => []
            ];

        } else {

            Edificio::create($request->all());
            $this->response = [
                Constants::ERROR    => false,
                Constants::MESSAGE  => Constants::MESSAGE_SUCCESS_CREATION,
                Constants::DATA     => []
            ];
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
        if ( $edificios =  Edificio::find($id)) {
            $this->response = [
                Constants::ERROR    => false,
                Constants::MESSAGE  => Constants::MESSAGE_SUCCESS,
                Constants::DATA     => $edificios
            ];

        } else {

            $this->response = [
                Constants::ERROR    => true,
                Constants::MESSAGE  => Constants::MESSAGE_INVALID_RESPONSE,
                Constants::DATA     => []
            ];
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

    }
}
