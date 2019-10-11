<?php

/*
 |--------------------------------------------------------------------------
 | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
 |--------------------------------------------------------------------------
 |
 */
namespace App\Http\Controllers\Api;

use App\Utils\CustomValidators;
use App\Utils\DataManipulation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Instructor;
use App\Training;
class InstructorTrainingController extends Controller
{
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $validator = CustomValidators::requestValidator($request, CustomValidators::$instructorMateriaRules);

        if ($validator->fails())
        {
            $this->response = $this->invalidCreation;

        } else {

            if ($row = Instructor::find($request->instructorId))
            {
                $nota = (float) $request->nota;
                $trainingId = $request->trainingId;

                if ($row->capacitaciones->contains($trainingId))
                {
                   $this->response = $this->invalidTrainingAsignation;

                } else {

                    $row->capacitaciones()->syncWithoutDetaching(Training::build($trainingId, $nota));
                    $this->response = $this->successCreation;
                }
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
