<?php

namespace App\Http\Controllers\Api;

use App\Utils\CustomValidators;
use App\Utils\DataManipulation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Docente;
use App\Materia;
class DocenteMateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $validator = CustomValidators::requestValidator($request, CustomValidators::$docenteMateriaRules);

        if ($validator->fails())
        {
            $this->response = $this->invalidCreation;

        } else {

            $docenteId = $request->docenteId;
            $materias = $request->materias;
            if ($row = Docente::find($docenteId))
            {
                if(count($materias) > 0) {
                    if ( Docente::addMateriasToDocente($docenteId, $materias))
                    {
                        $this->response = $this->successCreation;
                    } else {
                        $this->response = $this->simpleInvalodCreation;
                    }
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        if ($row = Docente::find($id))
        {
            $validator = CustomValidators::requestValidator($request, CustomValidators::$docenteMateriaRules);

            if ($validator->fails())
            {
                $this->response = $this->invalidCreation;

            } else {

                $materias = $request->materias;
                $storedMaterias = $row->materias->pluck('id')->toArray();

                if(count($materias) > 0) {
                    if ( Docente::addMateriasToDocente($id, DataManipulation::tagDiff($storedMaterias, $materias ), 'editMode'))
                    {
                        $this->response = $this->validUpdate;
                    } else {
                        $this->response = $this->simpleInvalodCreation;
                    }
                }
            }

        } else {
            $this->response = $this->invalidUpdate;
        }

        return \Response::json($this->response);
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
