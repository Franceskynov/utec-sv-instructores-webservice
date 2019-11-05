<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Instructor;
use App\Asignacion;

class EvaluationController extends Controller
{

    public function checkSelfAppraisal(Request $request)
    {
        $instructorId  =  $request->input('instructorId');
        $asignacionName =  $request->input('asignacionName');
        if ($row = Instructor::find($instructorId))
        {
            $asignacion = Asignacion::where('instructor_id', $row->id)
                ->where('nombre', $asignacionName)
                ->first();

            $this->response = $this->successResponse($asignacion);

        } else {

            $this->response = $this->invalidResponse;
        }

        return \Response::json($this->response);
    }
}
