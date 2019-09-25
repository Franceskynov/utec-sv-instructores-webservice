<?php

namespace App\Http\Controllers\Api;

use App\Utils\DataManipulation;
use App\Utils\CustomValidators;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Facultad;

class FacultadController extends Controller
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
        if ($facultad =  Facultad::with('materias')->get()) {

            $this->response = $this->successResponse($facultad);

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
        $validator = CustomValidators::requestValidator($request, CustomValidators::$facultadRules);

        if ($validator->fails())
        {
            $this->response = $this->invalidCreation;

        } else {

            $created = Facultad::create($request->all());
            $id = $created->id;
            $materias = $request->materias;
            if(count($materias) > 0) {
                if (Facultad::addMateriasToFacultad($id, $materias)) {
                    $this->response = $this->successCreation;
                } else {
                    $this->response = $this->simpleInvalodCreation;
                }
            } else {
              $this->response = $this->invalidChecking;
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
        if ( $row =  Facultad::find($id)) {

            $this->response = $this->successResponse($row->load('materias'));

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

        if($row =  Facultad::find($id))
        {
            $rules = CustomValidators::$facultadRules;
            $rules['abreviacion'] = 'required';
            $validator = CustomValidators::requestValidator($request, $rules);

            if ($validator->fails())
            {
                $this->response = $this->invalidChecking;

            } else {

                if($row->update($request->all()))
                {
                    $storedMaterias = $row->materias->pluck('id')->toArray();
                    $materias = $request->materias;
                    if(count($materias) > 0) {
                        if (Facultad::addMateriasToFacultad($id, DataManipulation::tagDiff($storedMaterias, $materias), 'editMode')) {
                            $this->response = $this->validUpdate;
                        } else {
                            $this->response = $this->simpleInvalodCreation;
                        }
                    } else {
                        $this->response = $this->invalidChecking;
                    }
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
        if($row = Facultad::find($id))
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
