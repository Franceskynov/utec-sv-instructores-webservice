<?php

namespace App\Http\Controllers\Api;

use App\Utils\CustomValidators;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Instructor;
use App\Asignacion;
use App\Historial;

class EvaluationController extends Controller
{

    /**
     * @param Request $request
     * @return JsonResponse
     */
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

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function evaluateSelfAppraisal(Request $request)
    {

        $validator = CustomValidators::requestValidator($request, CustomValidators::$evaluateRules);

        if ($validator->fails())
        {
            $this->response = $this->invalidCreation;

        } else {

            $instructorId  =  $request->instructorId;
            $asignacionName =  $request->asignacionName;
            $score = $request->score;
            if ($row = Instructor::find($instructorId))
            {
                $historialId = $row->historial->where('nombre', $asignacionName)->first()->id;
                $historial = Historial::find($historialId);
                $historial->update([
                    'autoevaluacion' => $score,
                    'is_autoevaluado' => true,
                    'nota' => $historial->nota + ($score * 0.05)
                ]);
                $this->response = $this->successCreation;
            } else {
                $this->response = $this->invalidChanged;
            }
        }

        return \Response::json($this->response);
    }
}
